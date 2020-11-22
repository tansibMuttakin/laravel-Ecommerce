@extends('admin.base')

@section('content')
    <div class="card">
        <div class="card-header">
        <strong>Edit User</strong>
        </div>
        <div class=" container-fluid card-body card-block">
            <form action="{{route('user.update',$user->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Name</label>
                    </div>
                    <div class="col-12 col-md-9"><input type="text" id="text-input" value="{{$user->name}}" name="name" placeholder="User name" class="form-control" required></div>
                </div>    
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Email</label>
                    </div>
                    <div class="col-12 col-md-9"><input type="text" id="text-input" value="{{$user->email}}" name="email" placeholder="User email" class="form-control" required></div>
                </div>    
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm ">
                        <i class="fa fa-dot-circle-o"></i> Update
                    </button>
                    <button type="submit" class="btn btn-danger btn-sm " id="resetForm">
                        <i class="fa fa-ban"></i> Reset
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

