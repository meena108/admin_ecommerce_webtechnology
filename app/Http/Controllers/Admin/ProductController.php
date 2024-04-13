<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

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
}