<?php $this->load->view('users/partials/header') ?>
<style>
    .select2-selection__rendered {
        line-height: 40px !important;
    }

    .select2-container .select2-selection--single {
        height: 40px !important;
    }

    .select2-selection__arrow {
        height: 40px !important;
    }
</style>

<section class="section-hero overlay inner-page bg-image" style="background-image: url(<?= base_url('assets/image/background-home.png') ?>);" id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="text-white font-weight-bold">Profile Saya</h1>
                <div class="custom-breadcrumbs">
                    <a href="#"><?= $this->session->userdata('nama_depan') ?></a> <span class="mx-2 slash">/</span>
                    <span class="text-white"><strong>Profile Saya</strong></span>
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
                        <li><span class="active">Profile Saya</span></li>
                        <hr>
                        <li><a href="<?= base_url('Pages/kemampuan') ?>">Keterampilan</a></li>
                        <hr>
                        <li><a href="<?= base_url('Pages/info_tambahan') ?>">Info Tambahan</a></li>
                        <hr>
                        <li><a href="<?= base_url('Pages/resume') ?>">Unggah Resume</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <!-- <div class="row mb-4"> -->
                <form class="p-4 p-md-5 border rounded" action="<?= base_url('Pages/update_profile') ?>" enctype="multipart/form-data" method="post">
                    <h3 class="text-black mb-5 border-bottom pb-2">Form Edit Profile</h3>
                    <div class="form-group mt-3">
                        <label for="job-title">Nama Depan <span class="text-danger">*</span></label>
                        <input type="hidden" class="form-control" id="job-title" name="id" value="<?= $edit->id ?>" placeholder="">
                        <input type="text" class="form-control" id="job-title" value="<?= $edit->nama_depan ?>" name="nama_depan" placeholder="">
                        <?= form_error('nama_depan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group mt-3">
                        <label for="job-title">Nama Belakang <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="job-title" value="<?= $edit->nama_belakang ?>" name="nama_belakang" placeholder="">
                        <?= form_error('nama_belakang', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="job-title">Tanggal Lahir <span class="text-danger">*</span></label>
                        <div class="row">
                            &nbsp;&nbsp;&nbsp;&nbsp;<select class="selectpicker border rounded col-lg-2" id="job-type" name="tgl" data-style="btn-black" data-width="100%" data-live-search="true" title="Tanggal">
                                <?php for ($a = 1; $a <= 31; $a++) { ?>
                                    <option <?php if (date('d', strtotime($edit->tgl_lahir)) == $a) {
                                                echo "selected=\"selected\"";
                                            } ?> value="<?= $a ?>"><?= $a ?></option>
                                <?php  } ?>
                            </select> &nbsp;&nbsp;&nbsp;&nbsp;
                            <select class="selectpicker border rounded col-lg-5" id="job-type" name="bln" data-style="btn-black" data-width="100%" data-live-search="true" title="Pilih Bulan">
                                <option <?php if (date('m', strtotime($edit->tgl_lahir)) == '01') {
                                            echo "selected=\"selected\"";
                                        } ?> value="01">Januari</option>
                                <option <?php if (date('m', strtotime($edit->tgl_lahir)) == '02') {
                                            echo "selected=\"selected\"";
                                        } ?> value="02">Februari</option>
                                <option <?php if (date('m', strtotime($edit->tgl_lahir)) == '03') {
                                            echo "selected=\"selected\"";
                                        } ?> value="03">Maret</option>
                                <option <?php if (date('m', strtotime($edit->tgl_lahir)) == '04') {
                                            echo "selected=\"selected\"";
                                        } ?> value="04">April</option>
                                <option <?php if (date('m', strtotime($edit->tgl_lahir)) == '05') {
                                            echo "selected=\"selected\"";
                                        } ?> value="05">Mei</option>
                                <option <?php if (date('m', strtotime($edit->tgl_lahir)) == '06') {
                                            echo "selected=\"selected\"";
                                        } ?> value="06">Juni</option>
                                <option <?php if (date('m', strtotime($edit->tgl_lahir)) == '07') {
                                            echo "selected=\"selected\"";
                                        } ?> value="07">Juli</option>
                                <option <?php if (date('m', strtotime($edit->tgl_lahir)) == '08') {
                                            echo "selected=\"selected\"";
                                        } ?> value="08">Agustus</option>
                                <option <?php if (date('m', strtotime($edit->tgl_lahir)) == '09') {
                                            echo "selected=\"selected\"";
                                        } ?> value="09">September</option>
                                <option <?php if (date('m', strtotime($edit->tgl_lahir)) == '10') {
                                            echo "selected=\"selected\"";
                                        } ?> value="10">Oktober</option>
                                <option <?php if (date('m', strtotime($edit->tgl_lahir)) == '11') {
                                            echo "selected=\"selected\"";
                                        } ?> value="11">November</option>
                                <option <?php if (date('m', strtotime($edit->tgl_lahir)) == '12') {
                                            echo "selected=\"selected\"";
                                        } ?> value="12">Desember</option>
                            </select> &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="number" value="<?= date('Y', strtotime($edit->tgl_lahir)) ?>" name="thn" class="form-control col-lg-3">
                            <?= form_error('tgl', '<small class="text-danger pl-3">', '</small>'); ?>
                            <?= form_error('bln', '<small class="text-danger pl-3">', '</small>'); ?>
                            <?= form_error('thn', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="job-title">No Telepon <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="job-title" value="<?= $edit->no_telp ?>" name="no_telp" placeholder="">
                        <?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="job-title">Alamat <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="job-title" value="<?= $edit->alamat ?>" name="alamat" placeholder="">
                        <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="job-description">Provinsi <span class="text-danger">*</span></label>
                        <select class="form-control" name="provinsi" id="provinsi">
                            <option></option>
                            <?php foreach ($provinsi as $prov) { ?>
                                <option <?php if ($edit->provinsi == $prov['id']) {
                                            echo "selected=\"selected\"";
                                        } ?> value="<?= $prov['id'] ?>"><?= $prov['name'] ?></option>
                            <?php } ?>
                        </select>
                        <?= form_error('provinsi', '<small class="text-danger pl-3">', '</small>'); ?>
                        <img src="<?= base_url() ?>assets/image/loading.gif" width="35" id="load1" style="display:none;" />
                    </div>

                    <div class="form-group">
                        <label for="job-description">Kota/Kabupaten <span class="text-danger">*</span></label>
                        <select class="form-control" name="kota" id="kota">
                            <?php if (!empty($edit->kota)) { ?>
                                <?php foreach ($kota as $city) { ?>
                                    <option <?php if ($edit->kota == $city['id']) {
                                                echo "selected=\"selected\"";
                                            } ?> value="<?= $city['id'] ?>"><?= $city['name'] ?></option>
                                <?php } ?>
                            <?php } ?>
                            <option></option>
                        </select>
                        <?= form_error('kota', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="job-description">Jenis Kelamin <span class="text-danger">*</span></label><br>
                        <input type="radio" name="jenis_kelamin" <?php echo ($edit->jenis_kelamin == 'Laki-laki')?'checked':'' ?> value="Laki-laki"> Laki laki
                        <input type="radio" name="jenis_kelamin" <?php echo ($edit->jenis_kelamin == 'Perempuan')?'checked':'' ?> value="Perempuan"> Perempuan
                        <?= form_error('kota', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="job-title">Negara <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="job-title" value="<?= $edit->negara ?>" name="negara" placeholder="">
                        <?= form_error('negara', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="job-title">Picture </label>
                        <input type="hidden" name="old_images" value="<?= $edit->picture ?>">
                        <input type="file" name="picture" class="form-control" accept="image/*" id="img_upload">
                        <!-- <?= form_error('logo', '<small class="text-danger pl-3">', '</small>'); ?> -->
                        <br>
                        <img id="picture" src="#" alt="your image" title="foto yang akan diupload" height="150" width="150" />
                    </div>


                    <hr>
                    <div class="form-group">
                        <button class="btn btn-danger" type="reset"><i class="fa fa-refresh"></i> Reset</button>
                        <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Save</button>
                    </div>
                </form>
                <!-- </div> -->
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        //untuk memanggil plugin select2
        $('#provinsi').select2({
            placeholder: 'Pilih Provinsi',
            language: "id"
        });
        $('#kota').select2({
            placeholder: 'Pilih Kota/Kabupaten',
            language: "id"
        });

        //saat pilihan provinsi di pilih maka mengambil data di data-wilayah menggunakan ajax
        $("#provinsi").change(function() {
            $("img#load1").show();
            var id_provinces = $(this).val();
            $.ajax({
                type: "POST",
                dataType: "html",
                url: "<?= base_url('Company/wilayah?jenis=kota') ?>",
                data: "id_provinces=" + id_provinces,
                success: function(msg) {
                    $("select#kota").html(msg);
                    $("img#load1").hide();
                    getAjaxKota();
                }
            });
        });

    });

    img_upload.onchange = evt => {
        const [file] = img_upload.files
        if (file) {
            picture.src = URL.createObjectURL(file)
        }
    }
</script>
<?php $this->load->view('company/partials/footer') ?>