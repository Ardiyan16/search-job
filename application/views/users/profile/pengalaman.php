<?php $this->load->view('users/partials/header') ?>

<section class="section-hero overlay inner-page bg-image" style="background-image: url(<?= base_url('assets/image/background-home.png') ?>);" id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="text-white font-weight-bold">Pengalaman</h1>
                <div class="custom-breadcrumbs">
                    <a href="#"><?= $this->session->userdata('nama_depan') ?></a> <span class="mx-2 slash">/</span>
                    <span class="text-white"><strong>Pengalaman</strong></span>
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
                                    <?php if ($view->picture == NULL) { ?>
                                        <a href="<?= base_url('assets/image/user.png') ?>" data-fancybox="gallery"><img src="<?= base_url('assets/image/user.png') ?>" height="100" width="100" alt="Image" title="foto anda" class="img-fluid"></a>
                                    <?php } else { ?>
                                        <a href="<?= base_url('assets/image/picture_users/' . $view->picture) ?>" data-fancybox="gallery"><img src="<?= base_url('assets/image/picture_users/' . $view->picture) ?>" height="100" width="100" alt="Image" title="foto anda" class="img-fluid"></a>
                                    <?php } ?>
                                </div>
                                <div class="col-lg-8">
                                    <a href="<?= base_url('Pages/profile') ?>"><?= $view->nama_depan ?> (lihat profile)</a>
                                </div>
                            </span>
                        </li>
                        <hr>
                        <li><a href="<?= base_url('Pages/pendidikan') ?>">Pendidikan</a></li>
                        <hr>
                        <li><span class="active">Pengalaman</span></li>
                        <hr>
                        <li><a href="<?= base_url('Pages/profile_saya') ?>">Profile Saya</a></li>
                        <hr>
                        <li><a href="<?= base_url('Pages/kemampuan') ?>">Kemampuan</a></li>
                        <hr>
                        <li><a href="<?= base_url('Pages/info_tambahan') ?>">Info Tambahan</a></li>
                        <hr>
                        <li><a href="<?= base_url('Pages/resume') ?>">Unggah Resume</a></li>
                        <hr>
                        <li><a href="<?= base_url('Pages/bahasa') ?>">Bahasa</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="mb-4">
                    <h3 class="mb-4 h4 border-bottom">Pengalaman Anda</h3>
                    <a href="<?= base_url('Pages/tambah_pengalaman') ?>"><i class="fa fa-plus-circle"></i> Tambah Pengalaman</a>
                </div>
                <?php if (empty($pengalaman)) { ?>
                    <?= '<p>Pengalaman belum di isikan</p>' ?>
                <?php } else { ?>
                    <?php foreach ($pengalaman as $view) { ?>
                        <div class="row">
                            <div class="col-lg-8">
                                <h3 style="font-weight: bold;"><?= $view->posisi ?></h3>
                                <h5 style="font-weight: bold;"><?= $view->nama_perusahaan ?> | <?= $view->kota ?>,<?= $view->provinsi ?></h5>
                                <p> Bidang &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $view->spesialis ?><br>
                                    Keahlian &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $view->bidang_pekerjaan ?><br>
                                    Industri &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $view->bidang_perusahaan ?><br>
                                    Gaji &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php if (!empty($view->gaji)) { ?>
                                        <?= 'Rp. ' . number_format($view->gaji) ?>
                                    <?php } else {
                                                                                                                                                echo 'Anda tidak menampilkan gaji';
                                                                                                                                            }  ?>
                                </p>
                                <p><?= $view->keterangan ?></p>
                            </div>
                            <div class="col-lg-3">
                                <p style="font-size: 15px;"><?= date('F Y', strtotime($view->awal)) ?> - <?= date('F Y', strtotime($view->akhir)) ?></p>
                                <?php
                                $tgl_awal = $view->awal;
                                $tgl_akhir = $view->akhir;
                                $lama_kerja = new DateTime($tgl_awal);
                                $tgl_akhir = new DateTime($tgl_akhir);
                                if ($lama_kerja > $tgl_akhir) {
                                    exit("0 tahun 0 bulan 0 hari");
                                }
                                $y = $tgl_akhir->diff($lama_kerja)->y;
                                $m = $tgl_akhir->diff($lama_kerja)->m;
                                // $d = $tgl_akhir->diff($lama_kerja)->d;

                                // echo "</br>";
                                // echo "<div class='hasil'> HASIL perhitungan usia anda lahir pada : " . date('d-m-Y', strtotime($tanggal_lahir)) . "&nbsp adalah : ";
                                // echo $y . " tahun " . $m . " bulan " . $d . " hari";
                                // echo "</div>";
                                ?>
                                <p>(<?= $y . " tahun " . $m . " bulan " ?>)</p>
                            </div>
                            <div class="">
                                <a href="<?= base_url('Pages/edit_pengalaman/' . $view->id) ?>" title="edit"><i class="fa fa-edit"></i></a>
                                <a href="<?= base_url('Pages/delete_pengalaman/' . $view->id) ?>" class="link-hapus" title="hapus"><i class="fa fa-trash"></i></a>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<script>
    <?php if ($this->session->flashdata('success_create')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'data pengalaman anda berhasil ditambahkan',
            showConfirmButton: true,
            // timer: 1500
        })

    <?php elseif ($this->session->flashdata('success_update')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'data pengalaman anda berhasil diupdate',
            showConfirmButton: true,
            // timer: 1500
        })

    <?php elseif ($this->session->flashdata('success_delete')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'data pengalaman anda berhasil dihapus',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php endif ?>

    $('.link-hapus').on('click', function(e) {
        e.preventDefault();
        const link = $(this).attr('href');

        Swal.fire({
            title: 'Apakah anda yakin ?',
            text: "Data pengalaman akan dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#828282',
            confirmButtonText: 'Hapus Data!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = link;
            }
        })

    })
</script>
<?php $this->load->view('users/partials/footer') ?>