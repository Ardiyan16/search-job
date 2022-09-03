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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/front/js/sweetalert2-all.js"></script>
</head>

<style>
    form .error {
        color: red;
    }
</style>

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
                            <a href="<?= base_url('Company') ?>" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 fa fa-home"></span>Home Company</a>
                        </div>
                        <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span class="icon-menu h3 m-0 p-0 mt-2"></span></a>
                    </div>

                </div>
            </div>
        </header>

        <section class="site-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6" style="margin-top: 10%;">
                        <h2 class="mb-4">Password Baru Perusahaan</h2>
                        <form name="ubah_password" action="<?= base_url('Auth/ubah_password_company') ?>" method="POST" class="p-4 border rounded">
                            <!-- <?= base_url('Auth/ubah_password_company') ?> -->
                            <div class="row form-group mb-4">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="text-black" for="fname">Password</label>
                                    <input type="password" id="password" name="password" class="form-control password" placeholder="Password Baru">
                                </div>
                            </div>
                            <div class="row form-group mb-4">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="text-black" for="fname">Tulis Ulang Password</label>
                                    <input type="password" id="konfirm_password" name="konfirm_password" class="form-control password" placeholder="Tulis Ulang Password Baru">
                                </div>
                            </div>
                            <div class="row form-group mb-4">
                                <div class="form-check ml-3">
                                    <input type="checkbox" class="form-check-input form-checkbox" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Lihat Password</label>
                                </div>
                            </div>
                            <hr>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <input type="submit" value="Save New Password" class="btn px-4 btn-primary text-white">
                                </div>
                                <p style="margin-left: 13px; margin-top: 5px;">Anda ingin masuk ?</p>&nbsp;<a href="<?= base_url('Auth') ?>" style="margin-top: 5px;"> Masuk disini</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <?php $this->load->view('users/partials/footer') ?>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
        <script>
            $(function() {
                // Initialize form validation on the registration form.
                // It has the name attribute "registration"
                $("form[name='ubah_password']").validate({
                    // Specify validation rules
                    rules: {
                        password: {
                            required: true,
                            minlength: 6
                        },
                        konfirm_password: {
                            required: true,
                            minlength: 6,
                            equalTo: "#password"
                        }
                    },
                    // Specify validation error messages
                    messages: {
                        password: {
                            required: "password is required (password harus di isi)",
                            minlength: "password minimum 6 character"
                        },
                        konfirm_password: {
                            required: "confirm password is required (konfirmasi password harus di isi)",
                            minlength: "password minimum 6 character",
                            equalTo: "confirm password does not match (konfirmasi password tidak cocok)"
                        },
                    },
                    submitHandler: function(form) {
                        form.submit();
                    }
                });
            });
        </script>