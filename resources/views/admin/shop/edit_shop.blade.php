@extends('admin.layouts.app')
@section('title','Shop Info')
@section('current_page','Shop Info')
@section('content_title')
    <div class="title d-flex justify-content-between align-items-center">
        <div class="">
            <h3>Edit Shop Info</h3>
        </div>
        <div class="mb-2">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item active" aria-current="page">Edit shop info</li>
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
                    <form action="{{route('shop.update',$shop->id)}}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="mb-4">
                            <label for="promotion_status" class="mb-2">Promotion Status</label>
                            <input type="text" id="promotion_status" name="promotion_status" class="form-control @error('promotion_status') is-invalid @enderror" value="{{$user->promotion_status}}">
                            @error('promotion_status')
                            <small class="fw-bold text-danger mb-0">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Choose Shop Category</label>

                            <select id="shop_category" class="form-control @error('shop_category') is-invalid @enderror custom-select" required autocomplete="shop_category" name="shop_category">
                                <option value="">Choose category</option>
                                @foreach($category as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>

                            @error('shop_category')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button class="btn bg-button float-end">Update Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
