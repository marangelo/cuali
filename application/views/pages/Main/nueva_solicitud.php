<div class="container">
    <div class="row">
        <div class="col s12 m12">
            <div class="">
                <div class="">
                    <div class="row">
                        <div class="col s12 m12">
                            <br>
                        </div>
                    </div>
                    <div class="row" id="menu-reporte">
                        <div class="col s12 m4 container-input">
                            <i class="material-icons">today</i>
                            <input type="text" id="Id_Desde" name="Fecha" class="input-fecha" placeholder="Fecha:" value="">
                        </div>
                        <div class="col s12 m4 container-input">
                            <select id="slCuenta" class="jsSelect browser-default">
                                <option class="Color_select" value="ND">Cuenta...</option>
                                <?php
                                foreach ($ext[0]['array_Cuentas'] as $vl){
                                    echo '<option value="'.$vl['Id_Cuenta'].'">'.$vl['Nombre'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col s12 m4 container-input"" >
                            <select name="" id="slFuente" class="jsSelect">
                                <option value="ND" ><span> Fuente:</span></option>
                                <?php
                                foreach ($ext[0]['array_Fuentes'] as $vl){
                                    echo '<option value="'.$vl['idFuentes'].'">'.$vl['name'].$vl['fNombre'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row" id="menu-reporte">
                        <div class="col s12 m4 container-input">
                            <select name="" id="slTipo" class="jsSelect">
                                <option value="ND" ><span> Tipo</span></option>
                                <?php
                                foreach ($ext[0]['array_Tipos'] as $vl){
                                    echo '<option value="'.$vl['IdTipos'].'">'.$vl['name'].$vl['tpNombre'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col s12 m4 container-input"" >
                            <select name="" id="slCategorias" class="jsSelect ">
                                <option value="ND" disabled selected><span>Categoria</span></option>
                            </select>
                        </div>
                        <div class="col s12 m4 container-input">
                            <input type="text" id="txMonto" placeholder="Monto: ">
                        </div>
                    </div>
                    <div class="row" id="menu-reporte">
                        <div class="col s12 m4 container-input">
                            <input type="text" placeholder="Nombres" id="txNombres">
                        </div>
                        <div class="col s12 m4 container-input" >
                                <input placeholder="Apellidos" type="text" class="validate" id="txApellidos">
                        </div>
                        <div class="col s12 m4   container-input" >
                            <input placeholder="Telefono" type="text" class="validate" id="txTelefono">
                        </div>
                    </div>
                    <div class="row" id="menu-reporte">
                        <div class="col s12 m4 container-input">
                            <input type="text" placeholder="Correo" id="txCorreo" >
                        </div>
                        <div class="col s12 m4 container-input" >
                            <i class="material-icons prefix" >
                                <img  src="<?php echo base_url();?>assets/css/chosen-sprite.png" id="IdOpenModal">
                            </i>
                            <span id="lblIDRemitido" style="display: none">0</span>
                            <input disabled  type="text" class="validate" placeholder="Asignar:" id="txRemitidos">
                        </div>
                        <div class="col s12 m4">
                            <select name="" id="slCiudades" class="jsSelect">
                                <option value="ND" >Departamento:</option>
                                <?php
                                foreach ($ext[0]['array_Ciudades'] as $vl){
                                    echo '<option value="'.$vl['IdCiudad'].'">'.$vl['NombreCiudad'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row" id="menu-reporte">
                        <div class="col s12 m12   container-input"" >
                            <textarea id="taComentario" class="materialize-textarea" data-length="420" style="height: 150px" placeholder="Comentario"></textarea>
                        </div>
                    </div>
                    <div class="row" >
                        <div class="col s12 m12 center">
                            <input style="width: 15%; height: 44px; background-color: #009FE3;" class="Btnadd modal-action modal-close btn" type="submit" name="submit" value="Enviar" onclick="SaveSolicitud()">
                            <input style="width: 15%; height: 44px; background-color: #B2B2B2;" class="btn btn-cancel " type="submit" name="submit" value="Cancelar">
                        </div>
                    </div>
                    <div class="row">

                        <span class="red-text text-darken-2">*Todos los campos son requeridos.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="mdlRemitidos" class="modal">
    <div class="modal-content" id="mdlTabla">

    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat" ID="bt_asignarCaso">Asignar</a>
    </div>
</div>


