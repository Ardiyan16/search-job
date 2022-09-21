<?php $this->load->view('admin/partials/header_admin.php') ?>
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Detail Pelamar</h4>
                    <p class="mb-0"><?= $view->nama_depan ?> <?= $view->nama_belakang ?></p>
                    <br>
                    <a href="<?= base_url('Admin/users') ?>" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Pelamar</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Detail Pelamar</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="profile">
                    <div class="profile-head">
                        <div class="photo-content">
                            <div class="cover-photo"></div>
                            <div class="profile-photo">
                                <?php if ($view->picture == NULL) { ?>
                                    <a href="<?= base_url('assets/image/user.png') ?>" data-fancybox="gallery"><img src="<?= base_url('assets/image/user.png') ?>" height="100" width="100" alt="Image" title="foto anda" class="img-fluid"></a>
                                <?php } else { ?>
                                    <img src="<?= base_url('assets/image/picture_users/' . $view->picture) ?>" height="100" width="100" class="img-fluid rounded-circle" alt="">
                                <?php } ?>
                            </div>
                        </div>
                        <div class="profile-info">
                            <div class="row justify-content-center">
                                <div class="col-xl-8">
                                    <div class="row">
                                        <div class="col-xl-4 col-sm-4 border-right-1 prf-col">
                                            <div class="profile-name">
                                                <h4 class="text-primary"><?= $view->nama_depan ?> <?= $view->nama_belakang ?></h4>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-sm-4 border-right-1 prf-col">
                                            <div class="profile-email">
                                                <h4 class="text-muted"><?= $view->email ?></h4>
                                            </div>
                                        </div>
                                        <!-- <div class="col-xl-4 col-sm-4 prf-col">
                                                    <div class="profile-call">
                                                        <h4 class="text-muted">(+1) 321-837-1030</h4>
                                                        <p>Phone No.</p>
                                                    </div>
                                                </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-tab">
                            <div class="custom-tab-1">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a href="#profile" data-toggle="tab" class="nav-link active show">Profile</a>
                                    </li>
                                    <li class="nav-item"><a href="#pendidikan" data-toggle="tab" class="nav-link">Pendidikan</a>
                                    </li>
                                    <li class="nav-item"><a href="#pengalaman" data-toggle="tab" class="nav-link">Pengalaman</a>
                                    </li>
                                    <li class="nav-item"><a href="#keterampilan" data-toggle="tab" class="nav-link">Keterampilan</a>
                                    </li>
                                    <li class="nav-item"><a href="#info" data-toggle="tab" class="nav-link">Informasi Tambahan</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="profile" class="tab-pane fade active show">
                                        <div class="profile-personal-info mt-5">
                                            <h4 class="text-primary mb-4">Profile Pelamar</h4>
                                            <div class="row mb-4">
                                                <div class="col-3">
                                                    <h5 class="f-w-500">Nama Lengkap <span class="pull-right">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-9"><span><?= $view->nama_depan ?> <?= $view->nama_belakang ?></span>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-3">
                                                    <h5 class="f-w-500">Email <span class="pull-right">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-9"><span><?= $view->email ?></span>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-3">
                                                    <h5 class="f-w-500">Tanggal Lahir <span class="pull-right">:</span></h5>
                                                </div>
                                                <div class="col-9"><span><?php if (empty($view->tgl_lahir)) {
                                                                                echo 'user belum mengisikan tanggal lahir';
                                                                            } else { ?>
                                                            <?= date('d F Y', strtotime($view->tgl_lahir)) ?>
                                                        <?php } ?>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-3">
                                                    <h5 class="f-w-500">Usia <span class="pull-right">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-9"><span>
                                                        <?php if (empty($view->tgl_lahir)) {
                                                            echo 'user belum mengisikan usia';
                                                        } else { ?>
                                                            <?php
                                                            $tanggal_lahir = $view->tgl_lahir;
                                                            $ulang_tahun = new DateTime($tanggal_lahir);
                                                            $hari_ini = new DateTime("today");
                                                            if ($ulang_tahun > $hari_ini) {
                                                                exit("0 tahun 0 bulan 0 hari");
                                                            }
                                                            $y = $hari_ini->diff($ulang_tahun)->y;
                                                            ?> <?= $y . ' Tahun' ?></span>
                                                <?php } ?>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-3">
                                                    <h5 class="f-w-500">Alamat <span class="pull-right">:</span></h5>
                                                </div>
                                                <div class="col-9"><span><?php if (empty($view->alamat)) {
                                                                                echo 'user belum mengisikan alamat';
                                                                            } else { ?>
                                                            <?= $view->alamat ?>
                                                        <?php } ?>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-3">
                                                    <h5 class="f-w-500">Jenis Kelamin <span class="pull-right">:</span></h5>
                                                </div>
                                                <div class="col-9"><span><?php if (empty($view->jenis_kelamin)) {
                                                                                echo 'user belum mengisikan jenis kelamin';
                                                                            } else { ?>
                                                            <?= $view->jenis_kelamin ?>
                                                        <?php } ?></span>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-3">
                                                    <h5 class="f-w-500">Negara / Kebangsaan <span class="pull-right">:</span></h5>
                                                </div>
                                                <div class="col-9"><span><?php if (empty($view->negara)) {
                                                                                echo 'user belum mengisikan negara / kebangsaan';
                                                                            } else { ?>
                                                            <?= $view->negara ?>
                                                        <?php } ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="pendidikan" class="tab-pane fade">
                                        <div class="profile-personal-info mt-5">
                                            <h4 class="text-primary mb-4">Pendidikan Pelamar</h4>
                                            <?php if (empty($pendidikan)) { ?>
                                                <?= '<p>Pendidikan belum di isikan</p>' ?>
                                            <?php } else { ?>
                                                <div class="row">
                                                    <div class="col-8">
                                                        <h3 style="font-weight: bold;"><?= $pendidikan->nama_institusi ?></h3>
                                                        <h5 style="font-weight: bold;"><?= $pendidikan->kualifikasi ?> bidang <?= $pendidikan->bidang_studi ?></h5>
                                                        <p>Lokasi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $pendidikan->kota ?>, <?= $pendidikan->provinsi ?><br>
                                                            Nilai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $pendidikan->nilai ?>

                                                        </p>
                                                    </div>
                                                    <div class="col-4">
                                                        <p><?= $pendidikan->bulan ?> <?= $pendidikan->tahun ?></p>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div id="pengalaman" class="tab-pane fade">
                                        <div class="profile-personal-info mt-5">
                                            <h4 class="text-primary mb-4">Pengalaman Pelamar</h4>
                                            <?php if (empty($pengalaman)) { ?>
                                                <?= '<p>Pengalaman belum di isikan</p>' ?>
                                            <?php } else { ?>
                                                <?php foreach ($pengalaman as $view) { ?>
                                                    <div class="row">
                                                        <div class="col-8">
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
                                                        <div class="col-4">
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
                                    </div>
                                    <div id="keterampilan" class="tab-pane fade">
                                        <div class="profile-personal-info mt-5">
                                            <h4 class="text-primary mb-4">Keterampilan Pelamar</h4>
                                            <?php if (empty($keterampilan)) { ?>
                                                <p>Keterampilan belum diisi</p>
                                            <?php } else { ?>
                                                <?php foreach ($keterampilan as $view) { ?>
                                                    <div class="row">
                                                        <div class="col">
                                                            <p>Keterampilan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $view->keterampilan ?> <br>
                                                                Tingkat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $view->tingkat ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                <?php } ?>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div id="info" class="tab-pane fade">
                                        <div class="profile-personal-info mt-5">
                                            <h4 class="text-primary mb-4">Informasi Tambahan</h4>
                                            <?php if (empty($data)) { ?>
                                                <p>Informasi tambahan belum diisikan</p>
                                            <?php } else { ?>
                                                <p>Gaji yang diharapkan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= 'Rp. ' . number_format($info1->gaji_diharapkan) ?><br>
                                                    Lokasi yang diharapkan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $info1->kota ?>, <?= $info1->provinsi ?><br>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $info2->kota ?>, <?= $info1->provinsi ?><br>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $info3->kota ?>, <?= $info3->provinsi ?><br>
                                                    Informasi lainnya : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    &nbsp;&nbsp;&nbsp;: <?= $info3->informasi_lainnya ?><br>
                                                </p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('admin/partials/footer.php') ?>