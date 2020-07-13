<?php $method=$this->router->fetch_method(); ?>
<?php $method=$this->router->fetch_method(); ?>


<img  src="<?= base_url() ?>assets/images/Logo.png" style="width: 200px;height: 110px;">

<ul class="side-menu">

    <li <?php if($method=="perfil") { ?> class="active" <?php } ?>>
        <a href="<?= base_url('index.php/perfil'); ?>"><i class="feather icon-home"></i> Dashboard</a>
    </li>
    <li <?php if($method=="casos" ) { ?> class="active" <?php } ?>>
        <a href="<?= base_url('index.php/casos'); ?>"><i class="feather icon-life-buoy"></i> Casos</a>
    </li>
    <li <?php if($method=="Myprofile") { ?> class="active" <?php } ?>>

        <a href="<?= base_url('index.php/MiPerfil'); ?>"><i class="feather icon-user"></i> Perfil</a>
    </li>
    <li <?php if($method=="change_password") { ?> class="active" <?php } ?>>
        <a href="<?= base_url('index.php/change_password'); ?>"><i class="feather icon-lock"></i> Cambiar Contraseña</a>
    </li>
    <li>
        <a href="<?= base_url('index.php/salir'); ?>"><i class="feather icon-log-out"></i> Salir</a>
    </li>
</ul>