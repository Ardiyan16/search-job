<?php $this->load->view('admin/partials/header_admin.php') ?>
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Perusahaan</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Perusahaan</a></li>
                    <li class="breadcrumb-item"><a href="#">List Data Perusahaan</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">List Data Perusahaan</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Perusahaan</th>
                                        <th>Alamat</th>
                                        <th>Kota</th>
                                        <th>Ukuran Perusahaan</th>
                                        <th>Bidang</th>
                                        <th>logo</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($company as $view) { ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $view->nama_perusahaan ?></td>
                                            <td><?= $view->alamat ?></td>
                                            <td><?= $view->kota ?></td>
                                            <td><?= $view->ukuran ?></td>
                                            <td><?= $view->bidang_perusahaan ?></td>
                                            <td><?php if (!empty($view->logo)) { ?>
                                                    <img src="<?= base_url('assets/image/company_logo/' . $view->logo) ?>" width="75">
                                                <?php } else { ?>
                                                    <img src="<?= base_url('assets/image/company.png') ?>" width="75">
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('Admin/detail_company/' . $view->id) ?>" title="Detail" class="badge bg-primary" style="color: white;"><i class="fa fa-list"></i></a>
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