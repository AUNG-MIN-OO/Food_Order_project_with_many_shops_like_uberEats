@extends('user.layouts.index')
@section('top_icon','feather-info')
@section('top_text','Receipt')
@section('style')
    <style>
        .back_btn:active{
            text-decoration: none;
        }
        .feedback_btn{
            text-decoration: underline !important;
        }
    </style>
@endsection
@section('content')
    <section class="container cart pt-3">
        <div class="row">
            <div class="col-12">
                <div class="">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <a href="" onclick="window.history.back();return false;" class="text-primary back_btn">
                            <span class="go_to_restaurant"><i class="feather-chevron-left"></i></span>
                            Go Back
                        </a>
                        <h4 class="mb-0">Order Detail</h4>
                    </div>
                    <div class="">
                        <div class="card border-0 shadow mb-2 radius">
                            <div class="card-body">
                                <div class="">
                                    @foreach($order as $item)
                                        <div class="">
                                            <div class="text-center">
                                                <img src="{{asset('shop-item/'.$item->item_image)}}" class="mr-2" alt="" style="width: 60%;height: 200px;border-radius: 30px;">
                                            </div>
                                            <div class="mt-3">
                                                <h4 class="mb-0 text-center">{{$item->item_name}}</h4>
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <p class="mb-0">Price</p>
                                                    <p class="mb-0">
                                                        {{$item->item_price}} MMK
                                                    </p>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center mt-2">
                                                    <p class="mb-0">Quantity</p>
                                                    <p class="mb-0">
                                                        {{$item->quantity}} Piece
                                                    </p>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center mt-2 text-primary">
                                                    <p class="mb-0 fw-bolder">Total Price</p>
                                                    <p class="mb-0 fw-bolder">
                                                        {{$item->quantity * $item->item_price}} MMK
                                                    </p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="mt-3">
                                                <h4 class="text-muted text-center">How was everything?</h4>
                                                <p class="text-muted text-center">Thanks for your order</p>
                                                <p class="text-center">
                                                    <i class="feather-star text-primary"></i>
                                                    <i class="feather-star text-primary"></i>
                                                    <i class="feather-star text-primary"></i>
                                                    <i class="feather-star"></i>
                                                    <i class="feather-star"></i>
                                                </p>
                                            </div>
                                            <div class="mt-3 text-center">
                                                <a href="#" class="text-primary text-decoration-underline feedback_btn">Report Feedback</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

