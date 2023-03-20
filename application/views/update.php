<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="es-AR">
    <head>
        <title>Nuevo producto</title>
        <meta content="width=device-width, initial-scale=1" name="viewport">

        <!-- Hojas de estilo -->
        <link rel="stylesheet"	href="<?=base_url()?>public/css/style.css">
    </head>
    <body>
        <div class="main-container">
            <h1>Editar producto</h1>
            <div class="panel">
                <div class="panel-title">Datos del producto</div>
                <div class="panel-content">
                    <input form="form" type="hidden" value="<?=$producto["id"]?>" name="id">
                    <div class="flex">
                        <label>
                            Nombre del producto
                            <input form="form" required type="text" name="title" placeholder="Nombre" value="<?=$producto["title"]?>">
                        </label>
                        <label>
                            Precio
                            <input form="form" required type="text" name="price" placeholder="Precio" value="<?=$producto["price"]?>">
                        </label>
                    </div>
                    <button form="form" type="submit">Actualizar</button>
                </div>
            </div>
            <form id="form" method="post"></form>
        </div>
    </body>
</html>