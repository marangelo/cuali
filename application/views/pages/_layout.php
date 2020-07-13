<?php
$class_name=$this->router->fetch_class();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Titulo</title>
    <!-- Required meta tags-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon-->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.png" />
    <!-- Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700&display=swap" rel="stylesheet"> 
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
    <!-- Sweet Alert-->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/cl/vendors/sweetalert2/sweetalert2.min.css">
    <!-- Cropper Js-->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/cl/vendors/cropperjs/cropper.min.css">
    <!-- Summernote-->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/cl/vendors/summernote/summernote-bs4.css">
    <!-- Style -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/cl/css/site.css">

</head>
<body>

    <!-- *****CONTENT***** -->
    <main class="main-content">
        <?= $sub_view; ?>
    </main>
    <!--Main Footer-->
    <footer class="main-footer pt20 pb20">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-12">
                    <div class="copyright-holder mt5 mb5">
                        <?php echo "Copyright ©".date("Y")." Todos los Derechos Reservados."?>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- jQuery -->
    <script src="<?= base_url(); ?>assets/cl/vendors/jquery/jquery.min.js"></script>
    <!--Popper-->
    <script src="<?= base_url(); ?>assets/cl/vendors/popper.js/popper.min.js"></script>
    <script src="<?= base_url(); ?>assets/cl/vendors/bootstrap/js/bootstrap.min.js"></script>
    <!-- Jquery Validation-->
    <script src="<?= base_url(); ?>assets/cl/vendors/jquery-validation/jquery.validate.min.js"></script>
    <!--Toast-->
    <script src="<?= base_url(); ?>assets/cl/vendors/toast/jquery.toast.min.js"></script>
    <!--Sweet Alert-->
    <script src="<?= base_url(); ?>assets/cl/vendors/sweetalert2/sweetalert2.all.min.js"></script>
    <!--Ladda Loader-->
    <script src="<?= base_url(); ?>assets/cl/vendors/ladda/spin.min.js"></script>
    <script src="<?= base_url(); ?>assets/cl/vendors/ladda/ladda.min.js"></script>
    <!-- Cropper JS-->
    <script src="<?= base_url(); ?>assets/cl/vendors/cropperjs/cropper.min.js"></script>
    <!--Summernote-->
    <script src="<?= base_url(); ?>assets/cl/vendors/summernote/summernote-bs4.min.js"></script>
    <!-- Custom Js-->
    <script src="<?= base_url(); ?>assets/cl/js/site/core.js"></script>
    <!-- Custom Js Based on Controller-->
    <script src="<?= base_url(); ?>assets/cl/js/site/user.js"></script>
</body>

</html>