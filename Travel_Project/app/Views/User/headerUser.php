<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Trip Venue</title>
        <link href="/asset/travel_icon.icon" rel="icon" width="300">
    
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600&family=Roboto&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="/asset/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="/asset/lib/lightbox/css/lightbox.min.css" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="/asset/css/bootstrap.min.css" rel="stylesheet">
        <link href="/asset/css/test.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="/asset/css/style.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
        <style>
        .rate_sec label {
            cursor: pointer;
        }
        .fa-star {
            color: #ffc107; /* Star color */
        }

        .comment {
            margin-bottom: 20px;
            margin-right: 10px;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 1px 2px 5px 0px rgba(0, 0, 0, 0.1);
        }
        .comment .user_latter {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: inline-block;
            text-align: center;
            line-height: 40px;
            font-size: 18px;
            margin-right: 10px;
            color: #fff;
        }
        .comment .comment-text {
            margin-bottom: 10px;
        }
        .comment .comment-rating {
            color: #ffc107;
            margin-bottom: 5px;
        }
        .comment .comment-rating i {
            margin-right: 3px;
        }
    </style>
    </head>

    <body>

        <?php
        $uri = service('uri'); 
        ?>

        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Topbar Start -->
        <div class="container-fluid bg-primary px-5 d-none d-lg-block">
            <div class="row gx-0">
                <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center" style="height: 45px;">
                        <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-twitter fw-normal"></i></a>
                        <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-facebook-f fw-normal"></i></a>
                        <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-linkedin-in fw-normal"></i></a>
                        <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-instagram fw-normal"></i></a>
                        <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href=""><i class="fab fa-youtube fw-normal"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 text-center text-lg-end">
                    <div class="d-inline-flex align-items-center" style="height: 45px;">
                        <a href="<?= base_url('/register') ?>"><small class="me-3 text-light"><i class="fa fa-user me-2"></i>Register</small></a>
                        <a href="<?= base_url('/') ?>"><small class="me-3 text-light"><i class="fa fa-sign-in-alt me-2"></i>Login</small></a>
                        <a href="<?= base_url('/') ?>"><small class="me-3 text-light"><i class="fa-solid fa-right-from-bracket me-2"></i>Logout</small></a>
                        <!-- <div class="dropdown">
                            <a href="#" class="dropdown-toggle text-light" data-bs-toggle="dropdown"><small><i class="fa fa-home me-2"></i> My Dashboard</small></a>
                            <div class="dropdown-menu rounded">
                                <a href="#" class="dropdown-item"><i class="fas fa-user-alt me-2"></i> My Profile</a>
                                <a href="#" class="dropdown-item"><i class="fas fa-comment-alt me-2"></i> Inbox</a>
                                <a href="#" class="dropdown-item"><i class="fas fa-bell me-2"></i> Notifications</a>
                                <a href="#" class="dropdown-item"><i class="fas fa-cog me-2"></i> Account Settings</a>
                                <a href="#" class="dropdown-item"><i class="fas fa-power-off me-2"></i> Log Out</a>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Topbar End -->

        <!-- Navbar & Hero Start -->
        <div class="container-fluid position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="m-0"><i class="fa fa-map-marker-alt me-3"></i>Trip Venue</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="/index" class="nav-item nav-link <?= ($uri->getSegment(1)  == 'index' ? 'active' : null ) ?>">Home</a>
                        <a href="/about" class="nav-item nav-link <?= ($uri->getSegment(1)  == 'about' ? 'active' : null ) ?>">About</a>
                        <a href="/services" class="nav-item nav-link <?= ($uri->getSegment(1)  == 'services' ? 'active' : null ) ?>">Services</a>
                        <a href="/packages" class="nav-item nav-link <?= ($uri->getSegment(1)  == 'packages' ? 'active' : null ) ?>">Packages</a>
                        <a href="/blog" class="nav-item nav-link <?= ($uri->getSegment(1)  == 'blog' ? 'active' : null ) ?>">Blog</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">More</a>
                            <div class="dropdown-menu m-0">
                                <a href="/destination" class="dropdown-item <?= ($uri->getSegment(1)  == 'destination' ? 'active' : null ) ?>">Destination</a>
                                <a href="/tour" class="dropdown-item <?= ($uri->getSegment(1)  == 'tour' ? 'active' : null ) ?>">Explore Tour</a>
                                <a href="/booking" class="dropdown-item <?= ($uri->getSegment(1)  == 'booking' ? 'active' : null ) ?>">Travel Booking</a>
                                <a href="/gallery" class="dropdown-item <?= ($uri->getSegment(1)  == 'gallery' ? 'active' : null ) ?>">Our Gallery</a>
                                <a href="/guides" class="dropdown-item <?= ($uri->getSegment(1)  == 'guides' ? 'active' : null ) ?>">Travel Guides</a>
                                <a href="/testimonial" class="dropdown-item <?= ($uri->getSegment(1)  == 'testimonial' ? 'active' : null ) ?>">Testimonial</a>
                                <!-- <a href="404" class="dropdown-item">404 Page</a> -->
                            </div>
                        </div>
                        <a href="/contact" class="nav-item nav-link <?= ($uri->getSegment(1)  == 'contact' ? 'active' : null ) ?>">Contact</a>
                    </div>
                    <a href="/booking" class="btn btn-primary rounded-pill py-2 px-4 ms-lg-4">Book Now</a>
                </div>
            </nav>
