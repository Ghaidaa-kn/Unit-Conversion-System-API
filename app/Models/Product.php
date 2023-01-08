<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;


class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image_path'
    ];

    protected $appends = [
        'total_quantity',
        'image_path',
    ];

    public function units()
    {
        return $this->belongsToMany(Unit::class, Inventory::class);
    }

    public function image(){
        return $this->hasOne('App\Models\Image');
    }

    public function getTotalQuantityAttribute()
    {
        return DB::table('products')
                   ->join('product_unit' , 'product_unit.product_id' , 'products.id')
                   ->join('units' ,'product_unit.unit_id' , 'units.id')
                   ->where('products.id',$this->id)
                   ->selectRaw('sum(units.modifier * product_unit.amount) as Total_Qty_for_all_units')
                   ->get()->first();
    }

    public function getImagePathAttribute()
    {
        return Image::where('o_id' , $this->id)->where('o_type' , 'product')
               ->select('path')->get()->first();
    }

}
