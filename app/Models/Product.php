<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function supplier(){
        return $this->belongsTo(Supplier::class,'supplier_id','id');
    }

     public function unit(){
        return $this->belongsTo(Unit::class,'unit_id','id');
    }

     public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    //Stores a product into the database
    public function PrdocutStore(Request $request){

        $image = $request->file('product_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension(); 
        Image::make($image)->resize(200,200)->save('upload/product/'.$name_gen);
        $save_url = 'upload/product/'.$name_gen;

        Product::insert([
            'supplier_id' => $request->supplier_id,
            'unit_id' => $request->unit_id,
            'category_id' => $request->category_id,
            'name' => $request->name,
            'quantity' => $request->quantity,
            'status' => $request->status,
            'product_image' => $save_url ,
            'created_by' => Auth::user()->id,
            'updated_by' =>  Auth::user()->id
        ]);

         $notification = array(
            'message' => 'Product Added Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('product.all')->with($notification);
    } 
}