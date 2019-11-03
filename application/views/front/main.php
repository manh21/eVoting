<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>E-Voting | SMANSA</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template/frontend/') ?>plugins/fontawesome-free/css/all.min.css">

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
    <link href="<?php echo base_url('assets/template/frontend/') ?>css/main.css" rel="stylesheet">

    <style type="text/css">
        @media (pointer: coarse) and (hover: none) {
            body {
                background: url("<?php echo base_url('assets/template/frontend/') ?>img/bg-mobile-fallback.jpg") #002e66 no-repeat center center scroll;
                background-position: cover;
            }

            body video {
                display: none;
            }
        }
    </style>

</head>

<body>
    <div class="overlay"></div>
    <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
        <source src="mp4/bg.mp4" type="video/mp4">
    </video>

    <div class="masthead">
        <div class="masthead-bg"></div>
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-12 my-auto">
                    <div class="masthead-content text-white py-5 py-md-0">
                        <h1 class="mb-3">Selamat Datang!</h1>
                        <p class="mb-5">
                            <strong>Silahkan Login!</strong> Untuk dapat memilih anda harus login terlebih dahulu!
                        </p>
                        <div>
                            <a href="<?php echo base_url('user') ?>" class="btn btn-lg btn-secondary btn-block btn-login text-uppercase font-weight-bold mb-2">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Javascript -->
    <?php $this->load->view('front/js'); ?>
</body>

</html>