<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>E-Voting | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template/frontend/') ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template/backend/') ?>bower_components/Ionicons/css/ionicons.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template/frontend/') ?>css/adminlte.min.css" />
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
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/template/frontend/') ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/template/frontend/') ?>css/heroic-features.css" rel="stylesheet">

</head>

<body style="margin-bottom: 0px; background: #232531;" class="hold-transition login-page">

    <div class="login-box">
        <div class="login-logo">
            <a href="<?php echo base_url() ?>" class="login-titleHeader"><b>E-Voting</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Login to vote</p>
                <div id="infoMessage"><?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?></div>

                <?php echo form_open($action); ?>
                <div class="input-group mb-3 has-feedback">
                    <?php echo form_input($identity); ?>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3 has-feedback">
                    <?php echo form_input($password); ?>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
                    </div>
                    <!-- /.col -->
                </div>
                <?php echo form_close(); ?>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- JavaScript -->

    <!-- jQuery 3 -->
    <script src="<?php echo base_url('assets/template/frontend/') ?>vendor/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url('assets/template/frontend/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
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