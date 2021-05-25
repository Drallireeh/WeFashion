<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product; // importez l'alias de la classe
use App\Category; // importez l'alias de la classe

class FrontController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $products = Product::all(); // retourne tous les livres de l'application

        return view('front.index', ['products' => $products]);
    }

    public function show(int $id)
    {
        $product = Product::find($id);
        return view('front.show', ['product' => $product]);
    }

    public function showCategory(int $id)
    {
        $category = Category::find($id);
        $products = Category::find($id)->products()->paginate(6);

        return view('front.category', ['products' => $products, 'category' => $category]);
    }
}
