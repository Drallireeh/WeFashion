<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(10); // retourne tous les produits de l'application
        return view('back.category.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('gender', 'id')->all();

        return view('back.category.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = Category::create($request->all());

        Storage::makeDirectory($category->gender);

        return redirect()->route('category.index')->with('message', 'La catégorie a été ajouté');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);

        return view('back.category.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategoryRequest $request, $id)
    {
        $category = Category::find($id); // associé les fillables

        $this->_renameFile($request, $category);
        $this->_updateProductImage($request, $category);

        $category->update($request->all());
        
        return redirect()->route('category.index')->with('message', 'Modification effectuée avec succès');
    }

    /**
     * 
     * @param  \Illuminate\Http\Request $request
     * @param  Category  $category
     * @return void
     */
    private function _renameFile($request, $category) {
        $directories = Storage::directories();
        $directory_name = $directories[array_search($category->gender, $directories, true)];

        if ($directory_name !== "") rename(Storage::disk('local')->getAdapter()->applyPathPrefix($directory_name), "images/".$request->gender);
    }

    /**
     * 
     * @param  \Illuminate\Http\Request $request
     * @param  Category  $category
     * @return void
     */
    private function _updateProductImage($request, $category) {
        $products = Product::where('category_id', $category->id)->get();

        $products->each(function ($item, $key) use($request, $category) {
            $str = $item->picture ? str_replace($category->gender, $request->gender, $item->picture->link) : "";

            if ($str != "") {
                $item->picture->update(['link' => $str]);
            }
        });
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        if (empty(Storage::files($category->gender))) Storage::deleteDirectory($category->gender);

        $category->delete();

        return redirect()->route('category.index')->with('message', 'La suppression a été effectuée avec succès');
    }
}
