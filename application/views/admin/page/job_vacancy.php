<?php $this->load->view('admin/partials/header_admin.php') ?>
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Postingan Lowongan</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Postingan Lowongan</a></li>
                    <li class="breadcrumb-item"><a href="#">List Data Lowongan</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">List Data Lowongan</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Lowongan</th>
                                        <th>Perusahaan</th>
                                        <th>Tanggal Posting</th>
                                        <th>Lokasi</th>
                                        <th>Bidang</th>
                                        <th>Status</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($job_vacancy as $view) { ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $view->job_title ?></td>
                                            <td><?= $view->nama_perusahaan ?></td>
                                            <td><?= date('d F Y', strtotime($view->tgl_posting)) ?></td>
                                            <td><?= $view->kota ?>, <?= $view->provinsi ?></td>
                                            <td><?= $view->spesialis ?></td>
                                            <td><?php if ($view->status == 0) { ?>
                                                    <span class="badge badge-success" style="color: white;">Aktif</span>
                                                <?php } elseif ($view->status == 1) { ?>
                                                    <span class="badge badge-danger" style="color: white;">Non Aktif</span>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('Admin/detail_job_vacancy/' . $view->id) ?>" title="Detail" class="badge bg-primary" style="color: white;"><i class="fa fa-list"></i></a>
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
</div>
<?php $this->load->view('admin/partials/footer.php') ?>