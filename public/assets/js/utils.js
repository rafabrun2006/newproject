$(document).ready(function() {

    $('#cpf').mask('999.999.999-99');

    $('#cnpj').mask('999.999.999/9999');

    $('#fone').mask('(99)9999-9999');

    $('#moeda').maskMoney({
        symbol: "R$ ", thousands: ".", decimal: ",", showSymbol: true
    });

    $('.date-utils').datepicker({
        format: 'dd-mm-yyyy'
    });

    $('.date-utils').mask('99-99-9999');

    $('.btn-danger').click(function() {
        if (confirm("Deseja realmente executar esta operação?")) {
            return true;
        } else {
            return false;
        }
    });

    $('#auto-complete').typeahead({
        source: function(typeahead, query) {
            return $.get('index.php?url=usuarios/auto-complete-ajax&ajax=1&acao=autoCompleteAjax', 
            {query: query}, function(data) {
                return typeahead.process(data);
            });
        }
    });

//    var call = $.ajax({
//        data: {data: 'data'},
//        url: 'index.php?url=usuarios/auto-complete-ajax&ajax=1&acao=autoCompleteAjax',
//        type: 'post',
//        assync: false,
//        dataType: 'json',
//        success: function(response) {
//            alert(response);
//        }
//    });
});

