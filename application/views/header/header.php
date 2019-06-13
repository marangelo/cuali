<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CUALI | GSM NICARAGUA</title>
    <!--Import Google Icon Font-->    
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">    
    <!--Import materialize.css-->    
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/materialize.css"  media="screen,projection"/>
    <!--CHOSEN CONTROLS-->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/select2.min.css">
	<!--DATATABLES-->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/dataTables.foundation.css" >
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/select.dataTables.min.css" >
    <!--Mis estilos css-->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/_styles.css"  media="screen,projection"/>
    <!--DATEPICKERS-->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/daterangepicker.css" >
    <!--SWEETALERT2-->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/sweetalert2.min.css" >


</head>
<body>
	<header class="demo-header mdl-layout__header">
		<nav class="nav-extended">
			<div class="menu">
				<div class="nav-wrapper" >
                    <a href="#" class="left" style="margin-left: 10px;"><img  src="<?php echo base_url();?>assets/images/Logo.png" style="width: 100px;margin-top: 10px;"></a>
                    <ul id="nav-mobile" class="left hide-on-med-and-down" style="margin-left: 10px">

                        <?php

                        switch ($this->session->userdata('rol')) {
                            case "0":
                                echo '
                                <li id="main"><a href="'.base_url('index.php/main').'">Resumen</a></li>
                                <li><a href="#">|</a></li>
                                <li id="Nueva"><a href="'.base_url('index.php/Nueva').'">Solicitudes</a></li>
                                <li><a href="#">|</a></li>
                                <li id="Cuentas"><a href="'.base_url('index.php/Cuentas').'">Cuentas</a></li>
                                <li><a href="#">|</a></li>
                                <li id="Usuarios"><a href="'.base_url('index.php/Usuarios').'">Usuarios</a></li>
                                <li><a href="#">|</a></li>
                                <li id="Config"><a href="'.base_url('index.php/Config').'">Parametros</a></li>
                                ';
                                break;
                            case "1":
                                echo '
                                <li id="main"><a href="'.base_url('index.php/main').'">Resumen</a></li>
                                <li><a href="#">|</a></li>
                                <li id="Nueva"><a href="'.base_url('index.php/Nueva').'">Solicitudes</a></li>
                                ';
                                break;
                        }
                        ?>



                    </ul>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li><a href="#" class="HoverTrasparente"><?php echo $this->session->userdata('nombre');?></a></li>
                        <li><img  src="<?php echo base_url("assets/images/Config.png");?>"  style="width: 20px; margin-top: 22px;margin-left: 10px"></li>
                        <li><a href="salir">Cerrar sesión</a></li>
                    </ul>

                </div>
			</div>
		</nav>
	</header>
