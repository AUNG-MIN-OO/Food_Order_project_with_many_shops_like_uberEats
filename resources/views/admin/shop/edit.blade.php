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
                        <img src="{{asset('shop-profile/'.$user->profile_image)}}" alt="" class="rounded-circle mb-4" style="width: 150px;height: 150px;background-size: cover">
                    </div>
                    <hr>
                    <form action="{{route('admin-profile.update',$user->id)}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="mb-2">Name</label>
                            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$user->name}}">
                            @error('name')
                            <small class="fw-bold text-danger mb-0">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="email" class="mb-2">Email</label>
                            <input type="text" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{$user->email}}">
                            @error('email')
                            <small class="fw-bold text-danger mb-0">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="password" class="mb-2">New Password</label>
                            <input type="text" id="password" name="new password" class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                            <small class="fw-bold text-danger mb-0">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="phone" class="mb-2">Phone</label>
                            <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{$user->phone}}">
                            @error('phone')
                            <small class="fw-bold text-danger mb-0">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="address" class="mb-2">Address</label>
                            <input type="text" id="address" name="address" class="form-control @error('address') is-invalid @enderror" value="{{$user->address}}">
                            @error('address')
                            <small class="fw-bold text-danger mb-0">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="profile_image" class="mb-2">Profile Image</label>
                            <input type="file" id="profile_image" name="profile_image" class="form-control p-1 @error('profile_image') is-invalid @enderror">
                            @error('profile_image')
                                <small class="fw-bold text-danger mb-0">{{$message}}</small>
                            @enderror
                        </div>

                        <button class="btn bg-button float-end">Update Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
