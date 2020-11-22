@extends('user.userBase')
@section('content')
<div class="table-container">
    <h4>Your Pending Orders</h4>
    <small>You have ({{count($pendingOrders)}}) order(s) yet to recieve</small>
    <hr>
    @foreach($pendingOrders as $order)
    <table class="track-order-table table">
        <thead>
            <tr>
                <th style="background:#246176e0">Order #{{++$loop->index}}</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Grand Total</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->products as $product)
            <tr>
                <td></td>
                <td>{{$product->name}}</td>
                <td>{{$product->pivot->price}}</td>
                <td>{{$product->pivot->quantity}}</td>
                @if($loop->first)
                    <td rowspan="{{count($order->products)}}"><b>$ {{$order->grandTotal}}</b></td>
                    @if ($order->status == 1)
                    <td rowspan="{{count($order->products)}}"><b>Delivered</b></td>
                    @else
                    <td rowspan="{{count($order->products)}}"><b>Pending</b></td>
                    @endif
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
    <br><br>
    @endforeach

</div>
@endsection