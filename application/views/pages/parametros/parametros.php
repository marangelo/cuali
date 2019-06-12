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
        <div class="col s12 m10 container-button">
            <div class="container-button">
                <input type="text" id="FrmFuentes" class="form-control" placeholder="Ingrese el nombre del recurso." >
                <span class="input-group-btn">
					<button class="button1 btn-secondary waves-effect" type="button" id="btnSave"><i class="material-icons">add</i></button>
				</span>
            </div>
        </div>
        <div class="col s12 m2">
            <select id="select_tipo">
                <option value="T">Tipo</option>
                <option value="F">Fuente</option>
            </select>
        </div>
    </div>
	<div class="row">
        <div class="col s12 m6">
            <div class="card" >
                <div class="card-content">

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
                                           <th><a href='#!' onclick='fndelete(".$d['IdTipos'].",".'"'."T".'"'.")'><i class='material-icons' >delete</i> </a></th>
                                    </tr>";
                        }

                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col s12 m6">
            <div class="card" >
                <div class="card-content">
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
                                           <th><a href='#!' onclick='fndelete(".$d['idFuentes'].",".'"'."F".'"'.")'><i class='material-icons' >delete</i> </a></th>
                                    </tr>";
                        }

                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
	</div>
</div>
