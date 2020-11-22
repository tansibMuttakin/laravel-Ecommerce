@extends('admin.base')

@section('content')
    @if(!sizeof($roles))
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
    <h2>No roles assigned to users</h2>
    @else
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
                    <strong class="card-title">Roles</strong>
                </div>
                <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>SL NO</th>
                                <th>Role Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @foreach($roles as $role)
                        <tbody>
                            <tr>
                                <td>{{++$loop->index}}</td>
                                <td>{{$role->name}}</td>
                                <td>
                                    <a href="{{route('roles.edit',$role->id)}}" class="btn btn-info">Edit</a>
                                    <a href="{{route('roles.destroy',$role->id)}}" class="btn btn-danger">Delete</a>
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
