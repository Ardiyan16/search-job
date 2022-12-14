<?php $this->load->view('users/partials/header') ?>

<!-- HOME -->
<section class="section-hero overlay inner-page bg-image" style="background-image: url(<?= base_url('assets/image/background.png') ?>);" id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="text-white font-weight-bold">Sign Up/Login</h1>
                <div class="custom-breadcrumbs">
                    <a href="#">Home</a> <span class="mx-2 slash">/</span>
                    <span class="text-white"><strong>Log In</strong></span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5">
                <h2 class="mb-4">Sign Up To Search Job</h2>
                <form action="<?= base_url('Auth/action_register') ?>" method="POST" class="p-4 border rounded">

                    <div class="row form-group">
                        <div class="col-md-12 mb-3 mb-md-0">
                            <label class="text-black" for="fname">Nama Depan</label>
                            <input type="text" id="fname" name="nama_depan" class="form-control" placeholder="Nama Depan">
                            <?= form_error('nama_depan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12 mb-3 mb-md-0">
                            <label class="text-black" for="fname">Nama Belakang</label>
                            <input type="text" id="fname" name="nama_belakang" class="form-control" placeholder="Nama Belakang">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12 mb-3 mb-md-0">
                            <label class="text-black" for="fname">Email</label>
                            <input type="email" id="fname" name="email" class="form-control" placeholder="Email address">
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12 mb-3 mb-md-0">
                            <label class="text-black" for="fname">Password</label>
                            <input type="password" name="password" id="fname" class="form-control password" placeholder="Password">
                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row form-group mb-4">
                        <div class="col-md-12 mb-3 mb-md-0">
                            <label class="text-black" for="fname">Tulis Ulang Password</label>
                            <input type="password" id="fname" name="konfirm_password" class="form-control password" placeholder="Tulis Ulang Password">
                            <?= form_error('konfirm_password', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row form-group mb-4">
                        <div class="form-check ml-3">
                            <input type="checkbox" class="form-check-input form-checkbox" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Lihat Password</label>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <input type="submit" value="Sign Up" class="btn px-4 btn-primary text-white">
                        </div>
                        <p style="margin-left: 13px; margin-top: 5px;">Sudah memiliki akun ? </p>&nbsp;<a href="<?= base_url('Auth') ?>" style="margin-top: 5px;"> Sign In disini</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php $this->load->view('users/partials/footer') ?>
