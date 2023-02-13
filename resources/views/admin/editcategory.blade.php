@extends('admin.layouts.template')
@section('mahed')
<div class="container">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">page/</span> Edit Category</h4>
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-body">
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>

                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                <div class="card-body">
                    <form action="{{route('updatecategory.page')}}" method="POST">
                        @csrf
                        <input type="hidden" class="form-control" id="category_name" name="category_id" value="{{$category_info->id}}" />
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Category Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Electronics" value="{{$category_info->category_name}}" />
                            </div>
                        </div>


                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </h1>
    @endsection