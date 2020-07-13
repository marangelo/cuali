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


        $("#SearchAsignados").on('keyup',function(){
            var table = $('#tblRemitente').DataTable();
            table.search(this.value).draw();
        });
        inicializaControlFecha();






        $('#slCuenta').on('change', function() {

            $('#slCategorias').find('option').not(':first').remove();
            $('#slRemitidos').find('option').not(':first').remove();

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

                            var t = $('#tblRemitente').DataTable( {
                                columnDefs: [
                                    { "visible": false, "targets": 0},
                                     ],
                                order: [[ 1, 'asc' ]]
                            } );

                            $.each(item['array_Remitidos'], function(i, item) {
                                t.row.add( [
                                    item['Id_Remitidos'],
                                    item['Nombre'],
                                    item['Email'],
                                    item['Cargo']
                                ] ).draw( false );

                            });
                            $('#tblRemitente tbody').on( 'click', 'tr', function () {
                                $(this).toggleClass('selected_asign');
                            } );

                        });
                        $("#tblRemitente_info,#tblRemitente_filter").hide();
                    }else if (data.length===0) {
                        alert("Error");
                    }

                }
            });

        });
        $('#bt_asignarCaso').click(function() {
            var table   = $('#tblRemitente').DataTable();
            var Ids     = "";
            var email   = "";
            var data = table.rows( '.selected_asign' ).data();
            if(data.length > 0){

                table
                    .rows( '.selected_asign' )
                    .data()
                    .each( function ( value, index ) {
                        console.log(value);
                        Ids += value[0] + ",";
                        //Ids += value[1];
                        email += value[1];

                    } );

                $("#lblIDRemitido").html(Ids)
                if(data.length >= 2){
                    $("#txRemitidos").val("Multiples remitidos.");
                }else{
                    $("#txRemitidos").val(email);
                }


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
                title: '¿Seguro de Enviar?',
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
