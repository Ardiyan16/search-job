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
                    <h4>Bidang Spesialis</h4>
                    <br>
                    <a href="#add" data-toggle="modal" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Tambah Bidang Spesialis</a>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Menu Tambahan</a></li>
                    <li class="breadcrumb-item"><a href="#">Bidang Spesialis</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">List Bidang Spesialis</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Bidang Spesialis</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($bidang_spesialis as $view) { ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $view->spesialis ?></td>
                                            <td>
                                                <a href="#edit<?= $view->id ?>" data-toggle="modal" title="Edit" class="badge bg-primary" style="color: white;"><i class="fa fa-edit"></i></a>
                                                <a href="<?= base_url('Admin/delete_specialist/' . $view->id) ?>" onclick="return confirm('apakah anda yakin menghapus data ?')" title="Hapus" class="badge bg-danger" style="color: white;"><i class="fa fa-trash"></i></a>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Bidang Spesialis</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="basic-form">
                    <form action="<?= base_url('Admin/save_specialist') ?>" name="add_bidang_spesialis" method="POST">
                        <div class="form-group">
                            <label>Bidang Spesialis *</label>
                            <input type="text" class="form-control" name="spesialis" placeholder="">
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
                    <h5 class="modal-title" id="exampleModalLabel">Edit Bidang Spesialis</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="basic-form">
                        <form action="<?= base_url('Admin/update_specialist') ?>" method="POST">
                            <div class="form-group">
                                <label>Bidang Spesialis *</label>
                                <input type="hidden" class="form-control" value="<?= $edit->id ?>" name="id" placeholder="">
                                <input type="text" class="form-control" value="<?= $edit->spesialis ?>" name="spesialis" placeholder="">
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
<script>
    <?php if ($this->session->flashdata('success_create')) : ?>
        toastr.success("data berhasil tersimpan", "Berhasil!", {
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


    <?php elseif ($this->session->flashdata('failed_create')) : ?>
        toastr.error("data gagal disimpan ", "Gagal!", {
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

    <?php elseif ($this->session->flashdata('success_update')) : ?>
        toastr.success("data berhasil diedit / diupdate", "Berhasil!", {
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


    <?php elseif ($this->session->flashdata('failed_update')) : ?>
        toastr.error("data gagal diedit / diupdate", "Gagal!", {
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

    <?php elseif ($this->session->flashdata('success_delete')) : ?>
        toastr.success("data berhasil dihapus", "Success", {
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

    $(function() {
        // Initialize form validation on the registration form.
        // It has the name attribute "registration"
        $("form[name='add_bidang_spesialis']").validate({
            // Specify validation rules
            rules: {
                spesialis: {
                    required: true,
                }
            },
            // Specify validation error messages
            messages: {
                spesialis: {
                    required: "spesialis is required (spesialis harus di isi)",
                }
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });
</script>