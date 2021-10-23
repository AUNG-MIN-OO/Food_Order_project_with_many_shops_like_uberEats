@extends('user.layouts.index');
@section('content')
    @include('sweetalert::alert')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <div class="card radius mt-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center my-3">
                            <h4 class="mb-0">Address</h4>
                            <a href="{{url('user/profile/address-edit/'.$user->id)}}" class="">
                                <i class="feather-edit text-primary" style="font-size: 30px"></i>
                            </a>
                        </div>
                        <p>{{$user->address}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
