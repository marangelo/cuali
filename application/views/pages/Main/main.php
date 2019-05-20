<div class="container"><br><br>
	<div class="row">
        <div class="col s12 m12">
            <div class="card">
                <div class="card-content">
                    <div class="row">
                        <div class="col s12 m12">
                            <p class="title-modals right">Nº 000001</p>
                        </div>
                    </div>
                    <div class="row" id="menu-reporte"><br>
                        <div class="col s12 m4 container-input">
                            <i class="material-icons">today</i>
                            <input type="text" id="Id_Desde" name="Fecha" class="input-fecha" placeholder="Fecha:" value="">
                        </div>
                        <div class="col s12 m5 container-input">
                            <i class="material-icons">play_circle_filled</i>
                            <input type="text" placeholder="Cuenta">
                        </div>
                        <div class="col s12 m3 container-input"" >
                            <i class="material-icons">play_circle_filled</i>
                            <input placeholder="Fuente" type="text" class="validate">
                        </div>
                    </div>
                    <div class="row" id="menu-reporte"><br>
                        <div class="col s12 m6 container-input">
                            <i class="material-icons">play_circle_filled</i>
                            <input type="text" placeholder="Tipo">
                        </div>
                        <div class="col s12 m6 container-input"" >
                            <i class="material-icons">play_circle_filled</i>
                            <input placeholder="Categoria" type="text" class="validate">
                        </div>
                    </div>
                    <div class="row" id="menu-reporte"><br>
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
                        <div class="row" id="menu-reporte"><br>
                            <div class="col s12 m6 container-input">
                                <input type="text" placeholder="Correo"  >
                            </div>
                            <div class="col s12 m6 container-input"" >
                                <input placeholder="Remetido a:" name="usuario" id="usuario" type="text" class="validate">
                            </div>
                        </div>
                        <div class="row" id="menu-reporte"><br>
                            <div class="col s12 m12   container-input"" >
                                <textarea class="materialize-textarea" data-length="420" style="height: 150px" placeholder="Comentario"></textarea>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col s12 m12 center">
                                <input style="width: 15%; height: 44px" class="Btnadd modal-action modal-close btn" type="submit" name="submit" value="Guardar">
                                <input style="width: 15%; height: 44px" class="btn btn-cancel " type="submit" name="submit" value="Cancelar">
                            </div>
                        </div>
                    </div>
                </div>
        </div>
	</div>
	<div class="divider"></div>
	<br>
	<div class="row" id="data-reporte">
        <div class="col s12 m12">
            <div class="container-button">
                <input type="text" class="form-control" placeholder="Buscar..." id="Id_Buscar">
                <span class="input-group-btn">
                    <button class="button1 btn-secondary" type="button"><i class="material-icons">search</i></button>
                </span>
            </div>
        </div>
        <div class="col s12 m12">
             <table id="tblReportes" class="display" cellspacing="0" width="100%"></table>
		</div>
	</div>
    <div class="row" id="data-reporte-tmp"></div>
</div>