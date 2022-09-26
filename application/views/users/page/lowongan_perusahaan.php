<?php $this->load->view('users/partials/header') ?>
<section class="section-hero overlay inner-page bg-image" style="background-image: url(<?= base_url('assets/image/background.png') ?>);" id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="text-white font-weight-bold">Lowongan Pekerjaan</h1>
                <div class="custom-breadcrumbs">
                    <a href="#"> <?= $view->nama_perusahaan ?></a><span class="mx-2 slash">/</span>
                    <span class="text-white"><strong>Lowongan</strong></span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="site-section" id="next">
    <div class="container">

        <div class="row mb-5 justify-content-center">
            <div class="col-md-7 text-center">
                <h2 class="section-title mb-2"><?= $jumlah_lowongan ?> Lowongan Perusahaan <?= $view->nama_perusahaan ?></h2>
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
                            <!-- <?= $h . ',' . $d . ',' . $m . ',' . $y ?> -->
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

<?php $this->load->view('users/partials/footer') ?>