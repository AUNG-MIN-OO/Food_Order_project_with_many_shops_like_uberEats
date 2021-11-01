<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Food Order</title>
    <link rel="stylesheet" href="{{asset('food_order_project/assets/vendor/bootstrap4.6/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('food_order_project/assets/vendor/feather-icons-web/feather.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"/>
    <link rel="stylesheet" href="{{asset('food_order_project/assets/css/app.css')}}">
    @yield('style')
</head>
<body>
<header class="container">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-4">
                    <div class="">
                        <a class="navbar-brand" href="{{url('/')}}">
                            <img src="{{asset('shop-profile/logo.svg')}}" style="width: 80px;height: 80px;border-radius: 50%;" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-4 my-auto">
                    <div class="text-center">
                        <div class="location d-flex justify-content-center align-items-center">
                            <i class="@yield('top_icon','feather-map-pin') mr-2 text-primary"></i>
                            <h5 class="text-nowrap mb-0">@yield('top_text','Toshima')</h5>
                        </div>
                    </div>
                </div>
                <div class="col-4 my-auto">
                    <div class="profile text-right">
                        <a href="{{route('user-profile')}}">
                            <img src="@if(\Illuminate\Support\Facades\Auth::user() && \Illuminate\Support\Facades\Auth::user()->profile_image) {{asset('shop-profile/'.\Illuminate\Support\Facades\Auth::user()->profile_image)}} @else {{asset('shop-profile/default.jpeg')}} @endif" alt="" style="width: 50px;height: 50px;border-radius: 50%;">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
@yield('content')
<section class="footer_nav">
    <div class="row">
        <div class="col-12 text-center">
            <div class="d-flex justify-content-around align-items-center px-2">
                <a href="{{url('/')}}" class="footer_menu active">
                    <i class="feather-home"></i>
                </a>
                <a href="{{url('user/favourite-shops')}}" class="footer_menu">
                    <i class="feather-heart text-muted"></i>
                </a>
                <div class="search_tab">
                    <a href="" class="footer_menu search">
                        <i class="feather-search text-white"></i>
                    </a>
                </div>
                <a href="" class="footer_menu">
                    <i class="feather-bell text-muted"></i>
                </a>
                <a href="{{url('user/order-confirm')}}" class="footer_menu">
                    <i class="feather-shopping-cart text-muted"></i>
                </a>
            </div>
        </div>
    </div>
</section>

@include('sweetalert::alert')

<script src="{{asset('food_order_project/assets/vendor/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('food_order_project/assets/vendor/bootstrap4.6/js/bootstrap.js')}}"></script>
<script src="{{asset('food_order_project/assets/js/app.js')}}"></script>
@yield('script')
</body>
</html>
