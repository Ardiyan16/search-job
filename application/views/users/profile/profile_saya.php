<?php $this->load->view('users/partials/header') ?>

<section class="section-hero overlay inner-page bg-image" style="background-image: url(<?= base_url('assets/image/background-home.png') ?>);" id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="text-white font-weight-bold">Profile Saya</h1>
                <div class="custom-breadcrumbs">
                    <a href="#"><?= $this->session->userdata('nama_depan') ?></a> <span class="mx-2 slash">/</span>
                    <span class="text-white"><strong>Profile Saya</strong></span>
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
                                    <a href="<?= base_url('Pages/profile') ?>"><?= $view->nama_depan  ?> (lihat profile)</a>
                                </div>
                            </span>
                        </li>
                        <hr>
                        <li><a href="<?= base_url('Pages/pendidikan') ?>">Pendidikan</a></li>
                        <hr>
                        <li><a href="<?= base_url('Pages/pengalaman') ?>">Pengalaman</a></li>
                        <hr>
                        <li><span class="active">Profile Saya</span></li>
                        <hr>
                        <li><a href="<?= base_url('Pages/kemampuan') ?>">Keterampilan</a></li>
                        <hr>
                        <li><a href="<?= base_url('Pages/info_tambahan') ?>">Info Tambahan</a></li>
                        <hr>
                        <li><a href="<?= base_url('Pages/resume') ?>">Unggah Resume</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="mb-4">
                    <h3 class="mb-4 h4 border-bottom">Profile Lengkap Anda</h3>
                    <a href="<?= base_url('Pages/edit_profile') ?>"><i class="fa fa-pencil"></i> Perbarui Profile</a>
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
                            <?php
                            $tanggal_lahir = $view->tgl_lahir;
                            $ulang_tahun = new DateTime($tanggal_lahir);
                            $hari_ini = new DateTime("today");
                            if ($ulang_tahun > $hari_ini) {
                                exit("0 tahun 0 bulan 0 hari");
                            }
                            $y = $hari_ini->diff($ulang_tahun)->y;
                            ?>
                            <?= date('d F Y', strtotime($view->tgl_lahir)) ?> (<?= 'Usia ' . $y . ' Tahun' ?>)
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
                    <!-- <div class="col-sm-12 col-md-12 mb-4 col-lg-12">
                        <strong class="d-block text-black">Lokasi</strong>
                        <?php if ($view->kota == null) { ?>
                            <?= 'Lokasi belum di isikan' ?>
                        <?php } else { ?>
                            <?= $view->kota ?>
                        <?php } ?>
                    </div> -->
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
            </div>
        </div>
    </div>
    </div>
</section>
<script>
    <?php if ($this->session->flashdata('success_update')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'profile anda berhasil diperbarui',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php endif ?>
</script>
<?php $this->load->view('users/partials/footer') ?>