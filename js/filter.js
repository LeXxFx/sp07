$(function() {
	$('.widget-filters input').change(function(){
		$(this).closest('form').submit();
	});
});