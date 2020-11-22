@extends('user.userBase')

@section('content')
      {{-- <div class="container text-center">
        <h3>Search results for: <i>{{request()->input('query')}}</i></h3>
        <p>{{count($products)}} results found</p>
        <div class="row">
            @if(count($products)==0)
            <h3>No match found</h3>
            @endif
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

      <div class="srv-heading-container">
        <div class="srv-heading">
          <h2 style="margin-top: 0;">Search results for: <i>{{request()->input('query')}}</i></h2>
          <p>{{count($products)}} results found</p>
        </div>
      </div>
      <div class="srv">
        <div class="srv-card-container">
          @foreach ($products as $product)
              <div class="srv-card-item">
                <div class="srv-card-img">
                  @if($product->image)
                    <img class="srv-card-img-top" src="{{asset('uploads/large/'.$product->image)}}" alt="Card image cap">
                  @else
                    <img class="srv-card-img-top" src="https://via.placeholder.com/330x370" alt="Card image cap">
                  @endif
                  <a href="{{route('cart.add',$product->id)}}" class="srv-cart-icon"><i class="fas fa-shopping-cart"></i></a>  
                </div>
                <div class="srv-card-item-info">
                  <a href="{{route('frontEndProduct.view',$product->id)}}"><b>{{$product->name}}</b></a>
                  <p>By {{$product->category->name}}</p>
                  <p>{{$product->description}}</p>
                  <a href="{{route('frontEndProduct.view',$product->id)}}" class="srv-read-more">READ MORE</a>
                </div>
              </div>
          @endforeach
        </div>
      </div>

@endsection
