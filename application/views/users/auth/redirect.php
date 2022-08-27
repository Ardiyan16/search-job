<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<title><?= $title ?></title>
<img src="<?= base_url('assets/image/logo2.png') ?>">
<h1 style="text-align:center;"><?= $this->session->flashdata('success_register') ?></h1>
<h4 style="text-align:center;">Silahkan cek email untuk verifikasi akun anda!.</h4>
<h4 style="text-align:center;">Jika pesan tidak masuk coba anda cek di menu spam!.</h4>
<h4 style="text-align:center;">Jika sudah verifikasi silahkan <a href="<?= base_url('Auth') ?>">login disini</a></h4>
<style>
    img {
        margin: 0 auto;
        display: block;
        margin-top: 5%;
    }
</style>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>