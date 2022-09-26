<?php $this->load->view('admin/partials/header_admin.php') ?>
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Users / Pelamar</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Pelamar</a></li>
                    <li class="breadcrumb-item"><a href="#">List Data Pelamar</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">List Data User / Pelamar</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Alamat</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($users as $view) { ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $view->nama_depan ?> <?= $view->nama_belakang ?></td>
                                            <td><?= $view->email ?></td>
                                            <td><?php if (empty($view->tgl_lahir)) {
                                                    echo 'belum diisi';
                                                } else { ?>
                                                    <?= date('d F Y', strtotime($view->tgl_lahir)) ?>
                                                <?php } ?></td>
                                            <td><?= $view->alamat ?></td>
                                            <td><?= $view->jenis_kelamin ?></td>
                                            <td>
                                                <a href="<?= base_url('Admin/detail_users/' . $view->id) ?>" title="Detail" class="badge bg-primary" style="color: white;"><i class="fa fa-list"></i></a>
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