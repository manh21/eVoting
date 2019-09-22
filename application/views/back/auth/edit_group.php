<?php $this->load->view('back/meta') ?>
<?php $this->load->view('back/head') ?>
<?php $this->load->view('back/sidebar') ?>

<div class="wrapper">
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                  <div class="container-fluid">
                        <div class="row mb-2">
                              <div class="col-sm-6">
                                    <h1 class="m-0 text-dark">Edit Group</h1>
                              </div><!-- /.col -->
                              <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                          <li class="breadcrumb-item"><a href="#">Home</a></li>
                                          <li class="breadcrumb-item active">Edit Group</li>
                                    </ol>
                              </div><!-- /.col -->
                        </div><!-- /.row -->
                  </div><!-- /.container-fluid -->
            </div>
            <section class="content">
                  <div class="container-fluid">
                        <div class="row">
                              <div class="col-llg-6">
                                    <div class="card card-primary">
                                          <div class="card-header">
                                                <h3 class="card-title">Edit Group</h3>
                                          </div>
                                          <div class="card-body">
                                                <div class="form-group">
                                                      <div id="infoMessage"><?php echo $message; ?></div>

                                                      <?php echo form_open(current_url()); ?>
                                                      <p>
                                                            <?php echo lang('edit_group_name_label', 'group_name'); ?> <br />
                                                            <?php echo form_input($group_name); ?>
                                                      </p>
                                                      <p>
                                                            <?php echo lang('edit_group_desc_label', 'description'); ?> <br />
                                                            <?php echo form_input($group_description); ?>
                                                      </p>
                                                      <p><button type="submit" class="btn btn-success">Save Group</button></p>
                                                      <?php echo form_close(); ?>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div><!-- /.container-fluid -->
            </section><!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <?php $this->load->view('back/footer') ?>
</div><!-- ./wrapper -->

<?php $this->load->view('back/js') ?>

</body>

</html>