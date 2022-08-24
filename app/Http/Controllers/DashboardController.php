<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplying;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $totalCategory = Category::count();
        $totalProduct = Product::count();
        $totalSupplying = Supplying::count();
        $totalUser = User::count();
        return view('pages.dashboard.index', compact('totalCategory', 'totalProduct', 'totalSupplying', 'totalUser'));
    }
}
