<div class="container"><br><br>
	<div class="row" id="data-reporte">
        <div class="col s12 m11">
            <div class="container-button">
                <input type="text" class="form-control" placeholder="Buscar..." id="Id_Buscar">
                <span class="input-group-btn">
                    <button class="button1 btn-secondary" type="button"><i class="material-icons">search</i></button>
                </span>
            </div>
        </div>
        <div class="col s12 m1 left" >
            <a href="#!" class="modal-trigger" onclick="OpenModal('add')"><i class="small material-icons">add_circle</i></a>
        </div>
        <div class="col s12 m12">
             <table id="tblUsuarios" class="display" cellspacing="0" width="100%">
                 <thead>
                 <tr>
                     <th>Nº</th>
                     <th>Usuario</th>
                     <th>Nombre</th>
                     <th>Fecha</th>
                     <th></th>
                 </tr>
                 </thead>
                 <tbody>
                 <?php
                 foreach ($ext['data'] as $d){
                     echo "
                                    <tr>
                                           <td>".$d['N']."</td>
                                           <td>".$d['USUARIOS']."</td>
                                           <td>".$d['nombre']."</td>
                                           <td>".$d['created_at']."</td>
                                           <td>".$d['Acc']."</td>
                                    </tr>";
                 }

                 ?>
                 </tbody>
             </table>
		</div>
	</div>
</div>
<div id="mdUsuario" class="modal">
    <div class="modal-content">
        <span id="spnAccion">Cuentas Permisos</span>
        <div class="row" id="menu-reporte">
            <div class="col s12 m6 container-input"" >
                <input  type="text" placeholder="Usuario">
            </div>
            <div class="col s12 m6 container-input"" >
                <input  type="text" placeholder="Nombre Completo">
            </div>
        </div>
        <div class="row">
            <div class="col s12 m6">
                <input type="text" placeholder="Contraseña">
            </div>
            <div class="col s12 m6">
                <input type="text" placeholder="Confirme contrsaseña">
            </div>
        </div>
    </div>
</div>

<div id="mdUsuario" class="modal">
    <div class="modal-content">
        <span id="spnAccion"><h4>N/D</h4></span>
        <div class="row" id="menu-reporte">
            <div class="col s12 m6 container-input"" >
            <input  type="text" placeholder="Usuario">
        </div>
        <div class="col s12 m6 container-input"" >
        <input  type="text" placeholder="Nombre Completo">
    </div>
</div>
<div class="row">
    <div class="col s12 m6">
        <input type="text" placeholder="Contraseña">
    </div>
    <div class="col s12 m6">
        <input type="text" placeholder="Confirme contrsaseña">
    </div>
</div>

</div>
<div class="modal-footer">
    <div class="row">
        <div class="col s12 m12 center">
            <a href="#!"  class="modal-action modal-close waves-effect waves-red btn-flat "><i class="small material-icons">save</i></a>
            <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat "><i style="color: red" class="small material-icons">clear</i></a>
        </div>
    </div>
</div>
</div>

<!-- Modal Structure -->

<div id="mdPermisos" class="modal">
    <div class="modal-content">
        <h4>Modal Header</h4>
        <table class="display" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Nº</th>
                <th>Cuenta</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($inf_Permisos['dtCheck'] as $d){
                echo "
                                    <tr>
                                           <td>".$d['name']."</td>
                                           <td>".$d['chck']."</td>
                                    </tr>";
            }

            ?>
            </tbody>
        </table>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
</div>