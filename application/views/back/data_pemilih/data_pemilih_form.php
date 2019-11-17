<?php $this->load->view('back/meta') ?>

<div class="wrapper">
    <?php $this->load->view('back/head') ?>
    <?php $this->load->view('back/sidebar') ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <h1>Data Pemilih</h1>
        </div><!-- /.col -->
        <section class="content">
            <div class="row">
                <div class="col-md-6">
                    <div class="box box-primary">
                        <form action="<?php echo $action; ?>" method="post">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="varchar">NIS <?php echo form_error('nis') ?></label>
                                    <input type="text" class="form-control" name="nis" id="nis" placeholder="NIS" value="<?php echo $nis; ?>" />
                                </div>
                                <div class="form-group">
                                    <label for="varchar">Username <?php echo form_error('username') ?></label>
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
                                </div>
                                <div class="form-group">
                                    <label for="varchar">Password <?php echo form_error('password') ?></label>
                                    <input type="text" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
                                </div>
                                <div class="form-group">
                                    <label for="varchar">Nama Lengkap<?php echo form_error('nama') ?></label>
                                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap" value="<?php echo $nama; ?>" />
                                </div>
                                <div class="form-group">
                                    <label for="varchar">Kelas<?php echo form_error('kelas') ?></label>
                                    <?php
                                    $dd_kelas_attribute = 'class="form-control select2 js-example-basic-single" id="kelas"';
                                    echo form_dropdown('kelas', $dd_kelas, $kelas_selected, $dd_kelas_attribute);
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label for="varchar">Jenis Kelamin <?php echo form_error('jk') ?></label>
                                    <div class="form-group">
                                        <input id="jk" name="jk" type="radio" class="form-control square-blue" <?php if ($jk == 'L') echo "checked"; ?> value="L" />
                                        <label for="jk">Laki - Laki</label>

                                        <input id="jk" name="jk" type="radio" class="form-control square-blue" <?php if ($jk == 'P') echo 'checked'; ?> value="P" />
                                        <label for="jk">Perempuan</label>
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-success"><?php echo $button ?></button>
                                <a href="<?php echo base_url('admin/pemilih') ?>" class="btn btn-default">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section><!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php $this->load->view('back/footer') ?>
</div><!-- ./wrapper -->

<?php $this->load->view('back/js') ?>
<!-- Select2 -->
<script src="<?php echo base_url('assets/template/backend/') ?>bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- iCheck 1.0.1 -->
<link href="<?php echo base_url('assets/template/backend/') ?>plugins/iCheck/square/blue.css" rel="stylesheet">
<script src="<?php echo base_url('assets/template/backend/') ?>plugins/iCheck/icheck.min.js"></script>
<script>
    //for iCheck
    $('input[type="checkbox"].square-blue, input[type="radio"].square-blue').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue'
    });

    $(document).ready(function() {
        $('.js-example-basic-single').select2({
            placeholder: 'Select an option',
        });;
    });
</script>

</body>

</html>