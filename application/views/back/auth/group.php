<?php $this->load->view('back/meta') ?>

<div class="wrapper">
    <?php $this->load->view('back/head') ?>
    <?php $this->load->view('back/sidebar') ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section id="siteBreadcrumb" class="content-header">
            <h1>
                Group
                <small>Data Table</small>
            </h1>
            <ol class="breadcrumb">
                <!-- <li><a href="<?php echo base_url('admin/dashboard') ?>"><i class="fa fa-dashboard"></i>Home</a></li> -->
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Data Users Table</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Group</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($groups as $group) : ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($group->id, ENT_QUOTES, 'UTF-8');  ?></td>
                                            <td><?php echo htmlspecialchars($group->name, ENT_QUOTES, 'UTF-8');  ?></td>
                                            <td><?php echo htmlspecialchars($group->description, ENT_QUOTES, 'UTF-8');  ?></td>
                                            <td><a href="<?php echo base_url('admin/auth/edit_group/' . $group->id) ?>" class="btn btn-sm btn-flat bg-orange"><i class="fa fa-edit"></i></a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <div><a href="<?php echo base_url('admin/auth/create_group') ?>" class="btn btn-sm bg-blue btn-flat">Buat Group Baru</a></div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <?php $this->load->view('back/footer'); ?>
</div>

<?php $this->load->view('back/js') ?>
<!-- DataTables -->
<script src="<?php echo base_url('assets/template/backend/') ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/template/backend/') ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
    $(function() {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })
    })
</script>


</body>

</html>