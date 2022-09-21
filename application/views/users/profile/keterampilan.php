<?php $this->load->view('users/partials/header') ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>
<style>
    form .error {
        color: red;
    }
</style>

<section class="section-hero overlay inner-page bg-image" style="background-image: url(<?= base_url('assets/image/background-home.png') ?>);" id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="text-white font-weight-bold">Keterampilan</h1>
                <div class="custom-breadcrumbs">
                    <a href="#"><?= $this->session->userdata('nama_depan') ?></a> <span class="mx-2 slash">/</span>
                    <span class="text-white"><strong>Keterampilan</strong></span>
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
                                    <a href="<?= base_url('Pages/profile') ?>"><?= $view->nama_depan  ?> (lihat profile)</a>
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
                        <li><span class="active">Keterampilan</span></li>
                        <hr>
                        <li><a href="<?= base_url('Pages/info_tambahan') ?>">Info Tambahan</a></li>
                        <hr>
                        <li><a href="<?= base_url('Pages/resume') ?>">Unggah Resume</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="mb-4">
                    <h3 class="mb-4 h4 border-bottom">Keterampilan</h3>
                    <a href="#tambah" data-toggle="modal"><i class="fa fa-plus-circle"></i> Tambah Keterampilan</a>
                </div>
                <br>
                <?php foreach ($keterampilan as $view) { ?>
                    <div class="row">
                        <div class="col-lg-10">
                            <p>Keterampilan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $view->keterampilan ?> <br>
                                Tingkat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $view->tingkat ?>
                            </p>
                        </div>
                        <div class="">
                            <a href="#edit<?= $view->id ?>" data-toggle="modal" title="edit"><i class="fa fa-edit"></i></a>
                            <a href="<?= base_url('Pages/delete_kemampuan/' . $view->id) ?>" class="link-hapus" title="hapus"><i class="fa fa-trash"></i></a>
                        </div>
                    </div>
                    <hr>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Keterampilan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Pages/save_kemampuan') ?>" name="add_kemampuan" method="post">
                    <div class="form-group mt-3">
                        <label for="job-title">Keterampilan / Skill <span class="text-danger">*</span></label>
                        <input type="hidden" class="form-control" id="job-title" name="id_users" value="<?= $this->session->userdata('id') ?>" placeholder="">
                        <input type="text" class="form-control" id="job-title" name="keterampilan" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="job-title">Tingkat <span class="text-danger">*</span></label>
                        <select class="selectpicker border rounded" id="job-type" name="tingkat" data-style="btn-black" data-width="100%" data-live-search="true" title="Pilih Tingkatan">
                            <option value="Pemula">Pemula</option>
                            <option value="Menengah">Menengah</option>
                            <option value="Lanjutan">Lanjutan</option>
                        </select>
                    </div>
                    <hr>
                    <div class="form-group" style="margin-top: 30px;">
                        <button class="btn btn-secondary" type="reset"><i class="fa fa-refresh"></i> Reset</button>
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
<?php foreach ($keterampilan2 as $edit) { ?>
    <div class="modal fade" id="edit<?= $edit->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Edit Keterampilan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('Pages/update_kemampuan') ?>" name="edit_kemampuan" method="post">
                        <div class="form-group mt-3">
                            <label for="job-title">Keterampilan / Skill <span class="text-danger">*</span></label>
                            <input type="hidden" class="form-control" id="job-title" name="id" value="<?= $edit->id ?>" placeholder="">
                            <input type="text" class="form-control" id="job-title" value="<?= $edit->keterampilan ?>" name="keterampilan" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="job-title">Tingkat <span class="text-danger">*</span></label>
                            <select class="selectpicker border rounded" id="job-type" name="tingkat" data-style="btn-black" data-width="100%" data-live-search="true" title="Pilih Tingkatan">
                                <option <?php if ($edit->tingkat == 'Pemula') {
                                            echo "selected=\"selected\"";
                                        } ?> value="Pemula">Pemula</option>
                                <option <?php if ($edit->tingkat == 'Menengah') {
                                            echo "selected=\"selected\"";
                                        } ?> value="Menengah">Menengah</option>
                                <option <?php if ($edit->tingkat == 'Lanjutan') {
                                            echo "selected=\"selected\"";
                                        } ?> value="Lanjutan">Lanjutan</option>
                            </select>
                        </div>
                        <hr>
                        <div class="form-group" style="margin-top: 30px;">
                            <button class="btn btn-secondary" type="reset"><i class="fa fa-refresh"></i> Reset</button>
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
<?php } ?>
<script>
    <?php if ($this->session->flashdata('success_create')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'keterampilan berhasil disimpan',
            showConfirmButton: true,
            // timer: 1500
        })

    <?php elseif ($this->session->flashdata('success_delete')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'keterampilan berhasil dihapus',
            showConfirmButton: true,
            // timer: 1500
        })

        <?php elseif ($this->session->flashdata('success_update')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'keterampilan berhasil diperbarui',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php endif ?>

    $(function() {
        // Initialize form validation on the registration form.
        // It has the name attribute "registration"
        $("form[name='add_kemampuan']").validate({
            // Specify validation rules
            rules: {
                keterampilan: {
                    required: true,
                },
                tingkat: {
                    required: true,
                }
            },
            // Specify validation error messages
            messages: {
                keterampilan: {
                    required: "keterampilan is required (keterampilan harus di isi)",
                },
                tingkat: {
                    required: "tingkat is required (tingkat harus di isi)",
                }
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });

    $(function() {
        // Initialize form validation on the registration form.
        // It has the name attribute "registration"
        $("form[name='edit_kemampuan']").validate({
            // Specify validation rules
            rules: {
                keterampilan: {
                    required: true,
                },
                tingkat: {
                    required: true,
                }
            },
            // Specify validation error messages
            messages: {
                keterampilan: {
                    required: "keterampilan is required (keterampilan harus di isi)",
                },
                tingkat: {
                    required: "tingkat is required (tingkat harus di isi)",
                }
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });

    $('.link-hapus').on('click', function(e) {
        e.preventDefault();
        const link = $(this).attr('href');

        Swal.fire({
            title: 'Apakah anda yakin ?',
            text: "Data keterampilah akan dihapus!",
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