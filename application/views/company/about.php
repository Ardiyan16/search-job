<?php $this->load->view('company/partials/header') ?>
<section class="section-hero overlay inner-page bg-image" style="background-image: url(<?= base_url('assets/image/background.png') ?>);" id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="text-white font-weight-bold">About</h1>
                <div class="custom-breadcrumbs">
                    <a href="#">Home</a> <span class="mx-2 slash">/</span>
                    <span class="text-white"><strong>About</strong></span>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="py-5 bg-image overlay-primary fixed overlay" id="next-section" style="background-image: url('images/hero_1.jpg');">
    <div class="container">
        <div class="row mb-5 justify-content-center">
            <div class="col-md-7 text-center">
                <h2 class="section-title mb-2 text-white">Search Job Statistik</h2>
                <p class="lead text-white">Berikut beberapa statistik Search Job.</p>
            </div>
        </div>
        <div class="row pb-0 block__19738 section-counter">

            <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
                <div class="d-flex align-items-center justify-content-center mb-2">
                    <strong class="number" data-number="<?= $count_users ?>">0</strong>
                </div>
                <span class="caption">Candidates</span>
            </div>

            <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
                <div class="d-flex align-items-center justify-content-center mb-2">
                    <strong class="number" data-number="<?= $count_postjob ?>">0</strong>
                </div>
                <span class="caption">Jobs Posted</span>
            </div>

            <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
                <div class="d-flex align-items-center justify-content-center mb-2">
                    <strong class="number" data-number="<?= $count_apply ?>">0</strong>
                </div>
                <span class="caption">Apply Jobs</span>
            </div>

            <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
                <div class="d-flex align-items-center justify-content-center mb-2">
                    <strong class="number" data-number="<?= $count_company ?>">0</strong>
                </div>
                <span class="caption">Companies</span>
            </div>


        </div>
    </div>
</section>


<section class="site-section pb-0">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <a data-fancybox data-ratio="2" class="block__96788">
                    <img src="<?= base_url('assets/image/logo2.png') ?>" alt="Image" class="img-fluid img-shadow">
                </a>
            </div>
            <div class="col-lg-5 ml-auto">
                <h2 class="section-title mb-3">Apa itu Search Job ?</h2>
                <p class="lead">Search Job adalah platform yang akan membantu anda untuk mendapatkan kandidat yang tepat untuk mengisi posisi pada perusahaan anda.</p>
                <p>Bergabung dengan kami dan coba temukan kandidat terbaik pada bidangnya!</p>
            </div>
        </div>
    </div>
</section>

<section class="site-section pt-0 mt-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0 order-md-2">
                <a data-fancybox data-ratio="2" class="block__96788">
                    <img src="<?= base_url('assets/image/work2.jpg') ?>" alt="Image" class="img-fluid img-shadow">
                </a>
            </div>
            <div class="col-lg-5 mr-auto order-md-1  mb-5 mb-lg-0">
                <h2 class="section-title mb-3">Search Job For Workers</h2>
                <p class="lead">Terdapat puluhan ribu kandidat terbaik pada platform kami.</p>
                <p>Kami menyediakan kandidat yang memumpuni dan terbuka untuk perusahaan anda!</p>
            </div>
        </div>
    </div>
</section>


<?php $this->load->view('company/partials/footer') ?>