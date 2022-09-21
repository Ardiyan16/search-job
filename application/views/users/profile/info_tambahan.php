<?php $this->load->view('users/partials/header') ?>

<section class="section-hero overlay inner-page bg-image" style="background-image: url(<?= base_url('assets/image/background-home.png') ?>);" id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="text-white font-weight-bold">Info tambahan</h1>
                <div class="custom-breadcrumbs">
                    <a href="#"><?= $this->session->userdata('nama_depan') ?></a> <span class="mx-2 slash">/</span>
                    <span class="text-white"><strong>Info tambahan</strong></span>
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
                                    <a href="<?= base_url('Pages/profile') ?>"><?= $view->nama_depan ?> (lihat profile)</a>
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
                        <li><a href="<?= base_url('Pages/kemampuan') ?>">Keterampilan</a></li>
                        <hr>
                        <li><span class="active">Info Tambahan</span></li>
                        <hr>
                        <li><a href="<?= base_url('Pages/resume') ?>">Unggah Resume</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="mb-4">
                    <h3 class="mb-4 h4 border-bottom">Informasi Tambahan</h3>
                    <?php if (empty($data)) { ?>
                        <a href="<?= base_url('Pages/add_info_tambahan') ?>"><i class="fa fa-plus-circle"></i> Tambah Informasi Tambahan</a>
                    <?php } else { ?>
                        <a href="<?= base_url('Pages/edit_info_tambahan/' . $data->id) ?>"><i class="fa fa-pencil"></i> Perbarui Informasi Tambahan</a>
                    <?php } ?>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-10">
                        <?php if (empty($data)) { ?>
                            <p>Informasi tambahan belum diisikan</p>
                        <?php } else { ?>
                            <p>Gaji yang diharapkan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= 'Rp. '. number_format($info1->gaji_diharapkan) ?><br>
                                Lokasi yang diharapkan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $info1->kota ?>, <?= $info1->provinsi ?><br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $info2->kota ?>, <?= $info1->provinsi?><br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $info3->kota ?>, <?= $info3->provinsi?><br>
                                Informasi lainnya : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;: <?= $info3->informasi_lainnya ?><br>
                            </p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    <?php if ($this->session->flashdata('success_create')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'informasi tambahan berhasil disimpan',
            showConfirmButton: true,
            // timer: 1500
        })

    <?php elseif ($this->session->flashdata('success_delete')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'informasi tambahan berhasil dihapus',
            showConfirmButton: true,
            // timer: 1500
        })

    <?php elseif ($this->session->flashdata('success_update')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'informasi tambahan berhasil diperbarui',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php endif ?>
</script>
<?php $this->load->view('users/partials/footer') ?>