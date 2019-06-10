<script>
    $(document).ready(function() {
        inicializarDatatable();
        inicializaControlFecha();
        $("#nmCategoria").on('keyup',function(){
            var BtnSaveCategoria = $("#btnSaveCategoria");

            if ( this.value.length > 0  ) {
                BtnSaveCategoria.removeClass('disabled');
            }
            else {
                BtnSaveCategoria.addClass('disabled');

            }
        });

        $("#Id_Remitido_nombre,#Id_Remitido_email,#Id_Remitido_cargo").on('keyup',function(){
            var BtnSaveCategoria = $("#btnSaveRemitido");

            if ( this.value.length > 0  ) {
                BtnSaveCategoria.removeClass('disabled');
            }
            else {
                BtnSaveCategoria.addClass('disabled');

            }
        });

    });

    var table = $('#tblRemitente').DataTable();
    $('#tblRemitente tbody').on( 'click', 'tr', function () {

        var BtnSaveRemitido = $("#btnSaveRemitido");

        if ( $(this).hasClass('selected') ) {

            $(this).removeClass('selected');

            BtnSaveRemitido.addClass('disabled');

            $("#Id_Remitido_nombre").val("");
            $("#Id_Remitido_email").val("");
            $("#Id_Remitido_cargo").val("");
            $("#frmAccion").html("New");

        }
        else {
            table.$('tr.selected').removeClass('selected');

            $(this).addClass('selected');

            BtnSaveRemitido.removeClass('disabled');

            var cmId     = table.cell('.selected', 0).data();
            var cmNombre = table.cell('.selected', 1).data();
            var cmEmail  = table.cell('.selected', 2).data();
            var cmCargo  = table.cell('.selected', 3).data();

            $("#frmAccion").html("Edit-"+cmId);

           $("#Id_Remitido_nombre").val(cmNombre);
           $("#Id_Remitido_email").val(cmEmail);
           $("#Id_Remitido_cargo").val(cmCargo);


        }
    } );

    function onAccion(Accion,id) {
        if(Accion==="delete_categoria" || Accion==="delete_remitido"){
            Swal.fire({
                title: '¿Seguro de descartar?',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sip, do it!'
            }).then((result) => {
                if (result.value) {
                var form_data = {
                    data : [
                        {
                            "mIdCuenta"         : id,
                            "mFormulario"       : Accion
                        }
                    ]
                };
                $.ajax({
                    url: "../DescargarParametro",
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

    }
    function Save(Formularios) {

        var acString    = $("#frmAccion").html().trim();
        var Accion      = acString.substr(0,1).trim();
        var idRemitido  = acString.substr(acString.indexOf("-")+1,10).trim();


        var form_data = {
            data : [
                {
                    "mFormulario"       : Formularios,
                    "mFrmAccion"        : Accion,
                    "mId"               : $("#idCuenta").html().trim(),
                    "mIdCat"            : idRemitido,
                    "mCategoria"        : $("#nmCategoria").val(),
                    "mRemitidoNombre"   : $("#Id_Remitido_nombre").val(),
                    "mRemitidoEmail"    : $("#Id_Remitido_email").val(),
                    "mRemitidoCargo"    : $("#Id_Remitido_cargo").val()
                }
            ]
        };

        console.log(form_data);

        $.ajax({
            url: "../SaveParametrosCuenta",
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


    function inicializarDatatable() {
        $('#tblCategoria,#tblRemitente').DataTable({
            "destroy": true,
            "ordering": true,
            "columnDefs": [
                { "visible": false, "targets": 0 }
            ],
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
                $("#tblRemitente_filter").hide();
                $("#tblCategoria_filter").hide();
            }
        });

    }



</script>