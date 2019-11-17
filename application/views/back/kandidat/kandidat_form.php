<?php $this->load->view('back/meta') ?>

<div class="wrapper">
    <?php $this->load->view('back/head') ?>
    <?php $this->load->view('back/sidebar') ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <h1>Kandidat Form</h1>
        </div>
        <section class="content">
            <div class="row">
                <div class="col-md-6">
                    <div class="box box-primary">
                        <?php if (!empty($error_msg)) { ?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <?php echo '<p class="statusMsg">' . $error_msg . '</p>' ?>
                            </div>
                        <?php } ?>
                        <?php if (form_error('image')) { ?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <?php print form_error('image'); ?>
                            </div>
                        <?php } ?>
                        <?php echo form_open_multipart($action); ?>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="varchar">Nama <?php echo form_error('nama') ?></label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="varchar">No Urut <?php echo form_error('nourut') ?></label>
                                <input type="text" class="form-control" name="nourut" id="nourut" placeholder="No urut" value="<?php echo $nourut; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="varchar">Organisasi <?php echo form_error('organisasi') ?></label>
                                <div class="form-group">
                                    <input name="organisasi" id="organisasi" type="radio" class="form-control square-blue" <?php if ($organisasi == 'OSIS') echo "checked"; ?> value="OSIS" />
                                    <label for="organisasi">OSIS</label>

                                    <input name="organisasi" id="organisasi" type="radio" class="form-control square-blue" <?php if ($organisasi == 'MPK') echo 'checked'; ?> value="MPK" />
                                    <label for="organisasi">MPK</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="visi">Visi <?php echo form_error('visi') ?></label>
                                <textarea class="form-control textarea" name="visi" id="visi" placeholder="Visi"><?php echo $visi; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="misi">Misi <?php echo form_error('misi') ?></label>
                                <textarea class="form-control textarea" name="misi" id="misi" placeholder="Misi"><?php echo $misi; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="varchar">Foto <?php echo form_error('foto') ?></label>
                                <input type="file" class="custom-file-input" id="validatedCustomFile" name="image">
                            </div>
                            <input type="hidden" name="idkandidat" value="<?php echo $idkandidat; ?>" />
                        </div>
                        <div class="box-footer">
                            <div class="pull-right">
                                <a href="<?php echo base_url('admin/kandidat') ?>" class="btn btn-default ">Cancel</a>
                                <button type="submit" class="btn btn-success "><?php echo $button ?></button>
                            </div>
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
<!-- Bootstrap WYSIHTML5 -->
<link rel="stylesheet" href="<?php echo base_url('assets/template/backend/') ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<script src="<?php echo base_url('assets/template/backend/') ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url('assets/template/backend/') ?>bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- iCheck 1.0.1 -->
<link href="<?php echo base_url('assets/template/backend/') ?>plugins/iCheck/square/blue.css" rel="stylesheet">
<script src="<?php echo base_url('assets/template/backend/') ?>plugins/iCheck/icheck.min.js"></script>
<script>
    //for iCheck
    $('input[type="checkbox"].square-blue, input[type="radio"].square-blue').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue'
    });

    $(document).ready(function() {
        $('.js-example-basic-single').select2({
            placeholder: 'Select an option',
        });;
    });

    // infoMassages Timer
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 2000);

    $(function() {
        //bootstrap WYSIHTML5 - text editor
        $('.textarea').wysihtml5()
    })
</script>

</body>

</html>