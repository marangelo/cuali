<script>
    $(document).ready(function() {
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
                                $("#slCategorias").append('<option value='+item['Id_Categorias'].id+'>'+item['Nombre']+'</option>');
                            });
                            $.each(item['array_Remitidos'], function(i, item) {
                                $("#slRemitidos").append('<option value='+item['Id_Remitidos'].id+'>'+item['Nombre']+'</option>');
                            });
                        });
                    }else if (data.length===0) {
                        alert("Error");
                    }

                }
            });
        });

    });

</script>