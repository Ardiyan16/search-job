<?php $this->load->view('admin/partials/header_admin.php') ?>
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Detail Perusahaan</h4>
                    <p class="mb-0"><?= $view->nama_perusahaan ?></p>
                    <br>
                    <a href="<?= base_url('Admin/company') ?>" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Perusahaan</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Detail Perusahaan</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="profile">
                    <div class="profile-head">
                        <div class="photo-content">
                            <div class="cover-photo"></div>
                            <div class="profile-photo">
                                <?php if ($view->logo == NULL) { ?>
                                    <a href="<?= base_url('assets/image/company.png') ?>" data-fancybox="gallery"><img src="<?= base_url('assets/image/company.png') ?>" height="100" width="100" alt="Image" title="foto anda" class="img-fluid"></a>
                                <?php } else { ?>
                                    <img src="<?= base_url('assets/image/company_logo/' . $view->logo) ?>" class="img-fluid rounded-circle" alt="">
                                <?php } ?>
                            </div>
                        </div>
                        <div class="profile-info">
                            <div class="row justify-content-center">
                                <div class="col-xl-8">
                                    <div class="row">
                                        <div class="col-xl-4 col-sm-4 border-right-1 prf-col ml-3">
                                            <div class="profile-name">
                                                <h4 class="text-primary"><?= $view->nama_perusahaan ?></h4>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-sm-4 border-right-1 prf-col">
                                            <div class="profile-email">
                                                <h4 class="text-muted"><?= $view->alamat ?></h4>
                                            </div>
                                        </div>
                                        <!-- <div class="col-xl-4 col-sm-4 prf-col">
                                                    <div class="profile-call">
                                                        <h4 class="text-muted">(+1) 321-837-1030</h4>
                                                        <p>Phone No.</p>
                                                    </div>
                                                </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-tab">
                            <div class="custom-tab-1">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a href="#profile" data-toggle="tab" class="nav-link active show">Profile</a>
                                    </li>
                                    <li class="nav-item"><a href="#deskripsi" data-toggle="tab" class="nav-link">Deskripsi</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="profile" class="tab-pane fade active show">
                                        <div class="profile-personal-info mt-5">
                                            <h4 class="text-primary mb-4">Profile Perusahaan</h4>
                                            <div class="row mb-4">
                                                <div class="col-3">
                                                    <h5 class="f-w-500">Nama Perusahaan <span class="pull-right">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-9"><span><?= $view->nama_perusahaan ?></span>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-3">
                                                    <h5 class="f-w-500">Email <span class="pull-right">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-9"><span><?php if (empty($view->email)) {
                                                                                echo 'perusahaan belum mengisikan email';
                                                                            } else { ?>
                                                            <?= $view->email ?>
                                                        <?php } ?></span>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-3">
                                                    <h5 class="f-w-500">Bidang Perusahaan <span class="pull-right">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-9"><span><?php if (empty($view->bidang_perusahaan)) {
                                                                                echo 'perusahaan belum mengisikan bidang perusahaan';
                                                                            } else { ?>
                                                            <?= $view->bidang_perusahaan ?>
                                                        <?php } ?></span>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-3">
                                                    <h5 class="f-w-500">Situs <span class="pull-right">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-9"><span><?php if (empty($view->situs)) {
                                                                                echo 'perusahaan belum mengisikan situs';
                                                                            } else { ?>
                                                            <a target="_blank" href="<?= $view->situs ?>"><?= $view->situs ?></a>
                                                        <?php } ?></span>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-3">
                                                    <h5 class="f-w-500">No Telepon <span class="pull-right">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-9"><span>
                                                        <?php if (empty($view->no_telp)) {
                                                            echo 'perusahaan belum mengisikan no telepon';
                                                        } else { ?>
                                                            <?= $view->no_telp ?></span>
                                                <?php } ?>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-3">
                                                    <h5 class="f-w-500">Alamat <span class="pull-right">:</span></h5>
                                                </div>
                                                <div class="col-9"><span><?php if (empty($view->alamat)) {
                                                                                echo 'perusahaan belum mengisikan alamat';
                                                                            } else { ?>
                                                            <?= $view->alamat ?>
                                                        <?php } ?>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-3">
                                                    <h5 class="f-w-500">Kota <span class="pull-right">:</span></h5>
                                                </div>
                                                <div class="col-9"><span><?php if (empty($view->kota)) {
                                                                                echo 'perusahaan belum mengisikan kota';
                                                                            } else { ?>
                                                            <?= $view->kota ?>
                                                        <?php } ?></span>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-3">
                                                    <h5 class="f-w-500">Ukuran Perusahaan <span class="pull-right">:</span></h5>
                                                </div>
                                                <div class="col-9"><span><?php if (empty($view->ukuran)) {
                                                                                echo 'perusahaan belum mengisikan ukuran';
                                                                            } else { ?>
                                                            <?= $view->ukuran ?>
                                                        <?php } ?></span>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-3">
                                                    <h5 class="f-w-500">Penanggung Jawab <span class="pull-right">:</span></h5>
                                                </div>
                                                <div class="col-9"><span><?php if (empty($view->nama)) {
                                                                                echo 'perusahaan belum mengisikan penanggung jawab';
                                                                            } else { ?>
                                                            <?= $view->nama ?>
                                                        <?php } ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="deskripsi" class="tab-pane fade">
                                        <div class="profile-personal-info mt-5">
                                            <h4 class="text-primary mb-4">Deskripsi Perusahaan</h4>
                                            <div class="row mb-4">
                                                <div class="col-12"><span><?php if (empty($view->deskripsi)) {
                                                                                echo 'perusahaan belum mengisikan deskripsi';
                                                                            } else { ?>
                                                            <?= $view->deskripsi ?>
                                                        <?php } ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('admin/partials/footer.php') ?>