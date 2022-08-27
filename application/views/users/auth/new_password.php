<?php $this->load->view('users/partials/header') ?>

<style>
    form .error {
        color: red;
    }
</style>

<!-- HOME -->
<section class="section-hero overlay inner-page bg-image" style="background-image: url(<?= base_url('assets/image/background.png') ?>);" id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="text-white font-weight-bold">Password Baru</h1>
                <div class="custom-breadcrumbs">
                    <a href="#">Home</a> <span class="mx-2 slash">/</span>
                    <span class="text-white"><strong>Password Baru</strong></span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="mb-4">Password Baru</h2>
                <form name="ubah_password" action="" method="POST" class="p-4 border rounded">
                    <!-- <?= base_url('Auth/ubah_password') ?> -->
                    <div class="row form-group mb-4">
                        <div class="col-md-12 mb-3 mb-md-0">
                            <label class="text-black" for="fname">Password</label>
                            <input type="password" id="password" name="password" class="form-control password" placeholder="Password Anda">
                        </div>
                    </div>
                    <div class="row form-group mb-4">
                        <div class="col-md-12 mb-3 mb-md-0">
                            <label class="text-black" for="fname">Tulis Ulang Password</label>
                            <input type="password" id="konfirm_password" name="konfirm_password" class="form-control password" placeholder="Tulis Ulang Password Anda">
                        </div>
                    </div>
                    <div class="row form-group mb-4">
                        <div class="form-check ml-3">
                            <input type="checkbox" class="form-check-input form-checkbox" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Lihat Password</label>
                        </div>
                    </div>
                    <hr>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <input type="submit" value="Save New Password" class="btn px-4 btn-primary text-white">
                        </div>
                        <p style="margin-left: 13px; margin-top: 5px;">Anda ingin masuk ?</p>&nbsp;<a href="<?= base_url('Auth') ?>" style="margin-top: 5px;"> Masuk disini</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view('users/partials/footer') ?>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
<script>
    $(function() {
        // Initialize form validation on the registration form.
        // It has the name attribute "registration"
        $("form[name='ubah_password']").validate({
            // Specify validation rules
            rules: {
                password: {
                    required: true,
                    minlength: 6
                },
                konfirm_password: {
                    required: true,
                    minlength: 6,
                    equalTo: "#password"
                }
            },
            // Specify validation error messages
            messages: {
                password: {
                    required: "password is required (password harus di isi)",
                    minlength: "password minimum 6 character"
                },
                konfirm_password: {
                    required: "confirm password is required (konfirmasi password harus di isi)",
                    minlength: "password minimum 6 character",
                    equalTo: "confirm password does not match (konfirmasi password tidak cocok)"
                },
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });
</script>