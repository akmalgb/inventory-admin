<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('pages.category.index', compact('categories'));
    }

    public function store(Request $request)
    {
        Category::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name
        ]);

        return redirect()->route('category.index');
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();

        return redirect()->route('category.index');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        if($category->Products()->count()) {
            return back()->withErrors(['error' => 'Cannot delete, this category has existing products!']);
        }
        $category->Products()->delete();
        $category->delete();

        return redirect()->route('category.index');
    }
}
