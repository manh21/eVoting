<?php $this->load->view('back/meta') ?>
<?php $this->load->view('back/head') ?>
<?php $this->load->view('back/sidebar') ?>

<div class="wrapper">
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                  <h1>Edit Group</h1>
                  <ol class="breadcrumb">
                        <li><a href="<?php echo base_url('admin/auth') ?>"><i class="fa fa-users"></i> Users</a></li>
                        <li>Edit Group</li>
                  </ol>
            </div><!-- /.col -->
            <section class="content">
                  <div class="row">
                        <div class="col-md-6">
                              <div class="box box-primary">
                                    <div class="box-header">
                                          <h3 class="box-title">Edit Group</h3>
                                    </div>

                                    <div id="infoMessage"><?php echo $message; ?></div>

                                    <?php echo form_open(current_url()); ?>
                                    <div class="box-body">
                                          <div class="form-group">
                                                <?php echo lang('edit_group_name_label', 'group_name'); ?> <br />
                                                <?php echo form_input($group_name); ?>
                                          </div>
                                          <div class="form-group">
                                                <?php echo lang('edit_group_desc_label', 'description'); ?> <br />
                                                <?php echo form_input($group_description); ?>
                                          </div>
                                    </div>
                                    <div class="box-footer">
                                          <button type="submit" class="btn btn-success">Save Group</button>
                                    </div>
                                    <?php echo form_close(); ?>
                              </div>
                        </div>
                  </div>
            </section><!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <?php $this->load->view('back/footer') ?>
</div><!-- ./wrapper -->

<?php $this->load->view('back/js') ?>

</body>

</html>