@extends('admin.base')

@section('content')
    <div class="card">
        <div class="card-header">
        <strong>Edit Category</strong>
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
            
            <form action="{{route('category.update',$category->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @method('PUT')
                @csrf
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Category Name</label>
                    </div>
                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="name" placeholder="Category Name" value="{{$category->name}}" class="form-control" required></div>
                </div>
                
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm ">
                        <i class="fa fa-dot-circle-o"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

