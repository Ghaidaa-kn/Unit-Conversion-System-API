<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Unit;
use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $data = Product::create($request->all());

        if(!$data){
            return response()->json([
                'status' => 400,
                'error' => 'Error while inserting'
            ]);
        }else{
            return response()->json([
                'status' => 200,
                'message' => 'Inserted successfully'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */

    public function show($product_id , $unit_id="")
    {
        $product = Product::where('id' , $product_id)->select('id','name')->get();
        
        if($unit_id == ""){
            $total_qty = DB::table('products')
                   ->join('inventory' , 'inventory.product_id' , 'products.id')
                   ->join('units' ,'inventory.unit_id' , 'units.id')
                   ->where('products.id',$product_id)
                   ->selectRaw('sum(units.modifier * inventory.amount) as qty')
                   ->get();
        }else{
            $total_qty = DB::table('products')
                   ->join('inventory' , 'inventory.product_id' , 'products.id')
                   ->join('units' ,'inventory.unit_id' , 'units.id')
                   ->where('products.id',$product_id)
                   ->where('inventory.unit_id',$unit_id)
                   ->selectRaw('sum(units.modifier * inventory.amount) as qty')
                   ->get();
        }

        if(is_null($product)){
            return response()->json([
                    'status' => 400,
                    'error' => 'Product not found'
                ]);
        }else{
            return response()->json([
                        'Product' => $product,
                        'Total Quantity Per Unit/Units' => $total_qty,
                        'status' => 200,
                        'message' => 'success'
                ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
