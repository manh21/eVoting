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
                        <?php if (form_error('fileURL')) { ?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <?php print form_error('fileURL'); ?>
                            </div>
                        <?php } ?>
                        <div id="infoMessage"><?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?></div>
                        <div class="box-header">
                            <a href="<?php print site_url(); ?>assets/sample/pemilih/sample-xlsx.xlsx" class="btn btn-flat btn-info btn-sm"><i class="fa fa-file-excel"></i> Template .XLSX</a>
                            <a href="<?php print site_url(); ?>assets/sample/pemilih/sample-xls.xls" class="btn btn-flat btn-info btn-sm"><i class="fa fa-file-excel"></i> Template .XLS</a>
                            <a href="<?php print site_url(); ?>assets/sample/pemilih/sample-csv.csv" class="btn btn-flat btn-info btn-sm" target="_blank"><i class="fa fa-file-csv"></i> Template .CSV</a>
                        </div>
                        <?php echo form_open_multipart($action); ?>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="validatedCustomFile">File input</label>
                                <input type="file" class="custom-file-input" id="validatedCustomFile" id="fileURL" name="fileURL">
                            </div>
                        </div>
                        <div class="box-footer">
                            <a href="<?php echo base_url('admin/pemilih') ?>" class="btn btn-default">Cancel</a>
                            <button type="submit" class="btn btn-success" value="upload"><?php echo $button ?></button>
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
<script>
    // infoMassages Timer
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 2000);
</script>

</body>

</html>