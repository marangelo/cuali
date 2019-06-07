<script>
    $(document).ready(function() {
        inicializarDatatable();
        inicializaControlFecha();
        $('.modal').modal();
    });
    function inicializarDatatable() {
        $('#tblUsuarios').dataTable({
                "ordering": true,
                "info": false,
                "bPaginate": true,
                "bfilter": false,
                "searching": true,
                "pagingType": "full_numbers",
                "aaSorting": [
                    [0, "asc"]
                ],
                "lengthMenu": [
                    [20, 10, -1],
                    [20, 30, "Todo"]
                ],
                "columns": [
                    { "title": "Nº" },
                    { "title": "USUARIO" },
                    { "title": "FECHA" },
                    { "title": "HORA" },
                    { "title": "" }
                ],
                "language": {
                    "zeroRecords": "NO HAY RESULTADOS",
                    "paginate": {
                        "first":      "Primera",
                        "last":       "Última ",
                        "next":       "Siguiente",
                        "previous":   "Anterior"
                    },
                    "lengthMenu": "_MENU_",
                    "emptyTable": "NO HAY DATOS DISPONIBLES",
                    "search":     "BUSCAR"
                }
            });
        $("#tblUsuarios_filter").hide();
    }


    function OpenModal(Accion){
        var String = (Accion === "add") ? "Add" : "Edit";
        $('#spnAccion').html('<h4>Nueva Cuenta [ ' + String + ' ]</h4>')
        $('#mdUsuario').modal('open');
    }
    function OpenModalPermisos(){
        $('#mdPermisos').modal('open');
    }
</script>