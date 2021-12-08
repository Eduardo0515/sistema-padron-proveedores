$(document).ready(function() {
    getListRequisitos();
});

function getListRequisitos() {
    let $tablaRequisitos = $('#tablaRequisitos');
    $.ajax({
            url: '/admin/list-requisitos',
            type: "GET",
            dateType: 'json',
        })
        .done(function(response) {
            if (response.success == true) {
                $tablaRequisitos.html(response.html);
            }
        }).fail(function(jqXHR, textStatus, error) {
            console.log("Get error: " + error);
        });
}

$('body').on('click', '#editRequisito', function(event) {
    event.preventDefault();
    let id = $(this).data('id');
    let nombre = $(this).data('name');
    let requerido = $(this).data('requerido');
    // Agregar la ruta del formulario al enviar la edición
    $('#form_edit').attr('action', '/admin/requisitos/update/' + id);
    // Mostrar los datos en el formulario
    $('#nombre_edit').val(nombre);
    $('#requerido_edit').prop('checked', requerido);
});

function deleteRequisito(idRequisito) {
    bootbox.confirm({
        message: "¿Deseas eliminar este requisito?",
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
                        url: '/admin/requisitos/delete/' + idRequisito,
                        type: "delete",
                        dateType: 'json',
                        data: { "_token": token, }
                    })
                    .done(function(response) {
                        if (response.success == true) {
                            console.log('success');
                        }
                        bootbox.alert('Requisito eliminado');
                        getListRequisitos()
                    }).fail(function(jqXHR, textStatus, error) {
                        console.log("Post error: " + error);
                    });
            }

        }
    });
}