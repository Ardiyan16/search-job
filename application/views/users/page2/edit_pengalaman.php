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
                <h1 class="text-white font-weight-bold">Edit Pengalaman</h1>
                <div class="custom-breadcrumbs">
                    <a href="#"><?= $this->session->userdata('nama_depan') ?></a> <span class="mx-2 slash">/</span>
                    <span class="text-white"><strong>Edit Pengalaman</strong></span>
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
                        <li><span class="active">Pengalaman</span></li>
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
                <form class="p-4 p-md-5 border rounded" action="<?= base_url('Pages/update_pengalaman') ?>" enctype="multipart/form-data" method="post">
                    <h3 class="text-black mb-5 border-bottom pb-2">Form Edit Pengalaman</h3>
                    <div class="form-group mt-3">
                        <label for="job-title">Posisi / Jabatan <span class="text-danger">*</span></label>
                        <input type="hidden" name="id" value="<?= $edit->id ?>">
                        <input type="hidden" class="form-control" id="job-title" name="id_users" value="<?= $edit->id_users ?>" placeholder="">
                        <input type="text" class="form-control" value="<?= $edit->posisi ?>" id="job-title" name="posisi" placeholder="">
                        <?= form_error('posisi', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group mt-3">
                        <label for="job-title">Nama Perusahaan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="<?= $edit->nama_perusahaan ?>" id="job-title" name="nama_perusahaan" placeholder="">
                        <?= form_error('nama_perusahaan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="job-title">Lama Kerja <span class="text-danger">*</span></label>
                        <input type="hidden" name="tgl" value="01">
                        <div class="row">
                            &nbsp;&nbsp;&nbsp;&nbsp;<select class="selectpicker border rounded col-lg-5" id="job-type" name="bulan_awal" data-style="btn-black" data-width="100%" data-live-search="true" title="Pilih Bulan">
                                <option <?php if (date('m', strtotime($edit->awal)) == '01') {
                                            echo "selected=\"selected\"";
                                        } ?> value="01">Januari</option>
                                <option <?php if (date('m', strtotime($edit->awal)) == '02') {
                                            echo "selected=\"selected\"";
                                        } ?> value="02">Februari</option>
                                <option <?php if (date('m', strtotime($edit->awal)) == '03') {
                                            echo "selected=\"selected\"";
                                        } ?> value="03">Maret</option>
                                <option <?php if (date('m', strtotime($edit->awal)) == '04') {
                                            echo "selected=\"selected\"";
                                        } ?> value="04">April</option>
                                <option <?php if (date('m', strtotime($edit->awal)) == '05') {
                                            echo "selected=\"selected\"";
                                        } ?> value="05">Mei</option>
                                <option <?php if (date('m', strtotime($edit->awal)) == '06') {
                                            echo "selected=\"selected\"";
                                        } ?> value="06">Juni</option>
                                <option <?php if (date('m', strtotime($edit->awal)) == '07') {
                                            echo "selected=\"selected\"";
                                        } ?> value="07">Juli</option>
                                <option <?php if (date('m', strtotime($edit->awal)) == '08') {
                                            echo "selected=\"selected\"";
                                        } ?> value="08">Agustus</option>
                                <option <?php if (date('m', strtotime($edit->awal)) == '09') {
                                            echo "selected=\"selected\"";
                                        } ?> value="09">September</option>
                                <option <?php if (date('m', strtotime($edit->awal)) == '10') {
                                            echo "selected=\"selected\"";
                                        } ?> value="10">Oktober</option>
                                <option <?php if (date('m', strtotime($edit->awal)) == '11') {
                                            echo "selected=\"selected\"";
                                        } ?> value="11">November</option>
                                <option <?php if (date('m', strtotime($edit->awal)) == '12') {
                                            echo "selected=\"selected\"";
                                        } ?> value="12">Desember</option>
                            </select>&nbsp;&nbsp;&nbsp;&nbsp;
                            <select class="selectpicker border rounded col-lg-5" id="job-type" name="tahun_awal" data-style="btn-black" data-width="100%" data-live-search="true" title="Pilih Tahun">
                                <?php for ($tahun = 1980; $tahun <= date('Y'); $tahun++) { ?>
                                    <option <?php if (date('Y', strtotime($edit->awal)) == $tahun) {
                                                echo "selected=\"selected\"";
                                            } ?> value="<?= $tahun ?>"><?= $tahun ?></option>
                                <?php } ?>
                            </select>
                            <?= form_error('bulan_awal', '<small class="text-danger pl-3">', '</small>'); ?>
                            <?= form_error('tahun_awal', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        Sampai
                        <div class="row">
                            &nbsp;&nbsp;&nbsp;&nbsp;<select class="selectpicker border rounded col-lg-5" id="job-type" name="bulan_akhir" data-style="btn-black" data-width="100%" data-live-search="true" title="Pilih Bulan">
                                <option <?php if (date('m', strtotime($edit->akhir)) == '01') {
                                            echo "selected=\"selected\"";
                                        } ?> value="01">Januari</option>
                                <option <?php if (date('m', strtotime($edit->akhir)) == '02') {
                                            echo "selected=\"selected\"";
                                        } ?> value="02">Februari</option>
                                <option <?php if (date('m', strtotime($edit->akhir)) == '03') {
                                            echo "selected=\"selected\"";
                                        } ?> value="03">Maret</option>
                                <option <?php if (date('m', strtotime($edit->akhir)) == '04') {
                                            echo "selected=\"selected\"";
                                        } ?> value="04">April</option>
                                <option <?php if (date('m', strtotime($edit->akhir)) == '05') {
                                            echo "selected=\"selected\"";
                                        } ?> value="05">Mei</option>
                                <option <?php if (date('m', strtotime($edit->akhir)) == '06') {
                                            echo "selected=\"selected\"";
                                        } ?> value="06">Juni</option>
                                <option <?php if (date('m', strtotime($edit->akhir)) == '07') {
                                            echo "selected=\"selected\"";
                                        } ?> value="07">Juli</option>
                                <option <?php if (date('m', strtotime($edit->akhir)) == '08') {
                                            echo "selected=\"selected\"";
                                        } ?> value="08">Agustus</option>
                                <option <?php if (date('m', strtotime($edit->akhir)) == '09') {
                                            echo "selected=\"selected\"";
                                        } ?> value="09">September</option>
                                <option <?php if (date('m', strtotime($edit->akhir)) == '10') {
                                            echo "selected=\"selected\"";
                                        } ?> value="10">Oktober</option>
                                <option <?php if (date('m', strtotime($edit->akhir)) == '11') {
                                            echo "selected=\"selected\"";
                                        } ?> value="11">November</option>
                                <option <?php if (date('m', strtotime($edit->akhir)) == '12') {
                                            echo "selected=\"selected\"";
                                        } ?> value="12">Desember</option>
                            </select>&nbsp;&nbsp;&nbsp;&nbsp;
                            <select class="selectpicker border rounded col-lg-5" id="job-type" name="tahun_akhir" data-style="btn-black" data-width="100%" data-live-search="true" title="Pilih Tahun">
                                <?php for ($tahun = 1980; $tahun <= date('Y'); $tahun++) { ?>
                                    <option <?php if (date('Y', strtotime($edit->akhir)) == $tahun) {
                                                echo "selected=\"selected\"";
                                            } ?> value="<?= $tahun ?>"><?= $tahun ?></option>
                                <?php } ?>
                            </select>
                            <?= form_error('bulan_akhir', '<small class="text-danger pl-3">', '</small>'); ?>
                            <?= form_error('tahun_akhir', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="job-description">Bidang <span class="text-danger">*</span></label>
                        <select class="form-control" name="bidang" id="bidang_spesialis">
                            <option></option>
                            <?php foreach ($spesialis as $view) { ?>
                                <option <?php if ($edit->bidang == $view['id']) {
                                            echo "selected=\"selected\"";
                                        } ?> value="<?= $view['id'] ?>"><?= $view['spesialis'] ?></option>;
                            <?php } ?>
                        </select>
                        <?= form_error('bidang', '<small class="text-danger pl-3">', '</small>'); ?>
                        <img src="<?= base_url() ?>assets/image/loading.gif" width="35" id="load1" style="display:none;" />
                    </div>

                    <div class="form-group">
                        <label for="job-region">Keahlian <span class="text-danger">*</span></label>
                        <select class="form-control" name="keahlian" id="bidang_kerja">
                            <?php if (!empty($edit->keahlian)) { ?>
                                <?php foreach ($keahlian as $view) { ?>
                                    <option <?php if ($edit->keahlian == $view['id']) {
                                                echo "selected=\"selected\"";
                                            } ?> value="<?= $view['id'] ?>"><?= $view['bidang_pekerjaan'] ?></option>
                                <?php } ?>
                            <?php } ?>
                            <option></option>
                        </select>
                        <?= form_error('keahlian', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="job-description">Provinsi <span class="text-danger">*</span></label>
                        <select class="form-control" name="provinces" id="provinsi">
                            <option></option>
                            <?php foreach ($provinsi as $prov) { ?>
                                <option <?php if ($edit->provinces == $prov['id']) {
                                            echo "selected=\"selected\"";
                                        } ?> value="<?= $prov['id'] ?>"><?= $prov['name'] ?></option>
                            <?php } ?>
                        </select>
                        <?= form_error('provinces', '<small class="text-danger pl-3">', '</small>'); ?>
                        <img src="<?= base_url() ?>assets/image/loading.gif" width="35" id="load1" style="display:none;" />
                    </div>

                    <div class="form-group">
                        <label for="job-description">Kota/Kabupaten <span class="text-danger">*</span></label>
                        <select class="form-control" name="city" id="kota">
                            <?php if (!empty($edit->city)) { ?>
                                <?php foreach ($kota as $city) { ?>
                                    <option <?php if ($edit->city == $city['id']) {
                                                echo "selected=\"selected\"";
                                            } ?> value="<?= $city['id'] ?>"><?= $city['name'] ?></option>
                                <?php } ?>
                            <?php } ?>
                            <option></option>
                        </select>
                        <?= form_error('city', '<small class="text-danger pl-3">', '</small>'); ?>
                        <!-- <img src="<?= base_url() ?>assets/image/loading.gif" width="35" id="load2" style="display:none;" /> -->
                    </div>

                    <div class="form-group">
                        <label for="job-description">Industri <span class="text-danger">*</span></label>
                        <select class="selectpicker border rounded" id="job-type" name="industri" data-style="btn-black" data-width="100%" data-live-search="true" title="Pilih Industri">
                            <?php foreach ($bidang_perusahaan as $view) { ?>
                                <option <?php if ($edit->industri == $view->id) {
                                            echo "selected=\"selected\"";
                                        } ?> value="<?= $view->id ?>"><?= $view->bidang_perusahaan ?></option>
                            <?php } ?>
                        </select>
                        <?= form_error('industri', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="job-title">Gaji</label>
                        <input type="text" class="form-control" id="job-title" value="<?= $edit->gaji ?>" id="currency-field" data-type="currency" name="gaji" placeholder="Silahkan diisi atau Boleh Kosong">
                        <?= form_error('gaji', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="job-title">Keterangan Tambahan</label>
                        <textarea type="text" class="form-control" rows="12" id="job-title" name="keterangan" placeholder=""><?= $edit->keterangan ?></textarea>
                        <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
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

    });

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
<?php $this->load->view('company/partials/footer') ?>