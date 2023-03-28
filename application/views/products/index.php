<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Listado de productos</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Desafio</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="http://127.0.0.0:8000">Inicio</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="http://127.0.0.0:8000/products">Productos</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProduct">
            Agregar Producto
        </button>

        <!-- Modal para agregar los productos -->
        <div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="addProductLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addProductLabel">Agregar Producto</h5>
                    </div>
                    <div class="modal-body">
                        <form id="addProductForm" method="POST">
                            <div class="form-group">
                                <label for="title">Titulo:</label>
                                <input type="text" class="form-control" name="title_add" id="title_add">
                            </div>
                            <div class="form-group">
                                <label for="price">Precio:</label>
                                <input type="number" class="form-control" name="price_add" id="price_add">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" id="addProductBtn">Agregar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal para editar los productos -->
        <div class="modal fade" id="editProduct" tabindex="-1" role="dialog" aria-labelledby="editProductLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editProductLabel">Editar Producto</h5>
                    </div>
                    <div class="modal-body">
                        <form>
                            <input type="hidden" name="id_edit" id="id_edit">
                            <div class="form-group">
                                <label for="title">Titulo:</label>
                                <input type="text" class="form-control" name="title_edit" id="title_edit">
                            </div>
                            <div class="form-group">
                                <label for="price">Precio:</label>
                                <input type="number" class="form-control" name="price_edit" id="price_edit">
                            </div>
                            <div class="form-group">
                                <label for="created_at">Creado:</label>
                                <input type="text" class="form-control" name="creado_edit" id="creado_edit">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" id="editProductBtn">Editar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal para eliminar un producto -->
        <div class="modal fade" id="deleteProduct" tabindex="-1" role="dialog" aria-labelledby="deleteProductLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteProductLabel">Eliminar Producto</h5>
                    </div>
                    <div class="modal-body">
                        <form id="deleteProduct">
                            <input type="hidden" name="id_delete" id="id_delete">
                            <div class="form-group">
                                <label for="title">Titulo:</label>
                                <input type="text" class="form-control" name="title_delete" id="title_delete" readonly>
                            </div>
                            <div class="form-group">
                                <label for="price">Precio:</label>
                                <input type="number" class="form-control" name="price_delete" id="price_delete" readonly>
                            </div>
                            <div class="form-group">
                                <label for="created_at">Creado:</label>
                                <input type="text" class="form-control" name="creado_delete" id="creado_delete" readonly>
                            </div>
                        </form>
                        ¿Seguro de eliminar el producto?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" id="deleteProductBtn">Eliminar</button>
                    </div>
                </div>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Creado</th>
                    <th scope="col">editar</th>
                    <th scope="col">borrar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product) : ?>
                    <tr>
                        <th scope="row"><?php echo $product->id; ?></th>
                        <td><?php echo $product->title; ?></td>
                        <td><?php echo $product->price; ?></td>
                        <td><?php echo $product->created_at; ?></td>
                        <td>
                            <button type="button" class="btn btn-primary btn_edit" data-product-id="<?php echo $product->id; ?>" data-product-title="<?php echo $product->title; ?>" data-product-price="<?php echo $product->price; ?>" data-product-creado="<?php echo $product->created_at; ?>" data-toggle="modal" data-target="#editProduct">
                                .
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger btn_delete" data-product-id="<?php echo $product->id; ?>" data-product-title="<?php echo $product->title; ?>" data-product-price="<?php echo $product->price; ?>" data-product-creado="<?php echo $product->created_at; ?>" data-toggle="modal" data-target="#deleteProduct">
                                .
                            </button>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#addProductBtn').on('click', function() {
                event.preventDefault();
                var addData = new FormData();
                var title = $("#title_add").val();
                var price = $("#price_add").val();
                addData.append('title', title);
                addData.append('price', price);
                var request = new XMLHttpRequest();
                request.open('POST', 'http://127.0.0.1:8000/products/store');
                request.send(addData);
                window.location.replace('http://127.0.0.1:8000/products');
            });
            $('.btn_edit').on('click', function() {
                var product_id = $(this).data('product-id');
                var product_title = $(this).data('product-title');
                var product_price = $(this).data('product-price');
                var product_created_at = $(this).data('product-creado');
                $("#editProduct input[name='id_edit']").val(product_id);
                $("#editProduct input[name='title_edit']").val(product_title);
                $("#editProduct input[name='price_edit']").val(product_price);
                $("#editProduct input[name='creado_edit']").val(product_created_at);
            });
            $('#editProductBtn').on('click', function() {
                var editData = new FormData();
                var id = $("#id_edit").val();
                var title = $("#title_edit").val();
                var price = $("#price_edit").val();
                var creado = $("#creado_edit").val();
                editData.append('id', id);
                editData.append('title', title);
                editData.append('price', price);
                editData.append('created_at', creado);
                var request = new XMLHttpRequest();
                request.open('POST', 'http://127.0.0.1:8000/products/update');
                request.send(editData);
                window.location.replace('http://127.0.0.1:8000/products');
            });
            $('.btn_delete').on('click', function() {
                var product_id = $(this).data('product-id');
                var product_title = $(this).data('product-title');
                var product_price = $(this).data('product-price');
                var product_created_at = $(this).data('product-creado');
                $("#deleteProduct input[name='id_delete']").val(product_id);
                $("#deleteProduct input[name='title_delete']").val(product_title);
                $("#deleteProduct input[name='price_delete']").val(product_price);
                $("#deleteProduct input[name='creado_delete']").val(product_created_at);
            });
            $('#deleteProductBtn').on('click', function() {
                var deleteData = new FormData();
                var id = $("#id_delete").val();
                deleteData.append('id', id);
                var request = new XMLHttpRequest();
                request.open('POST', 'http://127.0.0.1:8000/products/delete/' + id);
                request.send(deleteData);
                window.location.replace('http://127.0.0.1:8000/products');
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>