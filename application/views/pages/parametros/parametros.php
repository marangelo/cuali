<div class="container">
    <div class="row">
        <div class="col s12 m12">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Parametros de Cuali</span>
                </div>
            </div>
        </div>
    </div>
	<div class="row">
        <div class="col s12 m6">
            <div class="card" >
                <div class="card-content">
                    <div class="row" >
                        <div class="col s12 m12">
                            <input type="text" placeholder="Nombres">
                        </div>
                    </div>
                    <table id="tblTipos" class="display" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Nº</th>
                            <th>Tipos</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($DataConfig[0]['array_Tipos'] as $d){
                            echo "
                                    <tr>
                                           <td>".$d['IdTipos']."</td>
                                           <td>".$d['tpNombre']."</td>
                                           <th><i class='material-icons'>delete</i> </th>
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
        <div class="col s12 m6">
            <div class="card" >
                <div class="card-content">
                    <div class="row" >
                        <div class="col s12 m12">
                            <input type="text" placeholder="Nombres">
                        </div>
                    </div>

                    <table id="tblFuentes" class="display" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Nº</th>
                            <th>Fuentes</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($DataConfig[0]['array_Fuentes'] as $d){
                            echo "
                                    <tr>
                                           <td>".$d['idFuentes']."</td>
                                           <td>".$d['fNombre']."</td>
                                           <th><i class='material-icons'>delete</i> </th>
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
