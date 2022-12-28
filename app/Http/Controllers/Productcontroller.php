<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; 

class Productcontroller extends Controller
{
   
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }

    
    public function store(Request $request)
    {
       $this->validate($request,[
        'title' => 'required',
        'price' => 'required',
        'quantity' => 'required',
        'description' => 'required'
       ]);

       $product = new Product();

       $product->title = $request->title;
       $product->price = $request->price;
       $product->quantity = $request->quantity;
       $product->description = $request->description;

       $product->save();
       return response("Data Added Successfully");
    }
}
