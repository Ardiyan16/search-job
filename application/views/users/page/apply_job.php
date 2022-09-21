<?php $this->load->view('users/partials/header') ?>

<section class="section-hero overlay inner-page bg-image" style="background-image: url(<?= base_url('assets/image/background-home.png') ?>);" id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="text-white font-weight-bold">Lamar Online</h1>
                <div class="custom-breadcrumbs">
                    <a href="#">Lowongan Kerja</a> <span class="mx-2 slash">/</span>
                    <span class="text-white"><strong>Lamar Online</strong></span>
                </div>
            </div>
        </div>
    </div>
    <a href="#next" class="scroll-button smoothscroll">
        <span class=" icon-keyboard_arrow_down"></span>
    </a>
</section>

<section class="site-section block__18514" id="next-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 mr-auto">
                <div class="border p-4 rounded">
                    <ul class="list-unstyled block__47528 mb-0">
                        <li><span active>
                                <div class="col-lg-4">
                                    <?php if ($view->logo == NULL) { ?>
                                        <a href="<?= base_url('assets/image/company.png') ?>" data-fancybox="gallery"><img src="<?= base_url('assets/image/user.png') ?>" height="200" width="200" alt="Image" title="foto anda" class="img-fluid"></a>
                                    <?php } else { ?>
                                        <a href="<?= base_url('assets/image/company_logo/' . $view->logo) ?>" data-fancybox="gallery"><img src="<?= base_url('assets/image/company_logo/' . $view->logo) ?>" height="200" width="200" alt="Image" title="foto anda" class="img-fluid"></a>
                                    <?php } ?>
                                </div>
                                <div class="col-lg-8">
                                    <p><?= $view->job_title ?></p>
                                    <p><?= $view->nama_perusahaan ?></p>
                                </div>
                            </span>
                        </li>
                        <hr>
                        <li>
                            <p><i class="fa fa-dollar"></i>
                                <?php if (!empty($view->rentang_gaji)) { ?>
                                    <?php if (!empty($view->rentang_gaji2)) { ?>
                                        <?= 'Rp. ' . number_format($view->rentang_gaji) ?> - <?= 'Rp. ' . number_format($view->rentang_gaji2) ?>
                                    <?php } ?>
                                <?php } else { ?>
                                    <?= 'Perusahaan tidak menunjukkan gaji' ?>
                                <?php } ?>
                            </p>
                        </li>
                        <hr>
                        <li>
                            <p><i class="fa fa-map-marker"></i> <?= $view->city ?>, <?= $view->provinces ?></p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <!-- <div class="row mb-4"> -->
                <form class="p-4 p-md-5 border rounded" action="<?= base_url('Pages/save_lamaran') ?>" enctype="multipart/form-data" method="post">
                    <h3 class="text-black border-bottom pb-2"><?= $profile->nama_depan ?> <?= $profile->nama_belakang ?></h3>
                    <p><i class="fa fa-dollar"></i> <?= 'Rp. ' . number_format($gaji->gaji_diharapkan) ?> &nbsp;&nbsp; | &nbsp;&nbsp; <i class="fa fa-envelope"></i>
                        <?= $profile->email ?> &nbsp;&nbsp; | &nbsp;&nbsp; <i class="fa fa-phone"></i> <?= $profile->no_telp ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <a target="_blank" href="<?= base_url('Pages/profile') ?>">Ubah</a>
                    </p>
                    <br>

                    <div class="form-group">
                        <label for="job-description">Promosikan Diri Anda (disarankan)</label>
                        <input type="hidden" name="id_job" value="<?= $view->id ?>">
                        <input type="hidden" name="id_users" value="<?= $this->session->userdata('id') ?>">
                        <textarea class="form-control" name="keterangan" rows="12"></textarea>
                    </div>

                    <hr>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-paper-plane"></i> <?= 'Kirim Lamaran' ?></button>
                    </div>
                </form>
                <!-- </div> -->
            </div>
        </div>
    </div>
</section>
<script>

</script>
<?php $this->load->view('company/partials/footer') ?>