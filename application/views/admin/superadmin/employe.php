<?php $this->load->view('admin/partials/header_superadmin.php') ?>
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Employe</h4>
                    <br>
                    <a href="<?= base_url('Superadmin/add_employe') ?>" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add Employe</a>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Employe</a></li>
                    <li class="breadcrumb-item"><a href="#">Data Employe</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">List Employe</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($employe as $view) { ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $view->nama ?></td>
                                            <td><?= $view->jabatan ?></td>
                                            <td><?= $view->email ?></td>
                                            <td>
                                                <?php
                                                if ($view->status == 0) {
                                                    echo "<span class='badge badge-danger' style='color: white;'>Non Aktif</span>";
                                                } else if ($view->status == 1) {
                                                    echo "<span class='badge badge-success' style='color: white;'>Aktif</span>";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($view->status == 0) {
                                                    echo "<a href=\"update_status_employe1/$view->id\"  OnClick=\"return confirm('Are you sure change status active ?');\" class='badge bg-success' title='change status active' style='color: white'><i class='fa fa-check'></i></a>";
                                                } else if ($view->status == 1) {
                                                    echo "<a href=\"update_status_employe2/$view->id\" OnClick=\"return confirm('Are you sure change status non active ?');\"' class='badge bg-warning' title='change status non active' style='color: white'><i class='fa fa-times'></i></a>";
                                                }
                                                ?>
                                                <a href="<?= base_url('Owner/delete_team/' . $view->id) ?>" onclick="return confirm('apakah anda yakin menghapus data ?')" title="Hapus" class="badge bg-danger" style="color: white;"><i class="fa fa-trash"></i></a>
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
<script>
    <?php if ($this->session->flashdata('success_create')) : ?>
        toastr.success("successfully save data", "Success", {
            timeOut: 3000,
            closeButton: !0,
            debug: !1,
            newestOnTop: !0,
            progressBar: !0,
            positionClass: "toast-top-right",
            preventDuplicates: !0,
            onclick: null,
            showDuration: "300",
            hideDuration: "1000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
            tapToDismiss: !1
        })

    <?php elseif ($this->session->flashdata('status_active')) : ?>
        toastr.success("success change status active", "Success", {
            timeOut: 3000,
            closeButton: !0,
            debug: !1,
            newestOnTop: !0,
            progressBar: !0,
            positionClass: "toast-top-right",
            preventDuplicates: !0,
            onclick: null,
            showDuration: "300",
            hideDuration: "1000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
            tapToDismiss: !1
        })

    <?php elseif ($this->session->flashdata('status_nonactive')) : ?>
        toastr.success("success change status non active", "Success", {
            timeOut: 3000,
            closeButton: !0,
            debug: !1,
            newestOnTop: !0,
            progressBar: !0,
            positionClass: "toast-top-right",
            preventDuplicates: !0,
            onclick: null,
            showDuration: "300",
            hideDuration: "1000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
            tapToDismiss: !1
        })
    <?php endif ?>
</script>