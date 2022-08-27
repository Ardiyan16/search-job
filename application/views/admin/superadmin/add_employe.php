<?php $this->load->view('admin/partials/header_superadmin.php') ?>

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Add Employe</h4>
                    <br>
                    <a href="<?= base_url('Superadmin/employe') ?>" class="btn btn-primary"><i class="fa fa-chevron-circle-left"></i> Back</a>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Employe</a></li>
                    <li class="breadcrumb-item"><a href="#">Data Employe</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Form Add Employe</h4>
                        <p>Mark (*) form must be required</p>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="<?= base_url('Superadmin/save_employe') ?>" method="POST">
                                <div class="form-group">
                                    <label>Name *</label>
                                    <input type="text" class="form-control" name="nama" placeholder="Name..">
                                    <?php echo form_error('nama', '<small style="color: red;" class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Email *</label>
                                    <input type="email" class="form-control" name="email" placeholder="Email..">
                                    <?php echo form_error('email', '<small style="color: red;" class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Position *</label>
                                    <input type="text" class="form-control" name="jabatan" placeholder="Position..">
                                    <?php echo form_error('jabatan', '<small style="color: red;" class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Role *</label>
                                    <select name="role_id" id="single-select" class="form-control">
                                        <?php foreach ($role as $view) { ?>
                                            <option value="<?= $view->id ?>"><?= $view->role ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Username *</label>
                                    <input type="text" class="form-control" name="username" placeholder="Username..">
                                    <?php echo form_error('username', '<small style="color: red;" class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Password *</label>
                                    <input type="password" class="form-control password" name="password" placeholder="Password..">
                                    <?php echo form_error('password', '<small style="color: red;" class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                    <div class="form-group">
                                        <div class="form-check ml-2">
                                            <input class="form-check-input form-checkbox" type="checkbox" id="basic_checkbox_1">
                                            <label class="form-check-label" for="basic_checkbox_1">View Password</label>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <button type="reset" class="btn btn-warning mt-3"><i class="fa fa-refresh"></i> Reset</button>
                                <button type="submit" class="btn btn-primary mt-3"><i class="fa fa-save"></i> Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('admin/partials/footer.php') ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('.form-checkbox').click(function() {
            if ($(this).is(':checked')) {
                $('.password').attr('type', 'text');
            } else {
                $('.password').attr('type', 'password');
            }
        });
    });
</script>