<?php $this->load->view('company/partials/header') ?>

<section class="section-hero overlay inner-page bg-image" style="background-image: url(<?= base_url('assets/image/background.png') ?>);" id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="text-white font-weight-bold">Profile</h1>
                <div class="custom-breadcrumbs">
                    <a href="#">Home</a> <span class="mx-2 slash">/</span>
                    <span class="text-white"><strong>Profile Company</strong></span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="site-section pb-0 portfolio-single" id="next-section">

    <div class="container">

        <div class="row mb-5 mt-5">

            <div class="col-lg-4">
                <figure>
                    <?php if ($edit->logo == NULL) { ?>
                        <a href="<?= base_url('assets/image/company.png') ?>" data-fancybox="gallery"><img src="<?= base_url('assets/image/company.png') ?>" alt="Image" class="img-fluid"></a>
                    <?php } else { ?>
                        <a href="<?= base_url('assets/image/company_logo/' . $edit->logo) ?>" data-fancybox="gallery"><img src="<?= base_url('assets/image/company_logo/' . $view->logo) ?>" alt="Image" class="img-fluid"></a>
                    <?php } ?>
                </figure>
            </div>

            <div class="col-lg-8 ml-auto h-100 jm-sticky-top">

                <div class="row mb-4">
                    <form class="p-4 p-md-5 border rounded" action="<?= base_url('Company/update_profile') ?>" enctype="multipart/form-data" method="post">
                        <h3 class="text-black mb-5 border-bottom pb-2">Form Kelengkapan Perusahaan</h3>
                        <div class="form-group">
                            <label for="job-title">Nama Penanggung Jawab</label>
                            <input type="hidden" class="form-control" id="job-title" name="id" value="<?= $edit->id ?>" placeholder="">
                            <input type="text" class="form-control" id="job-title" name="nama" value="<?= $edit->nama ?>" placeholder="">
                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="job-title">No Telepon</label>
                            <input type="text" class="form-control" id="job-title" name="no_telp" value="<?= $edit->no_telp ?>" placeholder="">
                            <?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="job-title">Nama Perusahaan</label>
                            <input type="text" class="form-control" id="job-title" name="nama_perusahaan" value="<?= $edit->nama_perusahaan ?>" placeholder="">
                            <?= form_error('nama_perusahaan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="job-title">Alamat</label>
                            <input type="text" class="form-control" id="job-title" name="alamat" value="<?= $edit->alamat ?>" placeholder="">
                            <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="job-title">Kabupaten / Kota</label>
                            <input type="text" class="form-control" id="job-title" name="kota" value="<?= $edit->kota ?>" placeholder="">
                            <?= form_error('kota', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="job-type">Ukuran Perusahaan</label>
                            <select class="selectpicker border rounded" id="job-type" name="jumlah_karyawan" data-style="btn-black" data-width="100%" data-live-search="true" title="Pilih Ukuran Perusahaan">
                                <?php foreach ($ukuran as $view) { ?>
                                    <option <?php if ($edit->jumlah_karyawan == $view->id) {
                                                echo "selected=\"selected\"";
                                            } ?> value="<?= $view->id ?>"><?= $view->ukuran ?></option>
                                <?php } ?>
                            </select>
                            <?= form_error('jumlah_karyawan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="job-title">Situs / Website Perusahaan</label>
                            <input type="text" class="form-control" id="job-title" name="situs" value="<?= $edit->situs ?>" placeholder="">
                            <?= form_error('situs', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="job-description">Deskripsi Perusahaan</label>
                            <textarea id="summernote" name="deskripsi" rows="12"><?= $edit->deskripsi ?></textarea>
                            <?= form_error('deskripsi', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="job-title">Logo</label>
                            <input type="hidden" name="old_images" value="<?= $edit->logo ?>">
                            <input type="file" name="logo" class="form-control" accept="image/*" id="img_upload">
                            <?= form_error('logo', '<small class="text-danger pl-3">', '</small>'); ?>
                            <br>
                            <img id="logo" src="#" alt="your image" title="logo yang akan diupload" height="150" width="150" />
                        </div>

                        <hr>
                        <div class="form-group">
                            <button class="btn btn-danger" type="reset"><i class="fa fa-refresh"></i> Reset</button>
                            <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>
</section>

<?php $this->load->view('company/partials/footer') ?>
<script>
    img_upload.onchange = evt => {
        const [file] = img_upload.files
        if (file) {
            logo.src = URL.createObjectURL(file)
        }
    }
</script>
