<?php $this->load->view('back/meta') ?>

<div class="wrapper">
      <?php $this->load->view('back/head') ?>
      <?php $this->load->view('back/sidebar') ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                  <h1>Tambah user baru</h1>
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                  <!-- Small boxes (Stat box) -->
                  <div class="row">
                        <div class="col-md-6">
                              <div class="box box-primary">
                                    <div class="box-header with-border">
                                          <h3 class="box-title">Tambah User Baru</h3>
                                    </div>
                                    <div id="infoMessage"><?php echo $message; ?></div>
                                    <?php echo form_open("admin/auth/create_user"); ?>
                                    <div class="box-body">
                                          <div class="form-group">
                                                <?php echo lang('create_user_fname_label', 'first_name'); ?> <br />
                                                <?php echo form_input($first_name); ?>
                                          </div>
                                          <div class="form-group">
                                                <?php echo lang('create_user_lname_label', 'last_name'); ?> <br />
                                                <?php echo form_input($last_name); ?>
                                          </div>

                                          <?php
                                          if ($identity_column !== 'email') {
                                                echo '<div class="form-group">';
                                                echo lang('create_user_identity_label', 'identity');
                                                echo '<br />';
                                                echo form_error('identity');
                                                echo form_input($identity);
                                                echo '</div>';
                                          }
                                          ?>

                                          <div class="form-group">
                                                <?php echo lang('create_user_company_label', 'company'); ?> <br />
                                                <?php echo form_input($company); ?>
                                          </div>

                                          <div class="form-group">
                                                <?php echo lang('create_user_email_label', 'email'); ?> <br />
                                                <?php echo form_input($email); ?>
                                          </div>

                                          <div class="form-group">
                                                <?php echo lang('create_user_phone_label', 'phone'); ?> <br />
                                                <?php echo form_input($phone); ?>
                                          </div>

                                          <div class="form-group">
                                                <?php echo lang('create_user_password_label', 'password'); ?> <br />
                                                <?php echo form_input($password); ?>
                                          </div>

                                          <div class="form-group">
                                                <?php echo lang('create_user_password_confirm_label', 'password_confirm'); ?> <br />
                                                <?php echo form_input($password_confirm); ?>
                                          </div>
                                    </div>
                                    <div class="box-footer">
                                          <button type="submit" class="btn btn-success">Kirim</button>
                                    </div>
                                    <?php echo form_close(); ?>
                              </div>
                        </div>
                  </div>
                  <!-- /.row -->
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