<?php $this->load->view('users/partials/header') ?>

<section class="section-hero overlay inner-page bg-image" style="background-image: url(<?= base_url('assets/image/background-home.png') ?>);" id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="text-white font-weight-bold">Resume</h1>
                <div class="custom-breadcrumbs">
                    <a href="#"><?= $this->session->userdata('nama_depan') ?></a> <span class="mx-2 slash">/</span>
                    <span class="text-white"><strong>Resume</strong></span>
                </div>
            </div>
        </div>
    </div>
    <a href="#next" class="scroll-button smoothscroll">
        <span class=" icon-keyboard_arrow_down"></span>
    </a>
</section>

<section class="site-section block__18514" id="next-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 mr-auto">
                <div class="border p-4 rounded">
                    <ul class="list-unstyled block__47528 mb-0">
                        <li><span active>
                                <div class="col-lg-4">
                                    <?php if ($view->picture == NULL) { ?>
                                        <a href="<?= base_url('assets/image/user.png') ?>" data-fancybox="gallery"><img src="<?= base_url('assets/image/user.png') ?>" height="100" width="100" alt="Image" title="foto anda" class="img-fluid"></a>
                                    <?php } else { ?>
                                        <a href="<?= base_url('assets/image/picture_users/' . $view->picture) ?>" data-fancybox="gallery"><img src="<?= base_url('assets/image/picture_users/' . $view->picture) ?>" height="100" width="100" alt="Image" title="foto anda" class="img-fluid"></a>
                                    <?php } ?>
                                </div>
                                <div class="col-lg-8">
                                    <a href="<?= base_url('Pages/profile') ?>"><?= $view->nama_depan ?> (lihat profile)</a>
                                </div>
                            </span>
                        </li>
                        <hr>
                        <li><a href="<?= base_url('Pages/pendidikan') ?>">Pendidikan</a></li>
                        <hr>
                        <li><a href="<?= base_url('Pages/pengalaman') ?>">Pengalaman</a></li>
                        <hr>
                        <li><a href="<?= base_url('Pages/profile_saya') ?>">Profile Saya</a></li>
                        <hr>
                        <li><a href="<?= base_url('Pages/kemampuan') ?>">Keterampilan</a></li>
                        <hr>
                        <li><a href="<?= base_url('Pages/info_tambahan') ?>">Info Tambahan</a></li>
                        <hr>
                        <li><span class="active">Unggah Resume</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="mb-4">
                    <h3 class="mb-4 h4 border-bottom">Resume Anda</h3>
                    <?php if (empty($data)) { ?>
                        <a href="#tambah" data-toggle="modal"><i class="fa fa-plus-circle"></i> Tambah Resum</a>
                    <?php } ?>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-10">
                        <?php if (empty($data)) { ?>
                            <p>Resume belum diisikan</p>
                        <?php } else { ?>
                            <p>
                                Nama File &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $data->file ?><br>
                                Diupload Terakhir pada &nbsp;&nbsp;: <?= date('d F Y', strtotime($data->tgl_unggah)) ?>
                                (<?= $data->waktu ?>)
                            </p>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="#edit" data-toggle="modal" class="btn btn-primary btn-sm">Perbarui</a>
                            <a href="<?= base_url('assets/document/resume/' . $data->file) ?>" class="btn btn-primary btn-sm">Download</a>
                            <a href="<?= base_url('Pages/delete_resume/' . $data->id) ?>" class="btn btn-primary btn-sm link-hapus">Hapus</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload File Resume</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Pages/save_resume') ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Upload Resume</label>
                        <input type="hidden" name="id_users" value="<?= $this->session->userdata('id') ?>">
                        <input type="file" class="form-control" name="file" accept=".pdf" />
                    </div>
                    <p>Catatan : File hanya bentuk pdf dan kurang dari 2 Mb</p>
                    <hr>
                    <div class="form-group" style="margin-top: 30px;">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Save</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload File Resume Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Pages/update_resume') ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Upload Resume</label>
                        <input type="hidden" name="id" value="<?= $data->id ?>">
                        <input type="file" class="form-control" name="file" accept=".pdf" />
                    </div>
                    <p>Catatan : File hanya bentuk pdf dan kurang dari 2 Mb</p>
                    <hr>
                    <div class="form-group" style="margin-top: 30px;">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Save</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>


<script>
    <?php if ($this->session->flashdata('success_create')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'resume berhasil disimpan',
            showConfirmButton: true,
            // timer: 1500
        })

    <?php elseif ($this->session->flashdata('file_kosong')) : ?>
        Swal.fire({
            icon: 'warning',
            title: 'Peringatan!',
            text: 'anda belum menginputkan file',
            showConfirmButton: true,
            // timer: 1500
        })

    <?php elseif ($this->session->flashdata('success_delete')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'resume berhasil dihapus',
            showConfirmButton: true,
            // timer: 1500
        })

    <?php elseif ($this->session->flashdata('success_update')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'resume berhasil diperbarui',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php endif ?>

    $('.link-hapus').on('click', function(e) {
        e.preventDefault();
        const link = $(this).attr('href');

        Swal.fire({
            title: 'Apakah anda yakin ?',
            text: "Data resume akan dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#828282',
            confirmButtonText: 'Hapus Data!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = link;
            }
        })

    })
</script>
<?php $this->load->view('users/partials/footer') ?>