<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage; 

class ProductController extends Controller
{
    public function addProduct(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'file' => 'required|file'
        ]);

        $file = $request->file('file');
        $originalFilename = $file->getClientOriginalName();
        $path = $file->storeAs('products', $originalFilename, 'public');

        $product = new Product;
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->file_path = $path; // Changed from image_path to file_path
        $product->save();

        return response()->json([
            'message' => 'Product added successfully',
            'product' => $product
        ]);
    }


    public function list(){
        return Product::all();
    }

    public function delete($id){
    $product = Product::find($id);
    if ($product) {
        $product->delete();
        return response()->json([
            'message' => 'Product deleted successfully'
        ]);
    } else {
        return response()->json([
            'message' => 'Product not found'
        ], 404);
    }
}


public function getProduct($id)
{
    $product = Product::find($id);
    if ($product) {
        return $product;
    } else {
        return response()->json([
            'message' => "Product with id $id not found"
        ], 404);
    }
}

//pro
// ProductController.php


public function update($id, Request $request)
{
    $product = Product::find($id);
    if (!$product) {
        return response()->json(['status' => 404, 'message' => 'Product not found']);
    }

    $product->name = $request->input('name');
    $product->price = $request->input('price');
    $product->description = $request->input('description');
    $product->file_path = $request->input('file_path');

    //    if ($request->hasFile('file_path')) {
    //     $file = $request->file('file_path');
    //     $filename = $file->store('products', 'public');
    //     $product->file_path = $filename;
    // }
    
    $product->save();

    return response()->json(['status' => 200, 'message' => 'Product updated successfully']);
}





public function edit($id){
    $product = Product::find($id);
    if (!$product) {
        return response()->json(['message' => 'Product not found'], 404);
    }

    // Return the product data when it's found
    return response()->json($product);
}


//search function
public function search($key)
{
    return Product::where('name', 'like', "%$key%")->get();
}



}
