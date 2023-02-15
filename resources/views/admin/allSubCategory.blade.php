@extends('admin.layouts.template')
@section('mahed')
<div class="container">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">page/</span> All Sub Category</h4>
    @if(session()->has('message'))
    <div class="alert alert-success">{{session()->get('message')}}</div>
    @endif
    <div class="card">
        <h5 class="card-header">All Sub Category Information</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>SUB CATEGORY NAME</th>
                        <th>CATEGORY</th>
                        <th>PRODUCT</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">

                    @foreach($subCategories as $subCategorie )
                    <tr>

                        <td>{{$subCategorie->id}}</td>
                        <td>{{$subCategorie->subcategory_name}}</td>
                        <td>{{$subCategorie->category_name}}</td>
                        <td>{{$subCategorie-> product_count}}</td>
                        <td>
                            <a href="{{route('editsubcategory.page',$subCategorie->id)}}" class="btn btn-primary">Edit</a>
                            <a href="{{route('deletesubcategory.page',$subCategorie->id)}}" class="btn btn-warning">Delete</a>
                        </td>

                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection