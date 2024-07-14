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
            border-radius: 8px; /* Adjust the value as needed */
            padding: 5px; /* Optional: Add padding for better appearance */
        }
        .form-control-wrap {
            margin-bottom: 10px; /* Adjust the spacing between form controls */
        }
        .form-control {
            width: 100%; /* Ensure form controls take the full width */
            padding: 5px; /* Add padding for better appearance */
        }
    </style>

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
                            <a href="#!"><strong>Vinfast Vehicle Access</strong></a>
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
                                    <h2>Infomation sender</h2>
                                    <div class="row align-items-center">
                                        <div class="m-3">
                                            <div class="form-control-wrap">
                                                <label for="">Full name</label>
                                                <input type="text" name="full_name" class="form-control">
                                            </div>
                                            <div class="form-control-wrap">
                                                <label for="">Phone number</label>
                                                <input type="text" name="phone_number" class="form-control">
                                            </div>
                                            <div class="form-control-wrap">
                                                <label for="">Card ID</label>
                                                <input type="text" name="card_id" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <h2>Infomation Vehicle</h2>
                                    <div class="row align-items-center">
                                        <div class="m-3">
                                            <div class="form-control-wrap">
                                                <label for="">Vehicle name</label>
                                                <input type="text" name="vehicle_name" class="form-control">
                                            </div>
                                            <div class="form-control-wrap">
                                                <label for="type_vehicle">Type of vehicle</label>
                                                <select name="type_vehicle_id" id="type_vehicle"
                                                    class="form-select-sm rounded-select">
                                                    @foreach ($type_vehicle as $item)
                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-control-wrap">
                                                <label for="">Brand</label>
                                                <input type="text" name="brand" class="form-control">
                                            </div>
                                            <div class="form-control-wrap">
                                                <label for="">Color</label>
                                                <input type="text" name="color" class="form-control">
                                            </div>
                                            <div class="form-control-wrap">
                                                <label for="">License plates</label>
                                                <input type="text" name="license_plates" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-5 mb-3 mb-md-0 col-md-3">
                                    <button type="submit" class="btn btn-primary btn-block py-3">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="site-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <h2 class="section-heading"><strong>Features</strong></h2>
                        <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4 mb-5">
                        <div class="service-1 dark">
                            <span class="service-1-icon">
                                <span class="icon-home"></span>
                            </span>
                            <div class="service-1-contents">
                                <h3>Lorem ipsum dolor</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
                                <p class="mb-0"><a href="#">Learn more</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-5">
                        <div class="service-1 dark">
                            <span class="service-1-icon">
                                <span class="icon-gear"></span>
                            </span>
                            <div class="service-1-contents">
                                <h3>Lorem ipsum dolor</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
                                <p class="mb-0"><a href="#">Learn more</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-5">
                        <div class="service-1 dark">
                            <span class="service-1-icon">
                                <span class="icon-watch_later"></span>
                            </span>
                            <div class="service-1-contents">
                                <h3>Lorem ipsum dolor</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
                                <p class="mb-0"><a href="#">Learn more</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-5">
                        <div class="service-1 dark">
                            <span class="service-1-icon">
                                <span class="icon-verified_user"></span>
                            </span>
                            <div class="service-1-contents">
                                <h3>Lorem ipsum dolor</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
                                <p class="mb-0"><a href="#">Learn more</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-5">
                        <div class="service-1 dark">
                            <span class="service-1-icon">
                                <span class="icon-video_library"></span>
                            </span>
                            <div class="service-1-contents">
                                <h3>Lorem ipsum dolor</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
                                <p class="mb-0"><a href="#">Learn more</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-5">
                        <div class="service-1 dark">
                            <span class="service-1-icon">
                                <span class="icon-vpn_key"></span>
                            </span>
                            <div class="service-1-contents">
                                <h3>Lorem ipsum dolor</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
                                <p class="mb-0"><a href="#">Learn more</a></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="site-section bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <h2 class="section-heading"><strong>Testimonials</strong></h2>
                        <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <div class="testimonial-2">
                            <blockquote class="mb-4">
                                <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, deserunt
                                    eveniet veniam. Ipsam, nam, voluptatum"</p>
                            </blockquote>
                            <div class="d-flex v-card align-items-center">
                                <img src="images/person_1.jpg" alt="Image" class="img-fluid mr-3">
                                <div class="author-name">
                                    <span class="d-block">Mike Fisher</span>
                                    <span>Owner, Ford</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <div class="testimonial-2">
                            <blockquote class="mb-4">
                                <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, deserunt
                                    eveniet veniam. Ipsam, nam, voluptatum"</p>
                            </blockquote>
                            <div class="d-flex v-card align-items-center">
                                <img src="images/person_2.jpg" alt="Image" class="img-fluid mr-3">
                                <div class="author-name">
                                    <span class="d-block">Jean Stanley</span>
                                    <span>Traveler</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <div class="testimonial-2">
                            <blockquote class="mb-4">
                                <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, deserunt
                                    eveniet veniam. Ipsam, nam, voluptatum"</p>
                            </blockquote>
                            <div class="d-flex v-card align-items-center">
                                <img src="images/person_3.jpg" alt="Image" class="img-fluid mr-3">
                                <div class="author-name">
                                    <span class="d-block">Katie Rose</span>
                                    <span>Customer</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="site-section bg-primary py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 mb-4 mb-md-0">
                        <h2 class="mb-0 text-white">What are you waiting for?</h2>
                        <p class="mb-0 opa-7">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati,
                            laboriosam.</p>
                    </div>
                    <div class="col-lg-5 text-md-right">
                        <a href="#" class="btn btn-primary btn-white">Rent a car now</a>
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
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;
                                <script>document.write(new Date().getFullYear());</script> All rights reserved | This
                                template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a
                                    href="https://colorlib.com" target="_blank">Colorlib</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
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