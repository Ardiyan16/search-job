<?php $this->load->view('company/partials/header') ?>

<!-- HOME -->
<section class="home-section section-hero overlay bg-image" style="background-image: url(<?= base_url('assets/image/background-home.png') ?>);" id="home-section">

    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-12">
                <div class="mb-5 text-center">
                    <h1 class="text-white font-weight-bold">Kami Berkomitmen</h1>
                    <p>Membantu anda dalam menemukan talenta terbaik di bidangnya</p>
                </div>
            </div>
        </div>
    </div>

    <a href="#next" class="scroll-button smoothscroll">
        <span class=" icon-keyboard_arrow_down"></span>
    </a>

</section>

<section class="py-5 bg-image overlay-primary fixed overlay" id="next" style="background-image: url('images/hero_1.jpg');">
    <div class="container">
        <div class="row mb-5 justify-content-center">
            <div class="col-md-7 text-center">
                <h2 class="section-title mb-2 text-white">Search Job</h2>
                <p class="lead text-white">Search Job membantu anda tim anda dalam menemukan tanlenta terbaik pada bidangnya.</p>
            </div>
        </div>
        <div class="row pb-0 block__19738 section-counter">

            <div class="col-6 col-md-6 col-lg-6 mb-5 mb-lg-0">
                <div class="d-flex align-items-center justify-content-center mb-2">
                    <strong class="number" data-number="<?= $total_kandidat ?>">0</strong>
                </div>
                <span class="caption">Kandidat</span>
            </div>

            <div class="col-6 col-md-6 col-lg-6 mb-5 mb-lg-0">
                <div class="d-flex align-items-center justify-content-center mb-2">
                    <strong class="number" data-number="<?= $total_company ?>">0</strong>
                </div>
                <span class="caption">Partner Kami</span>
            </div>

        </div>
    </div>
</section>

<section class="site-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center" data-aos="fade">
                <h2 class="section-title mb-3">Kenapa Harus Search Job</h2>
            </div>
        </div>

        <div class="row align-items-center block__69944">

            <div class="col-md-6">
                <img src="<?= base_url('assets/image/work.jpg') ?>" alt="Image" class="img-fluid mb-4 rounded">
            </div>

            <div class="col-md-6">
                <h3>Mudah untuk menemukan kandidat</h3>
                <p>Dengan search job mempermudah perusahaan anda menemukan kandidat yang tepat untuk posisi yang dibutuhkan.</p>
                
            </div>

            <div class="col-md-6 order-md-2 ml-md-auto">
                <img src="<?= base_url('assets/image/team_work.jpg') ?>" alt="Image" class="img-fluid mb-4 rounded">
            </div>

            <div class="col-md-6">
                <h3>Membangun Tim</h3>
                <p>Dengan search job dapat membangun tim sesuai dengan keinginan anda atau perusahaan anda.</p>
            
            </div>
        </div>
</section>



<section class="py-5 bg-image overlay-primary fixed overlay" style="background-image: url('images/hero_1.jpg');">
    <div class="container">
        <?php if (empty($this->session->userdata('id'))) { ?>
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h2 class="text-white">Anda tertarik bergabung?</h2>
                    <p class="mb-0 text-white lead">Silahkan mendaftar dan menjadi bagian kami untuk mempermudah anda memperoleh tanlenta ahli.</p>
                </div>
                <div class="col-md-3 ml-auto">
                    <a href="<?= base_url('Auth/login/company') ?>" class="btn btn-warning btn-block btn-lg">Login & Register</a>
                </div>
            </div>
        <?php } else { ?>
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h2 class="text-white">Anda membutuhkan calon pelamar?</h2>
                    <p class="mb-0 text-white lead">Kami memiliki talenta terbaik di bidangnya silahkan posting lowongan pekerjaan perusahaan anda.</p>
                </div>
                <div class="col-md-3 ml-auto">
                    <a href="<?= base_url('Company/post_job') ?>" class="btn btn-warning btn-block btn-lg">Post Job</a>
                </div>
            </div>
        <?php } ?>
    </div>
</section>

<section class="site-section py-4">
    <div class="container">

        <div class="row align-items-center">
            <div class="col-12 text-center mt-4 mb-5">
                <div class="row justify-content-center">
                    <div class="col-md-7">
                        <h2 class="section-title mb-2">Partner Kami</h2>
                        <p class="lead">Berikut merupakan beberapa partner Search Job.</p>
                    </div>
                </div>

            </div>
            <?php foreach ($company as $view) { ?>
                <div class="col-6 col-lg-3 col-md-6 text-center">
                    <?php if (empty($view->logo)) { ?>
                        <img src="<?= base_url('assets/image/company.png') ?>" title="<?= $view->nama_perusahaan ?>" alt="Image" class="img-fluid logo-1">
                    <?php } else { ?>
                        <img src="<?= base_url('assets/image/company_logo/' . $view->logo) ?>" title="<?= $view->nama_perusahaan ?>" alt="Image" class="img-fluid logo-1">
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<!-- <section class="bg-light pt-5 testimony-full">

    <div class="owl-carousel single-carousel">


        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center text-center text-lg-left">
                    <blockquote>
                        <p>&ldquo;Soluta quasi cum delectus eum facilis recusandae nesciunt molestias accusantium libero dolores repellat id in dolorem laborum ad modi qui at quas dolorum voluptatem voluptatum repudiandae.&rdquo;</p>
                        <p><cite> &mdash; Corey Woods, @Dribbble</cite></p>
                    </blockquote>
                </div>
                <div class="col-lg-6 align-self-end text-center text-lg-right">
                    <img src="images/person_transparent_2.png" alt="Image" class="img-fluid mb-0">
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center text-center text-lg-left">
                    <blockquote>
                        <p>&ldquo;Soluta quasi cum delectus eum facilis recusandae nesciunt molestias accusantium libero dolores repellat id in dolorem laborum ad modi qui at quas dolorum voluptatem voluptatum repudiandae.&rdquo;</p>
                        <p><cite> &mdash; Chris Peters, @Google</cite></p>
                    </blockquote>
                </div>
                <div class="col-lg-6 align-self-end text-center text-lg-right">
                    <img src="images/person_transparent.png" alt="Image" class="img-fluid mb-0">
                </div>
            </div>
        </div>

    </div>

</section> -->

<?php $this->load->view('company/partials/footer') ?>