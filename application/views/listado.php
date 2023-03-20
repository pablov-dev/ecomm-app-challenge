<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Creación</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($productos as $producto) { ?>
            <tr>
                <td class="text-center"><?=$producto["id"]?></td>
                <td><?=$producto["title"]?></td>
                <td class="currency"><?=_money($producto["price"])?></td>
                <td class="date"><?=_datetime($producto["created_at"])?></td>
                <td class="text-center">
                    <div class="flex">
                        <button class="btn-secondary btn-editar" data-id="<?=$producto["id"]?>">Editar</button>
                        <button class="btn-danger btn-eliminar"  data-id="<?=$producto["id"]?>">Borrar</button>
                    </div>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>