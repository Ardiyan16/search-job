<?php $this->load->view('admin/partials/header_admin.php') ?>
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Blog</h4>
                    <br>
                    <a href="<?= base_url('Admin/tambah_blog') ?>" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Tambah Blog</a>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Blog</a></li>
                    <li class="breadcrumb-item"><a href="#">List Data Blog</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">List Data Blog</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Topik</th>
                                        <th>Tanggal</th>
                                        <th>Penulis</th>
                                        <th>Images</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($blog as $view) { ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $view->judul ?></td>
                                            <td><?= $view->topik ?></td>
                                            <td><?= date('d F Y', strtotime($view->tanggal)) ?></td>
                                            <td><?php if ($view->role_id == 2) {
                                                    echo 'Search Job';
                                                } else {
                                                    $view->nama;
                                                } ?></td>
                                            <td><img src="<?= base_url('assets/image/blog_image/' . $view->images) ?>" width="75"></td>
                                            <td>
                                                <a href="<?= base_url('Admin/detail_company/' . $view->id) ?>" title="Detail" class="badge bg-success" style="color: white;"><i class="fa fa-list"></i></a>
                                                <?php if ($view->role_id == 2) { ?>
                                                    <a href="<?= base_url('Admin/edit_blog/' . $view->id) ?>" title="Edit" class="badge bg-primary" style="color: white;"><i class="fa fa-edit"></i></a>
                                                    <a href="<?= base_url('Admin/delete_blog/' . $view->id) ?>" title="Detele" class="badge bg-danger" style="color: white;"><i class="fa fa-trash"></i></a>
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
</script>