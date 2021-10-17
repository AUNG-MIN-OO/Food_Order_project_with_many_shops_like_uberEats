<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>

<section class="main container-fluid">
    <div class="row">
        @if(session('toast'))
            <div aria-live="polite" aria-atomic="true" style="position:absolute;z-index: 2010;right: 10px;top: 7px; width: 300px" >
                <div class="toast animate__animated  animate__bounceInDown bg-button" role="alert" aria-atomic="true">
                    <div class="toast-header bg-button text-white">
                        <strong class="me-auto">New notifications!</strong>
                        <small>Just now!</small>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body text-white">
                        <h5>{{session('toast')}}</h5>
                    </div>
                </div>
            </div>
        @endif
        @include('admin.layouts.sidebar')
        @include('admin.layouts.navbar')
        <div class="row">
            <div class="col-12">
                <div class="bg-background p-3">
                    @yield('content_title')
                    @yield('content')
                </div>
            </div>
        </div>
        <div class="row footer">
            <div class="col-12">
                <footer class="w-100">
                    <div class="d-flex justify-content-between align-items-center w-100 p-3 main-footer" style="background-color: #262b3c">
                        <div>Copyright© 2021 All rights reserved</div>
                        <div class="text-white">
                            <span>Developed by <b>AUNG MIN OO</b></span>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
</section>


<script src="{{asset('js/app.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    @yield('scripts')
    //toast
    let option = {
        animation:true,
        delay:4000,
    }
    var toastElList = [].slice.call(document.querySelectorAll('.toast'))
    var toastList = toastElList.map(function(toastEl) {
        return new bootstrap.Toast(toastEl,option).show();
    })
</script>
</body>
</html>
