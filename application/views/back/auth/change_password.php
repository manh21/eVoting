<?php $this->load->view('back/meta') ?>

<div class="wrapper">
      <?php $this->load->view('back/head') ?>
      <?php $this->load->view('back/sidebar') ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                  <h1>
                        Change Password
                        <small>User</small>
                  </h1>
            </section>

            <!-- Main content -->
            <section class="content">
                  <!-- Small boxes (Stat box) -->
                  <div class="row">
                        <div class="col-md-6">
                              <div class="box box-primary">
                                    <div class="box-header with-border">
                                          <h3 class="box-title">Change Password</h3>
                                    </div>
                                    <div id="infoMessage"><?php echo $message; ?></div>

                                    <?php echo form_open("admin/auth/change_password"); ?>
                                    <div class="box-body">
                                          <div class="form-group">
                                                <?php echo lang('change_password_old_password_label', 'old_password'); ?> <br />
                                                <?php echo form_input($old_password); ?>
                                          </div>

                                          <div class="form-group">
                                                <label for="new_password"><?php echo sprintf(lang('change_password_new_password_label'), $min_password_length); ?></label> <br />
                                                <?php echo form_input($new_password); ?>
                                          </div>

                                          <div class="form-group">
                                                <?php echo lang('change_password_new_password_confirm_label', 'new_password_confirm'); ?> <br />
                                                <?php echo form_input($new_password_confirm); ?>
                                          </div>
                                    </div>
                                    <?php echo form_input($user_id); ?>
                                    <div class="box-footer">
                                          <button type="submit" class="btn btn-success">Change</button>
                                    </div>

                                    <?php echo form_close(); ?>
                              </div>
                        </div>
                  </div>
                  <!-- /.row -->
            </section>
            <!-- /.content -->
      </div>
      <?php $this->load->view('back/footer'); ?>
</div>

<?php $this->load->view('back/js') ?>

</body>

</html>