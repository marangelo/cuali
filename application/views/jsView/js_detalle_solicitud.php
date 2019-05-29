<script>
    $(document).ready(function() {
        inicializaControlFecha();
    });

    function Save() {
        var mID           = $("#nCaso").html();
        var mComentario   = $('#taComentario').val();
        if(mComentario===""){
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
                            "mComentario" : mComentario
                        }
                    ]
                };
                $.ajax({
                    url: "../SaveComentario",
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