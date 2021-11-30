function searchPadron() {
    if (this.validar()) {
        $.ajax({
            url: 'filtrar-padron',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                datos: getData(),
            },
            success: function(data) {
                $('.table-content').html(data)
            },
        });
    }
}

function exportToExcel() {
    if (this.validar()) {
        $.ajax({
            url: 'padron/exportar-excel',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                datos: getData(),
            },
            success: download.bind(true, 'data.xlsx', "xlsx"),
        });
    }
}

function getData() {
    let rfc = $('#rfc').val();
    let dateFrom = $('#dateFrom').val();
    let dateTo = $('#dateTo').val();
    let persona_fisica = $('#persona_fisica').is(":checked");
    let persona_moral = $('#persona_moral').is(":checked");

    return {
        rfc: rfc,
        dateFrom: dateFrom,
        dateTo: dateTo,
        persona_fisica: persona_fisica,
        persona_moral: persona_moral,
    }
}

function validar() {
    let isOkey = true;
    let datos = getData();

    if (datos['dateFrom'] != '' & datos['dateTo'] == '' |
        datos['dateTo'] != '' & datos['dateFrom'] == '') {
        isOkey = false;
        $('#dateMessage').text('Debe seleccionar la fecha de inicio y fin');
    } else if (datos['dateFrom'] > datos['dateTo']) {
        isOkey = false;
        $('#dateMessage').text('La fecha de fin debe ser después o igual al de inicio');
    } else {
        $('#dateMessage').text('');
    }

    if (!datos['persona_fisica'] & !datos['persona_moral']) {
        $('#tipoMessage').text('Seleccione al menos una opción');
        isOkey = false;
    } else {
        $('#tipoMessage').text('');
    }

    return isOkey;
}