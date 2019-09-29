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
                        <div class="box-header">
                            <h3 class="box-title">Pemilih</h3>
                        </div>
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
                                    $dd_kelas_attribute = 'class="form-control select2" id="kelas"';
                                    echo form_dropdown('kelas', $dd_kelas, $kelas_selected, $dd_kelas_attribute);
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label for="varchar">L/P <?php echo form_error('jk') ?></label>
                                    <input type="text" class="form-control" name="jk" id="jk" placeholder="L/P" value="<?php echo $jk; ?>" />
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
<script>
    $(function() {
        $(document).ready(function() {
            $(".select2").select2({
                placeholder: "Please Select"
            });
        });
    });
</script>

</body>

</html>