<?php $this->load->view('users/partials/header') ?>

<!-- HOME -->
<section class="home-section section-hero overlay bg-image" style="background-image: url(<?= base_url('assets/image/background-home.png') ?>);" id="home-section">

    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-12">
                <div class="mb-5 text-center">
                    <h1 class="text-white font-weight-bold">Kami Berusaha</h1>
                    <p>memberikan pelayanan untuk anda untuk dapat menemukan pekerjaan sesuai dengan bidang anda.</p>
                </div>
            </div>
        </div>
    </div>

    <a href="#next" class="scroll-button smoothscroll">
        <span class=" icon-keyboard_arrow_down"></span>
    </a>

</section>

<section class="py-5 bg-image overlay-primary fixed overlay" id="next" style="background-image: url('images/hero_1.jpg');">
    <div class="container">
        <div class="row mb-5 justify-content-center">
            <div class="col-md-7 text-center">
                <h2 class="section-title mb-2 text-white">Search Job Status</h2>
                <p class="lead text-white">berikut merupakan jumlah data perusahaan dan lowongan pekerjaan yang terdaftar di Search Job.</p>
            </div>
        </div>
        <div class="row pb-0 block__19738 section-counter">

            <div class="col-6 col-md-6 col-lg-6 mb-5 mb-lg-0">
                <div class="d-flex align-items-center justify-content-center mb-2">
                    <strong class="number" data-number="<?= $total_loker ?>">0</strong>
                </div>
                <span class="caption">Total Lowongan</span>
            </div>

            <div class="col-6 col-md-6 col-lg-6 mb-5 mb-lg-0">
                <div class="d-flex align-items-center justify-content-center mb-2">
                    <strong class="number" data-number="<?= $total_company ?>">0</strong>
                </div>
                <span class="caption">Total Perusahaan</span>
            </div>


        </div>
    </div>
</section>



<section class="site-section">
    <div class="container">

        <div class="row mb-5 justify-content-center">
            <div class="col-md-7 text-center">
                <h2 class="section-title mb-2">10 Lowongan Terbaru</h2>
            </div>
        </div>

        <ul class="job-listings mb-5">
            <?php foreach ($lowongan as $view) { ?>
                <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                    <a target="_blank" href="<?= base_url('Pages/detail_lowongan/' . $view->id) ?>"></a>
                    <div class="job-listing-logo">
                        <?php if (empty($view->logo)) { ?>
                            <img src="<?= base_url('assets/image/company.png') ?>" width="100" alt="Image" class="img-fluid">
                        <?php } else { ?>
                            <img src="<?= base_url('assets/image/company_logo/' . $view->logo) ?>" width="100" alt="Image" class="img-fluid">
                        <?php } ?>
                    </div>

                    <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                        <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                            <h2><?= $view->job_title ?></h2>
                            <strong><?= $view->nama_perusahaan ?></strong>
                            <br>
                            <?php $id_post = $view->id;
                            if (!empty($datta)) { ?>
                                <?php foreach ($datta as $id_job) { ?>
                                    <?php if ($id_job == $id_post) { ?>
                                        <strong style="color: blue;">anda sudah melamar</strong>
                                    <?php } ?>
                                <?php } ?>
                            <?php } ?>
                        </div>
                        <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                            <span class="fa fa-clock-o"> </span>
                            <?php
                            $post = $view->tgl_posting;
                            $tgl_post = new DateTime($post);
                            $hari_ini = new DateTime("today");
                            if ($tgl_post > $hari_ini) {
                                exit("0 tahun 0 bulan 0 hari");
                            }
                            // $h = $hari_ini->diff($tgl_post)->h;
                            $d = $hari_ini->diff($tgl_post)->d;
                            $m = $hari_ini->diff($tgl_post)->m;
                            $y = $hari_ini->diff($tgl_post)->y;
                            ?>
                            <?php if ($d == 0) {
                                echo 'beberapa waktu yang lalu';
                            } elseif ($d > 0) {
                                echo $d . ' hari yang lalu';
                            } elseif ($m > 0) {
                                echo $m . ' bulan yang lalu';
                            } elseif ($y > 0) {
                                echo $y . ' tahun yang lalu';
                            }
                            ?>
                            <!-- <?= date("d-m-Y", strtotime($view->tgl_posting)) ?> -->
                        </div>
                        <div class="">
                            <span class="fa fa-map-maker"></span><?= $view->kota ?>, <?= $view->provinsi ?>
                        </div>
                        <div class="job-listing-meta">
                            <?php if ($view->status == '0') { ?>
                                <span class="badge badge-success">Aktif</span>
                            <?php } ?>
                            <?php if ($view->status == '1') { ?>
                                <span class="badge badge-danger">Non Aktif</span>
                            <?php } ?>
                            <!-- <a href="" data-toggle="modal" title="Edit" class="btn btn-primary" style="color: white;"><i class="fa fa-edit"></i></a> -->
                        </div>
                    </div>
                </li>
            <?php } ?>
        </ul>
    </div>
</section>

<section class="py-5 bg-image overlay-primary fixed overlay" style="background-image: url('images/hero_1.jpg');">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h2 class="text-white">Ingin mendaftar lowongan ?</h2>
                <p class="mb-0 text-white lead">Daftarkan diri anda secara gratis.</p>
            </div>
            <div class="col-md-3 ml-auto">
                <a href="<?= base_url('Auth/register') ?>" class="btn btn-warning btn-block btn-lg">Daftar Disini</a>
            </div>
        </div>
    </div>
</section>


<section class="site-section py-4">
    <div class="container">

        <div class="row align-items-center">
            <div class="col-12 text-center mt-4 mb-5">
                <div class="row justify-content-center">
                    <div class="col-md-7">
                        <h2 class="section-title mb-2">Perusahaan</h2>
                        <p class="lead">Berikut merupakan beberapa perusahaan yang terdaftar pada search job.</p>
                    </div>
                </div>

            </div>
            <?php foreach ($company as $view) { ?>
                <div class="col-6 col-lg-3 col-md-6 text-center">
                    <?php if (empty($view->logo)) { ?>
                        <img src="<?= base_url('assets/image/company.png') ?>" title="<?= $view->nama_perusahaan ?>" alt="Image" class="img-fluid logo-1">
                    <?php } else { ?>
                        <img src="<?= base_url('assets/image/company_logo/' . $view->logo) ?>" title="<?= $view->nama_perusahaan ?>" alt="Image" class="img-fluid logo-1">
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php $this->load->view('users/partials/footer') ?>