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
                    <h4>Pesan User</h4>
                    <br>
                    <a href="<?= base_url('Admin/list_balasan') ?>" class="btn btn-primary"><i class="fa fa-list"></i> List Pesan Balasan</a>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Pesan User</a></li>
                    <li class="breadcrumb-item"><a href="#">List Data Pesan</a></li>
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
                                        <th>Nama Pengirim</th>
                                        <th>Email</th>
                                        <th>Waktu</th>
                                        <th>Subjek</th>
                                        <th>Pesan</th>
                                        <th>Status</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($message as $view) { ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $view->nama_depan ?> <?= $view->nama_belakang ?></td>
                                            <td><?= $view->email ?></td>
                                            <td><?= date('d F Y', strtotime($view->waktu)) ?> (<?= date('H:i', strtotime($view->waktu)) ?>)</td>
                                            <td><?= $view->subject ?></td>
                                            <td><?= substr($view->pesan, 0, 200) ?></td>
                                            <td><?php if ($view->status_pesan == 0) { ?>
                                                    <span class="badge badge-danger" style="color: white;">Belum Terbalas</span>
                                                <?php } elseif ($view->status_pesan == 1) { ?>
                                                    <span class="badge badge-success" style="color: white;">Sudah Terbalas</span>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <a href="#detail<?= $view->id ?>" data-toggle="modal" title="Detail Pesan" class="badge bg-primary" style="color: white;"><i class="fa fa-envelope"></i></a> |
                                                <?php if ($view->status_pesan == 0) { ?>
                                                    <a href="#balas<?= $view->id ?>" data-toggle="modal" title="Balas" class="badge bg-success" style="color: white;"><i class="fa fa-reply"></i></a>
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
</div>
<?php foreach ($message as $detail) { ?>
    <div class="modal fade" id="detail<?= $detail->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Isi Pesan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <p style="color: black;"><?= $detail->pesan ?></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php foreach ($message as $balasan) { ?>
    <div class="modal fade" id="balas<?= $balasan->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Balas Pesan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="card">
                        <form action="<?= base_url('Admin/balas_pesan') ?>" method="post" name="balas_pesan">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="hidden" value="<?= $detail->id ?>" readonly class="form-control" name="id">
                                <input type="text" value="<?= $detail->email ?>" readonly class="form-control" name="email">
                            </div>
                            <div class="form-group">
                                <label>Pesan</label>
                                <textarea class="form-control" name="pesan" id="pesan" rows="12" placeholder="Balasan Pesan"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Balas</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php $this->load->view('admin/partials/footer.php') ?>
<script>
    <?php if ($this->session->flashdata('balasan_terkirim')) : ?>
        toastr.success("balasan pesan berhasil terkirim", "Berhasil!", {
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
        $("form[name='add_bidang_pekerjaan']").validate({
            // Specify validation rules
            rules: {
                id_spesialis: {
                    required: true,
                },
                bidang_pekerjaan: {
                    required: true,
                }
            },
            // Specify validation error messages
            messages: {
                id_spesialis: {
                    required: "spesialis is required (spesialis harus di isi)",
                },
                bidang_pekerjaan: {
                    required: "bidang pekerjaan is required (bidang pekerjaan harus di isi)",
                }
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });
</script>
<script>
    $(function() {
        // Initialize form validation on the registration form.
        // It has the name attribute "registration"
        $("form[name='balas_pesan']").validate({
            // Specify validation rules
            rules: {
                pesan: {
                    required: true,
                }
            },
            // Specify validation error messages
            messages: {
                pesan: {
                    required: "pesan is required (pesan harus di isi)",
                }
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });
</script>