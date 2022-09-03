<?php $this->load->view('company/partials/header') ?>

<section class="section-hero overlay inner-page bg-image" style="background-image: url(<?= base_url('assets/image/background.png') ?>);" id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="text-white font-weight-bold">Profile Perusahaan</h1>
                <div class="custom-breadcrumbs">
                    <a href="#">Home</a> <span class="mx-2 slash">/</span>
                    <span class="text-white"><strong>Profile Company</strong></span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="site-section pb-0 portfolio-single" id="next-section">

    <div class="container">

        <div class="row mb-5 mt-5">

            <div class="col-lg-4">
                <figure>
                    <?php if ($view->logo == NULL) { ?>
                        <a href="<?= base_url('assets/image/company.png') ?>" data-fancybox="gallery"><img src="<?= base_url('assets/image/company.png') ?>" alt="Image" class="img-fluid"></a>
                    <?php } else { ?>
                        <a href="<?= base_url('assets/image/company_logo/' . $view->logo) ?>" data-fancybox="gallery"><img src="<?= base_url('assets/image/company_logo/' . $view->logo) ?>" alt="Image" class="img-fluid"></a>
                    <?php } ?>
                </figure>
            </div>

            <div class="col-lg-8 ml-auto h-100 jm-sticky-top">


                <div class="mb-4">
                    <h3 class="mb-4 h4 border-bottom">Profile Lengkap Perusahaan</h3>
                    <a href="<?= base_url('Company/edit_profile') ?>" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit / Lengkapi Profile</a>
                </div>

                <div class="row mb-4">
                    <div class="col-sm-12 col-md-12 mb-4 col-lg-12">
                        <strong class="d-block text-black">Nama Perusahaan</strong>
                        <?= $view->nama_perusahaan ?>
                    </div>
                    <div class="col-sm-12 col-md-12 mb-4 col-lg-12">
                        <strong class="d-block text-black">Deskripsi Perusahaan</strong>
                        <?php if ($view->deskripsi == null) { ?>
                            <?= 'Deskripsi belum di isikan' ?>
                        <?php } else { ?>
                            <?= $view->deskripsi ?>
                        <?php } ?>
                    </div>
                    <div class="col-sm-12 col-md-12 mb-4 col-lg-12">
                        <strong class="d-block text-black">No Telepon</strong>
                        <?= $view->no_telp ?>
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
                        <strong class="d-block text-black">Kota</strong>
                        <?php if ($view->kota == null) { ?>
                            <?= 'Kota belum di isikan' ?>
                        <?php } else { ?>
                            <?= $view->kota ?>
                        <?php } ?>
                    </div>
                    <div class="col-sm-12 col-md-12 mb-4 col-lg-12">
                        <strong class="d-block text-black">Ukuran Perusahaan</strong>
                        <?php if ($view->jumlah_karyawan == null) { ?>
                            <?= 'Ukuran Perusahaan belum di isikan' ?>
                        <?php } else { ?>
                            <?= $view->ukuran ?>
                        <?php } ?>
                    </div>
                    <div class="col-sm-12 col-md-12 mb-4 col-lg-12">
                        <strong class="d-block text-black">Email</strong>
                        <?= $view->email ?>
                    </div>
                    <div class="col-sm-12 col-md-12 mb-4 col-lg-12">
                        <strong class="d-block text-black">Penanggung Jawab</strong>
                        <?= $view->nama ?>
                    </div>
                    <div class="col-sm-12 col-md-12 mb-4 col-lg-12">
                        <strong class="d-block text-black mb-3">Website URL</strong>
                        <?php if ($view->situs == null) {
                            echo 'Situs belum di isikan';
                        } else { ?>
                            <a href="#"><?= $view->situs ?></a>
                        <?php } ?>
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
            text: 'profile perusahaan berhasil diupdate',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php endif ?>
</script>
<?php $this->load->view('company/partials/footer') ?>