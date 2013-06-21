$(document).ready(function() {
    
    $('#cpf').mask('999.999.999-99');
    
    $('#cnpj').mask('999.999.999/9999');
    
    $('#fone').mask('(99)9999-9999');

    $('#moeda').maskMoney();

    $('.date-utils').datepicker({
        format: 'dd-mm-yyyy'
    });
    
    $('.date-utils').mask('99-99-9999');

    $('#auto-complete').typeahead({
            source: "",
    });
    
    $('.btn-danger').click(function(){
       if(confirm("Deseja realmente executar esta operação?")){
           return true;
       }else{
           return false;
       }
    });

});

