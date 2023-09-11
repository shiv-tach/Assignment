<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){

        $product = Product::orderBy('created_at', 'DESC')->get();
        
        return view('products.index', compact('product'));
    }

    public function create(){

        return view('products.create');

    }

    public function store(Request $request){

        Product::create($request->all());

        return redirect()->route('products')->with('success', 'Product added successfully');


    }

    public function show(string $id){

        $product = Product::findOrFail($id);

        return view('products.show', compact('product'));

    }

    public function edit(string $id){

        $product = Product::findOrFail($id);

        return view('products.edit', compact('product'));
    }

    public function update(Request $request, string $id){
        $product = Product::findOrFail($id);
        $product->update($request->all());

        return redirect()->route('products')->with('success','Product Updated Successfully');
    }

    public function destroy(string $id){

        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->route('products')->with('success','Product Deleted Successfully');
    }
}
