@extends('user.userBase')
@section('content')
    <div class="cpv">
        <h2> Shop All Products</h2>
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
        <div class="paginator">
            {{ $products->links('user.custom-pagination') }}
        </div>
    </div>
@endsection