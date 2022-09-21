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
                <h1 class="text-white font-weight-bold">Edit Info tambahan</h1>
                <div class="custom-breadcrumbs">
                    <a href="#"><?= $this->session->userdata('nama_depan') ?></a> <span class="mx-2 slash">/</span>
                    <span class="text-white"><strong>Edit Info tambahan</strong></span>
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
                        <li><span class="active">Info Tambahan</span></li>
                        <hr>
                        <li><a href="<?= base_url('Pages/resume') ?>">Unggah Resume</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <!-- <div class="row mb-4"> -->
                <form class="p-4 p-md-5 border rounded" action="<?= base_url('Pages/update_info_tambahan') ?>" enctype="multipart/form-data" method="post">
                    <h3 class="text-black mb-5 border-bottom pb-2">Form Edit Informasi</h3>
                    <div class="form-group mt-3">
                        <label for="job-title">Gaji yang diharapkan <span class="text-danger">*</span></label>
                        <input type="hidden" name="id" value="<?= $edit->id ?>">
                        <input type="hidden" class="form-control" id="job-title" name="id_users" value="<?= $edit->id_users ?>" placeholder="">
                        <input type="text" class="form-control" id="currency-field" value="<?= $edit->gaji_diharapkan ?>" data-type="currency" name="gaji_diharapkan" placeholder="">
                        <?= form_error('gaji_diharapkan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="job-description">Lokasi yang diharapkan <span class="text-danger">*</span></label>
                        <div class="row">
                            <div class="col-lg-5">
                                <select class="form-control" name="provinsi1" id="provinsi1">
                                    <option></option>
                                    <?php foreach ($provinsi as $prov) { ?>
                                        <option <?php if ($edit->provinsi1 == $prov['id']) {
                                                    echo "selected=\"selected\"";
                                                } ?> value="<?= $prov['id'] ?>"><?= $prov['name'] ?></option>
                                    <?php } ?>
                                </select>
                                <?= form_error('provinsi1', '<small class="text-danger pl-3">', '</small>'); ?>
                                <img src="<?= base_url() ?>assets/image/loading.gif" width="35" id="load1" style="display:none;" />
                            </div>
                            <div class="col-lg-5">
                                <select class="form-control" name="kota1" id="kota1">
                                    <?php if (!empty($edit->kota1)) { ?>
                                        <?php foreach ($kota as $city) { ?>
                                            <option <?php if ($edit->kota1 == $city['id']) {
                                                        echo "selected=\"selected\"";
                                                    } ?> value="<?= $city['id'] ?>"><?= $city['name'] ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                    <option></option>
                                </select>
                                <?= form_error('kota1', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-lg-5">
                                <select class="form-control" name="provinsi2" id="provinsi2">
                                    <option></option>
                                    <?php foreach ($provinsi as $prov) { ?>
                                        <option <?php if ($edit->provinsi2 == $prov['id']) {
                                                    echo "selected=\"selected\"";
                                                } ?> value="<?= $prov['id'] ?>"><?= $prov['name'] ?></option>
                                    <?php } ?>
                                </select>
                                <?= form_error('provinsi2', '<small class="text-danger pl-3">', '</small>'); ?>
                                <img src="<?= base_url() ?>assets/image/loading.gif" width="35" id="load1" style="display:none;" />
                            </div>
                            <div class="col-lg-5">
                                <select class="form-control" name="kota2" id="kota2">
                                    <?php if (!empty($edit->kota2)) { ?>
                                        <?php foreach ($kota as $city) { ?>
                                            <option <?php if ($edit->kota2 == $city['id']) {
                                                        echo "selected=\"selected\"";
                                                    } ?> value="<?= $city['id'] ?>"><?= $city['name'] ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                    <option></option>
                                </select>
                                <?= form_error('kota2', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-lg-5">
                                <select class="form-control" name="provinsi3" id="provinsi3">
                                    <option></option>
                                    <?php foreach ($provinsi as $prov) { ?>
                                        <option <?php if ($edit->provinsi3 == $prov['id']) {
                                                    echo "selected=\"selected\"";
                                                } ?> value="<?= $prov['id'] ?>"><?= $prov['name'] ?></option>
                                    <?php } ?>
                                </select>
                                <?= form_error('provinsi3', '<small class="text-danger pl-3">', '</small>'); ?>
                                <img src="<?= base_url() ?>assets/image/loading.gif" width="35" id="load1" style="display:none;" />
                            </div>
                            <div class="col-lg-5">
                                <select class="form-control" name="kota3" id="kota3">
                                    <?php if (!empty($edit->kota3)) { ?>
                                        <?php foreach ($kota as $city) { ?>
                                            <option <?php if ($edit->kota3 == $city['id']) {
                                                        echo "selected=\"selected\"";
                                                    } ?> value="<?= $city['id'] ?>"><?= $city['name'] ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                    <option></option>
                                </select>
                                <?= form_error('kota3', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="job-description">Informasi Lainnya</span></label>
                        <textarea class="form-control" name="informasi_lainnya" rows="12"><?= $edit->informasi_lainnya ?></textarea>
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
        $('#provinsi1').select2({
            placeholder: 'Pilih Provinsi',
            language: "id"
        });
        $('#kota1').select2({
            placeholder: 'Pilih Kota/Kabupaten',
            language: "id"
        });

        $('#provinsi2').select2({
            placeholder: 'Pilih Provinsi',
            language: "id"
        });
        $('#kota2').select2({
            placeholder: 'Pilih Kota/Kabupaten',
            language: "id"
        });

        $('#provinsi3').select2({
            placeholder: 'Pilih Provinsi',
            language: "id"
        });
        $('#kota3').select2({
            placeholder: 'Pilih Kota/Kabupaten',
            language: "id"
        });

        //saat pilihan provinsi di pilih maka mengambil data di data-wilayah menggunakan ajax
        $("#provinsi1").change(function() {
            $("img#load1").show();
            var id_provinces = $(this).val();
            $.ajax({
                type: "POST",
                dataType: "html",
                url: "<?= base_url('Company/wilayah?jenis=kota') ?>",
                data: "id_provinces=" + id_provinces,
                success: function(msg) {
                    $("select#kota1").html(msg);
                    $("img#load1").hide();
                    getAjaxKota();
                }
            });
        });

        $("#provinsi2").change(function() {
            $("img#load1").show();
            var id_provinces = $(this).val();
            $.ajax({
                type: "POST",
                dataType: "html",
                url: "<?= base_url('Company/wilayah?jenis=kota') ?>",
                data: "id_provinces=" + id_provinces,
                success: function(msg) {
                    $("select#kota2").html(msg);
                    $("img#load1").hide();
                    getAjaxKota();
                }
            });
        });

        $("#provinsi3").change(function() {
            $("img#load1").show();
            var id_provinces = $(this).val();
            $.ajax({
                type: "POST",
                dataType: "html",
                url: "<?= base_url('Company/wilayah?jenis=kota') ?>",
                data: "id_provinces=" + id_provinces,
                success: function(msg) {
                    $("select#kota3").html(msg);
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