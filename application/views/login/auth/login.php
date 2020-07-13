<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="utf-8">
    <base href="<?= base_url(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CUALI | PUBLISA</title>
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.png" />
    <!-- Bootstrap-->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/cl/vendors/bootstrap/css/bootstrap.min.css">
    <!-- LineIcons-->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/cl/fonts/LineIcons/LineIcons.css">
    <!-- Feather Font-->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/cl/fonts/feather-font/css/iconfont.css">
    <!-- Ladda Loader-->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/cl/vendors/ladda/ladda-themeless.min.css">
    <!-- Toast-->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/cl/vendors/toast/jquery.toast.min.css">
    <!-- Style-->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/cl/css/dashboard.css">
</head>

<body class="app app-login">
    <!-- *****LOGIN***** -->
    <!-- Section Starts-->
    <section class="login-holder">
        <!-- Container Starts-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-5 mx-auto">
                    <!-- Login Card Starts-->
                    <div class="card card-signin mt20 mb20">
                        <div class="card-body">
                            <div class="text-center mb20 app-logo">
                                <img src="<?= base_url(); ?>assets/images/logo.png"  >
                            </div>
                            <h5 class="card-title text-center"><?php echo $appVersion?></h5>
                            <form  class="form-signin" method="post" action="<?php echo base_url('index.php/acreditando')?>">
                                <div class="form-group">

                                    <input type="text"  class="form-control" id="usuario" name="usuario"  placeholder="Usuario" autofocus="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" id="password" name="password" placeholder="*******" >
                                </div>
                            <br>
                                <button class="btn btn-lg btn-oval btn-theme-primary btn-block text-uppercase ladda-button" data-style="zoom-in" data-size="l"
                                    type="submit" name="submit"><span class="ladda-label">Iniciar Sesión</span></button>
                            </form>
                        </div>

                    </div>
                    <!-- Login Card Ends-->
                </div>
            </div>
        </div>
        <!--Container Ends-->
    </section>

    <!-- jQuery -->
    <script src="<?= base_url(); ?>assets/cl/vendors/jquery/jquery.min.js"></script>
    <!--Popper-->
    <script src="<?= base_url(); ?>assets/cl/vendors/popper.js/popper.min.js"></script>
    <!--Bootstrap-->
    <script src="<?= base_url(); ?>assets/cl/vendors/bootstrap/js/bootstrap.min.js"></script>
    <!-- Jquery Validation-->
    <script src="<?= base_url(); ?>assets/cl/vendors/jquery-validation/jquery.validate.min.js"></script>
    <!--Toast-->
    <script src="<?= base_url(); ?>assets/cl/vendors/toast/jquery.toast.min.js"></script>
    <!--Ladda Loader-->
    <script src="<?= base_url(); ?>assets/cl/vendors/ladda/spin.min.js"></script>
    <script src="<?= base_url(); ?>assets/cl/vendors/ladda/ladda.min.js"></script>
    <!-- Auth Js-->
    <script src="<?= base_url(); ?>assets/cl/js/admin/auth.js"></script>
</body>

</html>