@extends('admin.layouts.template')
@section('mahed')
<div class="container">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">page/</span> Add Product</h4>
        <div class="col-xxl">
            <div class="card mb-4">

                <div class="card-body">
                    <form action="{{route('storeproduct.page')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Product Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Electronics" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Product Price</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="product_price" name="product_price" placeholder="1112" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Product Quantity</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="product_quantity" name="product_quantity" placeholder="1112" />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Product Short
                                Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="product_short_des" name="product_short_des" cols="30" row="10"> </textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Product Long
                                Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="product_long_des" name="product_long_des" cols="30" row="10"> </textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Select Category</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="category_id" name="category_id" aria-label="Default select example">
                                    <option selected>select category name</option>
                                    @foreach ($catgories as $catgorie )
                                    <option value="{{$catgorie->id}}">{{$catgorie->category_name}}</option>
                                    @endforeach


                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Select Sub Category</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="subcategory_id" name="subcategory_id" aria-label="Default select example">

                                    <option selected>select Subcategory name</option>
                                    @foreach ($subCategories as $subCategorie )
                                    <option value="{{$subCategorie->id}}">{{$subCategorie->subcategory_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="card">
                            <h5 class="card-header">Upload Image</h5>
                            <div class="card-body">
                                <div class="mb-3">

                                    <input class="form-control" type="file" name="upload_img" id="upload_imae" />
                                </div>


                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Add Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </h1>
    @endsection