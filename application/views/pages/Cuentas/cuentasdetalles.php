<div class="container">
    <div class="row">
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
                        <div class="col s12 m12">
                            <input type="text" placeholder="Nombres">
                        </div>
                    </div>
                    <table id="tblCategoria" class="display" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Nº</th>
                            <th>CATEGORIA</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($DataCuenta[0]['array_Categorias'] as $d){
                            echo "
                                    <tr>
                                           <td>".$d['Id_Categorias']."</td>
                                           <td>".$d['Nombre']."</td>
                                    </tr>";
                        }

                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-action center">
                    <a href="#!"  class="modal-action modal-close waves-effect waves-red btn-flat "><i class="small material-icons">save</i></a>
                </div>
            </div>
        </div>
        <div class="col s12 m12">
            <div class="card" >
                <div class="card-content">
                    <div class="row" >
                        <div class="col s12 m4">
                            <input type="text" placeholder="Nombres">
                        </div>
                        <div class="col s12 m4" >
                            <input placeholder="Email" type="text" class="validate">
                        </div>
                        <div class="col s12 m4">
                            <input placeholder="Cargo" type="text" class="validate">
                        </div>
                    </div>

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
                        <?php
                        foreach ($DataCuenta[0]['array_Remitidos'] as $d){
                            echo "
                                    <tr>
                                           <td>".$d['Id_Remitidos']."</td>
                                           <td>".$d['Nombre']."</td>
                                           <td>".$d['Email']."</td>
                                           <td>".$d['Cargo']."</td>
                                    </tr>";
                        }

                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-action center">
                    <a href="#!"  class="modal-action modal-close waves-effect waves-red btn-flat "><i class="small material-icons">save</i></a>
                </div
            </div>
        </div>
	</div>
</div>
