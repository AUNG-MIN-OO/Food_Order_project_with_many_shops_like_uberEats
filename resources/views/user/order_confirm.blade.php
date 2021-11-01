@extends('user.layouts.index')
@section('style')
    <style>
        .remove_item_btn:hover{
            color: var(--primary-color);
            text-decoration: none;
        }
        .remove_item_btn:active{
            text-decoration: none;
        }
    </style>
@endsection
@section('content')
    <section class="container cart pt-3">
        <div class="row">
            <div class="col-12">
                @if(session('cart'))
                    <div class="">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <a href="index.html" class="text-primary">
                                <span class="go_to_restaurant"><i class="feather-chevron-left"></i></span>
                                Go Back
                            </a>
                            <h4 class="mb-0">From Korean Restaurant</h4>
                        </div>
                        <div class="text-center">
                            <img class="my-2" src="{{asset('food_order_project/assets/image/wait_time.svg')}}" alt="" style="width: 200px">
                        </div>
                        <div class="">
                            <i class="feather-map mr-2"></i><span>Address</span>
                            <p class="text-black-50">〒170-0013 Tokyo, Toshima City, Higashiikebukuro, 2-chōme−13−3</p>
                        </div>
                        <div class="">
                            <p>Order Details</p>
                            @if($cart != null)
                                @foreach($cart as $item)
                                    <div class="card border-0 shadow mb-2 radius">
                                        <div class="card-body">
                                            <a href="{{url('user/order-delete/'.$item['item_id'])}}" class="text-muted d-block remove_item_btn"><i class="feather-x" style="font-size: 20px"></i></a>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="d-flex align-items-center">
                                                    <img src="{{asset('shop-item/'.$item['image'])}}" class="mr-2" alt="" style="width: 80px;border: 5px solid #f5f5f5;">
                                                    <div class="">
                                                        <p class="mb-0">{{$item['name']}}</p>
                                                        <p class="mb-0 text-black-50">{{$item['price']}}MMK</p>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="text-right">
                                                        <span style="border:5px solid var(--primary-color) ;border-radius: 8px;background-color: var(--primary-color);color: white">{{$item['quantity']}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="">
                            <div class="text-center mt-3 mb-2">
                                <a href="{{url('user/show-checkout')}}" class="btn btn-primary radius w-100" form="orderConfirmed">Confirm Order</a>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="text-center">
                        <img class="my-2" src="{{asset('food_order_project/assets/image/wait_time.svg')}}" alt="" style="width: 200px">
                    </div>
                    <h4 class="text-primary text-center my-3">There is no item in cart</h4>
                @endif
            </div>
        </div>
    </section>
@endsection
