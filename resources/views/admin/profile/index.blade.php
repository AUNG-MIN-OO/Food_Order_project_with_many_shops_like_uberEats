@extends('layouts.app')
@section('title','Sample')
@section('content_title')
    <div class="title d-flex justify-content-between align-items-center">
        <div class="">
            <h3>Profile</h3>
        </div>
        <div class="mb-2">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="{{route('admin-home')}}" class="text-white text-decoration-none">home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">profile</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection
@section('content')
    <div class="bg-background p-3">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="card border-0 mb-4">
                    <div class="card-body bg-blue">
                        <div class="img text-center mb-4">
                            <img src="{{asset('storage/profile-image/'.$user->photo)}}" alt="" class="rounded-circle mb-4" style="width: 350px;height: 350px;background-size: cover">
                        </div>
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
                        </div>
                        <a href="{{route('shop.edit',$user->id)}}" class="btn bg-button w-100">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
