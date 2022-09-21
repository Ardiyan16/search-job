<?php $this->load->view('users/partials/header') ?>
<section class="section-hero overlay inner-page bg-image" style="background-image: url(<?= base_url('assets/image/background.png') ?>);" id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="text-white font-weight-bold">Detail Perusahaan</h1>
                <div class="custom-breadcrumbs">
                    <a href="#">Company</a> <span class="mx-2 slash">/</span>
                    <span class="text-white"><strong><?= $view->nama_perusahaan ?></strong></span>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="site-section block__18514" id="next-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mr-auto">
                <div class="border p-4 rounded">
                    <ul class="list-unstyled block__47528 mb-0">
                        <li><span active>
                                <div class="col">
                                    <?php if ($view->logo == NULL) { ?>
                                        <a href="<?= base_url('assets/image/company.png') ?>" data-fancybox="gallery"><img src="<?= base_url('assets/image/user.png') ?>" alt="Image" title="logo perusahaan" class="img-fluid"></a>
                                    <?php } else { ?>
                                        <a href="<?= base_url('assets/image/company_logo/' . $view->logo) ?>" data-fancybox="gallery"><img src="<?= base_url('assets/image/company_logo/' . $view->logo) ?>" alt="Image" title="logo perusahaan" class="img-fluid"></a>
                                    <?php } ?>
                                </div>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="border p-4 rounded">
                    <div class="mb-4">
                        <h3 class="mb-4 h4 border-bottom"><?= $view->nama_perusahaan ?></h3>
                        <p>Bidang &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $view->bidang_perusahaan ?></p>
                        <p>Alamat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $view->alamat ?></p>
                        <p>Situs &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;: <a href="<?= $view->situs ?>"><?= $view->situs ?></a></p>
                        <p>Ukuran &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $view->ukuran ?><br>
                            Perusahaan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view('users/partials/footer') ?>