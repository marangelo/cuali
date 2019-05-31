<script>
    $(document).ready(function() {

        $('#txTelefono').mask("0000-0000", {placeholder: "000-000"});
        $('#txCorreo').mask("A",{
            placeholder: "example@gmail.com",
            translation: {
                "A": { pattern: /[\w@\-.+]/, recursive: true }
            }
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
                            $.each(item['array_Remitidos'], function(i, item) {
                                $("#slRemitidos").append('<option value='+item['Id_Remitidos']+'>'+item['Nombre']+'</option>');
                            });
                        });
                    }else if (data.length===0) {
                        alert("Error");
                    }

                }
            });
        });

    });
    function SaveSolicitud() {

            var mID           = $("#nSolicitud").html();
            var mFecha        = $("#Id_Desde").val();
            var mCuenta       = $("#slCuenta").val();
            var mFuente       = $("#slFuente").val();
            var mTipo         = $("#slTipo").val();
            var mCategoria    = $('#slCategorias').val();
            var mNombre       = $('#txNombres').val();
            var mApellido     = $('#txApellidos').val();
            var mTelefono     = $('#txTelefono').val();
            var mCorreo       = $('#txCorreo').val();
            var mRemitido     = $('#slRemitidos').val();
            var mComentario   = $('#taComentario').val();


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
                            "mID"         : mID,
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
                            "mComentario" : mComentario
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