<?php $this->load->view('company/partials/header') ?>
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
<section class="section-hero overlay inner-page bg-image" style="background-image: url(<?= base_url('assets/image/background.png') ?>);" id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="text-white font-weight-bold">Edit Posting Lowongan</h1>
                <div class="custom-breadcrumbs">
                    <a href="#">Home</a> <span class="mx-2 slash">/</span>
                    <span class="text-white"><strong>Edit Posting Lowongan</strong></span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="site-section">
    <div class="container">

        <div class="row align-items-center mb-5">
            <div class="col-lg-8 mb-4 mb-lg-0">
                <div class="d-flex align-items-center">
                    <div>
                        <h2>Edit Posting Lowongan Pekerjaan</h2>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <a href="<?= base_url('Company/detail_lowongan/' . $edit->id) ?>" class="btn btn-primary mb-3"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
        </div>
        <div class="row mb-5">
            <div class="col-lg-12">
                <form class="p-4 p-md-5 border rounded" action="<?= base_url('Company/update_post_job') ?>" method="post">
                    <h3 class="text-black mb-5 border-bottom pb-2">Form Edit Posting Lowongan</h3>
                    <div class="form-group">
                        <label for="job-title">Judul Lowongan / Nama Lowongan</label>
                        <input type="hidden" name="id" value="<?= $edit->id ?>">
                        <input type="text" class="form-control" id="job-title" value="<?= $edit->job_title ?>" name="job_title" placeholder="">
                        <?= form_error('job_title', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="job-description">Bidang Spesialis</label>
                        <select class="form-control" name="bid_spesialis" id="bidang_spesialis">
                            <option></option>
                            <?php foreach ($spesialis as $view) { ?>
                                <option <?php if ($edit->bid_spesialis == $view['id']) {
                                            echo "selected=\"selected\"";
                                        } ?> value="<?= $view['id'] ?>"><?= $view['spesialis'] ?></option>
                            <?php } ?>
                        </select>
                        <?= form_error('bidang_spesialis', '<small class="text-danger pl-3">', '</small>'); ?>
                        <img src="<?= base_url() ?>assets/image/loading.gif" width="35" id="load1" style="display:none;" />
                    </div>

                    <div class="form-group">
                        <label for="job-region">Bidang Pekerjaan</label>
                        <select class="form-control" name="bid_kerja" id="bidang_kerja">
                            <?php if (!empty($edit->bid_kerja)) { ?>
                                <?php foreach ($bid_kerja as $job) { ?>
                                    <option <?php if ($edit->bid_kerja == $job['id']) {
                                                echo "selected=\"selected\"";
                                            } ?> value="<?= $job['id'] ?>"><?= $job['bidang_pekerjaan'] ?></option>
                                <?php } ?>
                            <?php } ?>
                            <option></option>
                        </select>
                        <?= form_error('bid_kerja', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="job-type">Tingkat Pekerjaan</label>
                        <select class="selectpicker border rounded" id="job-type" name="tingkat_pekerjaan" data-style="btn-black" data-width="100%" data-live-search="true" title="Pilih Tingkat Pekerjaan">
                            <?php foreach ($tingkat_pekerjaan as $view) { ?>
                                <option <?php if ($edit->tingkat_pekerjaan == $view->id) {
                                            echo "selected=\"selected\"";
                                        } ?> value="<?= $view->id ?>"><?= $view->tingkat_kerja ?></option>
                            <?php } ?>
                        </select>
                        <?= form_error('tingkat_pekerjaan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="job-description">Benefit</label>
                        <textarea id="summernote" name="benefit" rows="12"><?= $edit->benefit ?></textarea>
                        <!-- <?= form_error('benefit', '<small class="text-danger pl-3">', '</small>'); ?> -->
                    </div>

                    <div class="form-group">
                        <label for="job-title">Rentang Gaji</label>
                        <div class="row">
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="text" class="form-control col-lg-5" id="job-title" value="<?= $edit->rentang_gaji ?>" name="rentang_gaji" placeholder="">&nbsp;&nbsp;&nbsp;
                            <input type="text" class="form-control col-lg-5" id="job-title" value="<?= $edit->rentang_gaji2 ?>" name="rentang_gaji2" placeholder="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="job-description">Provinsi</label>
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
                        <label for="job-description">Kota/Kabupaten</label>
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
                        <!-- <img src="<?= base_url() ?>assets/image/loading.gif" width="35" id="load2" style="display:none;" /> -->
                    </div>

                    <div class="form-group">
                        <label for="job-title">Pengalaman</label>
                        <input type="text" class="form-control" id="job-title" value="<?= $edit->pengalaman ?>" name="pengalaman" placeholder="">
                        <?= form_error('pengalaman', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="job-title">Kualifikasi</label>
                        <input type="text" class="form-control" id="job-title" value="<?= $edit->kualifikasi ?>" name="kualifikasi" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="job-type">Jenis Pekerjaan</label>
                        <select class="selectpicker border rounded" id="job-type" name="jenis_pekerjaan" data-style="btn-black" data-width="100%" data-live-search="true" title="Pilih Jenis Pekerjaan">
                            <?php foreach ($jenis_pekerjaan as $view) { ?>
                                <option <?php if ($edit->jenis_pekerjaan == $view->id) {
                                            echo "selected=\"selected\"";
                                        } ?> value="<?= $view->id ?>"><?= $view->jenis_kerja ?></option>
                            <?php } ?>
                        </select>
                        <?= form_error('jenis_pekerjaan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="job-description">Deskripsi Pekerjaan</label>
                        <textarea id="summernote2" name="deskripsi_job" rows="12"><?= $edit->deskripsi_job ?></textarea>
                        <?= form_error('deskripsi_job', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="job-title">Waktu Proses Lamaran</label>
                        <input type="text" class="form-control" id="job-title" name="waktu_proses" value="<?= $edit->waktu_proses ?>" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="job-title">Tunjangan dan lain-lain</label>
                        <input type="text" class="form-control" id="job-title" value="<?= $edit->tunjangan ?>" name="tunjangan" placeholder="">
                        <input type="hidden" class="form-control" value="<?= $this->session->userdata('id') ?>" id="job-title" name="id_company" placeholder="">
                    </div>

                    <hr>
                    <div class="form-group">
                        <button class="btn btn-danger" type="reset"><i class="fa fa-refresh"></i> Reset</button>
                        <button class="btn btn-primary" type="submit"><i class="fa fa-paper-plane"></i> Post Update</button>
                    </div>
                </form>
            </div>


        </div>
        <div class="row align-items-center mb-5">
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        //untuk memanggil plugin select2
        $('#bidang_spesialis').select2({
            placeholder: 'Pilih Bidang Spesialis',
            language: "id"
        });
        $('#bidang_kerja').select2({
            placeholder: 'Pilih Bidang Pekerjaan',
            language: "id"
        });

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

        $("#bidang_spesialis").change(function() {
            $("img#load1").show();
            var id_spesialis = $(this).val();
            $.ajax({
                type: "POST",
                dataType: "html",
                url: "<?= base_url('Company/bidang_kerja?jenis=bid_kerja') ?>",
                data: "id_spesialis=" + id_spesialis,
                success: function(msg) {
                    $("select#bidang_kerja").html(msg);
                    $("img#load1").hide();
                    getAjaxKota();
                }
            });
        });

        // $("#kota").change(getAjaxKota);

        // function getAjaxKota() {
        //     $("img#load2").show();
        //     var id_regencies = $("#kota").val();
        //     $.ajax({
        //         type: "POST",
        //         dataType: "html",
        //         url: "data-wilayah.php?jenis=kecamatan",
        //         data: "id_regencies=" + id_regencies,
        //         success: function(msg) {
        //             $("select#kecamatan").html(msg);
        //             $("img#load2").hide();
        //             getAjaxKecamatan();
        //         }
        //     });
        // }

    });
</script>
<script>
    <?php if ($this->session->flashdata('complete_profile')) : ?>
        Swal.fire({
            icon: 'warning',
            title: 'Gagal!',
            text: 'Lengkapi profil perusahaan anda terlebih dahulu',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php endif ?>
</script>
<?php $this->load->view('company/partials/footer') ?>