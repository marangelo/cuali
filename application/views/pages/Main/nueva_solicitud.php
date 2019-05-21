<div class="container">
    <div class="row">
        <div class="col s12 m12">
            <div class="">
                <div class="">
                    <div class="row">
                        <div class="col s12 m12">
                            <p class="title-modals right">Nº 000001</p>
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
                            <select name="" id="" class="jsSelect">
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
                        <div class="col s12 m6 container-input">
                            <select name="" id="" class="jsSelect">
                                <option value="" disabled selected><span> Tipo</span></option>
                                <?php
                                foreach ($ext[0]['array_Tipos'] as $vl){
                                    echo '<option value="'.$vl['IdTipos'].'">'.$vl['name'].$vl['tpNombre'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col s12 m6 container-input"" >
                            <select name="" id="slCategorias" class="jsSelect">
                                <option value="" disabled selected><span>Categoria</span></option>
                            </select>
                        </div>
                    </div>
                    <div class="row" id="menu-reporte">
                        <div class="col s12 m4 container-input">
                            <input type="text" placeholder="Nombres">
                        </div>
                        <div class="col s12 m4 container-input"" >
                            <input placeholder="Apellidos" type="text" class="validate">
                        </div>
                        <div class="col s12 m4   container-input"" >
                            <input placeholder="Telefono" type="text" class="validate">
                        </div>
                    </div>
                    <div class="row" id="menu-reporte">
                        <div class="col s12 m6 container-input">
                            <input type="text" placeholder="Correo"  >
                        </div>
                        <div class="col s12 m6 container-input"" >

                        <select name="" id="slRemitidos" class="jsSelect">
                            <option value="" disabled selected><span>Remitido a :</span></option>
                        </select>
                        </div>
                    </div>
                    <div class="row" id="menu-reporte">
                        <div class="col s12 m12   container-input"" >
                            <textarea class="materialize-textarea" data-length="420" style="height: 150px" placeholder="Comentario"></textarea>
                        </div>
                    </div>
                    <div class="row" >
                        <div class="col s12 m12 center">
                            <input style="width: 15%; height: 44px; background-color: #009FE3;" class="Btnadd modal-action modal-close btn" type="submit" name="submit" value="Guardar">
                            <input style="width: 15%; height: 44px; background-color: #B2B2B2;" class="btn btn-cancel " type="submit" name="submit" value="Cancelar">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
