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
                                    <h1 class="m-0 text-dark">Dashboard</h1>
                              </div><!-- /.col -->
                              <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                          <li class="breadcrumb-item"><a href="#">Home</a></li>
                                          <li class="breadcrumb-item active">Dashboard v1</li>
                                    </ol>
                              </div><!-- /.col -->
                        </div><!-- /.row -->
                  </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                  <div class="container-fluid">
                        <!-- Small boxes (Stat box) -->
                        <div class="row">
                              <div class="col-lg-6">
                                    <div class="card card-primary">
                                          <div class="card-header">
                                                <h3 class="card-title">Tambah User Baru</h3>
                                          </div>
                                          <div class="card-body">
                                                <div class="form-group">
                                                      <div id="infoMessage"><?php echo $message; ?></div>
                                                      <?php echo form_open("auth/create_user"); ?>
                                                      <p>
                                                            <?php echo lang('create_user_fname_label', 'first_name'); ?> <br />
                                                            <?php echo form_input($first_name); ?>
                                                      </p>
                                                      <p>
                                                            <?php echo lang('create_user_lname_label', 'last_name'); ?> <br />
                                                            <?php echo form_input($last_name); ?>
                                                      </p>

                                                      <?php
                                                      if ($identity_column !== 'email') {
                                                            echo '<p>';
                                                            echo lang('create_user_identity_label', 'identity');
                                                            echo '<br />';
                                                            echo form_error('identity');
                                                            echo form_input($identity);
                                                            echo '</p>';
                                                      }
                                                      ?>

                                                      <p>
                                                            <?php echo lang('create_user_company_label', 'company'); ?> <br />
                                                            <?php echo form_input($company); ?>
                                                      </p>

                                                      <p>
                                                            <?php echo lang('create_user_email_label', 'email'); ?> <br />
                                                            <?php echo form_input($email); ?>
                                                      </p>

                                                      <p>
                                                            <?php echo lang('create_user_phone_label', 'phone'); ?> <br />
                                                            <?php echo form_input($phone); ?>
                                                      </p>

                                                      <p>
                                                            <?php echo lang('create_user_password_label', 'password'); ?> <br />
                                                            <?php echo form_input($password); ?>
                                                      </p>

                                                      <p>
                                                            <?php echo lang('create_user_password_confirm_label', 'password_confirm'); ?> <br />
                                                            <?php echo form_input($password_confirm); ?>
                                                      </p>
                                                      <button type="submit" class="btn btn-primary">Kirim</button>
                                                      <?php echo form_close(); ?>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                        </div>
                        <!-- /.row -->
                  </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <?php $this->load->view('back/footer') ?>
</div>
<!-- ./wrapper -->

<?php $this->load->view('back/js') ?>

</body>

</html>