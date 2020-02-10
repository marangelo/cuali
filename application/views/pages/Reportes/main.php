<div class="container" style="width: 100%!important;">

    <div class="card">
        <div class="card-content">
            <div class="row">
                <div class="col s12 m4 container-input">
                    <i class="material-icons">today</i>
                    <input type="text" class="input-fecha" id="desde" placeholder="Desde" value="">
                </div>
                <div class="col s12 m5 container-input">
                    <i class="material-icons">today</i>
                    <input type="text" class="input-fecha" id="hasta" placeholder="Hasta">
                </div>

                <div class="col s12 m1">
                    <select id="frm_lab_row">
                        <option value="-1">*</option>
                        <option value="10">10</option>
                        <option value="100">100</option>

                    </select>
                </div>
                <div class="col s12 m1 container-button">
                    <div class="container-button">
                        <span class="input-group-btn">
                            <button class="button1 btn-secondary waves-effect" type="button" onclick="Buscar()" style="width: 92px"><i class="material-icons" style="margin-top: 6px;">search</i></button>
                        </span>
                    </div>
                </div>
                <div class="col s12 m1 container-button">
                    <div class="container-button">
                        <span class="input-group-btn">
                            <button class="button1 btn-secondary waves-effect" type="button" id="Id_To_Excel" style="width: 92px"><img  src="<?php echo base_url('assets/images/excel.png');?>" style="width: 30px;margin-top: 2px;"></button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m2 container-input">
                    <select id="slCuenta" class="jsSelect browser-default">
                        <option class="Color_select" value="ND">Cuenta...</option>
                        <?php
                        foreach ($ext[0]['array_Cuentas'] as $vl){
                            echo '<option value="'.$vl['Id_Cuenta'].'">'.$vl['Nombre'].'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="col s12 m2 container-input"" >
                    <select name="" id="slCategorias" class="jsSelect ">
                        <option value="ND" selected><span>Categoria</span></option>
                    </select>
                </div>

                <div class="col s12 m2 container-input">
                    <select name="" id="slTipo" class="jsSelect">
                        <option value="ND" ><span> Tipo</span></option>
                        <?php
                        foreach ($ext[0]['array_Tipos'] as $vl){
                            echo '<option value="'.$vl['IdTipos'].'">'.$vl['name'].$vl['tpNombre'].'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="col s12 m3 container-input"" >
                    <select name="" id="slAsignado" class="jsSelect ">
                        <option value="ND" selected><span>Asignado</span></option>
                    </select>
                </div>
                <div class="col s12 m3 container-input"" >
                    <select name="" id="slCiudades" class="jsSelect">
                        <option value="ND" >Ciudadad:</option>
                        <?php
                        foreach ($ext[0]['array_Ciudades'] as $vl){
                            echo '<option value="'.$vl['IdCiudad'].'">'.$vl['NombreCiudad'].'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="col s12 m1 container-button">
                    <div class="container-button">
                        <span class="input-group-btn">

				        </span>
                    </div>
                </div>

            </div>
            <div class="row" id="data-reporte">
                <div class="col s12 m12">
                     <table id="tblReportes" class="display" cellspacing="0" width="100%">
                         <thead>
                             <tr>
                                 <th>Nº</th>
                                 <th>FECHA</th>
                                 <th>CLIENTE</th>
                                 <th>ASIGNADO</th>
                                 <th>TIPO</th>
                                 <th>CATEGORIA</th>
                                 <th>CIUDAD</th>
                             </tr>
                         </thead>
                     </table>
                </div>
            </div>
        </div>
    </div>
</div>