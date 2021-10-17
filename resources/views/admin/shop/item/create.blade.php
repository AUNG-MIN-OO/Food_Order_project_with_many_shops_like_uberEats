@extends('admin.layouts.app')
@section('title','Shop Item')
@section('current_page','Add Shop Items')
@section('content_title')
    <div class="title d-flex justify-content-between align-items-center">
        <div class="">
            <h3>Create New Items</h3>
        </div>
        <div class="mb-2">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="{{route('shopItem.index')}}" class="text-white text-decoration-none">Items List</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add Shop Items</li>
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
                        <form action="{{route('shopItem.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="shop_id" value="{{$shop[0]->id}}">
                            <div class="mb-4">
                                <label for="name" class="mb-2">Item Name</label>
                                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                                @error('name')
                                <small class="fw-bold text-danger mb-0">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="price" class="mb-2">Price (MMK)</label>
                                <input type="text" id="price" name="price" class="form-control @error('price') is-invalid @enderror" value="{{old('price')}}">
                                @error('price')
                                <small class="fw-bold text-danger mb-0">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="item_count" class="mb-2">Item Count</label>
                                <input type="number" id="item_count" name="item_count" class="form-control @error('item_count') is-invalid @enderror" value="{{old('item_count')}}">
                                @error('item_count')
                                <small class="fw-bold text-danger mb-0">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="item_image" class="mb-2">Item Image</label>
                                <input type="file" id="item_image" name="item_image" class="form-control @error('item_image') is-invalid @enderror">
                                @error('item_image')
                                <small class="fw-bold text-danger mb-0">{{$message}}</small>
                                @enderror
                            </div>
                            <button class="btn bg-button float-end">Create Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@stop
