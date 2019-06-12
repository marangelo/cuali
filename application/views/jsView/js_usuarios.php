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
                "columnDefs": [
                    { "visible": false, "targets": 0 },
                    { "visible": false, "targets": 5 }
                ],
                "lengthMenu": [
                    [20, 10, -1],
                    [20, 30, "Todo"]
                ],
                "columns": [
                    { "title": "Nº" },
                    { "title": "Usuario" },
                    { "title": "Nombre" },
                    { "title": "Password" },
                    { "title": "Fecha" },
                    { "title": "Rol" },
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

    function Save() {
        var txUsuario   = $("#txUsuario").val();
        var txFullName  = $("#txFullName").val();
        var txPassword  = $("#txPassword").val();
        var txRol       = $("#select_tipo_Usuario").val();
        var Flag        = $("#spnAccion").html().trim();
        var Id          = $("#idRow").html().trim();

        if(txUsuario===""){
            Swal.fire({
                type:  'error',
                title: 'Oops...',
                text:  'Digite el campo Usuario.'
            });
        }else if(txFullName===""){
            Swal.fire({
                type:  'error',
                title: 'Oops...',
                text:  'Digite el campo Nombre completo.'
            });
        }else if (txPassword===""){
            Swal.fire({
                type:  'error',
                title: 'Oops...',
                text:  'Digite la contraseña.'
            });
        }else{
            var form_data = {
                data : [
                    {
                        "txUsuario"        : txUsuario,
                        "txFullName"       : txFullName,
                        "txPassword"       : txPassword,
                        "txRol"            : txRol,
                        "Flag"             : Flag,
                        "Id"               : Id
                    }
                ]
            };
            $.ajax({
                url: "./SaveUsuario",
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
    }


    function OpenModal(Accion){
        var String = (Accion === "add") ? "Add" : "Edit";
        $('#spnAccion').html(String);
        $('#mdUsuario').modal('open');

        $("#txUsuario").val("");
        $("#txFullName").val("");
        $("#txPassword").val("");
        $("#select_tipo_Usuario").val("");
        $("#idRow").html("0");

        if(String==="Edit"){
            var table = $('#tblUsuarios').DataTable();
            $('#tblUsuarios tbody').on( 'click', 'tr', function () {


                if ( $(this).hasClass('selected') ) {

                    $(this).removeClass('selected');
                }
                else {
                    table.$('tr.selected').removeClass('selected');

                    $(this).addClass('selected');

                    var cmId     = table.cell('.selected', 0).data();
                    var cmUsuario = table.cell('.selected', 1).data();
                    var cmNombre  = table.cell('.selected', 2).data();
                    var cmPassword  = table.cell('.selected', 3).data();
                    var cmRol  = table.cell('.selected', 5).data();



                    $("#txUsuario").val(cmUsuario);
                    $("#txFullName").val(cmNombre);
                    $("#txPassword").val(cmPassword);
                    $("#select_tipo_Usuario").val(cmRol);
                    $("#idRow").html(cmId);


                }
            } );
        }
    }
    function SavePermiso(IdCuenta,IdUsuario) {
        $.ajax({
            url: "ajax_SavePermisos",
            type: 'post',
            async: true,
            data: {
                IdCuenta  : IdCuenta,
                IdUsuario : IdUsuario
            },
            success: function(data) {

            }
        });
    }
    function OpenModalPermisos(ID){
        $('#mdPermisos').modal('open');
        $.ajax({
            url: "getPermisos/"+ID ,
            type: 'get',
            async: true,
            success: function(data) {
                if (data.length!=0) {
                    $.each(JSON.parse(data), function(i, item) {

                        var   tbody = '<thead>' +
                            '<tr>' +
                            '<th></th>' +
                            '<th>Nº</th>' +
                            '<th>Cuenta</th>' +
                            '<th></th>' +
                            '</tr>' +
                            '</thead>';
                        $.each(item, function(i, item) {
                            tbody += '<tr>' +
                                '<td></td>'+
                                '<td>' + item['Id'] + '</td>' +
                                '<td>' +item['name'] + '</td>' +
                                '<td>' +item['chck'] +'</td>';

                        });
                        $( "#mdlTabla" ).html(($('<table id="tblRemitente" class="display" cellspacing="0" width="100%">' +tbody + ' </table>')));
                        $('#tblRemitente').DataTable( {
                            columnDefs: [
                                { "visible": false, "targets": 1 },
                                 ]

                        } );

                    });
                    $("#tblRemitente_info,#tblRemitente_paginate,#tblRemitente_filter").hide();
                }else if (data.length===0) {
                    alert("Error");
                }

            }
        });

    }

    function DescartarUsarios(ID) {
        Swal.fire({
            title: '¿Seguro de Descartar el elemento?',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sip, do it!'
        }).then((result) => {
            if (result.value) {
            var form_data = {
                data : [
                    {
                        "mId"      : ID
                    }
                ]
            };
            $.ajax({
                url: "./DescartarUsuario",
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


</script>