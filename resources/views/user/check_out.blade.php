@extends('user.layouts.index')
@section('content')
    <section class="container cart pt-3">
        <div class="row">
            <div class="col-12">
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
                        <h4>15 mins ~ 25 mins</h4>
                    </div>
                    <div class="">
                        <i class="feather-map mr-2"></i><span>Address</span>
                        <p class="text-black-50">〒170-0013 Tokyo, Toshima City, Higashiikebukuro, 2-chōme−13−3</p>
                    </div>
                    <div class="">
                        <p>Order Details</p>
                        @php  $total = 0; $tax = 0;@endphp
                        @foreach($cart as $item)
                        <div class="card border-0 shadow mb-2 radius">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <img src="{{asset('shop-item/'.$item['image'])}}" class="mr-2" alt="" style="width: 80px;border: 5px solid #f5f5f5;">
                                        <div class="">
                                            <p class="mb-0">{{$item['name']}}</p>
                                            <p class="mb-0 text-black-50">{{$item['price']}}MMK</p>
                                        </div>
                                        @php
                                                $total += $item['price']*$item['quantity'];
                                                $tax = $total*0.1;
                                                $taxTotal = $total + $tax;
                                        @endphp
                                    </div>
                                    <div class="">
                                        <span style="border:5px solid var(--primary-color) ;border-radius: 8px;background-color: var(--primary-color);color: white">{{$item['quantity']}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="">
                        <p>Order Summary</p>
                        <div class="card shadow radius border-0">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="mb-0">SubTotal</p>
                                    <p class="mb-0"><span class="">{{$total}}</span> MMK</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p>Tax</p>
                                    <p><span class="">{{$tax}}</span> MMK</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="font-weight-bolder mb-0">Total</p>
                                    <p class="font-weight-bolder mb-0"><span>{{$taxTotal}}</span> MMK</p>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-3 mb-2">
                            <a href="{{url('user/checkout')}}" class="btn btn-primary radius w-100">Checkout Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
