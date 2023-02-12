@extends('admin.layouts.template')
@section('mahed')
<div class="container">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">page/</span> All Sub Category</h4>
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
                    <tr>
                        <td>5</td>
                        <td>Electronics</td>
                        <td>
                            fab </td>
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