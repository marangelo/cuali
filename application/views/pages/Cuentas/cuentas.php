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
            <a href="#modal1" class="modal-trigger"><i class="small material-icons">add_circle</i></a>
        </div>
        <div class="col s12 m12">
             <table id="tblCuentas" class="display" cellspacing="0" width="100%">
                 <thead>
                   <tr>
                       <th>Nº</th>
                       <th>CUENTA</th>
                       <th>FECHA</th>
                   </tr>
                 </thead>
             </table>
		</div>
	</div>
</div>

<!-- Modal Structure -->
<div id="modal1" class="modal">
    <div class="modal-content">
        <h4>Nueva Cuenta</h4>
        <div class="row" id="menu-reporte">
            <div class="col s12 m12   container-input"" >
            <input  type="text" placeholder="Nueva Cuenta">
        </div>
    </div>
        <div class="row" id="menu-reporte">
            <div class="col s12 m12   container-input"" >
            <textarea class="materialize-textarea" data-length="420" style="height: 150px" placeholder="Comentario"></textarea>
        </div>
    </div>
    </div>
    <div class="modal-footer">
        <div class="row">
            <div class="col s12 m12 center">
                <a href="#!"  class="modal-action modal-close waves-effect waves-red btn-flat "><i class="small material-icons">save</i></a>
                <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat "><i style="color: red" class="small material-icons">clear</i></a>
            </div>
        </div>

    </div>
</div>
