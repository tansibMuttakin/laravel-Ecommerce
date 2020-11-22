@extends('user.userBase')

@section('content')
      {{-- <div class="container text-center">
        <div class="row">
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
        </div>


      </div> --}}

      <div class="spv-container">
        <div class="spv-img-container">
          @if($product->image)
            <img class="spv-img" src="{{asset('uploads/img-fullview/'.$product->image)}}" alt="Card image cap">
            @else
            <img class="spv-img" src="https://via.placeholder.com/330x370" alt="">
          @endif  
        </div>
        <div class="spv-info-container">
          <p class="spv-product-name">
            {{$product->name}}
          </p>
          <small class="spv-category-name">Category: {{($product->category->name)}}</small>
          <p class="spv-product-detail">{{$product->description}}</p>
          <p class="spv-product-price"><strong>$ {{$product->price}}</strong></p>
          <div>
            <a href="{{route('cart.add',$product->id)}}" class="spv-product-add-to-cart"><i class="fas fa-shopping-cart"></i> ADD TO CART</a>
          </div>
        </div>
      </div>
      <h2 class="spv-heading">RELATED PRODUCTS</h2>
      <div class="related-product-container">
        @foreach ($relatedProducts as $relatedProduct)
          <div class="related-product">
            <div class="related-product-img-container">
              @if($relatedProduct->image)
                <img class="related-product-img" src="{{asset('uploads/img-relatedview/'.$relatedProduct->image)}}" alt="Card image cap">
                @else
                <img class="related-product-img" src="https://via.placeholder.com/200x200" alt="Card image cap">
              @endif
              <a href="{{route('cart.add',$relatedProduct->id)}}" class="spv-cart-icon"><i class="fas fa-shopping-cart"></i></a>  
            </div>
            <div class="related-product-info">
              <a href="{{route('frontEndProduct.view',$relatedProduct->id)}}"><b>{{$relatedProduct->name}}</b></a>
              <p>{{$relatedProduct->category->name}}</p>
              <strong>$ {{$relatedProduct->price}}</strong>
            </div>
          </div>
        @endforeach
        {{-- <div class="related-product">
          <div class="related-product-img-container">
            @if($product->image)
              <img class="related-product-img" src="{{asset('uploads/'.$product->image)}}" alt="Card image cap">
              @else
              <img class="related-product-img" src="https://via.placeholder.com/200x200" alt="Card image cap">
            @endif
            <a href="{{route('cart.add',$product->id)}}" class="spv-cart-icon"><i class="fas fa-shopping-cart"></i></a>  
          </div>
          <div class="related-product-info">
            <a href=""><b>name</b></a>
            <p>category name</p>
            <strong>$ price</strong>
          </div>
        </div>
        <div class="related-product">
          <div class="related-product-img-container">
            @if($product->image)
              <img class="related-product-img" src="{{asset('uploads/'.$product->image)}}" alt="Card image cap">
              @else
              <img class="related-product-img" src="https://via.placeholder.com/200x200" alt="Card image cap">
            @endif
            <a href="{{route('cart.add',$product->id)}}" class="spv-cart-icon"><i class="fas fa-shopping-cart"></i></a>  
          </div>
          <div class="related-product-info">
            <a href=""><b>name</b></a>
            <p>category name</p>
            <strong>$ price</strong>
          </div>
        </div>
        <div class="related-product">
          <div class="related-product-img-container">
            @if($product->image)
              <img class="related-product-img" src="{{asset('uploads/'.$product->image)}}" alt="Card image cap">
              @else
              <img class="related-product-img" src="https://via.placeholder.com/200x200" alt="Card image cap">
            @endif
            <a href="{{route('cart.add',$product->id)}}" class="spv-cart-icon"><i class="fas fa-shopping-cart"></i></a>  
          </div>
          <div class="related-product-info">
            <a href=""><b>name</b></a>
            <p>category name</p>
            <strong>$ price</strong>
          </div>
        </div> --}}
      </div>

@endsection
