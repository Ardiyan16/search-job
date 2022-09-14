<?php $this->load->view('users/partials/header') ?>

<section class="section-hero overlay inner-page bg-image" style="background-image: url(<?= base_url('assets/image/background-home.png') ?>);" id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="text-white font-weight-bold">Pendidikan</h1>
                <div class="custom-breadcrumbs">
                    <a href="#"><?= $this->session->userdata('nama_depan') ?></a> <span class="mx-2 slash">/</span>
                    <span class="text-white"><strong>Pendidikan</strong></span>
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
                        <li><span class="active">Pendidikan</span></li>
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
                    <h3 class="mb-4 h4 border-bottom">Pendidikan Anda</h3>
                    <?php if (empty($pendidikan)) { ?>
                        <a href="<?= base_url('Pages/tambah_pendidikan') ?>"><i class="fa fa-plus-circle"></i> Tambah Pendidikan</a>
                    <?php } ?>
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
                        <div class="col-lg-3">
                            <p><?= $pendidikan->bulan ?> <?= $pendidikan->tahun ?></p>
                        </div>
                        <div class="">
                            <a href="<?= base_url('Pages/edit_pendidikan/' . $pendidikan->id) ?>" title="edit"><i class="fa fa-edit"></i></a>
                            <a href="<?= base_url('Pages/delete_pendidikan/' . $pendidikan->id) ?>" class="link-hapus" title="hapus"><i class="fa fa-trash"></i></a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<script>
    <?php if ($this->session->flashdata('success_create')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'data pendidikan anda berhasil ditambahkan',
            showConfirmButton: true,
            // timer: 1500
        })

    <?php elseif ($this->session->flashdata('success_update')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'data pendidikan anda berhasil diupdate',
            showConfirmButton: true,
            // timer: 1500
        })

    <?php elseif ($this->session->flashdata('success_delete')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'data pendidikan anda berhasil dihapus',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php endif ?>

    $('.link-hapus').on('click', function(e) {
        e.preventDefault();
        const link = $(this).attr('href');

        Swal.fire({
            title: 'Apakah anda yakin ?',
            text: "Data pendidikan akan dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#828282',
            confirmButtonText: 'Hapus Data!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href= link;
            }
        })

    })
</script>
<?php $this->load->view('users/partials/footer') ?>