@extends('user.layouts.index');
@section('content')
    <div class="container">
        <div class="row pb-5 justify-content-center">
            <div class="col-12 col-md-6">
                <div class="card radius mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center my-3">
                            <h4 class="mb-0">Edit Profile</h4>
                        </div>
                        <form
                            action="{{url('user/profile-update')}}" enctype="multipart/form-data" method="post">
                            @csrf
                            <input type="hidden" value="{{$user->id}}" name="user_id">
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}">
                                @error('name')
                                <small class="text-danger fw-bold">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" class="form-control" value="{{$user->email}}">
                                @error('email')
                                <small class="text-danger fw-bold">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" id="phone" class="form-control" value="{{$user->phone}}">
                                @error('phone')
                                <small class="text-danger fw-bold">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">New Password</label>
                                <input type="hidden" value="{{$user->password}}" name="password">
                                <input type="password" name="new_password" id="password" class="form-control">
                                @error('password')
                                <small class="text-danger fw-bold">{{$message}}</small>
                                @enderror
                            </div>
                            <label for="password" class="d-block">Profile Image</label>
                            <img src="{{asset('shop-profile/'.$user->profile_image)}}" alt="" style="width: 150px">
                            <input type="file" name="profile_image" class="form-control p-1 mb-3">
                            @error('profile_image')
                            <small class="text-danger fw-bold">{{$message}}</small>
                            @enderror
                            <button class="btn btn-primary float-right radius">Update Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

