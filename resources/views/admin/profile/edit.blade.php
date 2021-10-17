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
                        <a href="{{route('home')}}" class="text-white text-decoration-none">home</a>
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
                        <form action="{{route('profile-update')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4">
                                <label for="name" class="mb-2">Name</label>
                                <input type="text" name="name" id="name" value="{{$editUser->name}}" class="form-control">
                                @error('name')
                                    <small class="text-danger fw-bold">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="email" class="mb-2">Email</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{$editUser->email}}">
                                @error('email')
                                <small class="text-danger fw-bold">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="password" class="mb-2">New Password</label>
                                <input type="hidden" name="password" id="password" value="{{$editUser->password}}" class="form-control">
                                <input type="password" name="password" id="password" class="form-control" placeholder="type new password">
                                @error('password')
                                <small class="text-danger fw-bold">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="phone" class="mb-2">Phone</label>
                                <input type="text" name="phone" id="phone" value="@if($editUser->phone){{$editUser->phone}}@else  @endif" class="form-control">
                                @error('phone')
                                <small class="text-danger fw-bold">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <input type="file" value="{{$editUser->photo}}" class="form-control" name="photo">
                                @error('photo')
                                <small class="text-danger fw-bold">{{$message}}</small>
                                @enderror
                            </div>
                            <button class="btn bg-button float-end">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
