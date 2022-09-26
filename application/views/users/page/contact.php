<?php $this->load->view('users/partials/header') ?>
<section class="section-hero overlay inner-page bg-image" style="background-image: url(<?= base_url('assets/image/background.png') ?>);" id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="text-white font-weight-bold">Contact</h1>
                <div class="custom-breadcrumbs">
                    <a href="#"> Search Job</a><span class="mx-2 slash">/</span>
                    <span class="text-white"><strong>Contact</strong></span>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="site-section" id="next-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <form action="<?= base_url('Pages/save_message') ?>" method="post" class="">
                    <div class="row form-group">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label class="text-black" for="fname">Nama Depan</label>
                            <input type="hidden" name="id_users" value="<?= $view->id ?>">
                            <input type="text" id="fname" value="<?= $view->nama_depan ?>" readonly class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="text-black" for="lname">Last Name</label>
                            <input type="text" id="lname" value="<?= $view->nama_belakang ?>" readonly class="form-control">
                        </div>
                    </div>

                    <div class="row form-group">

                        <div class="col-md-12">
                            <label class="text-black" for="email">Email</label>
                            <input type="email" name="email" value="<?= $view->email ?>" readonly id="email" class="form-control">
                        </div>
                    </div>

                    <div class="row form-group">

                        <div class="col-md-12">
                            <label class="text-black" for="subject">Subjek</label>
                            <input type="subject" id="subject" name="subject" class="form-control">
                            <?= form_error('subject', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="message">Pasan</label>
                            <textarea id="message" cols="30" rows="7" name="pesan" class="form-control" placeholder="Tulis Pesan Disini..."></textarea>
                            <?= form_error('pesan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-md text-white"><i class="fa fa-paper-plane"></i> Kirim Pesan</button>
                        </div>
                    </div>


                </form>
            </div>
            <div class="col-lg-5 ml-auto">
                <div class="p-4 mb-3 bg-white">
                    <p class="mb-0 font-weight-bold">Alamat</p>
                    <p class="mb-4">Jl. Raya Ahmad Yani Puger</p>

                    <p class="mb-0 font-weight-bold">No Telepon</p>
                    <p class="mb-4"><a href="#">082132881252</a></p>

                    <p class="mb-0 font-weight-bold">Email</p>
                    <p class="mb-0"><a href="#">searchjobb22@gmail.com</a></p>

                    <p class="mb-0 font-weight-bold mt-4">Sosial media</p>
                    <div class="social">
                        <a href="#" title="facebook"><span class="icon-facebook"></span></a>
                        <a href="#" title="twitter"><span class="icon-twitter"></span></a>
                        <a href="#" title="instagram"><span class="icon-instagram"></span></a>
                        <a href="#" title="linkedin"><span class="icon-linkedin"></span></a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<script>
    <?php if ($this->session->flashdata('berhasil_kirim')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'pesan anda berhasil terkirim',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php endif ?>
</script>
<?php $this->load->view('users/partials/footer') ?>