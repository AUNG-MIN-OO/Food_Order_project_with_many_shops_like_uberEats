@extends('user.layouts.index');
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="card radius mt-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center my-3">
                            <h4 class="mb-0">Edit Address</h4>
                        </div>
                        <form
                            action="{{url('user/profile/address-update')}}" method="post">
                            @csrf
                            <input type="hidden" value="{{$user->id}}" name="user_id">
                            <textarea name="address" id="" cols="30"
                                      rows="10" class="form-control my-3">{{$user->address}}</textarea>
                            <button class="btn btn-primary float-right radius">Update Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
