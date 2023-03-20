<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="es-AR">
    <head>
        <title>Inicio</title>
        <meta content="width=device-width, initial-scale=1" name="viewport">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

        <!-- Hojas de estilo -->
        <link rel="stylesheet"	href="<?=base_url()?>public/css/style.css">

        <!-- scripts -->
        <script>const base_url = "<?php echo base_url() ?>";</script>
        <script src="<?=base_url()?>public/js/productos.js"></script>
    </head>
    <body>
        <div class="main-container">
            <h1>Listado de productos</h1>
            <button id="btn-nuevo" class="btn-primary" style="width: 200px;">Nuevo producto</button>
            <div id="container"></div>
        </div>
    </body>
</html>