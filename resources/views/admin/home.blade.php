@extends('admin.layouts.app')
@section('title','Admin Dashboard')
@section('current_page','admin dashboard')
@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-4">
            <div class="card bg-blue mb-2">
                <div class="card-body">
                    <div class="text-center">
                        <img src="" class="card-image" alt="">
                    </div>
                    <h3 class="text-center">Welcome Admin</h3>
                    <a href="#" class="text-decoration-none text-white btn btn-sm bg-button w-100">Go to Profile <i class="feather-arrow-right mb-0"></i></a>
                </div>
            </div>
            <div class="card bg-blue mb-2">
                <div class="card-body">
                    <h3>Category List <i class="feather-layers"></i></h3>
                    <hr>
                    <h3 class="text-center">
                        <span class="counter">5</span>
                        <span>Categories</span>
                    </h3>
                    <a href="#" class="text-decoration-none text-white btn btn-sm bg-button w-100">Go to check <i class="feather-arrow-right mb-0"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-8">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card bg-blue mb-2">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="">
                                    <h5 class="text-white-50">Orders</h5>
                                    <span class="counter h4">1,234,567.00</span>
                                </div>
                                <div class="">
                                    <span class="cUp-icon">
                                        <i class="feather-package"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card bg-blue">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="">
                                    <h5 class="text-white-50">Orders</h5>
                                    <span class="counter h4">1,234,567.00</span>
                                </div>
                                <div class="">
                                            <span class="cUp-icon">
                                                <i class="feather-package"></i>
                                            </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 mb-4">
                    <div class="card bg-blue">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="">
                                    <h5 class="text-white-50">Orders</h5>
                                    <span class="counter h4">1,234,567.00</span>
                                </div>
                                <div class="">
                                            <span class="cUp-icon">
                                                <i class="feather-package"></i>
                                            </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card bg-blue">
                        <div class="card-body">
                            <div>
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
