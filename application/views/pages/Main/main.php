<div class="container"><br><br>
    <div class="row">
        <div class="col s12 m3 container-input">
            <i class="material-icons">today</i>
            <input type="text" class="input-fecha" id="desde" placeholder="Desde" value="">
        </div>
        <div class="col s12 m3 container-input">
            <i class="material-icons">today</i>
            <input type="text" class="input-fecha" id="hasta" placeholder="Hasta">
        </div>
        <div class="col s12 m5 container-button">
            <div class="container-button">
                <input type="text" id="SearchCasos" class="form-control" placeholder="Buscar en movimientos" >
                <span class="input-group-btn">
					<button class="button1 btn-secondary waves-effect" type="button" onclick="Buscar()"><i class="material-icons">search</i></button>
				</span>
            </div>
        </div>
        <div class="col s12 m1">
            <select id="frm_lab_row">
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="-1">*</option>
            </select>
        </div>
    </div>
	<div class="row" id="data-reporte">
        <div class="col s12 m12">
             <table id="tblReportes" class="display" cellspacing="0" width="100%">
                 <thead>
                     <tr>
                         <th>Nº</th>
                         <th>CLIENTE</th>
                         <th>REMITIDO</th>
                         <th>FUENTE</th>
                         <th>FECHA</th>
                         <th>TIPO</th>
                         <th></th>
                     </tr>
                 </thead>
             </table>
		</div>
	</div>
</div>