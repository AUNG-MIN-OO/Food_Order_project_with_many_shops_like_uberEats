@extends('admin.layouts.app')
@section('title','Category')
@section('current_page','Edit Category')
@section('content_title')
    <div class="title d-flex justify-content-between align-items-center">
        <div class="">
            <h3>Edit Category</h3>
        </div>
        <div class="mb-2">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="{{route('category.index')}}" class="text-white text-decoration-none">Category List</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
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
                        <form action="{{route('category.update',$category->id)}}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="mb-4">
                                <label for="category" class="mb-2">Category Name</label>
                                <input type="text" id="category" name="category" class="form-control @error('category') is-invalid @enderror" value="{{$category->name}}">
                                @error('category')
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
