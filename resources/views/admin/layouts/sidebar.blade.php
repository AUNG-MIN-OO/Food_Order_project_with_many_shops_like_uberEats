<!--        sidebar start-->
<div class="col-12 col-lg-3 col-xl-2 sidebar py-2 bg-blue vh-100">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center nav-brand">
                <div class="d-flex align-items-center justify-content-between text-white py-2 pe-1 rounded w-100">
                    <div class="d-flex justify-content-start">
                    <span class="fs-5 me-2">
                        <i class="feather-home"></i>
                    </span>
                        <div class="h3 mb-0 text-nowrap">
                            Learn With Me
                        </div>
                    </div>
                    <div class="d-block d-lg-none">
                        <i class="feather-x hide-sidebar" style="font-size: 40px"></i>
                    </div>
                </div>
                <hr>
            </div>
            <hr>
            <div class="menu">
                <ul class="m-0">
                    <li class="d-flex justify-content-center align-items-center menu-item mb-2">
                    <span>
                        <i class="feather-grid me-3"></i>
                    </span>
                        <a href="{{route('admin-home')}}" class="w-100 h5 text-white mb-0">Dashboard</a>
                    </li>
                    <div class="spacer"></div>
                    <div class="">
                        <span class="fw-bold text-white-50 mb-0">Order Menu</span>
                        <div class="spacer"></div>
                        <div class="menu-collect">
                            <li class="d-flex justify-content-center align-items-center menu-item mb-2">
                            <span>
                                <i class="feather-list me-3"></i>
                            </span>
                                <a href="{{route('admin-order.show')}}" class="w-100 h5 text-white mb-0">Order List</a>
                            </li>
                        </div>
                    </div>
                    <div class="spacer"></div>
                    @if(\Illuminate\Support\Facades\Auth::user()->id == 1)
                        <div class="">
                            <span class="fw-bold text-white-50 mb-0">Category Menu</span>
                            <div class="spacer"></div>
                            <div class="menu-collect">
                                <li class="d-flex justify-content-center align-items-center menu-item mb-2">
                                    <span>
                                        <i class="feather-plus-circle me-3"></i>
                                    </span>
                                    <a href="{{route('category.create')}}" class="w-100 h5 text-white mb-0">Add Category</a>
                                </li>
                            </div>
                            <div class="menu-collect">
                                <li class="d-flex justify-content-center align-items-center menu-item mb-2">
                                    <span>
                                        <i class="feather-list me-3"></i>
                                    </span>
                                    <a href="{{route('category.index')}}" class="w-100 h5 text-white mb-0">Category List</a>
                                </li>
                            </div>
                        </div>
                    @endif
                    <div class="">
                        <span class="fw-bold text-white-50">Manage Users</span>
                        <div class="spacer"></div>
                        <div class="menu-collect">
                            <li class="d-flex justify-content-center align-items-center menu-item mb-2">
                            <span>
                                <i class="feather-users me-3"></i>
                            </span>
                                <a href="{{route('shop.index')}}" class="w-100 h5 text-white mb-0">My Profile</a>
                            </li>
                        </div>
                        <div class="menu-collect">
                            <li class="d-flex justify-content-center align-items-center menu-item mb-2">
                            <span>
                                <i class="feather-plus-circle me-3"></i>
                            </span>
                                <a href="{{route('shopItem.create')}}" class="w-100 h5 text-white mb-0">Add Shop Item</a>
                            </li>
                        </div>
                        <div class="menu-collect">
                            <li class="d-flex justify-content-center align-items-center menu-item mb-2">
                            <span>
                                <i class="feather-list me-3"></i>
                            </span>
                                <a href="{{route('shopItem.index')}}" class="w-100 h5 text-white mb-0">Item Lists</a>
                            </li>
                        </div>
                    </div>
                    <div class="spacer"></div>
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button class="btn btn-danger w-100 mb-3">Log Out</button>
                    </form>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--        sidebar end-->
