//efeito fadeOut
$('.flash').click(function(e) {
	e.preventDefault();
	$(this).fadeOut('slow');
	return false;
});

$('.flash-success, .flash-info').animate({opacity: 1.0}, 3000).fadeOut('slow');

//trata da parte do apagar, dá alerta a confirmar
$('form[data-confirm]').submit(function() {
	var $tr = $(this).parent().parent();
	$tr.addClass('delete_entry');
    if(!confirm($(this).attr('data-confirm'))) {
    	$tr.removeClass('delete_entry');
        return false;
    }
});

$('.select').select2({
	placeholder: 'Selecione uma opção',
	allowClear:true
});