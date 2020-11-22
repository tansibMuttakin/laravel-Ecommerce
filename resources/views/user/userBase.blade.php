{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>E-Commerce Shop</title>

        <!-- Fonts -->
        <!-- CSS only -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <!-- JS, Popper.js, and jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <!-- Styles -->
        <style>

            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
    </head>
    <body class="antialiased">
        <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
            <div class=" col collapse navbar-collapse" style="width:59%;" id="navbarSupportedContent">
                <div class="col">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('products.fetch') }}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Category
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach($categories as $category)
                                <a class="dropdown-item" href="{{route('categoryProduct.view',$category->id)}}">{{$category->name}}</a>
                            @endforeach    
                            </div>
                        </li>
                        <li class="nav-item">
                            @auth
                            <a class="nav-link" href="{{route('cart.index')}}">
                                Cart
                                <span class="badge badge-secondary">{{Cart::session(auth()->id())->getContent()->count()}}</span>
                            </a>
                            @endauth
                        </li>
                    </ul>
                </div>
                <div class="col">
                    <ul class="navbar-nav mr-auto d-flex justify-content-end">
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="">test</a>
                        </li> -->
                        @if (Route::has('login'))
                            @auth
                                @if(Auth::user()->isSuperAdmin)
                                <li class="nav-item">
                                    <a href="{{ route('products.index') }}" class="nav-link">Admin Dashboard</a>
                                </li>        
                                @else
                                    @foreach(Auth::user()->roles as $role)
                                        @if(($role->name === 'Admin') || ($role->name === 'Sub Admin'))
                                        <li class="nav-item">
                                            <a href="{{ route('products.index') }}" class="nav-link">Admin Dashboard</a>
                                        </li>        
                                        @endif
                                    @endforeach
                                @endif        
                                
                                <!-- <li class="nav-item">
                                    <a class="nav-link" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                            Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                    </form>
                                </li> -->
                                
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{auth()->user()->name}}
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{route('order.track')}}">Track Order</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                        </form>                         
                                    </div>
                                </li>
                            @else
                                <li>
                                    <a href="{{ route('login') }}" class="nav-link">Login</a>
                                </li>    
                                @if (Route::has('register'))
                                    <li>
                                        <a href="{{ route('register') }}" class="nav-link">Register</a>
                                    </li>    
                                    @endif
                                @endif    
                            </li>
                        @endif
                    </ul>    
                </div>

            </div>
            <div class="col">
            <form  action="{{route('frontEndProduct.search')}}" method="GET" class="form-inline my-2 my-lg-0 ">
                <input class="form-control mr-sm-2" type="search" name="query" value="{{request()->input('query')}}" placeholder="Search Product" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </nav>
        <div>
            @yield('content')
        </div>

        @stack('scripts')
    </body>
</html> --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce</title>
    {{-- custom css --}}
    <link rel="stylesheet" href="{{asset('/assets/css/custom.css')}}">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    {{-- font awesome --}}
    <script src="https://kit.fontawesome.com/b42c320466.js" crossorigin="anonymous"></script>
    
    {{-- font family --}}
    <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@300;400;600&display=swap" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}
    
</head>
<body>
    <div class="container">
      <div class="all-content-wrapper">
        <div class="navbar">
            <nav>
                <ul>
                    <li style="flex: 1;"><i class="fa fa-bars fa-2x toggle-sidebar" aria-hidden="true"></i></li>
                    <li class="nav-links" style="flex: 1;">
                      <a href="{{ route('products.fetch') }}">Home</a>
                    </li>
                    <li style="flex: 7;">
                        <form action="{{route('frontEndProduct.search')}}" method="get">
                          <input type="search" name="query" value="{{request()->input('query')}}" id="" placeholder="  Search products" required>
                          <button type="submit">Search</button>
                        </form>
                    </li>
                    @auth
                      @if (Auth::user()->isSuperAdmin)
                        <li class="nav-links" style="flex: 1;">
                          <a href="{{ route('products.index') }}" class="nav-link">Admin Dashboard</a>
                        </li>   
                      @else
                        @foreach(Auth::user()->roles as $role)
                          @if(($role->name === 'Admin') || ($role->name === 'Sub Admin'))
                          <li class="nav-links" style="flex: 1;">
                              <a href="{{ route('products.index') }}" class="nav-link">Admin Dashboard</a>
                          </li>
                          @endif
                        @endforeach
                      @endif
                      @endauth
                      @guest
                        <li class="nav-links" style="flex: 1;">Help & More</li>
                      @else
                      <li class="nav-links" style="flex: 1;">
                        <a class="dropdown-item" href="{{route('order.track')}}">Track Order</a>
                      </li>
                      @endguest
                      <li class="nav-links" style="flex: 1;">
                        @auth
                          <a href="{{route('cart.index')}}">
                              Cart
                              <span>{{Cart::session(auth()->id())->getContent()->count()}}</span>
                          </a>
                        @else
                          <p>Cart</p>
                        @endauth
                      </li>
                    @guest
                      <li class="sign-in" style="flex: 1;">
                        <a href="{{ route('login') }}">SignIn</a>
                      </li>
                    @else
                    <li class="sign-in" style="flex: 1;">
                      <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                        </form>
                    </li>
                    @endguest
                </ul>
            </nav>
        </div>
        <!-- Sidebar -->
        <div class="sidebar-container" id="mySidebar">
          <button class="close-sidebar"><i class="fas fa-times"></i></button>
          <div class="sidebar-content">
            @foreach ($categories as $category)
              <li><a href="{{route('categoryProduct.view',$category->id)}}">{{$category->name}}</a></li>
            @endforeach
          </div>
        </div>
        @yield('content')
      </div>
    </div>
    <footer>
        <div>
            <p>Copyright © Weabers</p>
        </div>
    </footer>
    @stack('scripts')
    <script>
      document.querySelector(".toggle-sidebar").addEventListener('click',function(e){
        document.getElementById("mySidebar").style.width = "20%";
      })
      document.querySelector(".close-sidebar").addEventListener('click',function(e){
        document.getElementById("mySidebar").style.width = "0%";
      })
    </script>
    {{-- <script>
      
        const slideItems = document.querySelectorAll('.slide');
        const slideLeft = document.querySelector('.slide-left');
        const slideRight = document.querySelector('.slide-right');
        var current = 0
        function reset(){
            for (let index = 0; index < slideItems.length; index++) {
                slideItems[index].style.display = 'none';
                
            }
        }
        function startSlide(){
            reset()
            slideItems[0].style.display = 'block';
        }
        startSlide()
        function leftSlide(){
            reset()
            slideItems[current-1].style.display = 'block';
            current--;
        }
        function rightSlide(){
            reset()
            slideItems[current+1].style.display = 'block';
            current++;
        }
        slideLeft.addEventListener('click',function(){
            if (current === 0) {
                current = slideItems.length;
            }
            leftSlide();
        })
        slideRight.addEventListener('click',function(){
            if (current === (slideItems.length)-1) {
                current = -1;
            }
            rightSlide();
        })

        // setInterval(() => {
        //   reset()
        //   slideItems[current+1].style.display = 'block';
        //   current++;
        //   if (current == slideItems.length-1) {
        //     current = -1
        //   }
        // }, 3000);
    </script> --}}
</body>
</html>