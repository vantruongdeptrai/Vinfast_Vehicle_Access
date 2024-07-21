<!doctype html>
<html lang="en">

<head>
    <title>Vehicle Access &mdash;</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('theme/user/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{asset('theme/user/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('theme/user/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('theme/user/css/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{asset('theme/user/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('theme/user/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('theme/user/fonts/flaticon/font/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('theme/user/css/aos.css')}}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{asset('theme/user/css/style.css')}}">
    <style>
        .rounded-select {
            border-radius: 8px;
            /* Adjust the value as needed */
            padding: 5px;
            /* Optional: Add padding for better appearance */
        }

        .form-control-wrap {
            margin-bottom: 10px;
            /* Adjust the spacing between form controls */
        }

        .form-control {
            width: 100%;
            /* Ensure form controls take the full width */
            padding: 5px;
            /* Add padding for better appearance */
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>


    <div class="site-wrap" id="home-section">

        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>

        <header class="site-navbar site-navbar-target" role="banner">
            <div class="">
                <div class="row align-items-center position-relative">
                    <div class="col-3">
                        <div class="site-logo">
                            <a href="#!"><strong>Quản lí xe ra vào</strong></a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="hero" style="background-image: url('{{asset("theme/user/images/hero_1_a.jpg")}}');">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="">
                        <form action="{{route('infomation')}}" method="post" class="trip-form">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <h2>Thông tin người gửi</h2>
                                    <div class="row align-items-center">
                                        <div class="m-3">
                                            <div class="form-control-wrap">
                                                <label for="">Họ và tên</label>
                                                <input type="text" name="full_name" class="form-control">
                                            </div>
                                            <div class="form-control-wrap">
                                                <label for="">Số điện thoại</label>
                                                <input type="text" name="phone_number" class="form-control">
                                            </div>
                                            <div class="form-control-wrap">
                                                <label for="">CCCD / CMND</label>
                                                <input type="text" name="card_id" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <h2>Thông tin xe</h2>
                                    <div class="row align-items-center">
                                        <div class="m-3">
                                            <div class="form-control-wrap">
                                                <label for="">Tên xe</label>
                                                <input type="text" name="vehicle_name" class="form-control">
                                            </div>
                                            <div class="form-control-wrap">
                                                <label for="type_vehicle">Loại xe</label>
                                                <select name="type_vehicle_id" id="type_vehicle"
                                                    class="form-select-sm rounded-select">
                                                    @foreach ($type_vehicle as $item)
                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-control-wrap">
                                                <label for="">Hãng</label>
                                                <input type="text" name="brand" class="form-control">
                                            </div>
                                            <div class="form-control-wrap">
                                                <label for="">Màu</label>
                                                <input type="text" name="color" class="form-control">
                                            </div>
                                            <div class="form-control-wrap">
                                                <label for="">Biển số xe</label>
                                                <input type="text" name="license_plates" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-5 mb-3 mb-md-0 col-md-3">
                                    <button type="submit" class="btn btn-primary btn-block py-3">Xác nhận</button>
                                </div>
                            </div>
                        </form>
                        @if(session('success'))
                            <script>
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: '{{ session('success') }}',
                                });
                            </script>
                        @endif

                        @if($errors->any())
                                        <script>
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Validation Error',
                                                html: '<ul>' +
                                                    @foreach ($errors->all() as $error)
                                                        '<li>{{ $error }}</li>' +
                                                    @endforeach
                                    '</ul>'
                            });
                                        </script>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="site-section bg-primary py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 mb-4 mb-md-0">
                        <h2 class="mb-0 text-white">Search license plates</h2>
                    </div>
                    <div class="col-lg-5 text-md-right">
                        <form action="{{route('findInfor')}}" method="post">
                            @csrf
                            <div class="row">
                                <input type="text" placeholder="XXXXX" class="form-control" name="license_plates">
                                <button class="btn btn-white mt-3">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="site-section bg-primary py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 mb-4 mb-md-0">
                        <h2 class="mb-0 text-white">Feedback</h2>
                    </div>
                    <div class="col-lg-5 text-md-right">
                        <form action="{{route('feedback')}}" method="post">
                            @csrf
                            <div class="row">
                                <input type="text" class="form-control" name="feedback">
                                <button class="btn btn-white mt-3">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>

        <footer class="site-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <h2 class="footer-heading mb-4">About Us</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                            there live the blind texts. </p>
                        <ul class="list-unstyled social">
                            <li><a href="#"><span class="icon-facebook"></span></a></li>
                            <li><a href="#"><span class="icon-instagram"></span></a></li>
                            <li><a href="#"><span class="icon-twitter"></span></a></li>
                            <li><a href="#"><span class="icon-linkedin"></span></a></li>
                        </ul>
                    </div>
                    <div class="col-lg-8 ml-auto">
                        <div class="row">
                            <div class="col-lg-3">
                                <h2 class="footer-heading mb-4">Quick Links</h2>
                                <ul class="list-unstyled">
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Testimonials</a></li>
                                    <li><a href="#">Terms of Service</a></li>
                                    <li><a href="#">Privacy</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-3">
                                <h2 class="footer-heading mb-4">Resources</h2>
                                <ul class="list-unstyled">
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Testimonials</a></li>
                                    <li><a href="#">Terms of Service</a></li>
                                    <li><a href="#">Privacy</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-3">
                                <h2 class="footer-heading mb-4">Support</h2>
                                <ul class="list-unstyled">
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Testimonials</a></li>
                                    <li><a href="#">Terms of Service</a></li>
                                    <li><a href="#">Privacy</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-3">
                                <h2 class="footer-heading mb-4">Company</h2>
                                <ul class="list-unstyled">
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Testimonials</a></li>
                                    <li><a href="#">Terms of Service</a></li>
                                    <li><a href="#">Privacy</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row pt-5 mt-5 text-center">
                    <div class="col-md-12">
                        <div class="border-top pt-5">
                            <p>
                               
                                Copyright &copy;
                                2024
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="{{asset('theme/user/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('theme/user/js/popper.min.js')}}"></script>
    <script src="{{asset('theme/user/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('theme/user/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('theme/user/js/jquery.sticky.js')}}"></script>
    <script src="{{asset('theme/user/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('theme/user/js/jquery.animateNumber.min.js')}}"></script>
    <script src="{{asset('theme/user/js/jquery.fancybox.min.js')}}"></script>
    <script src="{{asset('theme/user/js/jquery.easing.1.3.js')}}"></script>
    <script src="{{asset('theme/user/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('theme/user/js/aos.js')}}"></script>

    <script src="{{asset('theme/user/js/main.js')}}"></script>

</body>

</html>