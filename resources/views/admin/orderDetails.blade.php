@extends('admin.base')

@section('content')
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders->products as $product)
            <tr>
                <td>{{$product->name}}</td>
                <td>{{$product->pivot->quantity}}</td>
                <td>{{$product->pivot->price}}</td>
                <td>{{($product->pivot->price)*($product->pivot->quantity)}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
    <table class="table">
        <thead>
            <tr>
                <th>Item Count</th>
                <th>Grand Total</th>
                <th>Payment Status</th>
                <th>Payment Method</th>
                <th>Order Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$orders->itemCount}}</td>
                <td>$ {{$orders->grandTotal}}</td>
                <td>
                    @if($orders->isPaid === 0)
                        <div class="btn btn-danger">Pending</div>
                        @elseif($orders->status === 1)
                        <div class="btn btn-success">Paid</div>
                    @endif
                </td>
                <td>{{$orders->paymentMethod}}</td>
                <td>
                    @if($orders->status === 0)
                    <div class="btn btn-danger">Pending</div>
                    @elseif($orders->status === 1)
                    <div class="btn btn-success">Delivered</div>
                    @endif
                </td>
                
            </tr>
        </tbody>
    </table>
</div>
@endsection