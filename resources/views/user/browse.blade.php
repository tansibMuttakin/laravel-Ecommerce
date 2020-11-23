@extends('user.userBase')
@section('content')
  <div class="main">
    {{-- <div class="slider">
        <div class="slide-item">
        <img src="{{asset('assets/photos/slider-2.jpg')}}" alt="">
        </div>
        <div class="slide-item">
          <img src="{{asset('assets/photos/slider-4.jpg')}}" alt="">
        </div>
        <div class="slide-item">
          <img src="{{asset('assets/photos/slider-3.jpg')}}" alt="">
        </div>
        <div class="slide-item">
          <img src="{{asset('assets/photos/slider-1.jpg')}}" alt="">
        </div>
        <div class="slide-left">
            <i class="fa fa-angle-left"></i>
        </div>
        <div class="slide-right">
            <i class="fa fa-angle-right"></i>
        </div>
        <div class="dots">
          <input type="radio" name="slider-nav" id="rb-1">
          <input type="radio" name="slider-nav" id="rb-2">
          <input type="radio" name="slider-nav" id="rb-3">
          <input type="radio" name="slider-nav" id="rb-4">
        </div>
    </div> --}}
    <div class="slidershow">
          <input type="radio" name="slider-nav" id="r1" checked>
          <input type="radio" name="slider-nav" id="r2">
          <input type="radio" name="slider-nav" id="r3">
          <input type="radio" name="slider-nav" id="r4">
        <div class="slides">
            <div class="slide">
              <img class="slide-img" src="{{asset('assets/photos/slider-2.jpg')}}" alt="">
            </div>
            <div class="slide">
              <img class="slide-img" src="{{asset('assets/photos/slider-4.jpg')}}" alt="">
            </div>
            <div class="slide">
              <img class="slide-img" src="{{asset('assets/photos/slider-3.jpg')}}" alt="">
            </div>
            <div class="slide">
              <img class="slide-img" src="{{asset('assets/photos/slider-1.jpg')}}" alt="">
            </div>
            {{-- <div class="slide-left">
                <i class="fa fa-angle-left"></i>
            </div>
            <div class="slide-right">
                <i class="fa fa-angle-right"></i>
            </div> --}}
            {{-- <div class="dots">
              <input type="radio" name="slider-nav" id="rb-1">
              <input type="radio" name="slider-nav" id="rb-2">
              <input type="radio" name="slider-nav" id="rb-3">
              <input type="radio" name="slider-nav" id="rb-4">
            </div> --}}
        </div>
        <div class="navigation">
          <label for="r1" class="bar"></label>
          <label for="r2" class="bar"></label>
          <label for="r3" class="bar"></label>
          <label for="r4" class="bar"></label>
        </div>
    </div>
    <h2 class="border-bottom">PRODUCT CATEGORIES</h2>
    <div class="categories">
      @foreach ($categories as $category)
        <div class="category-item effect10">
            {{-- <img src="https://via.placeholder.com/286x290" alt=""> --}}
            <img src="uploads/categoryImage/{{$category->image}}" alt="">
            <a href="{{route('categoryProduct.view',$category->id)}}"><p>{{$category->name}}</p></a>
        </div>
      @endforeach
    </div>
    <div class="heading">
      <h2>Top Products</h2>
      <a href="{{route('allProducts.view')}}"><i class="fas fa-th"></i>&nbsp;<b>VIEW ALL PRODUCTS</b></a>
    </div>
    <div class="top-product-card-container">
      @foreach ($top_products as $product)
        <div class="card">
            @if ($product->image)
            <div class="effect4">
              <img src="uploads/img-topview/{{$product->image}}" alt="">
              <div class="card-info-container">
                <a href="{{route('frontEndProduct.view',$product->id)}}"><b>{{$product->name}}</b></a>
                <p>$ {{$product->price}}</p>
                <a href="{{route('cart.add',$product->id)}}" class="add-to-cart">Add to Cart</a>
              </div>
            </div>
            @else
            <div class="effect4">
              <div class="card-img-container">
                <img class="" src="https://via.placeholder.com/248x150" alt="">
              </div>
              <div class="card-info-container">
                <a href="{{route('frontEndProduct.view',$product->id)}}"><b>{{$product->name}}</b></a>
                <p>$ {{$product->price}}</p>
                <a href="{{route('cart.add',$product->id)}}" class="add-to-cart">Add to Cart</a>
              </div>
            </div>
            @endif
        </div>
      @endforeach
    </div>
  </div>
  <div class="banner">
    {{-- <img src="https://via.placeholder.com/1519x404?text=Banner" alt="" srcset=""> --}}
    <img src="{{asset('assets/photos/banner.jpg')}}" alt="" srcset="">
  </div>
  <div class="heading">
  <h2>Featured Products</h2>
  <a href="{{route('allProducts.view')}}"><i class="fas fa-th"></i>&nbsp;<b> VIEW ALL PRODUCTS</b></a>
  </div>
  <div class="feature-product-card-container">
    @foreach ($feature_products as $feature_product)
        @if ($loop->first)
            
          <div class="feature-product-card" id="first-feature-product">
            <div class="feature-item-first featured-effect">
              {{-- <img src="https://via.placeholder.com/500x473" alt=""> --}}
              <img src="uploads/img-fullview/{{$feature_product->image}}" style="height: 473px;" alt="">
              <p>$ {{$feature_product->price}}</p>
              <a href="{{route('cart.add',$feature_product->id)}}"><i class="fas fa-shopping-cart"></i>ADD TO CART</a>
            </div>
          </div>
        @else
          <div class="feature-product-card">
            <div class="feature-item featured-effect">
              <img src="uploads/img-relatedview/{{$feature_product->image}}" alt="">
              {{-- <img src="https://via.placeholder.com/277x222" alt=""> --}}
              <p>$ {{$feature_product->price}}</p>
              <a href="{{route('cart.add',$feature_product->id)}}"><i class="fas fa-shopping-cart"></i>ADD TO CART</a>
            </div>
          </div>
        @endif
    @endforeach
  </div>
  <div class="testimonial">
    {{-- <img src="https://via.placeholder.com/1519x404?text=Testimonial" alt=""> --}}
    <img src="{{asset('assets/photos/testimonial.jpg')}}" alt="" srcset="">
  </div>
