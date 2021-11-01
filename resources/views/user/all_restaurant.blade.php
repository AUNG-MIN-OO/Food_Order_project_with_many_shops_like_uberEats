@extends('user.layouts.index')
@section('top_icon','feather-list')
@section('top_text','Restaurants')
@section('style')
    <style>

    </style>
@endsection
@section('content')
    <section class="container restaurant">
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center restaurant_header">
                    <a href="#" class="" onclick="window.history.back();return false;">
                        <span class="go_to_restaurant"><i class="feather-chevron-left"></i></span>
                        Go Back
                    </a>
                    <h5>All Restaurants</h5>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                    <div class="row mb-3">
                        @foreach($shop as $s)
                        <div class="col-6 mb-3">
                            <a href="{{url('restaurant-menu/'.$s->user->id)}}" style="color: black;text-decoration: none">
                                <div class="restaurant_card-detail d-flex align-items-center">
                                    <div class="card shadow border-0">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-center">
                                                <img src="{{asset('shop-profile/'.$s->user->profile_image)}}" alt="" style="width: 100px;height: 100px">
                                            </div>
                                            <div class="overflow-hidden">
                                                <p class="font-weight-bolder text-center text-nowrap">{{$s->user->name}}</p>
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <i class="feather-clock mr-2"></i>
                                                    <p class="mb-0">20-30 mins</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
            </div>
        </div>
    </section>
@endsection
