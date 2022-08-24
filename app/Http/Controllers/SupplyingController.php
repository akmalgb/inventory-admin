<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Stock;
use App\Models\Supplying;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SupplyingController extends Controller
{
    public function index()
    {
        $supplyings = Supplying::all();
        $categories = Category::all();
        return view('pages.supplying.index', compact('categories', 'supplyings'));
    }

    public function getProduct($id)
    {
        $products = Product::where('category_id', $id)->get();
        return response()->json($products);
    }

    public function store(Request $request)
    {
        $supplying = Supplying::create([
            'user_id' => Auth::user()->id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
        ]);

        $oldQuantity = $supplying->product->stock->quantity ?? null;

        if (!isset($oldQuantity)) {
            Stock::create([
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
            ]);
        } else {
            Stock::where('product_id', $request->product_id)->update([
                'quantity' => $oldQuantity + $request->quantity
            ]);
        }

        return redirect()->route('supplying.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
