<script>
    $(document).ready(function() {
        $('.modal').modal();
        inicializarDatatable();
        inicializaControlFecha();
        inicializaControlChosen();
    });
    function inicializarDatatable() {
        $('#data-reporte').show();
        $("#content-recibos").remove();
        $('#tblReportes')
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
                    { "title": "FECHA" },
                    { "title": "HORA" },
                    { "title": "ORIGEN" },
                    { "title": "DESTINO" },
                    { "title": "CANAL" },
                    { "title": "CANAL DESTINO" },
                    { "title": "ESTADO" },
                    { "title": "DURACION" }
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
        $("#tblReportes_filter").hide();
    }
</script>