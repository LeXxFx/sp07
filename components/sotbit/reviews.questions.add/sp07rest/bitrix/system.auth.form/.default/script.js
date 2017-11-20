$(document).on('click', '#auth_review .checkbox label', function() {
	$(this).addClass('checked');
	$(this).closest('.checkbox').find('input').attr('checked', '');
	return false;
});
$(document).on('click', '#auth_review .checkbox label.checked', function() {
	$(this).removeClass('checked');
	$(this).closest('.checkbox').find('input').removeAttr('checked', '');
	return false;
});