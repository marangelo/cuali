    <script>
    $(document).ready(function() {
        inicializarDatatable();
        inicializaControlFecha();
        $( "#frm_lab_row").change(function() {
            var table = $('#tblReportes').DataTable();
            table.page.len(this.value).draw();
        });


    });






    var var_charts_Categoria = {
        chart: {
            type: 'pie',
            renderTo: 'charts_Categoria'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        title: {
            text: 'Tipo de solicitudes'
        },
        credits: {
            enabled: false
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        xAxis: {
            title: {
                text: ''
            }
        },
        yAxis: {
            title: {
                text: ''
            }
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data:[{name: "",y:1}]

        }]
    };
    crear_grafica(var_charts_Categoria);

    var var_charts_origen = {
        chart: {
            type: 'pie',
            renderTo: 'charts_Origen'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        title: {
            text: 'Tipo de solicitudes'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        credits: {
            enabled: false
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        xAxis: {
            title: {
                text: ''
            }
        },
        yAxis: {
            title: {
                text: ''
            }
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data:[{name:"",y:1}]

        }]
    };
    crear_grafica(var_charts_origen);

    var var_charts_asignadas = {
        chart: {
            type: 'bar',
            renderTo: 'charts_Asignado'
        },
        title: {
            text: ''
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: [],
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: '',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: ' '
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            enabled: false
        },
        credits: {
            enabled: false
        },
        series: [{
            name: '',
            data:[0]
        }]
    };
    crear_grafica(var_charts_asignadas);
    var var_charts_trafico = {
        chart: {
            type: 'spline',
            renderTo: 'charts_Trafico'
        },
        plotOptions: {

        },
        title: {
            text: ''
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: [],
            tickmarkPlacement: 'on',
            title: {
                enabled: false
            }
        },
        yAxis: {
            title: {
                text: ''
            },
            labels: {
                formatter: function () {
                    return this.value / 1000;
                }
            }
        },
        tooltip: {
            crosshairs: true,
            shared: true
        },
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        },
        credits: {
            enabled: false
        },
        legend: {
            enabled: false
        },
        series: [{
            name: '',
            data:[0]
        }]
    };
    crear_grafica(var_charts_trafico);




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
                "fnInitComplete": function(oSettings, json) {
                    $("#tblReportes_filter").hide();

                    var api = this.api();

                    var dta_asginada    = [];
                    var title_asignada  = [];

                    var dta_trafico     = [];
                    var title_trafico   = [];


                    $("#idCountFilter").text(api.rows( ).count());
                    $("#idFilter").text("(Tipos " + mFechaDesde +" al " + mFechaHasta +")" );

                    var_charts_Categoria.series[0].data = json['Tipos'];
                    crear_grafica(var_charts_Categoria);

                    var_charts_origen.series[0].data = json['Ciudad'];
                    crear_grafica(var_charts_origen);


                    title_asignada = [];
                    $.each(json['Asignada'], function(i, x) {
                        dta_asginada.push({
                            name  : x['Id_Asignado'],
                            y     : x['Count_Asignado']
                        });

                        title_asignada.push(x['name'])
                    });
                    var_charts_asignadas.xAxis.categories = title_asignada;
                    var_charts_asignadas.series[0].data = dta_asginada;
                    crear_grafica(var_charts_asignadas);


                    $.each(json['Dias'], function(i, x) {
                        dta_trafico.push({
                            name  : x['created_at'],
                            y     : x['Count_Dia']
                        });

                        title_trafico.push(x['name'])
                    });
                    var_charts_trafico.xAxis.categories = title_trafico;
                    var_charts_trafico.series[0].data = dta_trafico;
                    crear_grafica(var_charts_trafico);



                }
            });
        }

    }

    function crear_grafica(grafica) {
        new Highcharts.Chart(grafica);
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