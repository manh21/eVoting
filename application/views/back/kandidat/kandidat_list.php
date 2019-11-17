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
                                        <a href="<?php echo base_url('admin/kandidat/create') ?>" class="btn btn-md bg-blue btn-flat"><i class="fa fa-plus"> Create</i></a>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <form action="<?php echo base_url('admin/kandidat/index'); ?>" class="form-inline" method="get">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                                                <span class="input-group-btn">
                                                    <?php
                                                    if ($q <> '') {
                                                        ?>
                                                        <a href="<?php echo base_url('admin/kandidat'); ?>" class="btn btn-default">Reset</a>
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
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Nourut</th>
                                            <th>Suara</th>
                                            <th>Organisasi</th>
                                            <th>Visi</th>
                                            <th>Misi</th>
                                            <th>Foto</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($kandidat_data as $kandidat) : ?>
                                            <tr>
                                                <td width="10px"><?php echo htmlspecialchars(++$start, ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td><?php echo htmlspecialchars($kandidat->nama, ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td><?php echo htmlspecialchars($kandidat->nourut, ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td><?php echo htmlspecialchars($kandidat->jumlahsuara, ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td><?php echo htmlspecialchars($kandidat->organisasi, ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td><?php echo $kandidat->visi ?></td>
                                                <td><?php echo $kandidat->misi ?></td>
                                                <td><img height="50px" src="<?php echo base_url('assets/uploads/kandidat/' . $kandidat->foto) ?>"></td>
                                                <td class="text-center"><?php echo ($kandidat->status) ? anchor("admin/kandidat/deactivate/" . $kandidat->idkandidat, 'Active', 'class="label label-info"') : anchor("admin/kandidat/activate/" . $kandidat->idkandidat, 'Inactive', 'class="label label-info"'); ?></td>
                                                <td class="text-center">
                                                    <a href="<?php echo base_url('admin/kandidat/read/' . $kandidat->idkandidat) ?>" class="btn btn-sm btn-flat btn-info"><i class="fa fa-search"></i></a>
                                                    <a href="<?php echo base_url('admin/kandidat/edit/' . $kandidat->idkandidat) ?>" class="btn btn-sm btn-flat bg-orange"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-sm btn-flat btn-danger" data-whatever="<?php echo base_url('admin/kandidat/delete/' . $kandidat->idkandidat) ?>" data-toggle="modal" data-target="#modal-danger"><i class="fa fa-trash"></i></button>
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