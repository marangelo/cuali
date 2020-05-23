    <script>
    $(document).ready(function() {
        inicializarDatatable();
        inicializaControlFecha();
        $("#SearchCasos").on('keyup',function(){
            var table = $('#tblReportes').DataTable();
            table.search(this.value).draw();
        });
        $( "#frm_lab_row").change(function() {
            var table = $('#tblReportes').DataTable();
            table.page.len(this.value).draw();
        });


    });



    function OpenModal(){
        Swal.fire({
            type: 'error',
            title: 'Oops...',
            text: 'Seleccione primer rango!'
        });
    }
    $('#Id_To_Excel').click(function() {
        var mFechaDesde = $("#desde").val();
        var mFechaHasta = $("#hasta").val();

        if (mFechaDesde===""){
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: 'Seleccione primer rango!'
            });
        }else if(mFechaHasta==="") {
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: 'Seleccione segundo rango!'
            });
        }else{
            var url = "Solicitud_reporte_Excel/" + mFechaDesde + "/" + mFechaHasta;
            window.open(url, '_blank');

        }

    });
    function Descartar(mID) {
        Swal.fire({
            title: '¿Seguro de descartar el caso?',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sip, do it!'
        }).then((result) => {
            if (result.value) {
            var form_data = {
                data : [
                    {
                        "mID"         : mID
                    }
                ]
            };
            $.ajax({
                url: "DescartarSolicitud",
                type: 'post',
                async: true,
                data: form_data,
                success: function(data) {
                    if (data==true) {
                        location.reload();
                    }else {
                        Materialize.toast("Ups...ocurrio un problema al tratar de actualizar!", 4000, 'rounded');
                    }
                }
            });
        }
    });
    }
    function Buscar() {
        var mFechaDesde        = $("#desde").val();
        var mFechaHasta        = $("#hasta").val();

        console.log(mFechaDesde + '->' + mFechaHasta);

        if (mFechaDesde===""){
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: 'Seleccione primer rango!'
            });
        }else if(mFechaHasta==="") {
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: 'Seleccione segundo rango!'
            });
        }else{
            $('#tblReportes').DataTable({
                "ajax": {
                    'type': 'POST',
                    'url': 'BuscarSolicitud',
                    'data': {
                        f1: mFechaDesde,
                        f2: mFechaHasta
                    }
                },
                async:'false',
                "destroy": true,
                "ordering": true,
                "info": false,
                "bPaginate": true,
                "bfilter": false,
                "searching": true,
                "pagingType": "full_numbers",
                "aaSorting": [
                    [0, "desc"]
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

                columns: [
                    { "data": "N" },
                    { "data": "CUENTA" },
                    { "data": "CLIENTE" },
                    { "data": "REMITIDO" },
                    { "data": "FUENTE" },
                    { "data": "FECHA" },
                    { "data": "TIPO" },
                    { "data": "Acc" }
                ],
                "fnInitComplete": function (dta) {
                    $("#tblReportes_filter").hide();
                }
            });


        }

    }
    function inicializarDatatable() {
        $('#tblReportes').DataTable({
            ajax: 'getResumen',
            "destroy": true,
            "ordering": true,
            "info": false,
            "bPaginate": true,
            "bfilter": false,
            "searching": true,
            "pagingType": "full_numbers",
            "aaSorting": [
                [0, "desc"]
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

            columns: [
                { "data": "N" },
                { "data": "CUENTA" },
                { "data": "CLIENTE" },
                { "data": "REMITIDO" },
                { "data": "FUENTE" },
                { "data": "FECHA" },
                { "data": "TIPO" },
                { "data": "Acc" }
            ],
            "fnInitComplete": function (dta) {
                $("#tblReportes_filter").hide();
            }
        });

    }
</script>