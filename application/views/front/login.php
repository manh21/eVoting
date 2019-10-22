<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>E-Voting | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template/backend/') ?>bower_components/bootstrap/dist/css/bootstrap.min.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template/backend/') ?>bower_components/font-awesome/css/font-awesome.min.css" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template/backend/') ?>bower_components/Ionicons/css/ionicons.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template/backend/') ?>dist/css/AdminLTE.min.css" />
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template/backend/') ?>plugins/iCheck/square/blue.css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic" />
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="<?php echo base_url('admin/dashboard') ?>"><b>E-Voting</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to vote</p>
            <div id="infoMessage"><?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?></div>
            <?php echo form_open($action); ?>
            <div class="form-group has-feedback">
                <?php echo form_input($identity); ?>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <?php echo form_input($password); ?>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">
                        Sign In
                    </button>
                </div>
                <!-- /.col -->
            </div>
            <?php echo form_close(); ?>
        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0.0 alpha
        </div>
        <strong>Copyright &copy; 2019 <a href="http://naufalhakim.my.id">Naufal Hakim</a> & <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
    </footer>

    <!-- JavaScript -->
    <!-- jQuery 3 -->
    <script src="<?php echo base_url('assets/template/backend/') ?>bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo base_url('assets/template/backend/') ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url('assets/template/backend/') ?>plugins/iCheck/icheck.min.js"></script>
    <script>
        // iCheck
        $(function() {
            $("input").iCheck({
                checkboxClass: "icheckbox_square-blue",
                radioClass: "iradio_square-blue",
                increaseArea: "20%" /* optional */
            });
        });
        // infoMassages Timer
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 2000);
    </script>
    <!-- JavaScript End -->
</body>

</html>