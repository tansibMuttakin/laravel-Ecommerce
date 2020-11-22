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
    @if (count($categories)==0)
        <h3>The is no category to sow</h3>
    @else

    <div class="content mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Category List</strong>
                </div>
                <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>SL NO</th>
                                <th>Category Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @foreach($categories as $category)
                        <tbody>
                            <tr>
                                <td>{{++$loop->index}}</td>
                                <td>{{$category->name}}</td>
                                <td class="d-flex justify-content-center">
                                    <a href="{{route('category.edit',$category->id)}}" class="btn btn-info mr-2">Edit</a>
                                    <form action="{{route('category.destroy',$category->id)}}" method="post">
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
    @endif 
@endsection
