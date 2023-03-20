<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="es-AR">
    <head>
        <title>Inicio</title>
        <meta content="width=device-width, initial-scale=1" name="viewport">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

        <!-- Hojas de estilo -->
        <link rel="stylesheet"	href="<?=base_url()?>public/css/style.css">
    </head>
    <body>
        <div class="main-container">
            <h1>Listado de productos</h1>
            <button id="btn-nuevo" class="btn-primary" style="width: 200px;">Nuevo producto</button>
            <div id="container"></div>
        </div>

        <script>
            $(document).ready(function()
            {
                $.ajax({
                url: '<?php echo base_url("producto/listado"); ?>',
                type: 'GET',
                dataType: 'html',
                success: function(data) {
                    $('#container').html(data);
                }
                });
            });

            $(document).ready(function()
            {
                $('#btn-nuevo').click(function(e) {
                    window.location.href = "<?=base_url('producto/create')?>";
                });
            });

            $(document).ready(function()
            {
                $('#container').on('click', '.btn-editar', function(e) {
                    window.location.href = "<?=base_url('producto/update')?>?id=" + $(this).data('id');
                });
            });

            $(document).ready(function()
            {
                $('#container').on('click', '.btn-eliminar', function(e) {
    
                    let respuesta = confirm("Está seguro que desea eliminar el producto?");

                    if(respuesta)
                        window.location.href = "<?=base_url('producto/delete');?>?id=" + $(this).data('id');
                });
            });
        </script>

    </body>
</html>