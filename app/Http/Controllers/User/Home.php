<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class Home extends Controller
{
    public function Index()
    {

        $products = Product::latest()->get();

        return view('user.home', compact('products'));
    }
}
