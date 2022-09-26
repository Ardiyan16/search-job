<?php $this->load->view('company/partials/header') ?>
<section class="section-hero overlay inner-page bg-image" style="background-image: url(<?= base_url('assets/image/background.png') ?>);" id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="text-white font-weight-bold">Daftar Postingan Anda</h1>
                <div class="custom-breadcrumbs">
                    <a href="#">Home</a> <span class="mx-2 slash">/</span>
                    <span class="text-white"><strong>Posting Lowongan Anda</strong></span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="site-section" id="next">
    <div class="container">

        <div class="row mb-5 justify-content-center">
            <div class="col-md-7 text-center">
                <h2 class="section-title mb-2"><?= $jml_loker ?> Lowongan Perusahaan Anda</h2>
            </div>
        </div>
        <a href="<?= base_url('Company/post_job') ?>" class="btn btn-primary mb-3"><i class="fa fa-plus-circle"></i> Tambah Lowongan</a>
        <ul class="job-listings mb-5">
            <?php foreach ($lowongan as $view) { ?>
                <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                    <a href="<?= base_url('Company/detail_lowongan/' . $view->id) ?>"></a>
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
                        </div>
                        <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                            <span class="fa fa-calendar"> <?= date("d-m-Y", strtotime($view->tgl_posting)) ?></span>
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
        <nav aria-label="Page navigation example">
            <?php echo $this->pagination->create_links(); ?>
        </nav>

    </div>
</section>
<script>
    <?php if ($this->session->flashdata('success_post_job')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'Lowongan berhasil diposting',
            showConfirmButton: true,
            // timer: 1500
        })


    <?php elseif ($this->session->flashdata('lamaran_ditutup')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'Postingan lamaran berhasil ditutup',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php endif ?>
</script>
<?php $this->load->view('company/partials/footer') ?>