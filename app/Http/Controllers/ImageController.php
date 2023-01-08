<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ImageController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->o_type == 'user'){
            $user = User::find($request->o_id);
            $image = Image::create($request->all());
            // if(!$user){
            //     return response()->json([
            //             'status' => 400,
            //             'error' => 'User not found'
            //         ]);
            // }else{
            //     if(!$image){
            //         return response()->json([
            //             'status' => 400,
            //             'error' => 'Error while inserting'
            //         ]);
            //     }else{
            //         return response()->json([
            //             'status' => 200,
            //             'message' => 'Inserted successfully'
            //         ]);
            //     }
            // }
        }
        if($request->o_type == 'product'){
            $product = Product::find($request->o_id);
            $image = Image::create($request->all());
            // if(!$product){
            //     return response()->json([
            //             'status' => 400,
            //             'error' => 'Product not found'
            //         ]);
            // }else{
            //     if(!$image){
            //         return response()->json([
            //             'status' => 400,
            //             'error' => 'Error while inserting'
            //         ]);
            //     }else{
            //         return response()->json([
            //             'status' => 200,
            //             'message' => 'Inserted successfully'
            //         ]);
            //     }
            // }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        //
    }
}
