@extends('admin.layouts.app')
@section('title','Shop Items List')
@section('current_page','Item List')
@section('content_title')
    <div class="title d-flex justify-content-between align-items-center">
        <div class="">
            <h3>Order List</h3>
        </div>
        <div class="mb-2">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item active" aria-current="page">Order List</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection
@section('content')
    <div class="bg-background p-3">
        <div class="row">
            <div class="col-12">
                <div class="card border-0 my-4">
                    <div class="card-body bg-blue">
                        @if(sizeof($orders))
                            <table class="table table-hover text-white">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Item Image</th>
                                    <th>Item Name</th>
                                    <th>Item Price</th>
                                    <th>Item Count</th>
                                    <th>Created by</th>
                                    <th>Order Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $i=1 @endphp
                                @foreach($orders as $item)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>
                                            <img src="{{asset('shop-item/'.$item->item_image)}}" alt="" style="width: 70px;height: 70px;background-size: cover;">
                                        </td>
                                        <td>{{$item->item_name}}</td>
                                        <td>{{$item->item_price}}</td>
                                        <td>{{$item->quantity}}</td>
                                        <td>{{$item->created_at}}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="badge rounded-pill bg-success me-2">Success</span>
                                                <a href="{{route('order_destroy',$item->id)}}" class="btn btn-danger btn-sm"><i class="feather-x"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @php $i++; @endphp
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <h2 class="text-center">There is no order yet!</h2>
                        @endif
                    </div>
                </div>
            </div>
        </div>
@stop
