<?php $this->load->view('back/meta') ?>

<div class="wrapper">
  <?php $this->load->view('back/head') ?>
  <?php $this->load->view('back/sidebar') ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Deactivate User
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Deactivate User</h3>
            </div>
            <?php echo form_open("admin/auth/deactivate/" . $user->id); ?>
            <div class="box-body">
              <div class="form-group">
                <label>
                  <input type="radio" class="flat-red" name="confirm" value="yes" checked="checked" />
                  Yes
                </label>
                <label>
                  <input type="radio" class="flat-red" name="confirm" value="no" />
                  No
                </label>
              </div>

              <?php echo form_hidden($csrf); ?>
              <?php echo form_hidden(['id' => $user->id]); ?>

            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-success">Submit</button>
            </div>

            <?php echo form_close(); ?>
          </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <?php $this->load->view('back/footer'); ?>
</div>

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