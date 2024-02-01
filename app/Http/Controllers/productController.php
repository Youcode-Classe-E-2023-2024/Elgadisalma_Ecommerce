<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth; 

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(8);

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
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $createdBy = Auth::id();

        $image = $request->file('image');
        $imageName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
        $imageExtension = $image->getClientOriginalExtension();
        $imageFullName = $imageName . '_' . time() . '.' . $imageExtension;

        // Enregistrez le fichier dans le dossier public/images
        $image->storeAs('images', $imageFullName, 'public');

        Product::create([
            'title' => $request->input('title'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'created_by' => $createdBy,
            'image' => $imageFullName,
        ]);

        return to_route('products')->with('success', 'Vous êtes bien connecté ');
    }

    public function getById($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('error');
        }

        return view('details', ['product' => $product]);
    }

    public function getMyProducts()
    {
        $user = Auth::user();

        $products = $user->products;

        return view('myProduct', compact('products'));
    }

    public function deleteMyProducts(Product $product)
    {
        $product->delete();
        return to_route('products')->with('success', 'Supprimé avec succés');

    }

    public function editMyProducts(Product $product)
    {
        $validated = request()->validate([
            'title' => 'required',
            'price' => 'required',
            'updated_at'=>now(),
        ]);

        $product->update($validated);

        return to_route('getMyProducts')->with('success', 'Edité avec succés');
    }

}
