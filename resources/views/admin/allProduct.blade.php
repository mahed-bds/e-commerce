@extends('admin.layouts.template')
@section('mahed')
<div class="container">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">page/</span> All Product</h4>
    <div class="card">
        @if(session()->has('message'))
        <div class="alert alert-success">{{session()->get('message')}}</div>
        @endif

        <h5 class="card-header">All Available Product Information</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>PRODUCT NAME</th>
                        <th>IMG</th>
                        <th>PRICE</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($allProducts as $allProduct )
                    <tr>
                        <td>{{$allProduct->id}}</td>
                        <td>{{$allProduct->product_name}}</td>
                        <td>
                            <img src="{{asset($allProduct->product_img)}}" alt="" style="height:100px" />
                            </br>
                            <button class="mt-2 btn btn-primary">update Img</button>
                        </td>
                        <td>{{$allProduct->price}}</td>

                        <td>
                            <a class="btn btn-primary" style="color:white" href="{{route('editallproduct.page',$allProduct->id)}}">Edit</a>
                            <a class="btn btn-warning" style="color:white" href="{{route('deleteallproduct.page',$allProduct->id)}}">Delete</a>

                        </td>
                    </tr>

                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection