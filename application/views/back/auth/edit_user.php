<?php $this->load->view('back/meta') ?>

<div class="wrapper">
      <?php $this->load->view('back/head') ?>
      <?php $this->load->view('back/sidebar') ?>
      <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                  <h1>
                        Edit User
                  </h1>
            </section>

            <!-- Main Content Menu -->
            <section class="content">
                  <div class="row">
                        <div class="col-md-6">
                              <!-- general form elements -->
                              <div class="box box-primary">
                                    <div class="box-header with-border">
                                          <h3 class="box-title">Edit User</h3>

                                          <!-- /.box-header -->
                                          <!-- form start -->
                                          <div id="infoMessage"><?php echo $message; ?></div>

                                          <?php echo form_open(uri_string()); ?>
                                          <div class="box-body">
                                                <div class="form-group">
                                                      <?php echo lang('edit_user_fname_label', 'first_name'); ?> <br />
                                                      <?php echo form_input($first_name); ?>
                                                </div>

                                                <div class="form-group">
                                                      <?php echo lang('edit_user_lname_label', 'last_name'); ?> <br />
                                                      <?php echo form_input($last_name); ?>
                                                </div>

                                                <div class="form-group">
                                                      <?php echo lang('edit_user_company_label', 'company'); ?> <br />
                                                      <?php echo form_input($company); ?>
                                                </div>

                                                <div class="form-group">
                                                      <?php echo lang('edit_user_phone_label', 'phone'); ?> <br />
                                                      <?php echo form_input($phone); ?>
                                                </div>

                                                <div class="form-group">
                                                      <?php echo lang('edit_user_password_label', 'password'); ?> <br />
                                                      <?php echo form_input($password); ?>
                                                </div>

                                                <div class="form-group">
                                                      <?php echo lang('edit_user_password_confirm_label', 'password_confirm'); ?><br />
                                                      <?php echo form_input($password_confirm); ?>
                                                </div>

                                                <div class="form-group">
                                                      <?php if ($this->ion_auth->is_admin()) : ?>

                                                            <h3><?php echo lang('edit_user_groups_heading'); ?></h3>
                                                            <?php foreach ($groups as $group) : ?>
                                                                  <label>
                                                                        <?php
                                                                                    $gID = $group['id'];
                                                                                    $checked = null;
                                                                                    $item = null;
                                                                                    foreach ($currentGroups as $grp) {
                                                                                          if ($gID == $grp->id) {
                                                                                                $checked = ' checked="checked"';
                                                                                                break;
                                                                                          }
                                                                                    }
                                                                                    ?>
                                                                        <input type="checkbox" class="flat-red" name="groups[]" value="<?php echo $group['id']; ?>" <?php echo $checked; ?>>
                                                                        <?php echo htmlspecialchars($group['name'], ENT_QUOTES, 'UTF-8'); ?>
                                                                  </label>
                                                            <?php endforeach ?>

                                                      <?php endif ?>
                                                </div>

                                                <?php echo form_hidden('id', $user->id); ?>
                                                <?php echo form_hidden($csrf); ?>
                                          </div>

                                          <div class="box-footer">
                                                <button type="submit" class="btn btn-success">Save Group</button>
                                          </div>

                                          <?php echo form_close(); ?>
                                    </div>
                              </div>
                        </div>
                  </div>
            </section><!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <?php $this->load->view('back/footer') ?>
</div><!-- ./wrapper -->

<?php $this->load->view('back/js') ?>
<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url('assets/template/backend/') ?>plugins/iCheck/icheck.min.js"></script>
<script>
      //Flat green color scheme for iCheck
      $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
      })
</script>

</body>

</html>