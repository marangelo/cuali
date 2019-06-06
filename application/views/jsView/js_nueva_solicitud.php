<script>
    $(document).ready(function() {
        $('.modal').modal();
        $('#txTelefono').mask("00000000", {placeholder: "Telefono"});

        $('#txMonto').mask('000000000', {reverse: true});

        $('#txCorreo').mask("A",{
            placeholder: "example@gmail.com",
            translation: {
                "A": { pattern: /[\w@\-.+]/, recursive: true }
            }
        });

        $( "#IdOpenModal" ).click(function() {
            $('#mdlRemitidos').modal('open');
        });

        inicializaControlFecha();



        $('#slCuenta').on('change', function() {

            $('#slCategorias').find('option').not(':first').remove();
            $('#slRemitidos').find('option').not(':first').remove();

            var IdCuenta = $('#slCuenta').val();
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

                            var   tbody = '<thead>' +
                                '<tr>' +
                                    '<th></th>' +
                                    '<th>Nº</th>' +
                                    '<th>Nombre</th>' +
                                    '<th>Email</th>' +
                                    '<th>Cargo</th>' +
                                '</tr>' +
                                '</thead>';
                            $.each(item['array_Remitidos'], function(i, item) {
                                tbody += '<tr>' +
                                    '<td></td>'+
                                    '<td>' + item['Id_Remitidos'] + '</td>' +
                                    '<td>' +item['Nombre'] + '</td>' +
                                    '<td>' +item['Email'] +'</td>' +
                                    '<td>' +item['Cargo'] +'</td>';

                            });
                            $( "#mdlTabla" ).html(($('<table id="tblRemitente" class="display" cellspacing="0" width="100%">' +tbody + ' </table>')));
                            $('#tblRemitente').DataTable( {
                                columnDefs: [
                                    { "visible": false, "targets": 1 },
                                    {
                                    orderable: false,
                                    className: 'select-checkbox',
                                    targets:   0
                                } ],
                                select: {
                                    style: 'single'
                                },
                                order: [[ 1, 'asc' ]]
                            } );

                        });
                        $("#tblRemitente_info,#tblRemitente_paginate,#tblRemitente_filter").hide();
                    }else if (data.length===0) {
                        alert("Error");
                    }

                }
            });

        });
        $('#bt_asignarCaso').click(function() {
            var table = $('#tblRemitente').DataTable();
            var data = table.rows( { selected: true } ).data();
            if(data.length > 0){
                $("#txRemitidos").val(data[0][2]);
                $("#lblIDRemitido").html(data[0][1]);
            }else{
                Swal.fire({
                    type: 'error',
                    title: 'Seleccione Algun dato...'
                });
            }

        });
    });


    function SaveSolicitud() {

            var mFecha        = $("#Id_Desde").val();
            var mCuenta       = $("#slCuenta").val();
            var mFuente       = $("#slFuente").val();
            var mTipo         = $("#slTipo").val();
            var mCategoria    = $('#slCategorias').val();
            var mNombre       = $('#txNombres').val();
            var mApellido     = $('#txApellidos').val();
            var mTelefono     = $('#txTelefono').val();
            var mCorreo       = $('#txCorreo').val();
            var mRemitido     = $('#lblIDRemitido').html();
            var mComentario   = $('#taComentario').val();
            var mCiudad       = $('#slCiudades').val();
            var mMonto        = $('#txMonto').val();


        if (mCuenta===null) {
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: 'Seleccione Cuenta!'
            });
        } else if (mFuente===null) {
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: 'Seleccione fuente'
            });
        } else if (mTipo===null) {
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: 'Seleccione Tipo'
            });
        }else if (mCategoria===null) {
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: 'Seleccione Categoria'
            });
        }else if (mNombre==="") {
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: 'Ingrese los nombres'
            });
        }else if (mApellido==="") {
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: 'Ingrese los apellidos'
            });
        }else if (mTelefono==="") {
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: 'Ingrese el telefono'
            });
        }else if (mCorreo==="") {
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: 'Ingrese el correo'
            });
        }else if (mRemitido===null) {
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: 'Seleccione al remitido'
            });
        }else if (mComentario==="") {
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: 'Ingrese algun comentario'
            });
        }else if (mCiudad===null) {
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: 'Seleccione la ciudad'
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
                var form_data = {
                    data : [
                        {
                            "mFecha"      : mFecha,
                            "mCuenta"     : mCuenta,
                            "mFuente"     : mFuente,
                            "mTipo"       : mTipo,
                            "mCategoria"  : mCategoria,
                            "mNombre"     : mNombre,
                            "mApellido"   : mApellido,
                            "mTelefono"   : mTelefono,
                            "mCorreo"     : mCorreo,
                            "mRemitido"   : mRemitido,
                            "mComentario" : mComentario,
                            "mCiudad"     : mCiudad,
                            "mMonto"      : mMonto
                        }
                    ]
                };
                $.ajax({
                    url: "SaveSolicitud",
                    type: 'post',
                    async: true,
                    data: form_data,
                    success: function(data) {
                        if (data==true) {
                            swal(
                                'Guardado con éxito',
                                'Se aplicaron los cambios',
                                'success'
                            );
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
