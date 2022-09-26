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
    <link rel="stylesheet" href="<?= base_url() ?>assets/front/select2-4.0.6-rc.1/dist/css/select2.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- MAIN CSS -->

    <link rel="stylesheet" href="<?= base_url() ?>assets/front/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/front/summernote/summernote-bs4.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
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
                            <li><a href="<?= base_url('Pages') ?>" class="nav-link">Home</a></li>
                            <li><a href="<?= base_url('Pages/lowongan') ?>">Lowongan</a></li>
                            <li><a href="<?= base_url('Pages/company') ?>">Perusahaan</a></li>
                            <li class="has-children">
                                <a href="services.html">Konten</a>
                                <ul class="dropdown">
                                    <li><a href="services.html">Komunitas</a></li>
                                    <li><a href="service-single.html">Tips & Trick</a></li>
                                    <li><a href="gallery.html">Gallery</a></li>
                                </ul>
                            </li>
                            <li><a href="<?= base_url('Pages/blog') ?>">Blog</a></li>
                            <li><a href="<?= base_url('Pages/contact') ?>">Contact</a></li>
                            <?php if ($this->session->userdata('nama_depan')) { ?>
                                <li class="has-children">
                                    <a href="#"><?= $this->session->userdata('nama_depan') ?></a>
                                    <ul class="dropdown">
                                        <li><a href="<?= base_url('Pages/profile') ?>">Profile</a></li>
                                        <li><a href="<?= base_url('Pages/lamaran_saya') ?>">Lamaran Anda</a></li>
                                        <li><a href="<?= base_url('Pages/bookmark_lamaran') ?>">Lamaran Disimpan</a></li>
                                    </ul>
                                </li>
                            <?php } ?>
                        </ul>
                    </nav>

                    <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
                        <div class="ml-auto">
                            <?php if (empty($this->session->userdata('nama_depan'))) { ?>
                                <a href="<?= base_url('Company') ?>" class="btn btn-outline-white border-width-2 d-none d-lg-inline-block"><span class="mr-2 fa fa-briefcase"></span>Menu Perusahaan</a>
                            <?php } ?>
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