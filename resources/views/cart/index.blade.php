@extends('user.userbase')

@section('content')

<div class="cart-heading">
    <h1>CART</h1>
</div>

@if (session()->has('status'))
<div class="status">
    <span><i class="far fa-check-circle"></i></span> {{session('status')}}
</div>
@endif

<div class="cart-container">
    <div class="item-table">
        <div class="table-heading">
            <h3>Your Selection</h3>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>NAME</th>
                    <th>UNIT PRICE</th>
                    <th style="width: 20%;">QUANTITY</th>
                    <th>SUBTOTAL</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{++$loop->index}}</td>
                        <td>{{$item->name}}</td>
                        <td>
                            $ {{$item->price}}
                            <input type="hidden" id="up-{{$item->id}}" value="{{$item->price}}">
                        </td>
                        <td class="qty">
                            <div class="item-quantity">
                                <input type="number" class="quantity" id="{{$item->id}}" name="quantity" min="1" value="{{$item->quantity}}">
                            </div>
                            <div class="qty-adjust">
                                <div class="quantity-up">
                                    <a  class="add" id="add-{{$item->id}}"><i class="fas fa-chevron-up"></i></a>
                                </div>
                                <div class="quantity-down">
                                    <a class="sub" id="sub-{{$item->id}}"><i class="fas fa-chevron-down"></i></a>
                                </div>
                            </div>
                        </td>
                        <td id="st-{{$item->id}}">$ {{Cart::session(auth()->id())->get($item->id)->getPriceSum()}}</td>
                        <td>
                            <a href="{{route('cart.destroy',$item->id)}}"><i class="fas fa-minus-circle"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="update">
            <button class="update-cart" type="button">UPDATE CART</button>
        </div>
    </div>
    <div class="cart-price-table">
        <div class="table-heading">
            <h3>Cart Total</h3>
        </div>
        <div class="sub-total">
            <p>Subtotal</p>
            <p>$ {{Cart::session(auth()->id())->getTotal()}}</p>
        </div>
        <div class="total">
            <p>Total</p>
            <p>$ {{Cart::session(auth()->id())->getTotal()}}</p>
        </div>
        <div>
            <a href="{{route('cart.order')}}"><button type="button" class="checkout-btn"><span class="checkout-btn-span">Proceed to Checkout</span></button></a>
            {{-- <i class="fas fa-long-arrow-alt-right"></i> --}}
        </div>
        <a href="{{route('products.fetch')}}">Continue Shopping</a>
    </div>
</div>


@endsection

@push('scripts')
<script src="{{asset('js/app.js')}}"></script>
    <script>
        $( document ).ready(function() {
            Array.from(document.querySelectorAll(".add")).forEach(function(element){
                element.addEventListener('click', function(){
                    let id = element.getAttribute('id').split("-")[1]
                    let target = document.getElementById(`${id}`)
                    target.value++
                    target.setAttribute('value',target.value)

                    let subtotal = document.querySelector(`#up-${id}`).value * target.value
                    document.querySelector(`#st-${id}`).innerHTML=`$ ${subtotal.toFixed(2)}`

                })
            })
            Array.from(document.querySelectorAll(".sub")).forEach(function(element){
                element.addEventListener('click', function(){
                    let id = element.getAttribute('id').split("-")[1]
                    let target = document.getElementById(`${id}`)
                    if (target.value > 1) {
                        target.value--
                        target.setAttribute('value',target.value)

                        let subtotal = document.querySelector(`#up-${id}`).value * target.value
                        document.querySelector(`#st-${id}`).innerHTML=`$ ${subtotal.toFixed(2)}`
                    }
                })
            })
            document.querySelector(".update-cart").addEventListener('click', function(){
                const classname = document.querySelectorAll(".quantity");
                var status;
                Array.from(classname).forEach((element) =>{
                    const itemId = element.getAttribute('id')
                    const update = async ()=>{
                        try {
                            const response =  await axios.post(`/cart/update/${itemId}`, {
                                quantity : element.value
                            });
                            window.location.href = '/cart/index';
                        } catch (error) {
                            console.log(error);
                        }
                    }
                    update()
                });
                
            });
        });
    </script>
@endpush