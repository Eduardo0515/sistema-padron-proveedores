// Mostrar los comentarios en el modal
function showComentarios(solicitud_id) {
    let token = $("meta[name='csrf-token']").attr("content");
    $.ajax({
        url: '/admin/comentarios',
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        data: {
            "_token": token,
            solicitud_id: solicitud_id
        },
        success: function(data) {
            $('.comentarios-body').html(data)
        },
    });
}

$('#mensaje-rechazar').css("display", "none");
// Mostrar advertencia sobre el tipo de rechazo
$("#radio-observacion").change(function() {
    $('#mensaje-rechazar').css("display", "none");
});
$("#radio-definitivo").change(function() {
    $('#mensaje-rechazar').css("display", "block");
});