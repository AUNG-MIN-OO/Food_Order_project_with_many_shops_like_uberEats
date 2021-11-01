@extends('user.layouts.index')
@section('content')
    <section class="container cart pt-3">
        <div class="row">
            <div class="col-12">
                <div class="">
                    <div class="text-center mb-4">
                        <img class="my-2" src="{{asset('shop-profile/check-circle.svg')}}" alt="" style="width: 200px">
                        <h4>Your Order Was Successful</h4>
                    </div>
                    <div class="text-center mt-5">
                        <a href="{{url('/')}}" class="btn btn-primary radius order_success_btn w-100">Back To Home <i class="feather-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
