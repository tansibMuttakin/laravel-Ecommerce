@extends('admin.base')

@section('content')
    <div class="card">
        <div class="card-header">
        <strong>Edit Role</strong>
        </div>
        <div class=" container-fluid card-body card-block">
            <form action="{{route('roles.update',$role->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Name</label>
                    </div>
                    <div class="col-12 col-md-9"><input type="text" id="text-input" value="{{$role->name}}" name="name" placeholder="Role name" class="form-control" required></div>
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

