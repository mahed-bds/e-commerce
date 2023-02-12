@extends('admin.layouts.template')
@section('mahed')
<div class="container">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">page/</span> All Product</h4>
    <div class="card">
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
                    <tr>
                        <td>5</td>
                        <td>Electronics</td>
                        <td>
                        </td>
                        <td>100</td>
                        <td><button class="btn btn-primary">Edit</button>
                            <button class="btn btn-warning">Edit</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection