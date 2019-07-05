$('.set_hover_info').hover(function() {	
	var selector = $(this).attr('data-dir');
	//console.log('Has pasado por encima' + selector);
	$('.slimScrollDiv').css('position', 'initial');
	$('#'+selector).show();
}, function() {
	var selector = $(this).attr('data-dir');
	//console.log('Has salido de encima' + selector);
	$('#'+selector).hide();
	$('.slimScrollDiv').css('position', 'relative');
});


//var fecha = new date


//$("#pulsate1").pulsate({color:"#ff0000"});
$("#pulsate2").pulsate({color:"#ff0000"});