<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function Dashboard()
    {
        return view('admin.dashboard');
    }
    public function AddCategory()
    {
        return view('admin.addCategory');
    }
    public function AllCategory()
    {
        $categories = Category::latest()->get();
        return view('admin.allCategory', compact('categories'));
    }
    public function AddSubCategory()
    {
        $categories = Category::latest()->get();
        return view('admin.addSubCategory', compact('categories'));
    }

    public function AllSubCategory()
    {
        $subCategories = SubCategory::latest()->get();
        return view('admin.allSubCategory', compact('subCategories'));
    }
    public function AddProduct()
    {

        $data['subCategories'] = SubCategory::latest()->get();
        $data['catgories'] = Category::latest()->get();
        return view('admin.addProduct')->with($data);
    }
    public function AllProduct()
    {
        $allProducts = Product::latest()->get();
        return view('admin.allProduct', compact('allProducts'));
    }
}
