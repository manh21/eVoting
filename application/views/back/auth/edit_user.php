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
                                    <h1 class="m-0 text-dark">Edit User</h1>
                              </div><!-- /.col -->
                              <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                          <li class="breadcrumb-item"><a href="#">Home</a></li>
                                          <li class="breadcrumb-item active">Edit User</li>
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
                                                <h3 class="card-title">Edit User</h3>
                                          </div>
                                          <div class="card-body">
                                                <div class="form-group">
                                                      <div id="infoMessage"><?php echo $message; ?></div>

                                                      <?php echo form_open(uri_string()); ?>

                                                      <p>
                                                            <?php echo lang('edit_user_fname_label', 'first_name'); ?> <br />
                                                            <?php echo form_input($first_name); ?>
                                                      </p>

                                                      <p>
                                                            <?php echo lang('edit_user_lname_label', 'last_name'); ?> <br />
                                                            <?php echo form_input($last_name); ?>
                                                      </p>

                                                      <p>
                                                            <?php echo lang('edit_user_company_label', 'company'); ?> <br />
                                                            <?php echo form_input($company); ?>
                                                      </p>

                                                      <p>
                                                            <?php echo lang('edit_user_phone_label', 'phone'); ?> <br />
                                                            <?php echo form_input($phone); ?>
                                                      </p>

                                                      <p>
                                                            <?php echo lang('edit_user_password_label', 'password'); ?> <br />
                                                            <?php echo form_input($password); ?>
                                                      </p>

                                                      <p>
                                                            <?php echo lang('edit_user_password_confirm_label', 'password_confirm'); ?><br />
                                                            <?php echo form_input($password_confirm); ?>
                                                      </p>

                                                      <?php if ($this->ion_auth->is_admin()) : ?>

                                                            <h3><?php echo lang('edit_user_groups_heading'); ?></h3>
                                                            <?php foreach ($groups as $group) : ?>
                                                                  <label class="checkbox">
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
                                                                        <input type="checkbox" name="groups[]" value="<?php echo $group['id']; ?>" <?php echo $checked; ?>>
                                                                        <?php echo htmlspecialchars($group['name'], ENT_QUOTES, 'UTF-8'); ?>
                                                                  </label>
                                                            <?php endforeach ?>

                                                      <?php endif ?>

                                                      <?php echo form_hidden('id', $user->id); ?>
                                                      <?php echo form_hidden($csrf); ?>

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