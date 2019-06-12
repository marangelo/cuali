<script>
    $(document).ready(function() {
        inicializarDatatable();
        inicializaControlFecha();
    });

    $("#btnSave").click(function () {

        var txTipo = $("#FrmFuentes").val();
        var slTipo = $("#select_tipo").val();

        if(txTipo===""){
            Swal.fire({
                type:  'error',
                title: 'Oops...',
                text:  'Ingrese el nombre del elemento'
            });
        }else{
            Swal.fire({
                title: '¿Seguro de Guardar?',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sip, do it!'
            }).then((result) => {
                if (result.value) {

            }
        });
        }



    });

    function fndelete(ID,Frm) {
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
                        "mIdTipo"      : ID,
                        "slFlag"       : Frm
                    }
                ]
            };
            $.ajax({
                url: "./DescartarTipo",
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
    function inicializarDatatable() {
        $('#tblFuentes,#tblTipos').DataTable({
            "destroy": true,
            "ordering": true,
            "info": false,
            "bPaginate": true,
            "bfilter": false,
            "searching": true,
            "columnDefs": [
                { "visible": false, "targets": 0 }
            ],
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