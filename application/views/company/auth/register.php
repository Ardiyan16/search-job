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
                        </ul>
                    </nav>

                    <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
                        <div class="ml-auto">
                            <a href="<?= base_url('Pages') ?>" class="btn btn-info border-width-2 d-none d-lg-inline-block"><span class="mr-2 fa fa-user"></span>Menu Pelamar</a>
                            <?php if ($this->session->userdata('nama_depan')) { ?>
                                <a href="<?= base_url('Auth/logout_user') ?>" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 fa fa-sign-out"></span>Log Out</a>
                            <?php } else { ?>
                                <a href="<?= base_url('Auth/login_company') ?>" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 fa fa-sign-in"></span>Login & Register</a>
                            <?php } ?>
                        </div>
                        <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span class="icon-menu h3 m-0 p-0 mt-2"></span></a>
                    </div>

                </div>
            </div>
        </header>


        <section class="site-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mb-5" style="margin-top: 10%;">
                        <h2 class="mb-4">Register to Post Job</h2>
                        <form action="<?= base_url('Auth/action_register_company') ?>" method="POST" class="p-4 border rounded">
                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="text-black" for="fname">Email ID</label>
                                    <input type="email" id="fname" name="email" class="form-control" placeholder="">
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="text-black" for="fname">Nama Penanggung Jawab</label>
                                    <input type="text" id="fname" name="nama" class="form-control" placeholder="">
                                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="text-black" for="fname">No Telepon</label>
                                    <input type="no_telp" id="fname" name="no_telp" class="form-control" placeholder="">
                                    <?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="text-black" for="fname">Nama Perusahaan</label>
                                    <input type="text" id="fname" name="nama_perusahaan" class="form-control" placeholder="Nama perusahaan sesuai dokumen perusahaan">
                                    <?= form_error('nama_perusahaan', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="text-black" for="fname">Password</label>
                                    <input type="password" name="password" id="fname" class="form-control password" placeholder="">
                                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row form-group mb-4">
                                <div class="form-check ml-3">
                                    <input type="checkbox" class="form-check-input form-checkbox" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Lihat Password</label>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <input type="submit" value="Sign Up" class="btn px-4 btn-primary text-white">
                                </div>
                                <p style="margin-left: 13px; margin-top: 5px;">Sudah memiliki akun perusahaan ? </p>&nbsp;<a href="<?= base_url('Auth/login_company') ?>" style="margin-top: 5px;"> Sign In disini</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <?php $this->load->view('company/partials/footer') ?>