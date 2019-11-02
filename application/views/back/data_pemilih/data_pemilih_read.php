<?php $this->load->view('back/meta') ?>

<div class="wrapper">
    <?php $this->load->view('back/head') ?>

    <?php $this->load->view('back/sidebar') ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <h1>Data Pemilih Read</h1>
        </div><!-- /.col -->
        <section class="content">
            <div class="row">
                <div class="col-lg-6">
                    <div class="box box-primary">
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>NIS</strong></td>
                                        <td><?php echo $nis; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Username</strong></td>
                                        <td><?php echo $username; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Password</strong></td>
                                        <td><?php echo $password; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Nama Lengkap</strong></td>
                                        <td><?php print_r($nama); ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Kelas</strong></td>
                                        <td><?php print_r($kelas); ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>L/P</strong></td>
                                        <td><?php echo $jk; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Status</strong></td>
                                        <td><a class="label label-success"><?php echo $status; ?></a></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Aktif</strong></td>
                                        <td><?php ($aktif) ? print_r('<a class="label label-info disabled">Active</a>') : print_r('<a class="label label-danger disabled">Inactive</a>') ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-sm-6"></div>
                                <div class="col-sm-6 text-right">
                                    <a href="<?php echo base_url('admin/pemilih') ?>" class="btn btn-default">Cancel</a>
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