<?php $this->load->view('company/partials/header') ?>
<section class="section-hero overlay inner-page bg-image" style="background-image: url(<?= base_url('assets/image/background.png') ?>);" id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="text-white font-weight-bold">Posting Lowongan</h1>
                <div class="custom-breadcrumbs">
                    <a href="#">Home</a> <span class="mx-2 slash">/</span>
                    <span class="text-white"><strong>Posting Lowongan</strong></span>
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
                        <h2>Posting Lowongan Pekerjaan</h2>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <a href="<?= base_url('Company/list_job') ?>" class="btn btn-primary mb-3"><i class="fa fa-list"></i> List Lowongan</a>
        </div>
        <div class="row mb-5">
            <div class="col-lg-12">
                <form class="p-4 p-md-5 border rounded" action="<?= base_url('Company/save_post_job') ?>" method="post">
                    <h3 class="text-black mb-5 border-bottom pb-2">Form Posting Lowongan</h3>
                    <div class="form-group">
                        <label for="job-title">Judul Lowongan / Nama Lowongan</label>
                        <input type="text" class="form-control" id="job-title" name="job_title" placeholder="">
                        <?= form_error('job_title', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="job-region">Bidang Pekerjaan</label>
                        <select class="selectpicker border rounded" id="job-region" name="bid_kerja" data-style="btn-black" data-width="100%" data-live-search="true" title="Pilih Bidang Pekerjaan">
                            <?php foreach ($bidang_pekerjaan as $view) { ?>
                                <option value="<?= $view->id ?>"><?= $view->bidang_pekerjaan ?></option>
                            <?php } ?>
                        </select>
                        <?= form_error('bid_kerja', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="job-type">Tingkat Pekerjaan</label>
                        <select class="selectpicker border rounded" id="job-type" name="tingkat_pekerjaan" data-style="btn-black" data-width="100%" data-live-search="true" title="Pilih Tingkat Pekerjaan">
                            <?php foreach ($tingkat_pekerjaan as $view) { ?>
                                <option value="<?= $view->id ?>"><?= $view->tingkat_kerja ?></option>
                            <?php } ?>
                        </select>
                        <?= form_error('tingkat_pekerjaan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="job-description">Benefit</label>
                        <textarea id="summernote" name="benefit" rows="12"></textarea>
                        <!-- <?= form_error('benefit', '<small class="text-danger pl-3">', '</small>'); ?> -->
                    </div>

                    <div class="form-group">
                        <label for="job-title">Rentang Gaji</label>
                        <input type="text" class="form-control" id="job-title" name="rentang_gaji" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="job-description">Provinsi</label>
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
                        <label for="job-description">Kota/Kabupaten</label>
                        <select class="form-control" name="kota" id="kota">
                            <option></option>
                        </select>
                        <?= form_error('kota', '<small class="text-danger pl-3">', '</small>'); ?>
                        <!-- <img src="<?= base_url() ?>assets/image/loading.gif" width="35" id="load2" style="display:none;" /> -->
                    </div>

                    <div class="form-group">
                        <label for="job-title">Pengalaman</label>
                        <input type="text" class="form-control" id="job-title" name="pengalaman" placeholder="">
                        <?= form_error('pengalaman', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="job-title">Kualifikasi</label>
                        <input type="text" class="form-control" id="job-title" name="kualifikasi" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="job-type">Jenis Pekerjaan</label>
                        <select class="selectpicker border rounded" id="job-type" name="jenis_pekerjaan" data-style="btn-black" data-width="100%" data-live-search="true" title="Pilih Jenis Pekerjaan">
                            <?php foreach ($jenis_pekerjaan as $view) { ?>
                                <option value="<?= $view->id ?>"><?= $view->jenis_kerja ?></option>
                            <?php } ?>
                        </select>
                        <?= form_error('jenis_pekerjaan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="job-description">Deskripsi Pekerjaan</label>
                        <textarea id="summernote2" name="deskripsi" rows="12"></textarea>
                        <?= form_error('deskripsi', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="job-title">Waktu Proses Lamaran</label>
                        <input type="text" class="form-control" id="job-title" name="waktu_proses" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="job-title">Tunjangan dan lain-lain</label>
                        <input type="text" class="form-control" id="job-title" name="tunjangan" placeholder="">
                        <input type="hidden" class="form-control" value="<?= $this->session->userdata('id') ?>" id="job-title" name="id_company" placeholder="">
                    </div>

                    <hr>
                    <div class="form-group">
                        <button class="btn btn-danger" type="reset"><i class="fa fa-refresh"></i> Reset</button>
                        <button class="btn btn-primary" type="submit"><i class="fa fa-paper-plane"></i> Posting Lowongan</button>
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
        $('#provinsi').select2({
            placeholder: 'Pilih Provinsi',
            language: "id"
        });
        $('#kota').select2({
            placeholder: 'Pilih Kota/Kabupaten',
            language: "id"
        });
        // $('#kecamatan').select2({
        //     placeholder: 'Pilih Kecamatan',
        //     language: "id"
        // });
        // $('#kelurahan').select2({
        //     placeholder: 'Pilih Kelurahan',
        //     language: "id"
        // });

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

        //     $("#kecamatan").change(getAjaxKecamatan);

        //     function getAjaxKecamatan() {
        //         $("img#load3").show();
        //         var id_district = $("#kecamatan").val();
        //         $.ajax({
        //             type: "POST",
        //             dataType: "html",
        //             url: "data-wilayah.php?jenis=kelurahan",
        //             data: "id_district=" + id_district,
        //             success: function(msg) {
        //                 $("select#kelurahan").html(msg);
        //                 $("img#load3").hide();
        //             }
        //         });
        //     }
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