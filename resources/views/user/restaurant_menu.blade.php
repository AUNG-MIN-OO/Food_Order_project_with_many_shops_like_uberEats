@extends('user.layouts.index')
@section('content')
    <section class="container cart pt-3">
        <div class="row">
            <div class="col-12">
                <div class="">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <a href="{{url('/')}}" class="text-primary">
                            <span class="go_to_restaurant"><i class="feather-chevron-left"></i></span>
                            Go Back
                        </a>
                        <a href="restaurants.html">
                        <span class="text-primary">
                            <i class="feather-more-horizontal" style="font-size: 30px"></i>
                        </span>
                        </a>
                    </div>
                    <div class="text-center restaurant_menu-image">
                        <h4>{{$user->name}}</h4>
                        <img class="my-2 w-100 radius" src="{{asset('shop-profile/'.$user->profile_image)}}" alt="">
                    </div>
                    <div class="text-primary d-flex justify-content-between align-items-center my-2">
                        <div class="">
                            <i class="feather-alert-circle mr-2"></i><span>Promotions</span>
                        </div>
                        <p class="font-weight-bolder mb-0 badge badge-primary p-2 badge-pill">{{$shop[0]->promotion_status}}</p>
                    </div>
                    <div class="">
                        <h4>Today Best Menu</h4>
                        @foreach($shopMenus as $menu)
                            <div class="card border-0 shadow mb-2 radius">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <img src="{{asset('shop-item/'.$menu->item_image)}}" class="mr-2" alt="" style="width: 80px;border: 5px solid #f5f5f5;">
                                            <div class="">
                                                <p class="mb-0">{{$menu->name}}</p>
                                                <p class="mb-0 text-black-50">
                                                    {{$menu->price}} MMK</p>
                                            </div>
                                        </div>
                                        <div class="">
                                            <i class="feather-minus"></i>
                                            <span style="border:5px solid var(--primary-color) ;border-radius: 8px;background-color: var(--primary-color);color: white">0</span>
                                            <i class="feather-plus"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="">
                        <p>Order Now</p>
                        <div class="text-center mt-3 mb-2">
                            <button class="btn btn-primary radius w-100">Add To Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
