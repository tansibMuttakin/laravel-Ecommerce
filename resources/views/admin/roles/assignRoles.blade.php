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
        <div class="alert alert-warning">
            {{ session('status') }}
        </div>
    @endif
    <div class="content mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Assign Roles To User</strong>
                </div>
                <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th> Name</th>
                                <th> Roles</th>
                                <th> Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>
                                    <form id="assign-role" action="{{route('roles.assign',$user->id)}}" method="post">
                                    @csrf
                                    <fieldset>
                                        @foreach($roles as $role)
                                            @if(count($user->roles)>0)
                                                @foreach($user->roles as $userRole)
                                                    @if($userRole->name === $role->name)   
                                                        <input type="checkbox" name="roles[]" value="{{$role}}" checked>{{$role->name}}
                                                        @break
                                                    @else
                                                        @if($loop->last)
                                                        <input type="checkbox" name="roles[]" value="{{$role}}">{{$role->name}}
                                                        @endif
                                                    @endif
                                                @endforeach
                                            @else
                                            <input type="checkbox" name="roles[]" value="{{$role}}">{{$role->name}}
                                            @endif
                                            
                                        @endforeach 
                                    </fieldset>  
                                    </form>                  
                                </td>
                                <td>
                                    <button class="btn btn-success" onclick="getElementById('assign-role').submit().preventDefault()">Save</button>
                                </td>
                                
                                <!-- <td>
                                    <a href="{{route('user.show',$user->id)}}" class="btn btn-info">Assign Roles</a>
                                    <a href="{{route('user.show',$user->id)}}" class="btn btn-warning">Details</a>
                                    <a href="{{route('user.destroy',$user->id)}}" class="btn btn-danger">Delete</a>
                                    <form action="{{route('user.destroy',$user->id)}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                    
                                </td> -->
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
