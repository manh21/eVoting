<?php $this->load->view('back/meta') ?>

<div class="wrapper">
    <?php $this->load->view('back/head') ?>
    <?php $this->load->view('back/sidebar') ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <h1>Edit Kelas</h1>
        </div><!-- /.col -->
        <section class="content">
            <div class="row">
                <div class="col-md-6">
                    <div class="box box-primary">
                        <!-- <div class="box-header">
                            <h3 class="box-title">Edit Kelas</h3>
                        </div> -->
                        <form action="<?php echo $action; ?>" method="post">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="varchar">Kelas <?php echo form_error('kelas'); ?></label>
                                    <input type="text" class="form-control" name="kelas" id="kelas" placeholder="Kelas" value="<?php echo $kelas; ?>" />
                                </div>
                                <div class="form-group">
                                    <label for="int">Jumlah <?php echo form_error('jumlah'); ?></label>
                                    <input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah" value="<?php echo $jumlah; ?>" />
                                </div>
                                <input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-success"><?php echo $button; ?></button>
                                <a href="<?php echo base_url('admin/kelas') ?>" class="btn btn-default">Cancel</a>
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

</body>

</html>