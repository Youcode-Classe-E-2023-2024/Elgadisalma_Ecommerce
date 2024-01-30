<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('products', compact('products'));
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
