<!doctype html>
<html lang="en">

<head>
    <title><?= $title ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/image/logo1.png">

    <link rel="stylesheet" href="<?= base_url() ?>assets/front/css/custom-bs.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/front/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/front/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/front/fonts/icomoon/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/front/fonts/line-icons/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/front/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/front/css/animate.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/front/css/quill.snow.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/front/css/style.css">
    <script src="<?= base_url() ?>assets/front/js/sweetalert2-all.js"></script>
</head>

<body id="top">

    <!-- <div id="overlayer"></div>
    <div class="loader">
        <div class="spinner-border text-primary" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div> -->


    <div class="site-wrap">

        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div> <!-- .site-mobile-menu -->


        <!-- NAVBAR -->
        <header class="site-navbar mt-3">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="site-logo col-6"><img src="<?= base_url() ?>assets/image/logo2.png" height="75" width="150"></div>

                    <nav class="mx-auto site-navigation">
                        <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
                            <li><a href="index.html" class="nav-link">Home</a></li>
                            <li><a href="about.html">About</a></li>
                            <li class="has-children">
                                <a href="job-listings.html">Job Listings</a>
                                <ul class="dropdown">
                                    <li><a href="job-single.html">Job Single</a></li>
                                    <li><a href="post-job.html">Post a Job</a></li>
                                </ul>
                            </li>
                            <li class="has-children">
                                <a href="services.html">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="services.html">Services</a></li>
                                    <li><a href="service-single.html">Service Single</a></li>
                                    <li><a href="blog-single.html">Blog Single</a></li>
                                    <li><a href="portfolio.html">Portfolio</a></li>
                                    <li><a href="portfolio-single.html">Portfolio Single</a></li>
                                    <li><a href="testimonials.html">Testimonials</a></li>
                                    <li><a href="faq.html">Frequently Ask Questions</a></li>
                                    <li><a href="gallery.html">Gallery</a></li>
                                </ul>
                            </li>
                            <li><a href="blog.html">Blog</a></li>
                            <li><a href="contact.html">Contact</a></li>
                            <?php if ($this->session->userdata('nama_depan')) { ?>
                                <li class="has-children">
                                    <a href="services.html"><?= $this->session->userdata('nama_depan') ?></a>
                                    <ul class="dropdown">
                                        <li><a href="services.html">Profile</a></li>
                                        <li><a href="service-single.html">Lamaran Anda</a></li>
                                    </ul>
                                </li>
                            <?php } ?>
                        </ul>
                    </nav>

                    <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
                        <div class="ml-auto">
                            <a href="<?= base_url('Company') ?>" class="btn btn-outline-white border-width-2 d-none d-lg-inline-block"><span class="mr-2 fa fa-briefcase"></span>Menu Perusahaan</a>
                            <?php if ($this->session->userdata('nama_depan')) { ?>
                                <a href="<?= base_url('Auth/logout_user') ?>" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 fa fa-sign-out"></span>Log Out</a>
                            <?php } else { ?>
                                <a href="<?= base_url('Auth') ?>" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 fa fa-sign-in"></span>Log In</a>
                            <?php } ?>
                        </div>
                        <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span class="icon-menu h3 m-0 p-0 mt-2"></span></a>
                    </div>

                </div>
            </div>
        </header>