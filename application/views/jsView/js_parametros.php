<script>
    $(document).ready(function() {
        inicializarDatatable();
        inicializaControlFecha();
    });


    function inicializarDatatable() {
        $('#tblFuentes,#tblTipos').DataTable({
            "destroy": true,
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
                [10, 10, -1],
                [10, 30, "Todo"]
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
            },
            "fnInitComplete": function (dta) {
                $("#tblTipos_filter,#tblTipos_paginate").hide();
                $("#tblFuentes_filter,#tblFuentes_paginate").hide();
            }
        });

    }



</script>