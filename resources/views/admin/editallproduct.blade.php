@extends('admin.layouts.template')
@section('mahed')
<div class="container">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">page/</span> Add Product</h4>
        <div class="col-xxl">
            <div class="card mb-4">
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>

                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="card-body">
                    <form action="{{route('updateProduct.page')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="products_category_id" value="{{$product_info->product_category_id}}" />
                        <input type="hidden" name="products_subcategory_id" value="{{$product_info->product_subcategory_id}}" />
                        <input type="hidden" name="products_id" value="{{$product_info->id}}" />
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Product Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Electronics" value="{{$product_info->product_name}}" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Product Price</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="product_price" name="product_price" placeholder="1112" value="{{$product_info->price}}" />
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Product Short
                                Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="product_short_des" name="product_short_des" cols="30" row="10">{{$product_info->product_short_des}} </textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Product Long
                                Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="product_long_des" name="product_long_des" cols="30" row="10"> {{$product_info->product_long_des}} </textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Select Category</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="category_id" name="category_id" aria-label="Default select example">
                                    <option selected value="">{{$product_info-> product_category_name}}</option>
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

                                    <option selected value="">{{$product_info->product_subcategory_name}}</option>
                                    @foreach ($subCategories as $subCategorie )
                                    <option value="{{$subCategorie->id}}">{{$subCategorie->subcategory_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>



                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </h1>
    @endsection