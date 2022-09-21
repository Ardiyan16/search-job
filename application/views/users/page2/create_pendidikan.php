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
                <h1 class="text-white font-weight-bold">Tambah Pendidikan</h1>
                <div class="custom-breadcrumbs">
                    <a href="#"><?= $this->session->userdata('nama_depan') ?></a> <span class="mx-2 slash">/</span>
                    <span class="text-white"><strong>Tambah Pendidikan</strong></span>
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
                        <li><span class="active">Pendidikan</span></li>
                        <hr>
                        <li><a href="<?= base_url('Pages/pengalaman') ?>">Pengalaman</a></li>
                        <hr>
                        <li><a href="<?= base_url('Pages/profile_saya') ?>">Profile Saya</a></li>
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
                <form class="p-4 p-md-5 border rounded" action="<?= base_url('Pages/save_pendidikan') ?>" enctype="multipart/form-data" method="post">
                    <h3 class="text-black mb-5 border-bottom pb-2">Form Tambah Pendidikan</h3>
                    <p>Tambahkan jenjang pendidikan tertinggi</p>
                    <div class="form-group mt-3">
                        <label for="job-title">Nama Institusi Pendidikan <span class="text-danger">*</span></label>
                        <input type="hidden" class="form-control" id="job-title" name="id_user" value="<?= $this->session->userdata('id') ?>" placeholder="">
                        <input type="text" class="form-control" id="job-title" name="nama_institusi" placeholder="">
                        <?= form_error('nama_institusi', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="job-title">Lulusan <span class="text-danger">*</span></label>
                        <div class="row">
                            &nbsp;&nbsp;&nbsp;&nbsp;<select class="selectpicker border rounded col-lg-5" id="job-type" name="bulan" data-style="btn-black" data-width="100%" data-live-search="true" title="Pilih Bulan">
                                <option value="Januari">Januari</option>
                                <option value="Februari">Februari</option>
                                <option value="Maret">Maret</option>
                                <option value="April">April</option>
                                <option value="Mei">Mei</option>
                                <option value="Juni">Juni</option>
                                <option value="Juli">Juli</option>
                                <option value="Agustus">Agustus</option>
                                <option value="September">September</option>
                                <option value="Oktober">Oktober</option>
                                <option value="November">November</option>
                                <option value="Desember">Desember</option>
                            </select>&nbsp;&nbsp;&nbsp;&nbsp;
                            <select class="selectpicker border rounded col-lg-5" id="job-type" name="tahun" data-style="btn-black" data-width="100%" data-live-search="true" title="Pilih Tahun">
                                <?php for ($tahun = 1980; $tahun <= date('Y'); $tahun++) { ?>
                                    <option value="<?= $tahun ?>"><?= $tahun ?></option>
                                <?php } ?>
                            </select>
                            <?= form_error('bulan', '<small class="text-danger pl-3">', '</small>'); ?>
                            <?= form_error('tahun', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="job-description">Provinsi <span class="text-danger">*</span></label>
                        <select class="form-control" name="provinsi" id="provinsi">
                            <option></option>
                            <?php foreach ($provinsi as $prov) {
                                echo '<option value="' . $prov['id'] . '">' . $prov['name'] . '</option>';
                            }
                            ?>
                        </select>
                        <?= form_error('provinsi', '<small class="text-danger pl-3">', '</small>'); ?>
                        <img src="<?= base_url() ?>assets/image/loading.gif" width="35" id="load1" style="display:none;" />
                    </div>

                    <div class="form-group">
                        <label for="job-description">Kota/Kabupaten <span class="text-danger">*</span></label>
                        <select class="form-control" name="kota" id="kota">
                            <option></option>
                        </select>
                        <?= form_error('kota', '<small class="text-danger pl-3">', '</small>'); ?>
                        <!-- <img src="<?= base_url() ?>assets/image/loading.gif" width="35" id="load2" style="display:none;" /> -->
                    </div>

                    <div class="form-group">
                        <label for="job-description">Kualifikasi <span class="text-danger">*</span></label>
                        <select class="selectpicker border rounded" id="job-type" name="kualifikasi" data-style="btn-black" data-width="100%" data-live-search="true" title="Pilih Kualifikasi">
                            <option value="SMA/SMK">SMA/SMK</option>
                            <option value="D3 (Diploma 3)">D3 (Diploma 3)</option>
                            <option value="Sarjana (S1/D4)">Sarjana (S1/D4)</option>
                            <option value="Magister (S2)">Magister (S2)</option>
                            <option value="Doktor (S3)">Doktor (S3)</option>
                        </select>
                        <?= form_error('kualifikasi', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="job-title">Bidang Studi <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="job-title" name="bidang_studi" placeholder="">
                        <?= form_error('bidang_studi', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="job-title">Nilai Akhir</label>
                        <input type="text" class="form-control" id="job-title" name="nilai_akhir" placeholder="">
                        <?= form_error('nilai_akhir', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="job-title">Informasi Tambahan</label>
                        <textarea type="text" class="form-control" rows="12" id="job-title" name="informasi_tambahan" placeholder=""></textarea>
                        <?= form_error('informasi_tambahan', '<small class="text-danger pl-3">', '</small>'); ?>
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
</script>
<?php $this->load->view('company/partials/footer') ?>