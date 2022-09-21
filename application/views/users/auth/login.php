<?php $this->load->view('users/partials/header') ?>

<!-- HOME -->
<section class="section-hero overlay inner-page bg-image" style="background-image: url(<?= base_url('assets/image/background.png') ?>);" id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="text-white font-weight-bold">Sign In</h1>
                <div class="custom-breadcrumbs">
                    <a href="#">Home</a> <span class="mx-2 slash">/</span>
                    <span class="text-white"><strong>Sign In</strong></span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="mb-4">Sign In To Search Job</h2>
                <form action="<?= base_url('Auth/action_login') ?>" method="POST" class="p-4 border rounded">

                    <div class="row form-group">
                        <div class="col-md-12 mb-3 mb-md-0">
                            <label class="text-black" for="fname">Email</label>
                            <input type="text" id="fname" class="form-control" name="email" placeholder="Email Anda">
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row form-group mb-4">
                        <div class="col-md-12 mb-3 mb-md-0">
                            <label class="text-black" for="fname">Password</label>
                            <input type="password" id="fname" name="password" class="form-control password" placeholder="Password Anda">
                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row form-group mb-4">
                        <div class="form-check ml-3">
                            <input type="checkbox" class="form-check-input form-checkbox" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Lihat Password</label>
                        </div>
                    </div>
                    <a href="<?= base_url('Auth/forgot_password') ?>" class="text-right" style="margin-left: 70%;">Lupa Password ?</a>
                    <hr>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <input type="submit" value="Log In" class="btn px-4 btn-primary text-white">
                        </div>
                        <p style="margin-left: 13px; margin-top: 5px;">Pengguna Baru ? </p>&nbsp;<a href="<?= base_url('Auth/register') ?>" style="margin-top: 5px;"> Daftar disini</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>
<script>
    <?php if ($this->session->flashdata('terverifikasi')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'Akun anda telah diaktivasi',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php elseif ($this->session->flashdata('token_kadaluarsa')) : ?>
        Swal.fire({
            icon: 'warning',
            title: 'Gagal!',
            text: 'Token anda telah kadaluarsa',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php elseif ($this->session->flashdata('token_salah')) : ?>
        Swal.fire({
            icon: 'warning',
            title: 'Gagal!',
            text: 'Token anda mengalami kesalahan',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php elseif ($this->session->flashdata('email_salah')) : ?>
        Swal.fire({
            icon: 'warning',
            title: 'Gagal!',
            text: 'Email anda salah',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php elseif ($this->session->flashdata('logout')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'you have successfully logged out',
            text: 'Please log in to back in',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php elseif ($this->session->flashdata('success_update_pass')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'Password anda berhasil diubah',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php elseif ($this->session->flashdata('wrong_email')) : ?>
        Swal.fire({
            icon: 'warning',
            title: 'Gagal!',
            text: 'Email anda tidak terdaftar',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php elseif ($this->session->flashdata('wrong_password')) : ?>
        Swal.fire({
            icon: 'warning',
            title: 'Gagal!',
            text: 'Password anda salah atau tidak sesuai',
            showConfirmButton: true,
            // timer: 1500
        })

        <?php elseif ($this->session->flashdata('email_not_activation')) : ?>
        Swal.fire({
            icon: 'warning',
            title: 'Gagal!',
            text: 'Email anda belum diaktivasi',
            showConfirmButton: true,
            // timer: 1500
        })

        <?php elseif ($this->session->flashdata('session_habis')) : ?>
        Swal.fire({
            icon: 'warning',
            title: 'Peringatan!',
            text: 'silahkan login terlebih dahulu',
            showConfirmButton: true,
        })
    <?php endif ?>
</script>
<?php $this->load->view('users/partials/footer') ?>