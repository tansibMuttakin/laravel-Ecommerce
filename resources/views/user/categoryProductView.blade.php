@extends('user.userBase')

@section('content')
      {{-- @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('status') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif
      <div class="container text-center">
      <h5>{{$category->name}}</h5>
        <div class="row">
          @foreach($products as $product)
          <div class="col-4 mb-2">
            <div class="card">
            @if($product->image)
            <img class="card-img-top" src="{{asset('uploads/'.$product->image)}}" alt="Card image cap">
            @else
              <img class="card-img-top" src="https://via.placeholder.com/150" alt="Card image cap">
            @endif  
              <div class="card-body">
                <a style="text-decoration:none;" href="{{route('frontEndProduct.view',$product->id)}}"><h5 class="card-title">{{$product->name}}</h5></a>
                <p class="card-text">$ {{$product->price}}</p>
              </div>
              <div class="card-body">
                  <p class="card-text">{{Str::words($product->description, 10)}}</p>
                  <a href="{{route('cart.add',$product->id)}}" class="btn btn-primary">Add to Cart</a>
              </div>
            </div>
          </div>
          @endforeach
        </div>


      </div> --}}
      <div class="cpv">
        <h2>{{$category->name}}</h2>
        <div class="cpv-card-container">
          @foreach ($products as $product)
              <div class="cpv-card-item">
                <div class="cpv-card-img">
                  @if($product->image)
                    <img class="card-img-top" src="{{asset('uploads/img-listview/'.$product->image)}}" alt="Card image cap">
                  @else
                    <img class="card-img-top" src="https://via.placeholder.com/330x370" alt="Card image cap">
                  @endif
                  <a href="{{route('cart.add',$product->id)}}" class="cart-icon"><i class="fas fa-shopping-cart"></i></a>  
                </div>
                <div class="cpv-card-item-info">
                  <a href="{{route('frontEndProduct.view',$product->id)}}"><b>{{$product->name}}</b></a>
                  <p>{{$product->category->name}}</p>
                  <strong>$ {{$product->price}}</strong>
                </div>
              </div>
          @endforeach
        </div>
      </div>

@endsection