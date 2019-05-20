<div class="login-content">
	<div class="row">
		<div class="col s12 m12">
            <div class="img-log" >
                <img  src="<?php echo base_url();?>assets/images/Logo.png" width="220px">
            </div>
            <div class="form-login">
                <form class="form" method="post" action="<?php echo base_url('index.php/acreditando')?>">
                    <div  class="row">
                        <div class="col s12 m12 ">
                            <input placeholder="Usuario" name="usuario" id="usuario" type="text" class="validate">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m12">
                            <input placeholder="Contraseña" name="password" id="password" type="password" class="validate">
                        </div>
                    </div>
                    <div class="row center">
                        <input style="width: 95%; height: 44px" class="Btnadd modal-action modal-close btn" type="submit" name="submit" value="Iniciar Sesión">
                </form><br>
            </div>
            <center><h5><?php if(isset($mensaje)) echo $mensaje; ?></h5></center>
            <center><span style="color: red;"><?=validation_errors();?></span></center>
            <hr><br>
		</div>
	</div>	
</div>


