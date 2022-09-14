<?php $this->load->view('users/partials/header') ?>

<section class="section-hero overlay inner-page bg-image" style="background-image: url(<?= base_url('assets/image/background-home.png') ?>);" id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="text-white font-weight-bold">Profile</h1>
                <div class="custom-breadcrumbs">
                    <a href="#"><?= $this->session->userdata('nama_depan') ?></a> <span class="mx-2 slash">/</span>
                    <span class="text-white"><strong>Profile</strong></span>
                </div>
            </div>
        </div>
    </div>
    <a href="#next" class="scroll-button smoothscroll">
        <span class=" icon-keyboard_arrow_down"></span>
    </a>
</section>

<section class="site-section block__18514" id="next-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 mr-auto">
                <div class="border p-4 rounded">
                    <ul class="list-unstyled block__47528 mb-0">
                        <li><span active>
                                <div class="col-lg-4">
                                    <?php if ($view->picture == NULL) { ?>
                                        <a href="<?= base_url('assets/image/user.png') ?>" data-fancybox="gallery"><img src="<?= base_url('assets/image/user.png') ?>" height="100" width="100" alt="Image" title="foto anda" class="img-fluid"></a>
                                    <?php } else { ?>
                                        <a href="<?= base_url('assets/image/picture_users/' . $view->picture) ?>" data-fancybox="gallery"><img src="<?= base_url('assets/image/picture_users/' . $view->picture) ?>" height="100" width="100" alt="Image" title="foto anda" class="img-fluid"></a>
                                    <?php } ?>
                                </div>
                                <div class="col-lg-8">
                                    <p><?= $view->nama_depan ?> (lihat profile)</p>
                                </div>
                            </span>
                        </li>
                        <hr>
                        <li><a href="<?= base_url('Pages/pendidikan') ?>">Pendidikan</a></li>
                        <hr>
                        <li><a href="<?= base_url('Pages/pengalaman') ?>">Pengalaman</a></li>
                        <hr>
                        <li><a href="<?= base_url('Pages/profile_saya') ?>">Profile Saya</a></li>
                        <hr>
                        <li><a href="<?= base_url('Pages/kemampuan') ?>">Kemampuan</a></li>
                        <hr>
                        <li><a href="<?= base_url('Pages/info_tambahan') ?>">Info Tambahan</a></li>
                        <hr>
                        <li><a href="<?= base_url('Pages/resume') ?>">Unggah Resume</a></li>
                        <hr>
                        <li><a href="<?= base_url('Pages/bahasa') ?>">Bahasa</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="mb-4">
                    <h3 class="mb-4 h4 border-bottom">Profile Lengkap Anda</h3>
                    <!-- <a href="<?= base_url('Company/edit_profile') ?>" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit / Lengkapi Profile</a> -->
                </div>
                <?php if ($view->picture == NULL) { ?>
                    <a href="<?= base_url('assets/image/user.png') ?>" data-fancybox="gallery"><img src="<?= base_url('assets/image/user.png') ?>" height="100" width="100" alt="Image" title="foto anda" class="img-fluid"></a>
                <?php } else { ?>
                    <a href="<?= base_url('assets/image/picture_users/' . $view->picture) ?>" data-fancybox="gallery"><img src="<?= base_url('assets/image/picture_users/' . $view->picture) ?>" height="100" width="100" alt="Image" title="foto anda" class="img-fluid"></a>
                <?php } ?>
                <br>

                <div class="row mb-4 mt-3">
                    <div class="col-sm-12 col-md-12 mb-4 col-lg-12">
                        <strong class="d-block text-black">Nama Lengkap</strong>
                        <?= $view->nama_depan ?> <?= $view->nama_belakang ?>
                    </div>
                    <div class="col-sm-12 col-md-12 mb-4 col-lg-12">
                        <strong class="d-block text-black">Email</strong>
                        <?= $view->email ?>
                    </div>
                    <div class="col-sm-12 col-md-12 mb-4 col-lg-12">
                        <strong class="d-block text-black">Tanggal Lahir</strong>
                        <?php if ($view->tgl_lahir == null) { ?>
                            <?= 'Tanggal lahir belum di isikan' ?>
                        <?php } else { ?>
                            <?= date('d F Y', strtotime($view->tgl_lahir)) ?>
                        <?php } ?>
                    </div>
                    <div class="col-sm-12 col-md-12 mb-4 col-lg-12">
                        <strong class="d-block text-black">No Telepon</strong>
                        <?php if ($view->no_telp == null) { ?>
                            <?= 'No telepon belum di isikan' ?>
                        <?php } else { ?>
                            <?= $view->no_telp ?>
                        <?php } ?>
                    </div>
                    <div class="col-sm-12 col-md-12 mb-4 col-lg-12">
                        <strong class="d-block text-black">Alamat</strong>
                        <?php if ($view->alamat == null) { ?>
                            <?= 'Alamat belum di isikan' ?>
                        <?php } else { ?>
                            <?= $view->alamat ?>
                        <?php } ?>
                    </div>
                    <div class="col-sm-12 col-md-12 mb-4 col-lg-12">
                        <strong class="d-block text-black">Lokasi</strong>
                        <?php if ($view->kota == null) { ?>
                            <?= 'Lokasi belum di isikan' ?>
                        <?php } else { ?>
                            <?= $view->kota ?>
                        <?php } ?>
                    </div>
                    <div class="col-sm-12 col-md-12 mb-4 col-lg-12">
                        <strong class="d-block text-black">Jenis Kelamin</strong>
                        <?php if ($view->jenis_kelamin == null) { ?>
                            <?= 'Jenis Kelamin belum di isikan' ?>
                        <?php } else { ?>
                            <?= $view->jenis_kelamin ?>
                        <?php } ?>
                    </div>
                    <div class="col-sm-12 col-md-12 mb-4 col-lg-12">
                        <strong class="d-block text-black">Negara / Kebangsaan</strong>
                        <?php if ($view->negara == null) { ?>
                            <?= 'Negara / Kebangsaan belum di isikan' ?>
                        <?php } else { ?>
                            <?= $view->negara ?>
                        <?php } ?>
                    </div>
                </div>
                <div class="mb-4">
                    <h3 class="mb-4 h4 border-bottom">Pendidikan Anda</h3>
                </div>
                <?php if (empty($pendidikan)) { ?>
                    <?= '<p>Pendidikan belum di isikan</p>' ?>
                <?php } else { ?>
                    <div class="row">
                        <div class="col-lg-8">
                            <h3 style="font-weight: bold;"><?= $pendidikan->nama_institusi ?></h3>
                            <h5 style="font-weight: bold;"><?= $pendidikan->kualifikasi ?> bidang <?= $pendidikan->bidang_studi ?></h5>
                            <p>Lokasi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $pendidikan->kota ?>, <?= $pendidikan->provinsi ?><br>
                                Nilai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $pendidikan->nilai ?>

                            </p>
                        </div>
                        <div class="col-lg-4">
                            <p><?= $pendidikan->bulan ?> <?= $pendidikan->tahun ?></p>
                        </div>
                    </div>
                <?php } ?>
                <div class="mb-4 mt-5">
                    <h3 class="mb-4 h4 border-bottom">Pengalaman Anda</h3>
                    <?php if (empty($pengalaman)) { ?>
                        <?= '<p>Pengalaman belum di isikan</p>' ?>
                    <?php } else { ?>
                        <?php foreach ($pengalaman as $view) { ?>
                            <div class="row">
                                <div class="col-lg-8">
                                    <h3 style="font-weight: bold;"><?= $view->posisi ?></h3>
                                    <h5 style="font-weight: bold;"><?= $view->nama_perusahaan ?> | <?= $view->kota ?>,<?= $view->provinsi ?></h5>
                                    <p> Bidang &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $view->spesialis ?><br>
                                        Keahlian &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $view->bidang_pekerjaan ?><br>
                                        Industri &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $view->bidang_perusahaan ?><br>
                                        Gaji &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php if (!empty($view->gaji)) { ?>
                                            <?= 'Rp. ' . number_format($view->gaji) ?>
                                        <?php } else {
                                                                                                                                                    echo 'Anda tidak menampilkan gaji';
                                                                                                                                                }  ?>
                                    </p>
                                </div>
                                <div class="col-lg-4">
                                    <p style="font-size: 15px;"><?= date('F Y', strtotime($view->awal)) ?> - <?= date('F Y', strtotime($view->akhir)) ?></p>
                                    <?php
                                    $tgl_awal = $view->awal;
                                    $tgl_akhir = $view->akhir;
                                    $lama_kerja = new DateTime($tgl_awal);
                                    $tgl_akhir = new DateTime($tgl_akhir);
                                    if ($lama_kerja > $tgl_akhir) {
                                        exit("0 tahun 0 bulan 0 hari");
                                    }
                                    $y = $tgl_akhir->diff($lama_kerja)->y;
                                    $m = $tgl_akhir->diff($lama_kerja)->m;
                                    // $d = $tgl_akhir->diff($lama_kerja)->d;

                                    // echo "</br>";
                                    // echo "<div class='hasil'> HASIL perhitungan usia anda lahir pada : " . date('d-m-Y', strtotime($tanggal_lahir)) . "&nbsp adalah : ";
                                    // echo $y . " tahun " . $m . " bulan " . $d . " hari";
                                    // echo "</div>";
                                    ?>
                                    <p>(<?= $y . " tahun " . $m . " bulan " ?>)</p>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
                <div class="mb-4 mt-5">
                    <h3 class="mb-4 h4 border-bottom">Informasi Tambahan</h3>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $this->load->view('users/partials/footer') ?>