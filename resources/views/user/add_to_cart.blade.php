@extends('user.layouts.index')
@section('content')
    <section class="container cart pt-3">
        @include('sweetalert::alert')
        <div class="row">
            <div class="col-12">
                <div class="">
                    <div class="">
                        <div class="card border-0 shadow mb-2 radius">
                            <div class="card-body">
                                <div class="">
                                    <div class="d-md-flex justify-content-md-between text-center">
                                        <img src="{{asset('shop-item/'.$item->item_image)}}" class="mr-2 radius" alt="" style="width: 300px;">
                                        <div class="my-3 text-left">
                                            <h4 class="mb-0">{{$item->name}}</h4>
                                            <div class="d-flex justify-content-between mt-3">
                                                <p class="text-muted">Price</p>
                                                <p class="mb-0 text-black-50">
                                                    {{$item->price}} MMK</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <form action="{{url('user/add-to-cart')}}" method="post" id="cart">
                                            @csrf
                                            <input type="hidden" name="menu_id" value="{{$item->id}}">
                                            <div class="text-right">
                                                <select name="quantity"
                                                        id="" class="form-control custom-select mb-3" style="width: 160px">
                                                    <option value="">Choose Quantity</option>
                                                    @for($i=1;$i<=10;$i++)
                                                        <option value="{{$i}}">{{$i}}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </form>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <a class="btn btn-outline-primary radius" href="{{url()->previous()}}">Choose Other Menus</a>
                                            <button class="btn btn-primary radius" type="submit" form="cart">Add to cart <i class="feather-plus-circle mb-0"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
