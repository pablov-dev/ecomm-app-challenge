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
            <button class="btn-primary" style="width: 200px;" onclick="window.location.href='<?=base_url('producto/create')?>'">Nuevo producto</button>
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
                $('#container').on('click', '.btn-editar', function(e) {
                e.preventDefault();
                
                var data_id = $(this).data('id');
                
                window.location.href = "<?php echo base_url('producto/update'); ?>?id=" + data_id;
                });
            });

            $(document).ready(function()
            {
                $('#container').on('click', '.btn-eliminar', function(e) {
                e.preventDefault();
                
                var data_id = $(this).data('id');
                
                window.location.href = "<?php echo base_url('producto/delete'); ?>?id=" + data_id;
                });
            });
        </script>

    </body>
</html>