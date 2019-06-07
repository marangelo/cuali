<script>
    $(document).ready(function() {
        inicializarDatatable();
        inicializaControlFecha();
        $('.modal').modal();
        $("#Id_Buscar").on('keyup',function(){
            var table = $('#tblCuentas').DataTable();
            table.search(this.value).draw();
        });
    });


    function inicializarDatatable() {
        $('#tblCuentas').DataTable({
            ajax: 'getCuentas',
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

            columns: [
                { "data": "N" },
                { "data": "CUENTA" },
                { "data": "FECHA" },
                { "data": "Acc" }
            ],
            "fnInitComplete": function (dta) {
                $("#tblCuentas_filter").hide();
            }
        });

    }
    function OpenModal(Accion,Id){

        var String = (Accion === "add") ? "Add" : "Edit";
        $('#spnAccion').html('<h4>Nueva Cuenta [ ' + String + ' ]</h4>')
        $('#modal1').modal('open');
        $('#spnID').html(Id);
        $("#txIdNameCuenta").val("");
        $("#txIdComentario").val("");

        if(String==="Edit"){
            $.ajax({
                url: "Info_Cuenta/"+Id ,
                type: 'get',
                async: true,
                success: function(data) {
                    if (data.length!=0) {
                        $.each(JSON.parse(data), function(i, item) {
                            $.each(item['array_Datos'], function(i, item) {
                                $("#txIdNameCuenta").val(item['Nombre']);
                                $("#txIdComentario").val(item['Comentario']);
                            });
                        });

                    }else if (data.length===0) {
                        alert("Error");
                    }

                }
            });
        }





    }
    function Descartar(mID) {
        Swal.fire({
            title: '¿Seguro de descartar la cuenta?' + mID,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sip, do it!'
        }).then((result) => {
            if (result.value) {
            var form_data = {
                data : [
                    {
                        "mIdCuenta"         : mID
                    }
                ]
            };
            $.ajax({
                url: "DescartarCuenta",
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
function Save() {
        var flag = $('#spnAccion').html();
        flag = flag.substr(flag.indexOf("[") + 1 ,6).replace("]","").trim();



    var txIdNameCuenta        = $("#txIdNameCuenta").val();
    var txIdComentario        = $("#txIdComentario").val();
    var IdCuenta              = $("#spnID").html();

    if (txIdNameCuenta===""){
        Swal.fire({
            type: 'error',
            title: 'Oops...',
            text: 'Escriba nombre de la cuenta!'
        });
    }else if(txIdComentario==="") {
        Swal.fire({
            type: 'error',
            title: 'Oops...',
            text: 'Agregue algun comentario!'
        });
    }else{
        Swal.fire({
            title: '¿Seguro que desea Guardar los datos?',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sip, do it!'
        }).then((result) => {
            if (result.value) {
            var form_data = {
                data : [
                    {
                        "mtxIdComentario"         : txIdComentario,
                        "mtxIdNameCuenta"         : txIdNameCuenta,
                        "mIdCuenta"               : IdCuenta,
                        "mflag"                   : flag
                    }
                ]
            };
            $.ajax({
                url: "SaveCuenta",
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

</script>