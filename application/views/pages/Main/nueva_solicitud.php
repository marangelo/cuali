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
                        <div class="col s12 m5 container-input">
                            <select name="" id="slCuenta" class="jsSelect browser-default">
                                <option value="" disabled selected><span> Cuenta</span></option>
                                <?php
                                foreach ($ext[0]['array_Cuentas'] as $vl){
                                    echo '<option value="'.$vl['Id_Cuenta'].'">'.$vl['name'].$vl['Nombre'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col s12 m3 container-input"" >
                            <select name="" id="slFuente" class="jsSelect">
                                <option value="" disabled selected><span> Fuente</span></option>
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
                                <option value="" disabled selected><span> Tipo</span></option>
                                <?php
                                foreach ($ext[0]['array_Tipos'] as $vl){
                                    echo '<option value="'.$vl['IdTipos'].'">'.$vl['name'].$vl['tpNombre'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col s12 m4 container-input"" >
                            <select name="" id="slCategorias" class="jsSelect ">
                                <option value="" disabled selected><span>Categoria</span></option>
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
                        <div class="col s12 m4 container-input"" >
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
                           <!-- <select name="" id="slRemitidos" class="jsSelect">
                                <option value="" disabled selected><span>Remitido a :</span></option>
                            </select>-->
                            <i class="material-icons prefix" >
                                <img  src="<?php echo base_url();?>assets/css/chosen-sprite.png" id="IdOpenModal">
                            </i>
                            <input disabled  type="tel" class="validate" placeholder="Asignar:">
                        </div>
                        <div class="col s12 m4">
                            <select name="" id="slCiudades" class="jsSelect">
                                <option value="" disabled selected><span>Ciudadad: </span></option>
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
                            <input style="width: 15%; height: 44px; background-color: #009FE3;" class="Btnadd modal-action modal-close btn" type="submit" name="submit" value="Guardar" onclick="SaveSolicitud()">
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
    <div class="modal-content">

        <table id="tblRemitente" class="display" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Nº</th>
                <th>NOMBRE</th>
                <th>EMAIL</th>
                <th>CARGO</th>
            </tr>
            </thead>
             <tbody>
            </tbody>
        </table>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Asignar</a>
    </div>
</div>