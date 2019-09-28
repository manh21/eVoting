<?php $this->load->view('back/meta') ?>

<div class="wrapper">
    <?php $this->load->view('back/head') ?>

    <?php $this->load->view('back/sidebar') ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <h1>Kelas Read</h1>
        </div><!-- /.col -->
        <section class="content">
            <div class="row">
                <div class="col-md-3">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Kelas Read</h3>
                        </div>
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <td><strong>Kelas</strong></td>
                                        <td><?php echo $kelas; ?></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Jumlah</strong></td>
                                        <td><?php echo $jumlah; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-sm-6"></div>
                                <div class="col-sm-6 text-right">
                                    <a href="<?php echo base_url('admin/kelas') ?>" class="btn btn-default">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php $this->load->view('back/footer') ?>
</div><!-- ./wrapper -->

<?php $this->load->view('back/js') ?>
<!-- DataTables -->
<script src="<?php echo base_url('assets/template/backend/') ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/template/backend/') ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
    // DataTables Script
    $(function() {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging': false,
            'lengthChange': true,
            'searching': false,
            'ordering': false,
            'info': false,
            'autoWidth': true
        })
    })
</script>

</body>

</html>

<h2 style="margin-top:0px">Kelas Read</h2>
<table class="table">
    <tr>
        <td>Kelas</td>
        <td><?php echo $kelas; ?></td>
    </tr>
    <tr>
        <td>Jumlah</td>
        <td><?php echo $jumlah; ?></td>
    </tr>
    <tr>
        <td></td>
        <td><a href="<?php echo base_url('admin/kelas') ?>" class="btn btn-default">Cancel</a></td>
    </tr>
</table>
</body>

</html>