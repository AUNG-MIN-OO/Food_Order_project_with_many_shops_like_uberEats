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
    <link rel="stylesheet" href="{{asset('food_order_project/assets/css/app.css')}}">
</head>
<body>
@include('sweetalert::alert')
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
                            <i class="feather-user mr-2 text-primary"></i>
                            <h5 class="text-nowrap mb-0">Profile</h5>
                        </div>
                    </div>
                </div>
                <div class="col-4 my-auto">
                    <div class="profile text-right">
                        <img src="@if(\Illuminate\Support\Facades\Auth::user() && \Illuminate\Support\Facades\Auth::user()->profile_image) {{asset('shop-profile/'.\Illuminate\Support\Facades\Auth::user()->profile_image)}} @else {{asset('shop-profile/default.png')}} @endif" alt="" style="width: 50px;height: 50px;border-radius: 50%;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<section class="container home my-md-3">
    <div class="row">
        <div class="col-12">
            <div class="profile_detail">
                <div class="card radius shadow border-0">
                    <div class="card-body">
                        <div class="text-center mb-4 profile_header">
                            <a href="{{url('user/profile-edit/'.\Illuminate\Support\Facades\Auth::user()->id)}}" class="profile_edit"><i class="feather-edit"></i></a>
                            <img src="@if(\Illuminate\Support\Facades\Auth::user() && \Illuminate\Support\Facades\Auth::user()->profile_image) {{asset('shop-profile/'.\Illuminate\Support\Facades\Auth::user()->profile_image)}} @else {{asset('shop-profile/default.png')}} @endif" style="width: 100px;border-radius: 50%;height: 100px;border: 1px solid var(--primary-color)" alt="" class="mb-3">
                            <h5 class="mb-1">{{\Illuminate\Support\Facades\Auth::user()->name}}</h5>
                            <p>{{\Illuminate\Support\Facades\Auth::user()->email}}</p>
                        </div>
                        <div class="profile_body">
                            <a href="#">
                                <div class="d-flex justify-content-between align-items-center mt-2">
                                    <p class="mb-0 font-weight-bolder"><i class="feather-box mr-2"></i>My Orders</p>
                                    <span class="text-primary"><i class="feather-chevron-right" style="font-size: 25px"></i></span>
                                </div>
                            </a>
                            <hr>
                            <a href="#">
                                <div class="d-flex justify-content-between align-items-center mt-2">
                                    <p class="mb-0 font-weight-bolder"><i class="feather-heart mr-2"></i>My Favourites</p>
                                    <span class="text-primary"><i class="feather-chevron-right" style="font-size: 25px"></i></span>
                                </div>
                            </a>
                            <hr>
                            <a href="{{url('user/profile/address/'.\Illuminate\Support\Facades\Auth::user()->id)}}">
                                <div class="d-flex justify-content-between align-items-center mt-2">
                                    <p class="mb-0 font-weight-bolder"><i class="feather-map-pin mr-2"></i>Shipping Address</p>
                                    <span class="text-primary"><i class="feather-chevron-right" style="font-size: 25px"></i></span>
                                </div>
                            </a>
                            <hr>
                            <a href="#">
                                <div class="d-flex justify-content-between align-items-center mt-2">
                                    <p class="mb-0 font-weight-bolder"><i class="feather-gift mr-2"></i>Gift Cards and Vouchers</p>
                                    <span class="text-primary"><i class="feather-chevron-right" style="font-size: 25px"></i></span>
                                </div>
                            </a>
                            <hr>
                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                <button class="my-0 font-weight-bolder border-0 w-100 bg-white">
                                    <div class="d-flex justify-content-between align-items-center mt-2">
                                        <div class="">
                                            <i class="feather-log-out mr-2"></i>Logout
                                        </div>
                                        <span class="text-primary"><i class="feather-chevron-right" style="font-size: 25px"></i></span>
                                    </div>
                                </button>
                            </form>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="{{asset('food_order_project/assets/vendor/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('food_order_project/assets/vendor/bootstrap4.6/js/bootstrap.js')}}"></script>
<script src="{{asset('food_order_project/assets/js/app.js')}}"></script>
</body>
</html>
