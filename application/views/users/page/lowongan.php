<?php $this->load->view('users/partials/header') ?>

<style>
    .select2-selection__rendered {
        line-height: 50px !important;
    }

    .select2-container .select2-selection--single {
        height: 50px !important;
    }

    .select2-selection__arrow {
        height: 50px !important;
    }
</style>
<!-- HOME -->
<section class="section-hero overlay inner-page bg-image" style="background-image: url(<?= base_url('assets/image/background-home.png') ?>);" id="home-section">
    <div class="container">
        <div class="row">
            <div class="col">
                <form method="post" class="search-jobs-form">
                    <div class="row mb-5">
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                            <input type="text" class="form-control form-control-lg" placeholder="Judul atau Nama Pekerjaan">
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                            <select id="provinsi" name="provinsi">
                                <?php foreach ($provinsi as $prov) {
                                    echo '<option value="' . $prov['id'] . '">' . $prov['name'] . '</option>';
                                }
                                ?>
                            </select>
                            <img src="<?= base_url() ?>assets/image/loading.gif" width="35" id="load1" style="display:none;" />
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                            <select id="kota" data-width="100%" name="kota">
                                <option></option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                            <button type="submit" class="btn btn-primary btn-lg btn-block text-white btn-search"><span class="icon-search icon mr-2"></span>Cari Pekerjaan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <a href="#next" class="scroll-button smoothscroll">
        <span class=" icon-keyboard_arrow_down"></span>
    </a>
</section>
<section class="site-section" id="next">
    <div class="container">

        <div class="row mb-5 justify-content-center">
            <div class="col-md-7 text-center">
                <h2 class="section-title mb-2">Daftar Lowongan Kerja</h2>
            </div>
        </div>
        <ul class="job-listings mb-5">
            <?php foreach ($lowongan as $view) { ?>
                <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                    <a href="<?= base_url('Pages/detail_lowongan/' . $view->id) ?>"></a>
                    <div class="job-listing-logo">
                        <img src="<?= base_url('assets/image/company_logo/' . $view->logo) ?>" alt="Image" class="img-fluid">
                    </div>

                    <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                        <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                            <h2><?= $view->job_title ?></h2>
                            <strong><?= $view->nama_perusahaan ?></strong>
                        </div>
                        <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                            <span class="fa fa-calendar"> </span> <?= date("d-m-Y", strtotime($view->tgl_posting)) ?>
                        </div>
                        <div class="">
                            <span class="fa fa-map-maker"></span><?= $view->city ?>, <?= $view->provinces ?>
                        </div>
                        <div class="job-listing-meta">
                            <?php if ($view->status == '0') { ?>
                                <span class="badge badge-success">Aktif</span>
                            <?php } ?>
                            <?php if ($view->status == '1') { ?>
                                <span class="badge badge-danger">Non Aktif</span>
                            <?php } ?>
                            <!-- <a href="" data-toggle="modal" title="Edit" class="btn btn-primary" style="color: white;"><i class="fa fa-edit"></i></a> -->
                        </div>
                    </div>
                </li>
            <?php } ?>
        </ul>
        <div class="row pagination-wrap">
            <div class="col-md-6 text-center text-md-left mb-4 mb-md-0">
                <span></span>
            </div>
            <div class="col-md-6 text-center text-md-right">
                <div class="custom-pagination ml-auto">
                    <a href="#" class="prev">Prev</a>
                    <div class="d-inline-block">
                        <a href="#" class="active">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#">4</a>
                    </div>
                    <a href="#" class="next">Next</a>
                </div>
            </div>
        </div>

    </div>
</section>

<?php $this->load->view('users/partials/footer') ?>
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

    });
</script>