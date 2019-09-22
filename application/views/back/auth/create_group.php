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
                                    <h1 class="m-0 text-dark">Data User
                              </div><!-- /.col -->
                              <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                          <li class="breadcrumb-item"><a href="#">Home</a></li>
                                          <li class="breadcrumb-item">User</li>
                                          <li class="breadcrumb-item active">Tambah Group Baru</li>
                                    </ol>
                              </div><!-- /.col -->
                        </div><!-- /.row -->
                  </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <section class="content">
                  <div class="container-fluid">
                        <div class="row">
                              <div class="col-lg-6">
                                    <div class="card card-primary">
                                          <div class="card-header">
                                                <h3 class="card-title">Tambah Group Baru</h3>
                                          </div>
                                          <div class="card-body">
                                                <div class="form-group">
                                                      <div id="infoMessage"><?php echo $message; ?></div>

                                                      <?php echo form_open("admin/auth/create_group"); ?>

                                                      <p>
                                                            <?php echo lang('create_group_name_label', 'group_name'); ?> <br />
                                                            <?php echo form_input($group_name); ?>
                                                      </p>

                                                      <p>
                                                            <?php echo lang('create_group_desc_label', 'description'); ?> <br />
                                                            <?php echo form_input($description); ?>
                                                      </p>
                                                      <p>
                                                            <button type="submit" class="btn btn-primary">Kirim</button>
                                                      </p>
                                                      <?php echo form_close(); ?>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                        </div><!-- /.row -->
                  </div><!-- /.container-fluid -->
            </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php $this->load->view('back/footer') ?>
</div><!-- ./wrapper -->
<?php $this->load->view('back/js') ?>
</body>

</html>