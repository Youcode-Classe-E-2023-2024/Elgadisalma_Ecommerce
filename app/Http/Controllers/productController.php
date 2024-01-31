<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth; 

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('products', compact('products'));
    }

    public function add_product_show()
    {
        return view('add_product');
    }

    public function add_product(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        $createdBy = Auth::id();

        Product::create([
            'title' => $request->input('title'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'created_by' => $createdBy,
        ]);

        return view('add_product');    
    }

    public function getById($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('error');
        }

        return view('details', ['product' => $product]);
    }
}
