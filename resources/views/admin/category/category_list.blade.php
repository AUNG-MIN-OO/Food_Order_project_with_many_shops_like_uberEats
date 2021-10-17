@extends('admin.layouts.app')
@section('title','Category List')
@section('current_page','Category List')
@section('content_title')
    <div class="title d-flex justify-content-between align-items-center">
        <div class="">
            <h3>Category List</h3>
        </div>
        <div class="mb-2">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="{{route('category.create')}}" class="text-white text-decoration-none">Add Category</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Category List</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection
@section('content')
    <div class="bg-background p-3">
        <div class="row">
            <div class="col-12">
                <a href="{{route('category.create')}}" class="btn bg-button btn-lg">Add new category</a>
                <div class="card border-0 my-4">
                    <div class="card-body bg-blue">
                        <table class="table table-hover text-white">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Created by</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php $i=1 @endphp
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->User->name}}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{route('category.edit',$category->id)}}" class="btn btn-warning btn-sm me-2"><i class="feather-edit-3"></i></a>
                                                <form action="{{route('category.destroy',$category->id)}}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger btn-sm"><i class="feather-trash-2"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @php $i++ @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@stop
