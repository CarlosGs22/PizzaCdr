function restrict(tis) {
    var prev = tis.getAttribute("data-prev");
    prev = (prev != '') ? prev : '';
    if (Math.round(tis.value * 100) / 100 != tis.value)
        tis.value = prev;
    tis.setAttribute("data-prev", tis.value)
}

function isNumeric(str) {
    if (typeof str != "string") return false // we only process strings!  
    return !isNaN(str) && // use type coercion to parse the _entirety_ of the string (`parseFloat` alone does not do this)...
        !isNaN(parseFloat(str)) // ...and ensure strings of whitespace fail
}

var validacionInput = function(form) {
    var res = true;
    $('#' + form + ' input:visible').not(':input[type=file]').each(function() {
        if ($(this).val().trim().length === 0 || $(this).val() === null) {
            Swal.fire({
                icon: 'error',
                title: '',
                text: '' + $(this).attr('class').split(' ').pop() + ' no puede estar vacio',
            });
            res = false;
            return res;
        }
    });
    return res;
};

var validacionTextArea = function(form) {
    var res = true;
    $('#' + form + ' textarea:visible').each(function() {
        if ($(this).val().trim().length === 0 || $(this).val() === null) {
            Swal.fire({
                icon: 'error',
                title: '',
                text: '' + $(this).attr('class').split(' ').pop() + ' no puede estar vacio',
            });
            res = false;
            return res;
        }
    });
    return res;
};




var validacionSelect = function(form) {

    var res = true;

    $('#' + form + ' select:visible').each(function() {

        if ($(this).val() === "0") {

            Swal.fire({

                icon: 'error',

                title: '',

                text: '' + $(this).attr('class').split(' ').pop() + ' no puede estar vacio',

            });

            res = false;

            return res;

        }

    });

    return res;

};


var validacionLenght = function(form) {
    var res = true;
    $('#' + form + ' input:text:visible').each(function() {
        if ($(this).val().trim().length > 254) {
            Swal.fire({
                icon: 'error',
                title: '',
                text: '' + $(this).attr("id") + ' no puede pasar de 255 caracteres',
            });
            res = false;
            return res;
        }
    });
    return res;
};

var validacionCheckbox = function(form) {
    var res = true;
    $('#' + form + ' checkbox:visible').each(function() {
        if ($(this).is(':checked')) {
            Swal.fire({
                icon: 'error',
                title: '',
                text: '' + $(this).attr("id") + ' no puede pasar de 255 caracteres',
            });
            res = false;
            return res;
        }
    });
    return res;
};

$(function() {
    if ($('.tablaDatatable').length > 0) {

        $('.tablaDatatable').dataTable({
            searching: false,
            paging: false,
            info: false,
            "oLanguage": {
                "sEmptyTable": "No hay resultados para mostrar"
            }
        });

    }

});

function validarEmail(email) {
    var res = true;
    var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;

    if (!regex.test(email)) {
        Swal.fire({
            icon: 'error',
            title: '',
            text: 'Debe de ingresar un correo válido',
        });
        res = false;
        return res;
    }

    return res;
}