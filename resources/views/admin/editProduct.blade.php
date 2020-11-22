@extends('admin.base')

@section('content')
    <div class="card">
        <div class="card-header">
        <strong>Edit Product</strong>
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
            @if (session('warning'))
                <div class="alert alert-warning">
                    {{ session('warning') }}
                </div>
            @endif
            <form action="{{route('products.update',$product->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @method('PUT')
                @csrf
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Product Name</label>
                    </div>
                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="productName" placeholder="Product Name" value="{{$product->name}}" class="form-control" required></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Product Category</label>
                    </div>
                    <div class="col-12 col-md-9">
                        @foreach($categories as $category)
                            @if( $product->category == null)
                                <label for="text-input" class=" form-control-label">{{$category->name}}</label>
                                <input type="checkbox" id="text-input" name="category[]" value="{{$category}}">
                            @else
                                @if($category->name === $product->category->name)
                                <label for="text-input" class=" form-control-label">{{$category->name}}</label>
                                <input type="checkbox" id="text-input" name="category[]" value="{{$category}}" checked>
                                @else
                                <label for="text-input" class=" form-control-label">{{$category->name}}</label>
                                <input type="checkbox" id="text-input" name="category[]" value="{{$category}}">
                                @endif
                            @endif    
                        @endforeach
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Product Price</label>
                    </div>
                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="productPrice" value="{{$product->price}}" placeholder="Product Price" class="form-control" required></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Product Image</label>
                    </div>
                    <div class="col-12 col-md-9"><input type="file" id="text-input" name="productImage" class="form-control"></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Select As Featured Product</label>
                    </div>
                    @if ($product->featured == 1)
                        <div class="col-md-9">
                            <input type="radio" id="text-input" name="featured" value="1" checked>
                            <label for="text-input" class=" form-control-label">Yes</label>
                            <input type="radio" id="text-input" name="featured" value="0">
                            <label for="text-input" class=" form-control-label">No</label>
                        </div>
                    @else
                        <div class="col-md-9">
                            <input type="radio" id="text-input" name="featured" value="1" >
                            <label for="text-input" class=" form-control-label">Yes</label>
                            <input type="radio" id="text-input" name="featured" value="0" checked>
                            <label for="text-input" class=" form-control-label">No</label>
                        </div>
                    @endif
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="textarea-input" class=" form-control-label">Description</label>
                    </div>
                    <div class="col-12 col-md-9"><textarea name="productDescription" id="textarea-input" rows="6" placeholder="Description..." class="form-control">{{$product->description}}</textarea></div>
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

