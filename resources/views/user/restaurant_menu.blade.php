@extends('user.layouts.index')
@section('content')
    <section class="container cart pt-3">
        @include('sweetalert::alert')
        <div class="row">
            <div class="col-12">
                <div class="">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <a href="#" onclick="window.history.back();return false;" class="text-primary text-decoration-none">
                            <span class="go_to_restaurant"><i class="feather-chevron-left"></i></span>
                            Go Back
                        </a>
                        @if(sizeof($favourite) != null)
                            <a href="{{url('user/remove-from-favourite/'.$user->id)}}" class="align-items-center d-flex text-muted border-0 bg-white text-decoration-none">
                                <i class="fas fa-heart favourite_icon fill" style="font-size: 30px"></i>
                            </a>
                        @else
                            <a href="{{url('user/add-to-favourite/'.$user->id)}}" class="align-items-center d-flex text-muted border-0 bg-white text-decoration-none">
                                <i class="fas fa-heart favourite_icon" style="font-size: 30px"></i>
                            </a>
                        @endif
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
                            <a href="{{url('user/add-to-cart',$menu->id)}}" style="color: black;text-decoration: none" >
                                <div class="card border-0 shadow mb-2 radius">
                                    <div class="card-body">
                                        <div class="">
                                            <div class="d-flex align-items-center">
                                                <img src="{{asset('shop-item/'.$menu->item_image)}}" class="mr-2" alt="" style="width: 80px;border: 5px solid #f5f5f5;">
                                                <div class="">
                                                    <p class="mb-0">{{$menu->name}}</p>
                                                    <p class="mb-0 text-black-50">
                                                        {{$menu->price}} MMK</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                        @if(session('cart'))
                        <a class="btn btn-primary radius w-100" href="{{url('user/show-checkout')}}" type="submit" form="cart">Checkout Now</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
