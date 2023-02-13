<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;

class DatabaseController extends Controller
{
    public function StoreCategory(Request $request)
    {

        $request->validate([
            'category_name' => 'required|unique:categories'

        ]);
        Category::insert([
            'category_name' => $request->category_name,
            'slug' => strtolower(str_replace(' ', '-', $request->category_name))
        ]);
        return redirect()->route('allcategory.page')->with('message', 'category added succesfully');
    }

    public function EditCategory($id)
    {
        $category_info = Category::findOrFail($id);
        return view('admin.editcategory', compact('category_info'));
    }

    public function UpdateCategory(Request $request)
    {
        $category_id = $request->category_id;
        $request->validate([
            'category_name' => 'required|unique:categories'

        ]);
        Category::findOrFail($category_id)->update([
            'category_name' => $request->category_name,
            'slug' => strtolower(str_replace(' ', '-', $request->category_name))
        ]);
        return redirect()->route('allcategory.page')->with('message', 'category updated succesfully');
    }

    public function DeleteCategory($id)
    {

        Category::findOrFail($id)->delete();
        return redirect()->route('allcategory.page')->with('message', 'category deleted succesfully');
    }

    //store sub category

    public function StoreSubCategory(Request $request)
    {




        $request->validate([
            'subcategory_name' => 'required|unique:sub_categories',
            'category_id' => 'required'

        ]);

        $category_id = $request->category_id;
        $category_name = Category::where('id', $category_id)->value('category_name');


        SubCategory::insert([
            'subcategory_name' => $request->subcategory_name,
            'slug' => strtolower(str_replace(' ', '-', $request->subcategory_name)),
            'category_id' => $category_id,
            'category_name' => $category_name,

        ]);
        Category::where('id', $category_id)->increment('subcategory_count', 1);
        return redirect()->route('allsubcategory.page')->with('message', 'Sub Category added succesfully');
    }
}
