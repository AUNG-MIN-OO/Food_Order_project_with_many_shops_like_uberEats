@extends('user.layouts.index')
@section('style')
    <style>
        .back_btn:active{
            text-decoration: none;
        }
    </style>
@endsection
@section('content')
    <section class="container cart pt-3">
        <div class="row">
            <div class="col-12">
                @if($orders)
                    <div class="">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <a href="{{url('/')}}" class="text-primary back_btn">
                                <span class="go_to_restaurant"><i class="feather-chevron-left"></i></span>
                                Go Back
                            </a>
                            <h4 class="mb-0">Order History</h4>
                        </div>
                        <div class="">
                            @foreach($orders as $item)
                                <div class="card border-0 shadow mb-2 radius">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="mb-0">{{$item->item_name}}</h5>
                                            <h5 class="mb-0 text-muted">{{$item->item_price}} MMK</h5>
                                        </div>
                                        <div class="mt-4">
                                            <span class="mr-2">
                                                <i class="feather-calendar text-primary"></i>
                                                {{$item->created_at->format('Y-m-d')}}
                                            </span>
                                            <span>
                                                <i class="feather-clock text-primary"></i>
                                                {{$item->created_at->format('g:i A')}}
                                            </span>
                                        </div>
                                        <hr>
                                        <div class="text-center w-100 text-primary">
                                            <a href="{{url('user/order-detail/'.$item->id)}}" class="text-decoration-none w-100 text-primary receipt_btn">
                                                View Receipt
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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

