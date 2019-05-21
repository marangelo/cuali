<script>
    $(document).ready(function() {
        inicializarDatatable();
        inicializaControlFecha();
    });
    function inicializarDatatable() {
        $('#tblUsuarios')
            .empty()
            .show()
            .dataTable({
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
                    { "title": "HORA" }
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
</script>