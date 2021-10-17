<div class="col-12 col-lg-9 col-xl-10 content vh-100">
        <!--            nav bar start-->
    <div class="row nav-bar">
        <div class="col-12">
            <nav class="navbar navbar-expand-lg navbar-dark bg-blue py-2">
                <div class="container-fluid">
                    <div class="d-block d-lg-none">
                        <i class="feather-menu show-sidebar" style="font-size: 40px"></i>
                    </div>
                    <div class="search-form d-none d-lg-block">
                        <form class="d-flex">
                            <input class="form-control me-2 rounded-pill" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn search-btn bg-button" type="submit"><i class="feather-search"></i></button>
                        </form>
                    </div>
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="me-3 d-block d-lg-none search-btn">
                            <i class="feather-search search-icon" style="font-size: 35px;cursor: pointer;"></i>
                        </div>
                        <div class="dropdown">
                            <button class="btn bg-button dropdown-toggle text-white" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{asset('shop-profile')."/".\Illuminate\Support\Facades\Auth::user()->profile_image}}" alt="">
                                <span>{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{route('logout')}}" method="post">
                                        @csrf
                                        <button class="dropdown-item">Log Out</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
