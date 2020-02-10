    <script>
    $(document).ready(function() {
        inicializarDatatable();
        inicializaControlFecha();
        $( "#frm_lab_row").change(function() {
            var table = $('#tblReportes').DataTable();
            table.page.len(this.value).draw();
        });


    });

    $('#slCuenta').on('change', function() {

        $('#slCategorias').find('option').not(':first').remove();
        $('#slAsignado').find('option').not(':first').remove();

        var IdCuenta = $('#slCuenta').val();
        var oColor = (IdCuenta==="ND") ? "#B2B2B2" : "#000";

        $("#select2-slCuenta-container").css('color', oColor);

        $.ajax({
            url: "Info_Cuenta/"+IdCuenta ,
            type: 'get',
            async: true,
            success: function(data) {
                if (data.length!=0) {
                    $.each(JSON.parse(data), function(i, item) {
                        $.each(item['array_Categorias'], function(i, item) {
                            $("#slCategorias").append('<option value='+item['Id_Categorias']+'>'+item['Nombre']+'</option>');
                        });
                        $.each(item['array_Remitidos'], function(i, item) {
                            $("#slAsignado").append('<option value='+item['Id_Remitidos']+'>'+item['Nombre']+'</option>');
                        });
                    });
                }else if (data.length===0) {
                    alert("Error");
                }

            }
        });

    });

    $('#Id_To_Excel').click(function(){
        var mFechaDesde        = $("#desde").val();
        var mFechaHasta        = $("#hasta").val();
        var mCuenta            = $("#slCuenta").val();
        var mCatego            = $("#slCategorias").val();
        var mTipo              = $("#slTipo").val();
        var mAsignado          = $("#slAsignado").val();
        var mCiudad            = $("#slCiudades").val();



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
        }else if(mCuenta==="ND") {
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: 'Seleccione la cuenta!'
            });

        }else{
            var url = "Buscar_Solicitud_reporte_Excel/" + mFechaDesde + "/" + mFechaHasta + "/" + mCuenta + "/" + mCatego + "/" + mTipo + "/" + mAsignado + "/" + mCiudad;
            window.open(url, '_blank');

        }



    });

    function Buscar() {
        var mFechaDesde        = $("#desde").val();
        var mFechaHasta        = $("#hasta").val();
        var mCuenta            = $("#slCuenta").val();
        var mCatego            = $("#slCategorias").val();
        var mTipo              = $("#slTipo").val();
        var mAsignado          = $("#slAsignado").val();
        var mCiudad            = $("#slCiudades").val();


        console.log(mCatego + '->' + mTipo + '->' + mAsignado + '->' + mCiudad);

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
        }else if(mCuenta==="ND") {
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: 'Seleccione la cuenta!'
            });

        }else{
            $('#tblReportes').DataTable({
                "ajax": {
                    'type': 'POST',
                    'url': 'Buscar_Solicitud_reporte',
                    'data': {
                        f1: mFechaDesde,
                        f2: mFechaHasta,
                        Cu: mCuenta,
                        Ca: mCatego,
                        Ti: mTipo,
                        As: mAsignado,
                        Ci: mCiudad
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
                    { "data": "FECHA" },
                    { "data": "CLIENTE" },
                    { "data": "ASIGNADO" },
                    { "data": "TIPO" },
                    { "data": "CATEGORIA" },
                    { "data": "CIUDAD" }
                ],
                "fnInitComplete": function (dta) {
                    $("#tblReportes_filter").hide();
                }
            });
        }

    }


    function inicializarDatatable() {
        $('#tblReportes').DataTable({
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
            "fnInitComplete": function (dta) {
                $("#tblReportes_filter").hide();
            }
        });

    }
</script>