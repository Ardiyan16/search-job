<?php $this->load->view('admin/partials/header_admin.php') ?>
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi <?= $this->session->userdata('nama') ?>, welcome back!</h4>
                    <p>Dashboard</p>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-one card-body">
                        <div class="stat-icon d-inline-block">
                            <i class="fa fa-users text-success border-success"></i>
                        </div>
                        <div class="stat-content d-inline-block">
                            <div class="stat-text">Users</div>
                            <div class="stat-digit"><?= $count_users ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-one card-body">
                        <div class="stat-icon d-inline-block">
                            <i class="fa fa-building-o text-primary border-primary"></i>
                        </div>
                        <div class="stat-content d-inline-block">
                            <div class="stat-text">Company</div>
                            <div class="stat-digit"><?= $count_company ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-one card-body">
                        <div class="stat-icon d-inline-block">
                            <i class="fa fa-briefcase text-warning border-warning"></i>
                        </div>
                        <div class="stat-content d-inline-block">
                            <div class="stat-text">Job Posted</div>
                            <div class="stat-digit"><?= $count_postjob ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-one card-body">
                        <div class="stat-icon d-inline-block">
                            <i class="fa fa-file text-danger border-danger"></i>
                        </div>
                        <div class="stat-content d-inline-block">
                            <div class="stat-text">Apply Job</div>
                            <div class="stat-digit"><?= $count_apply ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('admin/partials/footer.php') ?>