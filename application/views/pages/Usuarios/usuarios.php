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
                     <th>Contraseña</th>
                     <th>Fecha</th>
                     <th>Rol</th>
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
                                           <td>".$d['password']."</td>                                           
                                           <td>".$d['created_at']."</td>
                                           <td>".$d['rol']."</td>
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
        <h4>Nueva Cuenta [ <span id="spnAccion"></span> ]</h4>
        <span id="idRow" style="display: none"></span>
        <div class="row" id="menu-reporte">
            <div class="col s12 m12"  >
                <input  type="text" placeholder="Usuario" id="txUsuario"><br>
            </div>
            <div class="col s12 m12" >
                <input  type="text" placeholder="Nombre Completo" id="txFullName"> <br>
            </div>
            <div class="col s12 m12"><br>
                <input type="password" placeholder="Contraseña"  id="txPassword">
            </div>
            <div class="col s12 m12"><br>
                <select id="select_tipo_Usuario">
                    <option value="">Tipo de usuario...</option>
                    <option value="0">Admin</option>
                    <option value="1">Digitador</option>
                    <option value="2">Cliente</option>
                </select>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat" onclick="Save()">OK</a>
    </div>
</div>


<!-- Modal Structure -->

<div id="mdPermisos" class="modal">
    <div class="modal-content">
        <h4>Gestion de Cuentas...</h4>
        <div id="mdlTabla"></div>
        </table>
    </div>
</div>