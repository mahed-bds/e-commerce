<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //store in database
    public function StoreProduct(Request $request)
    {

        $request->validate([
            'product_name' => 'required|unique:products',
            'product_price' => 'required',
            'product_quantity' => 'required',
            'product_short_des' => 'required',
            'product_long_des' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'upload_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        $image = $request->file('upload_img');
        $img_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $request->upload_img->move(public_path('upload'), $img_name);
        $img_url = 'upload/' . $img_name;

        $categoryId = $request->category_id;
        $subcategoryId = $request->subcategory_id;

        $category_name = Category::where('id', $categoryId)->value('category_name');
        $subcategory_name = SubCategory::where('id', $subcategoryId)->value('subcategory_name');

        Category::where('id', $categoryId)->increment('product_count', 1);
        SubCategory::where('id', $subcategoryId)->increment('product_count', 1);
        Product::insert([
            'product_name' => $request->product_name,
            'product_short_des' => $request->product_short_des,
            'product_long_des' => $request->product_long_des,
            'price' => $request->product_price,
            'product_category_name' => $category_name,
            'product_subcategory_name' => $subcategory_name,
            'product_category_id' => $categoryId,
            'product_subcategory_id' => $subcategoryId,
            'product_img' => $img_url,
            'slug' => strtolower(str_replace(' ', '-', $request->product_name))
        ]);

        return redirect()->route('allproduct.page')->with('message', 'Product added succesfully');
    }

    public function EditProduct($id)
    {
        $data['subCategories'] = SubCategory::latest()->get();
        $data['catgories'] = Category::latest()->get();
        $data['product_info'] = Product::findOrFail($id);
        return view('admin.editallproduct')->with($data);
    }

    public function UpdateProduct(Request $request)
    {
        $productId = $request->products_id;
        $categoryId = $request->category_id;
        $subcategoryId = $request->subcategory_id;

        $products_category_id = $request->products_category_id;
        $products_sub_category_id = $request->products_subcategory_id;


        if (!$categoryId) {
            $categoryId = $products_category_id;
        }
        if (!$subcategoryId) {
            $subcategoryId = $products_sub_category_id;
        }


        $request->validate([
            'product_name' => 'required',
            'product_price' => 'required',
            'product_short_des' => 'required',
            'product_long_des' => 'required',

        ]);



        $category_name = Category::where('id', $categoryId)->value('category_name');
        $subcategory_name = SubCategory::where('id', $subcategoryId)->value('subcategory_name');



        Product::findOrFail($productId)->update([
            'product_name' => $request->product_name,
            'price' => $request->product_price,
            'product_short_des' => $request->product_short_des,
            'product_long_des' => $request->product_long_des,
            'product_category_id' => $categoryId,
            'product_subcategory_id' => $subcategoryId,
            'product_category_name' => $category_name,
            'product_subcategory_name' => $subcategory_name,
            'slug' => strtolower(str_replace(' ', '-', $request->product_name))
        ]);
        return redirect()->route('allproduct.page')->with('message', 'Product updated succesfully');
    }

    // delte Product
    public function DeleteProduct($id)
    {
        $categoryId = Product::where('id', $id)->value('product_category_id');
        $subcategoryId = Product::where('id', $id)->value('product_subcategory_id');
        Category::where('id', $categoryId)->decrement('product_count', 1);
        SubCategory::where('id', $subcategoryId)->decrement('product_count', 1);
        Product::findOrFail($id)->delete();
        return redirect()->route('allproduct.page')->with('message', 'Product deleted succesfully');
    }
}
