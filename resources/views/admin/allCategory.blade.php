@extends('admin.layouts.template')
@section('mahed')
<div class="container">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">page/</span> All Category</h4>
    @if(session()->has('message'))
    <div class="alert alert-success">{{session()->get('message')}}</div>
    @endif
    <div class="card">

        <a class="btn btn-success" href="{{ route('export-users') }}">Export Users</a>
        <h5 class="card-header">All Category Information</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>CATEGORY NAME</th>
                        <th>SUB CATEGORY</th>
                        <th>PRODUCT</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->category_name}}</td>
                        <td>
                            {{$category->subcategory_count}}
                        </td>
                        <td>{{$category->slug}}</td>
                        <td><a href="{{route('editcategory.page',$category->id)}}" class="btn btn-primary">Edit</a>
                            <a href="{{route('deletecategory.page',$category->id)}}" class="btn btn-warning">Delete</a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection