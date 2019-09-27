<?php $this->load->view('back/meta') ?>
<div class="wrapper">
      <?php $this->load->view('back/head') ?>
      <?php $this->load->view('back/sidebar') ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                  <h1>Tambah Group Baru</h1>
            </div><!-- /.col -->
            <!-- /.content-header -->
            <!-- Main content -->
            <section class="content">
                  <div class="row">
                        <div class="col-md-6">
                              <div class="box box-primary">
                                    <div class="box-header with-border">
                                          <h3 class="boc-title">Tambah Group Baru</h3>
                                    </div>
                                    <div id="infoMessage"><?php echo $message; ?></div>

                                    <?php echo form_open("admin/auth/create_group"); ?>
                                    <div class="box-body">
                                          <div class="form-group">
                                                <?php echo lang('create_group_name_label', 'group_name'); ?> <br />
                                                <?php echo form_input($group_name); ?>
                                          </div>

                                          <div class="form-group">
                                                <?php echo lang('create_group_desc_label', 'description'); ?> <br />
                                                <?php echo form_input($description); ?>
                                          </div>
                                    </div>
                                    <div class="box-footer">
                                          <button type="submit" class="btn btn-success">Kirim</button>
                                    </div>
                                    <?php echo form_close(); ?>
                              </div>
                        </div>
                  </div><!-- /.row -->
            </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php $this->load->view('back/footer') ?>
</div><!-- ./wrapper -->
<?php $this->load->view('back/js') ?>
</body>

</html>