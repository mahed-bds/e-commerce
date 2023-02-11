<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function Dashboard(){
        return view('admin.dashboard');
    }
    public function AddCategory(){
        return view('admin.addCategory');
    }
    public function AllCategory(){
        return view('admin.allCategory');
    }
    public function AddSubCategory(){
        return view('admin.addSubCategory');
    }
}