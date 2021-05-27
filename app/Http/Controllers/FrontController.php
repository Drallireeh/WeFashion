<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product; // importez l'alias de la classe
use App\Category; // importez l'alias de la classe

class FrontController extends Controller
{
    public function __construct()
    {
        view()->composer('partials.menu', function ($view) {
            $categories = Category::pluck('gender', 'id')->all();
            $view->with('categories', $categories);
        });
    }

    public function index()
    {
        $products = Product::paginate(6); // retourne les produits de l'application, avec une pagination de 6

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

    public function showSales()
    {
        $products = Product::discount()->paginate(6);

        return view('front.discount', ['products' => $products]);
    }
}
