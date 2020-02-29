<?php $this->load->view('back/meta') ?>

<div class="wrapper">
    <?php $this->load->view('back/head') ?>
    <?php $this->load->view('back/sidebar') ?>
    <!-- Content Wrapper. Contains page content -->
    <div id="siteBreadcrumb" class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Data Pemilih
                <small>List</small>
            </h1>
            <ol class="breadcrumb">
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="box">
                            <!-- <div class="box-header">
                                <h3 class="box-title">Pemilih</h3>
                            </div> -->
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div id="infoMessage"><?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?></div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <a href="<?php echo base_url('admin/data_pemilih/create') ?>" class="btn btn-md bg-blue btn-flat"><i class="fa fa-plus"> Create</i></a>
                                        <a href="<?php echo base_url('admin/data_pemilih/import') ?>" class="btn btn-md bg-green btn-flat"><i class="fa fa-file-excel-o"> Import</i></a>
                                        <a href="<?php echo base_url('admin/data_pemilih/exportData') ?>" class="btn btn-md bg-yellow btn-flat"><i class="fa fa-download"> Export</i></a>
                                        <a href="<?php echo base_url('admin/data_pemilih/cetak') ?>" target="_blank" class="btn btn-md bg-purple btn-flat"><i class="fa fa-print"> Cetak</i></a>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <form action="<?php echo base_url('admin/data_pemilih/index'); ?>" class="form-inline" method="get">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="q">
                                                <span class="input-group-btn">
                                                    <?php
                                                    if ($q <> '') {
                                                    ?>
                                                        <a href="<?php echo base_url('admin/pemilih'); ?>" class="btn btn-default">Reset</a>
                                                    <?php
                                                    }
                                                    ?>
                                                    <button class="btn btn-flat btn-primary" type="submit">Search</button>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <table id="example2" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">NIS</th>
                                            <th class="text-center">Username</th>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center">Kelas</th>
                                            <th class="text-center">L/P</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Aktif</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data_pemilih_data as $data_pemilih) : ?>
                                            <tr>
                                                <td width="10px"><?php echo htmlspecialchars(++$start, ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td><?php echo htmlspecialchars($data_pemilih->nis, ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td><?php echo htmlspecialchars($data_pemilih->username, ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td><?php echo htmlspecialchars($data_pemilih->nama, ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td><?php echo htmlspecialchars($data_pemilih->kelas, ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td width="10px" class="text-center"><?php echo htmlspecialchars($data_pemilih->jk, ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td class="text-center"><?php echo ($data_pemilih->status === 'Belum Memilih') ? anchor("admin/pemilih", 'Belum Memilih', 'class="label label-danger"') : anchor("admin/data_pemilih/reset_status/" . $data_pemilih->id, 'Sudah Memilih', 'class="label label-success"'); ?></td>
                                                <td class="text-center"><?php echo ($data_pemilih->aktif) ? anchor("admin/data_pemilih/deactivate/" . $data_pemilih->id, 'Active', 'class="label label-info"') : anchor("admin/data_pemilih/activate/" . $data_pemilih->id, 'Inactive', 'class="label label-danger"'); ?></td>
                                                <td class="text-center">
                                                    <a href="<?php echo base_url('admin/data_pemilih/read/' . $data_pemilih->id) ?>" class="btn btn-sm btn-flat btn-info"><i class="fa fa-search"></i></a>
                                                    <a href="<?php echo base_url('admin/data_pemilih/update/' . $data_pemilih->id) ?>" class="btn btn-sm btn-flat bg-orange"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-sm btn-flat btn-danger" data-whatever="<?php echo base_url('admin/data_pemilih/delete/' . $data_pemilih->id) ?>" data-toggle="modal" data-target="#modal-danger"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <a class="btn btn-sm btn-info btn-flat">Total Record : <?php echo $total_rows ?></a>
                                    </div>
                                    <div class="col-sm-7 text-right">
                                        <?php echo $pagination ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.row (main row) -->
            </div>
            <div class="modal modal-danger fade" id="modal-danger">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Apakah anda yakin</h4>
                        </div>
                        <div class="modal-body">
                            <p>Semua perubahan tidak dapat diulang kembali</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline" data-dismiss="modal">Close</button>
                            <a href="" type="button" class="btn btn-outline" id="saveChanges">Save changes</a>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
        </section><!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
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
            'ordering': true,
            'info': false,
            'autoWidth': true
        })
    })
    // infoMassages Timer
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 2000);
    // Modal Controller
    $('#modal-danger').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var link = button.data('whatever') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        // modal.find('#saveChanges').val(link)
        var modal = document.getElementById("saveChanges")
        modal.setAttribute("href", link);
    })
</script>

</body>

</html>