@endsection
@push('scripts')
  {{-- pusher js code --}}
  <script>
    // var notificationsWrapper   = $('.dropdown-notifications');
    // var notificationsToggle    = notificationsWrapper.find('a[data-toggle]');
    // var notificationsCountElem = notificationsToggle.find('i[data-count]');
    // var notificationsCount     = parseInt(notificationsCountElem.data('count'));
    // var notifications          = notificationsWrapper.find('ul.dropdown-menu');
    // console.log(notificationsWrapper);
    // console.log(notificationsToggle);
    // console.log(notificationsCountElem);
    // console.log(notificationsCount);
    // console.log(notifications);
    
    // if (notificationsCount <= 0) {
    //   notificationsWrapper.hide();
    // }

    @if(Auth::check())
        // Enable pusher logging - don't include this in production
        // Pusher.logToConsole = true;

        var pusher = new Pusher('abf9f842597977bf810e', {
          encrypted: true,
          cluster: 'mt1'
        });

        var channel = pusher.subscribe('orderTracker.'+{{Auth::user()->id}});
        channel.bind("App\\Events\\OrderStatusChanged", function(data) {
          // alert("true");
          // var existingNotifications = notifications.html();
          // var newNotificationHtml = `
          //   <li class="notification active">
          //       <div class="media">
          //         <div class="media-body">
          //           <strong class="notification-title">`+data.message+`</strong>
          //           <!--p class="notification-desc">Extra description can go here</p-->
          //           <div class="notification-meta">
          //             <small class="timestamp">about a minute ago</small>
          //           </div>
          //         </div>
          //       </div>
          //   </li>
          // `;
          // notifications.html(newNotificationHtml + existingNotifications);

          // notificationsCount += 1;
          // notificationsCountElem.attr('data-count', notificationsCount);
          // notificationsWrapper.find('.notif-count').text(notificationsCount);
          // notificationsWrapper.show();

          document.querySelector(".notif-count").innerHTML=`(10)`;
        });
    @endif
  </script>

  <script>
      document.getElementById('r1').addEventListener('click', function(){
          Array.from(document.querySelectorAll(".slide-img")).forEach(element=>{
              element.style.marginLeft = "0%";
          })
      })
      document.getElementById('r2').addEventListener('click', function(){
          Array.from(document.querySelectorAll(".slide-img")).forEach(element=>{
              element.style.marginLeft = "-200%";
          })
      })
      document.getElementById('r3').addEventListener('click', function(){
          Array.from(document.querySelectorAll(".slide-img")).forEach(element=>{
              element.style.marginLeft = "-400%";
          })
      })
      document.getElementById('r4').addEventListener('click', function(){
          Array.from(document.querySelectorAll(".slide-img")).forEach(element=>{
              element.style.marginLeft = "-600%";
          })
      })
  </script>
@endpush
