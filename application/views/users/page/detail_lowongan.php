<?php $this->load->view('users/partials/header') ?>
<section class="section-hero overlay inner-page bg-image" style="background-image: url(<?= base_url('assets/image/background.png') ?>);" id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="text-white font-weight-bold">Detail Lowongan</h1>
                <div class="custom-breadcrumbs">
                    <a href="#">Home</a> <span class="mx-2 slash">/</span>
                    <span class="text-white"><strong>Detail Lowongan</strong></span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="site-section">
    <div class="container">
        <div class="row align-items-center mb-5">
            <div class="col-lg-8 mb-4 mb-lg-0">
                <div class="d-flex align-items-center">
                    <div class="border p-2 d-inline-block mr-3 rounded">
                        <img src="<?= base_url('assets/image/company_logo/' . $job->logo) ?>" height="100" width="100" alt="Image">
                    </div>
                    <div>
                        <h2><?= $job->job_title ?></h2>
                        <div>
                            <span class="ml-0 mr-2 mb-2"><span class="icon-briefcase mr-2"></span><?= $job->nama_perusahaan ?></span>
                            <span class="m-2"><span class="icon-room mr-2"></span><?= $job->city ?>, <?= $job->provinces ?></span>
                            <br>
                            <span class="m-2"><span class="icon-calendar-o mr-2"></span><span class="text-primary"><?= date('d F Y', strtotime($job->tgl_posting)) ?></span></span>
                            <br>
                            <?php if (!empty($job->rentang_gaji && $job->rentang_gaji2)) { ?>
                                <span class="m-2"><span class="fa fa-money"></span><span class="text-primary"><?= 'Rp.' . number_format($job->rentang_gaji) . ' - ' . number_format($job->rentang_gaji2) ?></span></span>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-6">
                        <?php if ($bookmark == NULL) { ?>
                            <a href="<?= base_url('Pages/simpan_bookmark/' . $job->id) ?>" class="btn btn-block btn-info btn-md"><span class="icon-bookmark mr-2 "></span>Simpan</a>
                        <?php } else { ?>
                            <a href="<?= base_url('Pages/batalkan_bookmark?id=' . $bookmark->id . '&id_job=' . $job->id) ?>" class="btn btn-block btn-info btn-md"><span class="icon-bookmark mr-2 text-danger"></span>Sudah Simpan</a>
                        <?php } ?>
                    </div>
                    <div class="col-6">
                        <a href="<?= base_url('Pages/lamar_pekerjaan/' . $job->id) ?>" class="btn btn-block btn-primary btn-md">Lamar Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="mb-5">
                    <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-align-left mr-3"></span>Deskripsi Pekerjaan</h3>
                    <?= $job->deskripsi_job ?>
                </div>
                <?php if (!empty($job->benefit)) { ?>
                    <div class="mb-5">
                        <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-rocket mr-3"></span>Benefit</h3>
                        <?= $job->benefit ?>
                    </div>
                <?php } ?>
                <hr>
                <div class="mb-5">
                    <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-building mr-3"></span>Deskripsi Perusahaan</h3>
                    <?= $job->deskripsi ?>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="bg-light p-3 border rounded mb-4">
                    <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Informasi Tambahan</h3>
                    <ul class="list-unstyled pl-3 mb-0">
                        <li class="mb-2"><strong class="text-black">Tingkat Pekerjaan:</strong> <?= $job->tingkat_kerja ?></li>
                        <?php if (!empty($job->updated_at)) { ?>
                            <li class="mb-2"><strong class="text-black">Diperbaharui Pada:</strong> <?= date('d F Y', strtotime($job->updated_at)) ?></li>
                        <?php } ?>
                        <li class="mb-2"><strong class="text-black">Bidang Kerja:</strong> <?= $job->bidang_pekerjaan ?></li>
                        <li class="mb-2"><strong class="text-black">Pengalaman:</strong> <?= $job->pengalaman ?></li>
                        <li class="mb-2"><strong class="text-black">Jenis Pekerjaan:</strong> <?= $job->jenis_kerja ?></li>
                        <li class="mb-2"><strong class="text-black">Kualifikasi:</strong> <?= $job->kualifikasi ?></li>
                        <li class="mb-2"><strong class="text-black">Waktu Proses:</strong> <?= $job->waktu_proses ?></li>
                    </ul>
                </div>
                <div class="bg-light p-3 border rounded mb-4">
                    <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Informasi Perusahaan</h3>
                    <ul class="list-unstyled pl-3 mb-0">
                        <li class="mb-2"><strong class="text-black">Alamat:</strong> <?= $job->alamat ?></li>
                        <!-- <li class="mb-2"><strong class="text-black">Situs:</strong> <a href="http://<?= $job->situs ?>"><?= $job->situs ?></a></li>
                        <li class="mb-2"><strong class="text-black">No Telepon:</strong> <?= $job->no_telp ?></li> -->
                        <li class="mb-2"><strong class="text-black">Industri:</strong> <?= $job->bidang_perusahaan ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    // let link = text.link("<?= base_url('Auth') ?>");
    <?php if ($this->session->flashdata('login_dulu')) : ?>
        Swal.fire({
            icon: 'info',
            title: 'Anda harus login akun terlebih dahulu!',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Login / Register',
            denyButtonText: `Register`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                window.location = "<?= base_url('Auth') ?>";
            } else if (result.isDenied) {
                Swal.fire('Changes are not saved', '', 'info')
            }
        })
    <?php elseif ($this->session->flashdata('lengkapi_profile')) : ?>
        Swal.fire({
            icon: 'warning',
            title: 'Perhatian!',
            text: 'Lengkapi profile anda terlebih dahulu',
            showConfirmButton: true,
            // timer: 1500
        })

    <?php elseif ($this->session->flashdata('lengkapi_pendidikan')) : ?>
        Swal.fire({
            icon: 'warning',
            title: 'Perhatian!',
            text: 'Lengkapi pendidikan anda terlebih dahulu',
            showConfirmButton: true,
            // timer: 1500
        })

    <?php elseif ($this->session->flashdata('lengkapi_keterampilan')) : ?>
        Swal.fire({
            icon: 'warning',
            title: 'Perhatian!',
            text: 'Lengkapi keterampilan anda terlebih dahulu',
            showConfirmButton: true,
            // timer: 1500
        })

    <?php elseif ($this->session->flashdata('lengkapi_resum')) : ?>
        Swal.fire({
            icon: 'warning',
            title: 'Perhatian!',
            text: 'Unggah / Upload resum anda terlebih dahulu',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php endif ?>
</script>
<?php $this->load->view('users/partials/footer') ?>