$(document).ready(function () {
    $.ajax({
        url: base_url + "producto/listado",
        type: 'GET',
        dataType: 'html',
        success: function (data) {
            $('#container').html(data);
        }
    });
});

$(document).ready(function () {
    $('#btn-nuevo').click(function (e) {
        window.location.href = base_url + "producto/create";
    });
});

$(document).ready(function () {
    $('#container').on('click', '.btn-editar', function (e) {
        window.location.href = base_url + "producto/update?id=" + $(this).data('id');
    });
});

$(document).ready(function () {
    $('#container').on('click', '.btn-eliminar', function (e) {

        let respuesta = confirm("Está seguro que desea eliminar el producto?");

        if (respuesta)
            window.location.href = base_url + "producto/delete?id=" + $(this).data('id');
    });
});