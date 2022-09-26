<?php $this->load->view('admin/partials/header_admin.php') ?>
<style>
    form .error {
        color: red;
    }
</style>
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Pesan Balasan</h4>
                    <br>
                    <a href="<?= base_url('Admin/message') ?>" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Pesan User</a></li>
                    <li class="breadcrumb-item"><a href="#">List Pesan Balasan</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">List Pesan Balasan</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Email</th>
                                        <th>Pesan Balasan</th>
                                        <th>Waktu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($balasan as $view) { ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $view->email ?></td>
                                            <td><?= $view->pesan_balasan ?></td>
                                            <td><?= date('d F Y', strtotime($view->waktu)) ?> (<?= date('H:i', strtotime($view->waktu)) ?>)</td>
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