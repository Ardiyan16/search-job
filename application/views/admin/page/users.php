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
<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Bidang Pekerjaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="basic-form">
                    <form action="<?= base_url('Admin/save_field_job') ?>" name="add_bidang_pekerjaan" method="POST">
                        <div class="form-group">
                            <label>Bidang Pekerjaan *</label>
                            <select name="id_spesialis" id="single-select" title="Pilih Bidang Spesialis" class="form-control">
                                <?php foreach ($spesialis as $view) { ?>
                                    <option value="<?= $view->id ?>"><?= $view->spesialis ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Bidang Pekerjaan *</label>
                            <input type="text" class="form-control" name="bidang_pekerjaan" placeholder="">
                        </div>
                        <button type="reset" class="btn btn-warning mt-3"><i class="fa fa-refresh"></i> Reset</button>
                        <button type="submit" class="btn btn-primary mt-3"><i class="fa fa-save"></i> Save</button>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php foreach ($edit as $edit) { ?>
    <div class="modal fade" id="edit<?= $edit->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Bidang Pekerjaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="basic-form">
                        <form action="<?= base_url('Admin/update_field_job') ?>" method="POST">
                            <div class="form-group">
                                <label>Bidang Pekerjaan *</label>
                                <select name="id_spesialis" id="single-select" title="Pilih Bidang Spesialis" class="form-control">
                                    <?php foreach ($spesialis as $view) { ?>
                                        <option <?php if ($edit->id_spesialis == $view->id) {
                                                    echo "selected=\"selected\"";
                                                } ?> value="<?= $view->id ?>"><?= $view->spesialis ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Bidang Pekerjaan *</label>
                                <input type="hidden" class="form-control" value="<?= $edit->id ?>" name="id" placeholder="">
                                <input type="text" class="form-control" value="<?= $edit->bidang_pekerjaan ?>" name="bidang_pekerjaan" placeholder="">
                            </div>
                            <button type="reset" class="btn btn-warning mt-3"><i class="fa fa-refresh"></i> Reset</button>
                            <button type="submit" class="btn btn-primary mt-3"><i class="fa fa-save"></i> Save</button>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php $this->load->view('admin/partials/footer.php') ?>