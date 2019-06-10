<div class="container">
    <div class="row">
        <span id="idCuenta" style="display: none">
            <?php echo $DataCuenta[0]['array_Datos'][0]['Id_Cuenta'];?></span>
        </span>
        <div class="col s12 m12">
            <div class="card">
                <div class="card-content">
                    <span class="card-title"><?php echo $DataCuenta[0]['array_Datos'][0]['Nombre'];?></span>
                </div>
            </div>
        </div>
    </div>
	<div class="row">
        <div class="col s12 m12">
            <div class="card" >
                <div class="card-content">
                    <div class="row" >
                        <div class="col s12 m10">
                            <input type="text" placeholder="Nombres" id="nmCategoria">
                        </div>
                        <div class="col s12 m2">
                            <a href="#!" class="btn disabled" id="btnSaveCategoria" onclick="Save('CAT')">Guardar</a>
                        </div>
                    </div>
                    <table id="tblCategoria" class="display" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Nº</th>
                            <th>CATEGORIA</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($DataCuenta[0]['array_Categorias'] as $d){
                            echo "
                                    <tr>
                                           <td>".$d['Id_Categorias']."</td>
                                           <td>".$d['Nombre']."</td>
                                           <td><a href='#!' onclick='onAccion(".'"delete_categoria"'.','.$d['Id_Categorias'].")'> <i class='material-icons'>delete</i></a></td>
                                    </tr>";
                        }

                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col s12 m12">
            <div class="card" >
                <div class="card-content">
                    <div class="row" >
                        <div class="col s12 m4">
                            <input type="text" placeholder="Nombres" id="Id_Remitido_nombre">
                        </div>
                        <div class="col s12 m3" >
                            <input placeholder="Email" type="text" class="validate" id="Id_Remitido_email">
                        </div>
                        <div class="col s12 m3">
                            <input placeholder="Cargo" type="text" class="validate" id="Id_Remitido_cargo">
                        </div>
                        <div class="col s12 m2">
                            <a href="#!" class="btn disabled" id="btnSaveRemitido" onclick="Save('REM')">Guardar</a>
                        </div>
                    </div>
                    <span id="frmAccion" style="display: none">New</span>

                    <table id="tblRemitente" class="display" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Nº</th>
                            <th>NOMBRE</th>
                            <th>EMAIL</th>
                            <th>CARGO</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($DataCuenta[0]['array_Remitidos'] as $d){
                            echo "
                                    <tr>
                                           <td>".$d['Id_Remitidos']."</td>
                                           <td>".$d['Nombre']."</td>
                                           <td>".$d['Email']."</td>
                                           <td>".$d['Cargo']."</td>
                                           <td>
                                                <i class='material-icons'>edit</i>  
                                                <a href='#!' onclick='onAccion(".'"delete_remitido"'.','.$d['Id_Remitidos'].")'><i class='material-icons'>delete</i></a>
                                           </td>
                                           
                                    </tr>";
                        }

                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-action center">

                </div
            </div>
        </div>
	</div>
</div>
