@extends('user.layouts.index')
@section('content')
    <section class="container home my-md-3">
        <div class="row">
            <div class="col-12">
                <div class="home_back">
                    <div class="row">
                        <div class="col-6 p-3 px-4 text-md-center">
                            <h5 class="text-nowrap">Find Everything <br>What <span class="text-primary">You Want</span></h5>
                            <a href="{{url('user/all-restaurant')}}" class="btn btn-primary radius text-capitalize">Order now</a>
                        </div>
                        <div class="col-6 text-md-center">
                            <img src="{{asset('food_order_project/assets/image/online_store.svg')}}" class="home_img" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="container category p-3">
        <div class="row">
            <div class="col-12 my-2">
                <h5>Choose Categories</h5>
            </div>
        </div>
        <div class="row category_header mx-0">
            <div class="">
                <div class="d-flex align-items-center">
                    @foreach($categories as $cat)
                        <a href="{{url('user/category-search/'.$cat->id)}}" class="text-white text-decoration-none">
                            <div class="category_card mr-3 text-center">
                                <span class="text-nowrap">{{$cat->name}}</span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="container restaurant">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center restaurant_header">
                    <h5>Popular Restaurants</h5>
                    <a href="{{url('user/all-restaurant')}}" class="">
                        View all
                        <span class="go_to_restaurant"><i class="feather-chevron-right"></i></span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row restaurant_cover mx-0 py-3">
            <div class="restaurant_card d-flex align-items-center">
                @foreach($users as $res)
                    <a href="{{url('restaurant-menu/'.$res->id)}}" style="color: black;text-decoration: none">
                        <div class="card shadow border-0 mr-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-center">
                                    <img src="{{asset('shop-profile/'.$res->profile_image)}}" alt="" style="width: 100px;height: 100px">
                                </div>
                                <div class="">
                                    <p class="font-weight-bolder text-center text-nowrap">{{$res->name}}</p>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <i class="feather-clock mr-2"></i>
                                        <p class="mb-0">20-30 mins</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endsection
