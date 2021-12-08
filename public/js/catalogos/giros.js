$(document).ready(function() {
    getListGiros();
});

function getListGiros() {
    let $tablaGiros = $('#tablaGiros');
    $.ajax({
            url: '/admin/list-giros',
            type: "GET",
            dateType: 'json',
        })
        .done(function(response) {
            if (response.success == true) {
                $tablaGiros.html(response.html);
            }
        }).fail(function(jqXHR, textStatus, error) {
            console.log("Get error: " + error);
        });
}

$('body').on('click', '#editGiro', function(event) {
    event.preventDefault();
    let id = $(this).data('id');
    let nombre = $(this).data('name');
    let codigo = $(this).data('codigo');
    // Agregar la ruta del formulario al enviar la edición
    $('#form_edit').attr('action', '/admin/giros/update/' + id);
    // Mostrar los datos en el formulario
    $('#nombre_edit').val(nombre);
    $('#codigo_edit').val(codigo);
});

function deleteGiro(idGiro) {
    bootbox.confirm({
        message: "¿Deseas eliminar este giro?",
        buttons: {
            confirm: {
                label: 'Sí',
                className: 'btn-success'
            },
            cancel: {
                label: 'No',
                className: 'btn-danger'
            }
        },
        callback: function(result) {
            if (result == true) {
                let token = $("meta[name='csrf-token']").attr("content");
                $.ajax({
                        url: '/admin/giros/delete/' + idGiro,
                        type: "delete",
                        dateType: 'json',
                        data: { "_token": token, }
                    })
                    .done(function(response) {
                        if (response.success == true) {
                            console.log('success');
                        }
                        bootbox.alert('Giro eliminado');
                        getListGiros()
                    }).fail(function(jqXHR, textStatus, error) {
                        console.log("Post error: " + error);
                    });
            }

        }
    });
}