<?php $this->load->view('users/partials/header') ?>

<section class="section-hero overlay inner-page bg-image" style="background-image: url(<?= base_url('assets/image/background-home.png') ?>);" id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="text-white font-weight-bold">Lamaran Saya</h1>
                <div class="custom-breadcrumbs">
                    <a href="#"><?= $this->session->userdata('nama_depan') ?></a> <span class="mx-2 slash">/</span>
                    <span class="text-white"><strong>Lamaran Saya</strong></span>
                </div>
            </div>
        </div>
    </div>
    <a href="#next" class="scroll-button smoothscroll">
        <span class=" icon-keyboard_arrow_down"></span>
    </a>
</section>
<section class="site-section" id="next-section">
    <div class="container">
        <div class="row mb-5 justify-content-center">
            <div class="col-md-7 text-center">
                <h2 class="section-title mb-2">Daftar Lamaran Anda</h2>
            </div>
        </div>
        <div class="row">
            <?php if (empty($lamaran)) { ?>
                <div class="text-center">
                    <p class="section-title mb-2">Anda belum melamar pekerjaan</p>
                </div>
            <?php } else { ?>
                <?php foreach ($lamaran as $get) { ?>
                    <div class="col-lg-6 mb-4">
                        <div class="block__87154">
                            <div class="block__91147 d-flex align-items-center">
                                <figure class="mr-4"><img src="<?= base_url('assets/image/company_logo/' . $get->logo) ?>" width="200" height="200" alt="Image" class="img-fluid"></figure>
                                <div>
                                    <h2><?= $get->job_title ?></h2>
                                    <h5><?= $get->nama_perusahaan ?></h5>
                                </div>
                            </div>
                            <hr>
                            <div class="mt-3">
                                <p style="font-size: 12px;"><i class="fa fa-check"></i> Lamaran anda telah diterima pada <?= date('d F Y', strtotime($get->date_apply)) ?> pukul <?= $get->time_apply ?></p>
                                <p style="font-size: 12px;"><i class=""></i> Status lamaran :
                                    <?php if ($get->status == 0) { ?>
                                    <?php if ($get->status_lamaran == 0) {
                                            echo "<span class='badge badge-info' title='perusahaan sedang meriview laraman anda' style='color: white;'>Dalam Review</span>";
                                        } elseif ($get->status_lamaran == 1) {
                                            echo "<span class='badge badge-success' title='lamaran anda masuk kedalam kriteria tunggu perusahaan menghubungi anda' style='color: white;'>Masuk Kriteria</span>";
                                        } elseif ($get->status_lamaran == 2) {
                                            echo "<span class='badge badge-danger' title='tetap semangat masih ada kesempatan lainnya' style='color: white;'>Belum Cocok</span>";
                                        }
                                    } else {
                                        echo 'Perusahaan telah selesai merekrut';
                                    }
                                    ?>
                                </p>
                            </div>
                            <hr>
                            <p style="font-size: 12px;">Anda telah mengirimkan lamaran pada <?= date('d F Y', strtotime($get->date_apply)) ?> pukul <?= $get->time_apply ?></p>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</section>
<script>
    <?php if ($this->session->flashdata('lamaran_terkirim')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'lamaran anda telah terkirim',
            showConfirmButton: true,
            // timer: 1500
        })

    <?php elseif ($this->session->flashdata('success_update')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'data pendidikan anda berhasil diupdate',
            showConfirmButton: true,
            // timer: 1500
        })

    <?php elseif ($this->session->flashdata('success_delete')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'data pendidikan anda berhasil dihapus',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php endif ?>
</script>
<?php $this->load->view('users/partials/footer') ?>