@extends('admin.layouts.template')
@section('mahed')
<div class="container">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">page/</span> Add Sub Category</h4>
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
                    <form action="{{route('storesubcategory.page')}}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Sub Category Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="sub_category_name" name="subcategory_name" placeholder="Electronics" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Select Category</label>
                            <div class="col-sm-10">
                                <select class="form-select" aria-label="Default select example" id="category_id" name="category_id">
                                    <option selected>Open this select the category</option>
                                    @foreach ($categories as $category )
                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                    @endforeach


                                </select>
                            </div>
                        </div>


                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Add Sub Category</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </h1>
    @endsection