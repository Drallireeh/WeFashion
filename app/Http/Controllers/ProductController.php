<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Size;

// use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(15); // retourne tous les produits de l'application
        return view('back.product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('gender', 'id')->all();
        $sizes = Size::pluck('value', 'id')->all();

        return view('back.product.create', ['categories' => $categories, 'sizes' => $sizes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->all()); // associé les fillables
        $product->sizes()->attach($request->sizes);

        $category = Category::find($product->category_id);

        // image
        $im = $request->file('picture');
        
        // si on associe une image à un product 
        if (!empty($im)) {
            $link = $request->file('picture')->store($category->gender);
            // mettre à jour la table picture pour le lien vers l'image dans la base de données
            $product->picture()->create([
                'link' => $link,
            ]);

            $product->save();
        }

        return redirect()->route('product.index')->with('message', 'Le produit a été ajouté');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::pluck('gender', 'id')->all();
        $sizes = Size::pluck('value', 'id')->all();

        return view('back.product.edit', ['product' => $product, 'categories' => $categories, 'sizes' => $sizes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreProductRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductRequest $request, $id)
    {
        $product = Product::find($id); // associé les fillables
        $product->sizes()->sync($request->sizes);

        $product->update($request->all());
        
        // image
        $im = $request->file('picture');
        
        // si on associe une image à un product 
        if (!empty($im)) {
            $link = $request->file('picture')->store('images');

            // mettre à jour la table picture pour le lien vers l'image dans la base de données
            $product->picture()->create([
                'link' => $link,
            ]);
        }

        return redirect()->route('product.index')->with('message', 'Le produit a été mis à jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();

        return redirect()->route('product.index')->with('message', 'Le produit a bien été supprimé');
    }
}
