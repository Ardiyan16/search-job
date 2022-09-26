<?php $this->load->view('admin/partials/header_admin.php') ?>
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Tambah Blog</h4>
                    <br>
                    <a href="<?= base_url('Admin/blog') ?>" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Blog</a></li>
                    <li class="breadcrumb-item"><a href="#">Tambah Blog</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Form Tambah Blog</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form class="form-valide-with-icon" action="<?= base_url('Admin/save_blog') ?>" enctype="multipart/form-data" method="post">
                                <div class="form-group">
                                    <label class="text-label">Judul</label>
                                    <input type="hidden" value="<?= $this->session->userdata('id') ?>" name="penulis">
                                    <input type="text" class="form-control" id="val-username1" name="judul" placeholder="Enter a judul..">
                                    <?= form_error('judul', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label class="text-label">Topik</label>
                                    <select id="single-select" name="topik">
                                        <?php foreach ($topik as $view) { ?>
                                            <option value="<?= $view->id ?>"><?= $view->topik ?></option>
                                        <?php } ?>
                                    </select>
                                    <?= form_error('topik', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label class="text-label">Isi Artikel</label>
                                    <textarea class="summernote" name="isi"></textarea>
                                    <?= form_error('isi', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label class="text-label">Images</label><br>
                                    <input type="file" name="images" accept="image/*" id="img_upload">
                                    <br>
                                    <?= form_error('images', '<small class="text-danger pl-3">', '</small>'); ?>
                                    <br>
                                    <img id="picture" src="#" alt="your image" title="foto yang akan diupload" height="150" width="150" />
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                                <button type="reset" class="btn btn-light"><i class="fa fa-refresh"></i> Reset</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('admin/partials/footer.php') ?>
<script>
    img_upload.onchange = evt => {
        const [file] = img_upload.files
        if (file) {
            picture.src = URL.createObjectURL(file)
        }
    }
</script>