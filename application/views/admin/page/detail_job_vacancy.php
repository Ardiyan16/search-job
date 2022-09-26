<?php $this->load->view('admin/partials/header_admin.php') ?>
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Detail Posting Lowongan</h4>
                    <p class="mb-0"><?= $view->job_title ?></p>
                    <br>
                    <a href="<?= base_url('Admin/job_vacancy') ?>" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Posting Lowongan</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Detail Posting Lowongan</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-tab">
                            <div class="custom-tab-1">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a href="#profile" data-toggle="tab" class="nav-link active show">Profile</a>
                                    </li>
                                    <li class="nav-item"><a href="#deskripsi" data-toggle="tab" class="nav-link">Deskripsi</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="profile" class="tab-pane fade active show">
                                        <div class="profile-personal-info mt-5">
                                            <h4 class="text-primary mb-4">Detail Lowongan</h4>
                                            <div class="row mb-4">
                                                <div class="col-3">
                                                    <h5 class="f-w-500">Nama Lowongan <span class="pull-right">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-9"><span><?= $view->job_title ?></span>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-3">
                                                    <h5 class="f-w-500">Nama Perusahaan <span class="pull-right">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-9"><span><?= $view->nama_perusahaan ?></span>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-3">
                                                    <h5 class="f-w-500">Total Pelamar<span class="pull-right">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-9"><span><a href="#pelamar" data-toggle="modal" style="color: blue;"><?= $jumlah_pelamar ?> Pelamar</a></span>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-3">
                                                    <h5 class="f-w-500">Lokasi <span class="pull-right">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-9"><span><?= $view->kota ?>, <?= $view->provinsi ?></span>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-3">
                                                    <h5 class="f-w-500">Bidang Spesialis <span class="pull-right">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-9"><span><?= $view->spesialis ?></span>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-3">
                                                    <h5 class="f-w-500">Bidang Pekerjaan <span class="pull-right">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-9"><span><?= $view->bidang_pekerjaan ?></span>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-3">
                                                    <h5 class="f-w-500">Benefit <span class="pull-right">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-9"><span><?= $view->benefit ?></span>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-3">
                                                    <h5 class="f-w-500">Gaji <span class="pull-right">:</span></h5>
                                                </div>
                                                <div class="col-9"><span><?php if (empty($view->rentang_gaji)) {
                                                                                echo 'perusahaan meerahasiakan gaji / negotiable';
                                                                            } else { ?>
                                                            <?= 'Rp. ' . number_format($view->rentang_gaji) ?> - <?= 'Rp. ' . number_format($view->rentang_gaji2) ?>
                                                        <?php } ?>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-3">
                                                    <h5 class="f-w-500">Tingkat Pekerjaan <span class="pull-right">:</span></h5>
                                                </div>
                                                <div class="col-9"><span><?= $view->tingkat_kerja ?></span>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-3">
                                                    <h5 class="f-w-500">Pengalaman <span class="pull-right">:</span></h5>
                                                </div>
                                                <div class="col-9"><span><?= $view->pengalaman ?></span>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-3">
                                                    <h5 class="f-w-500">Kualifikasi <span class="pull-right">:</span></h5>
                                                </div>
                                                <div class="col-9"><span><?= $view->kualifikasi ?></span>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-3">
                                                    <h5 class="f-w-500">Jenis Pekerjaan <span class="pull-right">:</span></h5>
                                                </div>
                                                <div class="col-9"><span><?= $view->jenis_kerja ?></span>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-3">
                                                    <h5 class="f-w-500">Waktu Proses Lamaran <span class="pull-right">:</span></h5>
                                                </div>
                                                <div class="col-9"><span><?= $view->waktu_proses ?></span>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-3">
                                                    <h5 class="f-w-500">Tanggal Posting <span class="pull-right">:</span></h5>
                                                </div>
                                                <div class="col-9"><span><?= date('d F Y', strtotime($view->tgl_posting)) ?></span>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-3">
                                                    <h5 class="f-w-500">Diperbarui Pada <span class="pull-right">:</span></h5>
                                                </div>
                                                <div class="col-9"><span>
                                                        <?php if (empty($view->updated_at)) {
                                                            echo 'Belum pernah diperbarui';
                                                        } else { ?>
                                                            <?= date('d F Y', strtotime($view->updated_at)) ?>
                                                        <?php } ?>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-3">
                                                    <h5 class="f-w-500">Tunjangan <span class="pull-right">:</span></h5>
                                                </div>
                                                <div class="col-9"><span><?= $view->tunjangan ?></span>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-3">
                                                    <h5 class="f-w-500">Status <span class="pull-right">:</span></h5>
                                                </div>
                                                <div class="col-9"><span>
                                                        <?php if ($view->status == 0) { ?>
                                                            <span class="badge badge-success" style="color: white;">Aktif</span>
                                                        <?php } elseif ($view->status == 1) { ?>
                                                            <span class="badge badge-danger" style="color: white;">Non Aktif</span>
                                                        <?php } ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="deskripsi" class="tab-pane fade">
                                        <div class="profile-personal-info mt-5">
                                            <h4 class="text-primary mb-4">Deskripsi Pekerjaan</h4>
                                            <div class="row mb-4">
                                                <div class="col-12"><span><?= $view->deskripsi_job ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="pelamar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">List Pelamar <?= $view->job_title ?> <?= $view->nama_perusahaan ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pelamar</th>
                                    <th>Waktu Apply</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach($pelamar as $view) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $view->nama_depan ?> <?= $view->nama_belakang ?></td>
                                    <td><?= date('d F Y', strtotime($view->date_apply)) ?> (<?= $view->time_apply ?>)</td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('admin/partials/footer.php') ?>