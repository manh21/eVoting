<?php $this->load->view('back/meta') ?>
<div class="wrapper">
    <!-- Header -->
    <?php $this->load->view('back/head') ?>
    <!-- Sidebar -->
    <?php $this->load->view('back/sidebar') ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <h1>Kandidat<small>Read</small></h1>
        </div>
        <!-- Main Content -->
        <section class="content">
            <div class="row">
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <td><strong>No Urut</strong></td>
                                        <td><?php echo $nourut; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Nama Lengkap</strong></td>
                                        <td><?php print_r($nama); ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Organisasi</strong></td>
                                        <td><?php print_r($organisasi); ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Suara</strong></td>
                                        <td><?php print_r($jumlahsuara); ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Aktif</strong></td>
                                        <td><?php ($status) ? print_r('<a class="label label-info disabled">Active</a>') : print_r('<a class="label label-danger disabled">Inactive</a>') ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Visi</strong></td>
                                        <td><?php print_r($visi); ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Misi</strong></td>
                                        <td><?php print_r($misi); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- ./box-body -->
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-sm-6"></div>
                                <div class="col-sm-6 text-right">
                                    <a href="<?php echo base_url('admin/kandidat') ?>" class="btn btn-default">Cancel</a>
                                </div>
                            </div>
                        </div>
                        <!-- ./box-footer -->
                    </div>
                    <!-- ./box -->
                </div>
                <!-- ./col-md-6 -->
                <div class="col-md-3">
                    <div class="box box-primary">
                        <div class="box box-body">
                            <img class="img-responsive" style="max-height: 300px;" src="<?php echo base_url('assets/uploads/kandidat/' . $foto) ?>" alt="kandidat picture">
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./row -->
        </section>
    </div>
    <!-- ./content-wrapper -->

    <?php $this->load->view('back/footer') ?>
</div>
<!-- ./wrapper -->
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