<?php $this->load->view('back/meta') ?>

<div class="wrapper">
    <?php $this->load->view('back/head') ?>
    <?php $this->load->view('back/sidebar') ?>
    <!-- Content Wrapper. Contains page content -->
    <div id="siteBreadcrumb" class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Settings
                <small>Panel</small>
            </h1>
            <ol class="breadcrumb">
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="box box-solid">
                        <div class="box-header">
                            <h3 class="box-title">General Settings</h3>
                        </div>
                        <!-- form start -->
                        <form action="<?php echo $action ?>" class="form-horizontal" method="post">
                            <div class="box-body">
                                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                                <div class="form-group">
                                    <label for="penyelenggara" class="col-sm-2 control-label">Penyelenggara <?php echo form_error('penyelenggara') ?></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="penyelenggara" id="penyelenggara" placeholder="Penyelenggara" value="<?php echo $penyelenggara; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tps" class="col-sm-2 control-label">TPS <?php echo form_error('tps') ?></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="tps" id="tps" placeholder="Tempat Pemungutan Suara (TPS)" value="<?php echo $tps; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="provinsi" class="col-sm-2 control-label">Provinsi <?php echo form_error('provinsi') ?></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="provinsi" id="provinsi" placeholder="Provinsi" value="<?php echo $provinsi; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="kota" class="col-sm-2 control-label">Kota / Kabupaten <?php echo form_error('kota') ?></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="kota" id="kota" placeholder="Kota / Kabupaten" value="<?php echo $kota; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="kecamatan" class="col-sm-2 control-label">Kecamatan <?php echo form_error('kota') ?></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="kecamatan" id="kecamatan" placeholder="Kecamatan" value="<?php echo $kecamatan; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="kelurahan" class="col-sm-2 control-label">Desa / Kelurahan <?php echo form_error('kota') ?></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="kelurahan" id="kelurahan" placeholder="Desa / Kelurahan" value="<?php echo $kelurahan; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="alamat" class="col-sm-2 control-label">Alamat <?php echo form_error('alamat') ?></label>
                                    <div class="col-sm-10">
                                        <textarea rows="3" type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- ./box-body -->
                            <div class=" box-footer">
                                <button type="submit" class="btn btn-success  pull-right"><?php echo $button ?></button>
                                <a href="<?php echo base_url('admin') ?>" class="btn btn-default">Cancel</a>
                            </div>
                            <!-- ./box-footer -->
                        </form>
                    </div>
                    <!-- ./box -->
                </div>
                <!-- ./col -->
            </div>
            <!-- ./row -->
            <div class="row">
                <div class="col-sm-3">
                    <div class="box box-solid">
                        <div class="box-body text-center">
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger" data-whatever="<?php echo base_url('admin/settings/reset_data_pemilih') ?>"><i class="fa fa-warning"></i> Reset Seluruh Data Pemilih <i class="fa fa-warning"></i></button>
                        </div>
                        <!-- ./box-body -->
                    </div>
                    <!-- ./box -->
                </div>
                <!-- ./col -->
                <div class="col-sm-3">
                    <div class="box box-solid">
                        <div class="box-body text-center">
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger" data-whatever="<?php echo base_url('admin/settings/reset_data_kandidat') ?>"><i class="fa fa-warning"></i> Reset Seluruh Data Kandidat <i class="fa fa-warning"></i></button>
                        </div>
                        <!-- ./box-body -->
                    </div>
                    <!-- ./box -->
                </div>
                <!-- ./col -->
                <div class="col-sm-3">
                    <div class="box box-solid">
                        <div class="box-body text-center">
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger" data-whatever="<?php echo base_url('admin/settings/reset_data_kelas') ?>"><i class="fa fa-warning"></i> Reset Seluruh Data Kelas <i class="fa fa-warning"></i></button>
                        </div>
                        <!-- ./box-body -->
                    </div>
                    <!-- ./box -->
                </div>
                <!-- ./col -->
                <div class="col-sm-3">
                    <div class="box box-solid">
                        <div class="box-body text-center">
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger" data-whatever="<?php echo base_url('admin/settings/reset_pemilihan') ?>"><i class="fa fa-warning"></i> Reset Hasil Pemilihan <i class="fa fa-warning"></i></button>
                        </div>
                        <!-- ./box-body -->
                    </div>
                    <!-- ./box -->
                </div>
                <!-- ./col -->
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>
    <?php $this->load->view('back/footer') ?>
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

<?php $this->load->view('back/js') ?>

<!-- page script -->
<script>
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