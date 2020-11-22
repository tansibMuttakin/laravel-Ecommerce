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
    <div class="content mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">User List</strong>
                </div>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @elseif(session('warning'))
                    <div class="alert alert-warning">
                        {{ session('warning') }}
                    </div>
                @endif
                <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>SL NO</th>
                                <th> Name</th>
                                <th>Email</th>
                                @can('viewAny',App\Models\User::class)
                                <th>Roles</th>
                                <th>Action</th>
                                @endcan

                            </tr>
                        </thead>
                        @foreach($users as $user)
                        <tbody>
                            <tr>
                                <td>{{++$loop->index}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                @can('viewAny',App\Models\User::class)
                                <td>
                                    @if(count($user->roles)==0)
                                        <p>No Roles Assigned</p>
                                    @else
                                        @foreach($user->roles as $role)
                                        <li>{{$role->name}}</li>
                                        @endforeach
                                </td>
                                    @endif
                                <td>
                                    <a href="{{route('user.show',$user->id)}}" class="btn btn-info">Assign Roles</a>
                                    <a href="{{route('user.edit',$user->id)}}" class="btn btn-info">Edit</a>
                                    <!-- <a href="{{route('user.show',$user->id)}}" class="btn btn-warning">Details</a> -->
                                    <a href="{{route('user.destroy',$user->id)}}" class="btn btn-danger">Delete</a>
                                    <!-- <form action="{{route('user.destroy',$user->id)}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger">Delete</button>
                                    </form> -->
                                    
                                </td>
                                @endcan
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div> 
@endsection
