@extends('user.userBase')

@section('content')
    {{-- <div class="container mt-3">

        @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
        @endif
        <div class="text-center">
        <h3>Credentials</h3>
        </div>
        <form action="{{route('order.store')}}" method="post">
        @csrf
            <div class="form-group">
                <label for="orderName">Name</label>
                <input type="text" class="form-control" id="orderName" name="name" placeholder="Enter yor name" required>
            </div>
            <div class="form-group">
                <label for="orderEmail">Email</label>
                <input type="email" class="form-control" id="orderEmail" name="email" placeholder="name@example.com" required>
            </div>
            <div class="form-group">
                <label for="orderAdress">Address</label>
                <textarea class="form-control" id="orderAdress" name="address" rows="3" required></textarea>
            </div>
            <h6>Payment Option</h6>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="paymentMethod" id="exampleRadios1" value="cash_on_delivery" checked>
                <label class="form-check-label" for="exampleRadios1">
                    Cash On Delivery
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="paymentMethod" id="exampleRadios2" value="bkash">
                <label class="form-check-label" for="exampleRadios2">
                    Bkash
                </label>
            </div>

            <div class="mt-2">
                <button class="btn btn-info" type="submit">Confirm Order</button>
            </div>
        </form>
    </div> --}}
    <div class="checkout-heading">
        <h1>Check Out</h1>
    </div>
    <div class="checkout-form">
        <div class="billing-from-container">
            <h2>Billing Details</h2>
            <form class="billing-form" id="billing-form" action="{{route('order.store')}}" method="post">
                @csrf
                <div class="billing-name row">
                    <label for="">Name</label>
                    <input type="text" name="name" id="" placeholder="Enter your name" required>
                </div>
                <div class="billing-email row">
                    <label for="">Email</label>
                    <input type="text" name="email" id="" placeholder="Enter email address" required>
                </div>
                <div class="billing-email row">
                    <label for="">Address</label>
                    <input type="text" placeholder="Address" name="address">
                </div>
            </form>
        </div>
        <div class="cart-element-container">
            <h2>Your Order</h2>
            <div class="cart-element">
                <div class="row border-bottom-white">
                    <p>Product</p>
                    <p>Total</p>
                </div>
                @foreach ($items as $item)
                    @if ($loop->last)
                        <div class="row border-bottom-white" style="border-bottom: 2px solid black;">
                            <p>{{$item->name}}<span style="color: black;">x</span>{{$item->quantity}}</p>
                            <p>$ {{Cart::session(auth()->id())->get($item->id)->getPriceSum()}}</p>
                        </div>
                    @else
                        <div class="row border-bottom-white">
                            <p>{{$item->name}}<span style="color: black;">x</span>{{$item->quantity}}</p>
                            <p>$ {{Cart::session(auth()->id())->get($item->id)->getPriceSum()}}</p>
                        </div>
                    @endif
                @endforeach
                <div class="row border-bottom-white" style="font-weight: bold;">
                    <p>Subtotal</p>
                    <p>$ {{Cart::session(auth()->id())->getTotal()}}</p>
                </div>
                <div class="row border-bottom-white" style="font-weight: bold;">
                    <p>Total</p>
                    <p>$ {{Cart::session(auth()->id())->getTotal()}}</p>
                </div>
                <div class="payment-method">
                    <input type="radio" name="paymentMethod" id="" form="billing-form" value="cash_on_delivery" checked>
                    <label for="">Cash On Delivery</label>
                </div>
                <div>
                    <input type="radio" name="paymentMethod" id="" form="billing-form" value="bkash">
                    <label for="">Bkash</label>
                </div>
                <div class="place-order-btn-container">
                    <button type="submit" form="billing-form">PLACE ORDER</button>
                </div>
            </div>
        </div>
    </div>
@endsection