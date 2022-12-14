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
                        <label for="job-description">Bidang Spesialis</label>
                        <select class="form-control" name="bid_spesialis" id="bidang_spesialis">
                            <option></option>
                            <?php foreach ($spesialis as $view) {
                                echo '<option value="' . $view['id'] . '">' . $view['spesialis'] . '</option>';
                            }
                            ?>
                        </select>
                        <?= form_error('bid_spesialis', '<small class="text-danger pl-3">', '</small>'); ?>
                        <img src="<?= base_url() ?>assets/image/loading.gif" width="35" id="load1" style="display:none;" />
                    </div>

                    <div class="form-group">
                        <label for="job-region">Bidang Pekerjaan</label>
                        <select class="form-control" name="bid_kerja" id="bidang_kerja">
                            <option></option>
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

                    <!-- <button type="button" class="btn btn-primary btn-sm" id="rentang_gaji"><i class="fa fa-plus-circle"></i> Masukkan Rentang Gaji</button>
                    <br> -->
                    <!-- <div id="input-gaji" class="mt-3 col-lg-12">

                    </div> -->
                    <div class="form-group">
                        <label for="job-title">Rentang Gaji</label>
                        <div class="row">
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="text" class="form-control col-lg-5" id="currency-field" value="" data-type="currency" name="rentang_gaji" placeholder="">&nbsp;&nbsp;&nbsp;
                            <input type="text" class="form-control col-lg-5" id="currency-field" value="" data-type="currency" name="rentang_gaji2" placeholder="">
                            <p>&nbsp;&nbsp;&nbsp;&nbsp;rentan gaji boleh kosong</p>
                        </div>
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
                        <textarea id="summernote2" name="deskripsi_job" rows="12"></textarea>
                        <?= form_error('deskripsi_job', '<small class="text-danger pl-3">', '</small>'); ?>
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

        //saat pilihan bidang spesialis di pilih maka mengambil data di bidang_kerja menggunakan ajax
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

    $('#rentang_gaji').on('click', function() {
        console.log('nambah');
        input_gaji();
    });

    function input_gaji() {
        var baris = "<div class'form-group'>";
        baris += "<label>" + "Rentang Gaji" + "</label>";
        baris += "<input type='text' class='form-control col-lg-5' id='currency-field' value='' data-type='currency' name='rentang_gaji' placeholder=''><input type='text' class='form-control col-lg-5' id='currency-field' value='' data-type='currency' name='rentang_gaji2' placeholder=''>"
        baris += "</div>"

        $('#input-gaji').append(baris);
    }


    $("input[data-type='currency']").on({
        keyup: function() {
            formatCurrency($(this));
        },
        blur: function() {
            formatCurrency($(this), "blur");
        }
    });


    function formatNumber(n) {
        // format number 1000000 to 1,234,567
        return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    }


    function formatCurrency(input, blur) {
        // appends $ to value, validates decimal side
        // and puts cursor back in right position.

        // get input value
        var input_val = input.val();

        // don't validate empty input
        if (input_val === "") {
            return;
        }

        // original length
        var original_len = input_val.length;

        // initial caret position 
        var caret_pos = input.prop("selectionStart");

        // check for decimal
        if (input_val.indexOf(".") >= 0) {

            // get position of first decimal
            // this prevents multiple decimals from
            // being entered
            var decimal_pos = input_val.indexOf(".");
            // add commas to left side of number
            left_side = formatNumber(left_side);

            // validate right side
            right_side = formatNumber(right_side);

            // join number by .
            input_val = left_side;

        } else {
            // no decimal entered
            // add commas to number
            // remove all non-digits
            input_val = formatNumber(input_val);
            // input_val = "$" + input_val;

        }

        // send updated string to input
        input.val(input_val);

        // put caret back in the right position
        var updated_len = input_val.length;
        caret_pos = updated_len - original_len + caret_pos;
        input[0].setSelectionRange(caret_pos, caret_pos);
    }
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