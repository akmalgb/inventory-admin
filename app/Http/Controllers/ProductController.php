<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('pages.product.index', compact('products', 'categories'));
    }

    public function store(Request $request)
    {
        Product::create([
            'user_id' => Auth::user()->id,
            'category_id' => $request->category_id,
            'name' => $request->name,
            'price' => $request->price,
        ]);

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $histories = $product->Supplyings()->get();

        // dd($histories);

        return view('pages.product.show', compact('product', 'histories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->save();

        return redirect()->route('product.index');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        // if ($product->Supplyings()->count()) {
        //     return back()->withErrors(['error' => 'Cannot delete, product has supplying records!']);
        // }
        $product->Stock()->delete();
        $product->Supplyings()->delete();
        $product->delete();

        return redirect()->route('product.index');
    }
}
