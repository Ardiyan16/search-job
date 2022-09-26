<?php $this->load->view('users/partials/header') ?>
<section class="section-hero overlay inner-page bg-image" style="background-image: url(<?= base_url('assets/image/background-home.png') ?>);" id="home-section">
    <div class="container">
        <div class="row">
            <div class="col">
                <form method="post" action="<?= base_url('Pages/search_company') ?>" class="search-jobs-form">
                    <div class="row mb-5">
                        <div class="col-12 col-sm-6 col-md-6 col-lg-9 mb-4 mb-lg-0">
                            <input type="text" class="form-control form-control-lg" value="<?= $this->session->userdata('company') ?>" name="company" placeholder="Nama Perusahaan">
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                            <button type="submit" class="btn btn-primary btn-lg btn-block text-white btn-search"><span class="icon-search icon mr-2"></span>Cari Perusahaan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <a href="#next" class="scroll-button smoothscroll">
        <span class=" icon-keyboard_arrow_down"></span>
    </a>
</section>
<section class="site-section services-section bg-light block__62849" id="next-section">
    <div class="container">
        <div class="row mb-5 justify-content-center">
            <div class="col-md-7 text-center">
                <h2 class="section-title mb-2">Daftar Perusahaan</h2>
            </div>
        </div>

        <div class="row">
            <?php foreach ($company as $view) { ?>
                <div class="col-6 col-md-6 col-lg-4 mb-4 mb-lg-5">
                    <a href="<?= base_url('Pages/detail_company/' . $view->id) ?>" class="block__16443 text-center d-block">
                        <?php if (empty($view->logo)) { ?>
                            <img src="<?= base_url('assets/image/company.png') ?>" alt="Image" class="img-fluid logo-1">
                        <?php } else { ?>
                            <img src="<?= base_url('assets/image/company_logo/' . $view->logo) ?>" alt="Image" class="img-fluid logo-1">
                        <?php } ?>
                        <hr>
                        <h3><?= $view->nama_perusahaan ?></h3>
                        <p><i class="fa fa-building"></i> <?= $view->bidang_perusahaan ?></p>
                        <!-- <p><i class="fa fa-"></i></p> -->
                    </a>
                </div>
            <?php } ?>
        </div>
        <nav aria-label="Page navigation example">
            <?php echo $this->pagination->create_links(); ?>
        </nav>
    </div>
</section>

<?php $this->load->view('users/partials/footer') ?>