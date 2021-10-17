@extends('admin.layouts.app')
@section('title','Profile')
@section('current_page','Profile')
@section('content_title')
    <div class="title d-flex justify-content-between align-items-center">
        <div class="">
            <h3>My Shop Profile</h3>
        </div>
        <div class="mb-2">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-lg-6">
            <div class="card border-0 my-4">
                <div class="card-body bg-blue">
                    <div class="img text-center mb-4">
                        <img src="{{asset('shop-profile/'.$user->profile_image)}}" alt="" class="rounded-circle mb-4" style="width: 350px;height: 350px;background-size: cover">
                    </div>
                    <hr>
                    <div class="">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3>Name</h3>
                            <h4 class="text-capitalize">{{$user->name}}</h4>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <h3>Email</h3>
                            <h5 class="">{{$user->email}}</h5>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <h3>Phone</h3>
                            <h4 class="text-capitalize">@if($user->phone){{auth()->user()->phone}}@else - @endif</h4>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <h3>Address</h3>
                            <h4 class="text-capitalize">@if($user->address){{auth()->user()->address}}@else - @endif</h4>
                        </div>
                    </div>
                    <a href="{{route('admin-profile.edit',$user->id)}}" class="btn bg-button w-100 mb-2">Edit Profile Info</a>
                    <hr>
                    <div class="">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3>Promotion Status</h3>
                            <h4 class="text-capitalize">@if($shop->promotion_status){{$shop->promotion_status}}@else - @endif</h4>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <h3>Shop Category</h3>
                            <h4 class="text-capitalize">@if($shop->shop_category){{$shop->category->name}}@else - @endif</h4>
                        </div>
                    </div>
                    <a href="{{route('shop.edit',$shop->id)}}" class="btn bg-button w-100">Edit Shop Info</a>
                </div>
            </div>
        </div>
    </div>
@stop
