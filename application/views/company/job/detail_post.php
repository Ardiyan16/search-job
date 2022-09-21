<?php $this->load->view('company/partials/header') ?>
<link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<section class="section-hero overlay inner-page bg-image" style="background-image: url(<?= base_url('assets/image/background.png') ?>);" id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="text-white font-weight-bold">Detail Postingan Anda</h1>
                <div class="custom-breadcrumbs">
                    <a href="#">Home</a> <span class="mx-2 slash">/</span>
                    <span class="text-white"><strong>Detail Postingan Anda</strong></span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="site-section">
    <div class="container">
        <div class="row align-items-center mb-5">
            <div class="col-lg-8 mb-4 mb-lg-0">
                <div class="d-flex align-items-center">
                    <div class="border p-2 d-inline-block mr-3 rounded">
                        <img src="<?= base_url('assets/image/company_logo/' . $job->logo) ?>" height="100" width="100" alt="Image">
                    </div>
                    <div>
                        <h2><?= $job->job_title ?></h2>
                        <div>
                            <span class="ml-0 mr-2 mb-2"><span class="icon-briefcase mr-2"></span><?= $job->nama_perusahaan ?></span>
                            <span class="m-2"><span class="icon-room mr-2"></span><?= $job->city ?>, <?= $job->provinces ?></span>
                            <br>
                            <span class="m-2"><span class="icon-calendar-o mr-2"></span><span class="text-primary"><?= date('d F Y', strtotime($job->tgl_posting)) ?></span></span>
                            <br>
                            <?php if (!empty($job->rentang_gaji && $job->rentang_gaji2)) { ?>
                                <span class="m-2"><span class="fa fa-money"></span><span class="text-primary"><?= 'Rp.' . number_format($job->rentang_gaji) . ' - ' . number_format($job->rentang_gaji2) ?></span></span>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="mb-5">
                    <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-align-left mr-3"></span>Deskripsi Pekerjaan</h3>
                    <?= $job->deskripsi_job ?>
                </div>
                <?php if (!empty($job->benefit)) { ?>
                    <div class="mb-5">
                        <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-rocket mr-3"></span>Benefit</h3>
                        <?= $job->benefit ?>
                    </div>
                <?php } ?>
                <div class="row mb-5">
                    <div class="col-6">
                        <a href="<?= base_url('Company/edit_post_job/' . $job->id) ?>" class="btn btn-block btn-primary btn-md"><i class="fa fa-edit"></i> Edit Postingan</a>
                        <a href="<?= base_url('Company/done_rectruitment/' . $job->id) ?>" class="btn btn-block btn-danger btn-md"><i class="fa fa-check"></i> Selesai Rekrutmen</a>
                    </div>
                </div>

            </div>
            <div class="col-lg-4">
                <div class="bg-light p-3 border rounded mb-4">
                    <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Informasi Tambahan</h3>
                    <ul class="list-unstyled pl-3 mb-0">
                        <li class="mb-2"><strong class="text-black">Tingkat Pekerjaan:</strong> <?= $job->tingkat_kerja ?></li>
                        <?php if (!empty($job->updated_at)) { ?>
                            <li class="mb-2"><strong class="text-black">Diperbaharui Pada:</strong> <?= date('d F Y', strtotime($job->updated_at)) ?></li>
                        <?php } ?>
                        <li class="mb-2"><strong class="text-black">Bidang Kerja:</strong> <?= $job->bidang_pekerjaan ?></li>
                        <li class="mb-2"><strong class="text-black">Pengalaman:</strong> <?= $job->pengalaman ?></li>
                        <li class="mb-2"><strong class="text-black">Jenis Pekerjaan:</strong> <?= $job->jenis_kerja ?></li>
                        <li class="mb-2"><strong class="text-black">Kualifikasi:</strong> <?= $job->kualifikasi ?></li>
                        <li class="mb-2"><strong class="text-black">Waktu Proses:</strong> <?= $job->waktu_proses ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="site-section">
    <div class="container">
        <div class="row mb-5 justify-content-center">
            <div class="col-md-7 text-center">
                <h2 class="section-title mb-2">Daftar Pelamar</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">List Pelamar</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table_pelamar" class="display">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Domisili</th>
                                        <th>Status</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($pelamar as $view) { ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $view->nama_depan ?> <?= $view->nama_belakang ?></td>
                                            <td><?= $view->email ?></td>
                                            <td><?= $view->kota ?>, <?= $view->provinsi ?></td>
                                            <td> <?php if ($view->status_lamaran == 0) {
                                                        echo "<span class='badge badge-info' title='review' style='color: white;'>Dalam Review</span>";
                                                    } elseif ($view->status_lamaran == 1) {
                                                        echo "<span class='badge badge-success' title='terpilih' style='color: white;'>Terpilih</span>";
                                                    } elseif ($view->status_lamaran == 2) {
                                                        echo "<span class='badge badge-danger' title='tidak terpilih' style='color: white;'>Tidak Cocok</span>";
                                                    }
                                                    ?>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('Company/detail_pelamar/' . $view->id_users) ?>" title="Detail Pelamar" class="badge bg-primary" style="color: white;"><i class="fa fa-list"></i></a>
                                                <a href="<?= base_url('assets/document/resume/' . $view->file) ?>" title="Download Resume" class="badge bg-info" style="color: white;"><i class="fa fa-download"></i></a>
                                                <?php if ($view->status_lamaran < 1) { ?>
                                                    <a href="<?= base_url("Company/terima_lamaran?id=" . $view->id . "&id_job=" . $view->id_job . "&job_title=" . $job->job_title . "&company=" . $job->nama_perusahaan . "&email=" . $view->email) ?>" title="Terima Lamaran" class="badge bg-success terima-lamaran" style="color: white;"><i class="fa fa-check"></i></a>
                                                    <a href="<?= base_url("Company/tolak_lamaran?id=" . $view->id . "&id_job=" . $view->id_job . "&job_title=" . $job->job_title . "&company=" . $job->nama_perusahaan . "&email=" . $view->email) ?>" title="Lamaran Belum Cocok" class="badge bg-danger tolak-lamaran" style="color: white;"><i class="fa fa-times"></i></a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    <?php if ($this->session->flashdata('success_post_job')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'Posting Lowongan berhasil diupdate',
            showConfirmButton: true,
            // timer: 1500
        })

    <?php elseif ($this->session->flashdata('terima_lamaran')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'Lamaran terpilih',
            showConfirmButton: true,
            // timer: 1500
        })

    <?php elseif ($this->session->flashdata('tolak_lamaran')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'Lamaran belum cocok',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php endif ?>

    $('.terima-lamaran').on('click', function(e) {
        e.preventDefault();
        const link = $(this).attr('href');

        Swal.fire({
            title: 'Apakah anda yakin ?',
            text: "Data lamaran diterima!",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#00a6fb',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Terima Lamaran!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = link;
            }
        })

    })

    $('.tolak-lamaran').on('click', function(e) {
        e.preventDefault();
        const link = $(this).attr('href');

        Swal.fire({
            title: 'Apakah anda yakin ?',
            text: "Data lamaran ditolak!",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#00a6fb',
            confirmButtonText: 'Tolak Lamaran!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = link;
            }
        })

    })

    $(document).ready(function() {
        $('#table_pelamar').DataTable();
    });
</script>
<?php $this->load->view('company/partials/footer') ?>