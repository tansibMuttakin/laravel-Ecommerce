@extends('admin.base')

@section('content')
    <div class="card">
        <div class="card-header">
        <strong>Register user</strong>
        </div>
        <div class=" container-fluid card-body card-block">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <!-- <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Name</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="text-input" name="name" placeholder="User name" class="form-control" required>
                    </div>
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Email</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="text-input" name="email" placeholder="User Email" class="form-control" required>
                    </div>
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Password</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="text-input" name="password" placeholder="User Password" class="form-control" required>
                    </div>
                </div>     -->

                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="text" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm ">
                        <i class="fa fa-dot-circle-o"></i> Submit
                    </button>
                    <button type="submit" class="btn btn-danger btn-sm " id="resetForm">
                        <i class="fa fa-ban"></i> Reset
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

