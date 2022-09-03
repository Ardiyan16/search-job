<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?= $title ?></title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/image/logo1.png">
    <link href="<?= base_url() ?>assets/back/vendor/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/back/vendor/chartist/css/chartist.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>assets/back/vendor/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/back/vendor/toastr/css/toastr.min.css">
    <link href="<?= base_url() ?>assets/back/css/style.css" rel="stylesheet">
    <script src="<?= base_url() ?>assets/back/sweetalert2-all.js"></script>
    <link href="<?= base_url() ?>assets/back/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.html" class="brand-logo">
                <img class="logo-abbr" src="<?= base_url() ?>assets/image/logo1.png" alt="">
                <img class="logo-compact" src="<?= base_url() ?>assets/image/logo-text.png" alt="">
                <img class="brand-title" src="<?= base_url() ?>assets/image/logo-text.png" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="search_bar dropdown">
                                <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                    <i class="mdi mdi-magnify"></i>
                                </span>
                                <div class="dropdown-menu p-0 m-0">
                                    <form>
                                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                                    </form>
                                </div>
                            </div>
                        </div>

                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-account"></i> <?= $this->session->userdata('username') ?>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="./app-profile.html" class="dropdown-item">
                                        <i class="icon-user"></i>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="<?= base_url('Auth/logout') ?>" class="dropdown-item">
                                        <i class="icon-key"></i>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>
                    <!-- <li><a href="index.html"><i class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a>
                    </li> -->
                    <li><a href="<?= base_url('Admin') ?>" aria-expanded="false"><i class="fa fa-dashboard"></i><span class="nav-text">Dashboard</span></a></li>
                    <li><a href="<?= base_url('Admin/users') ?>" aria-expanded="false"><i class="fa fa-user"></i><span class="nav-text">Users</span></a></li>
                    <li><a href="<?= base_url('Admin/company') ?>" aria-expanded="false"><i class="fa fa-briefcase"></i><span class="nav-text">Company</span></a></li>
                    <li class="nav-label">Menu Company & applicantion</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="fa fa-bars"></i><span class="nav-text">Menu Tambahan</span></a>
                        <ul aria-expanded="false">
                            <li><a href="<?= base_url('Admin/bidang_perusahaan') ?>">Bidang Perusahaan</a></li>
                            <li><a href="<?= base_url('Admin/bidang_pekerjaan') ?>">Bidang Pekerjaan</a></li>
                            <li><a href="<?= base_url('Admin/tingkat_pekerjaan') ?>">Tingkat Pekerjaan</a></li>
                            <li><a href="<?= base_url('Admin/jenis_pekerjaan') ?>">Jenis Pekerjaan</a></li>
                            <li><a href="<?= base_url('Admin/ukuran_perusahaan') ?>">Ukuran Perusahaan</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->