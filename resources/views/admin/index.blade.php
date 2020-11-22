@extends('admin.base')

@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-8 float-right">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="content mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Product List</strong>
                </div>
                <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>SL NO</th>
                                <th>Product Name</th>
                                <th>Product Category</th>
                                <th>Product Image</th>
                                <th>Product Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @foreach($products as $product)
                        <tbody>
                            <tr>
                                <td>{{++$loop->index}}</td>
                                <td>{{$product->name}}</td>
                                @if($product->category == null)
                                <td>NULL</td>
                                @else
                                <td>{{$product->category->name}}</td>
                                @endif
                                <td><img src="uploads/thumbnails/{{$product->image}}" style="height:60px; width:80px" alt=""></td>
                                <td>{{$product->price}}</td>
                                <td class="d-flex justify-content-center">
                                    <a href="{{route('products.edit',$product->id)}}" class="btn btn-info mr-2">Edit</a>
                                    <form action="{{route('products.destroy',$product->id)}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div> 
@endsection
