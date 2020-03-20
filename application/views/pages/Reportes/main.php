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

        </div>
    </div>

<div class="row">
    <div class="col s12 l4">
        <div class="card">
            <div class="card-content">
                <h5 class="card-title">Solicitudes</h5>
                <div class="row">
                    <div class="col s8">
                        <h3 id="idCountFilter" class="font-medium m-b-5 m-t-30"></h3>
                        <span id="idFilter">(Entre 00/00/0000 al 00/00/0000)</span>
                    </div>
                    <div class="col s4 right-align">

                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-content">
                <h5 class="card-title">Texto Plano</h5>
                <div class="row">
                    <div class="col s8 m-t-30">
                        <h3 class="font-medium m-b-5">528</h3>
                        <span>(150-165 sales)</span>
                    </div>
                    <div class="col s4 right-align">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- col -->
    <div class="col s12 l4">
        <div class="card">
            <div class="card-content">
                <div id="charts_Categoria"></div>
            </div>
        </div>
    </div>
    <!-- col -->
    <div class="col s12 l4">
        <div class="card">
            <div class="card-content">

                <div id="charts_Origen"></div>

            </div>
        </div>
    </div>
    <!-- col -->

</div>
<div class="row" id="data-reporte">
    <div class="col s12 m5">
        <div id="charts_Asignado"></div>
    </div>
    <div class="col s12 m7">
        <div id="charts_Trafico"></div>
    </div>
</div>


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