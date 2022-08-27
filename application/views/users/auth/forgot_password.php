<?php $this->load->view('users/partials/header') ?>

<!-- HOME -->
<section class="section-hero overlay inner-page bg-image" style="background-image: url(<?= base_url('assets/image/background.png') ?>);" id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="text-white font-weight-bold">Forgot Password</h1>
                <div class="custom-breadcrumbs">
                    <a href="#">Home</a> <span class="mx-2 slash">/</span>
                    <span class="text-white"><strong>Forgot Password</strong></span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="mb-4">Forgot Password</h2>
                <form action="<?= base_url('Auth/action_forgot') ?>" method="POST" class="p-4 border rounded">
                    <div class="row form-group">
                        <div class="col-md-12 mb-3 mb-md-0">
                            <label class="text-black" for="fname">Email</label>
                            <input type="text" id="fname" name="email" class="form-control" placeholder="Email Anda">
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <input type="submit" value="Send Verification" class="btn px-4 btn-primary text-white">
                        </div>
                        <p style="margin-left: 13px; margin-top: 5px;">Anda ingin masuk ?</p>&nbsp;<a href="<?= base_url('Auth') ?>" style="margin-top: 5px;"> Masuk disini</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view('users/partials/footer') ?>
<script>
    <?php if ($this->session->flashdata('not_acount')) : ?>
        Swal.fire({
            icon: 'warning',
            title: 'Gagal!',
            text: 'Email tersebut tidak terdaftar atau belum di aktivasi',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php endif ?>
</script>