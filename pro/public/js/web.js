
$(function(){
	$.blockUI.defaults.css = {};
	$('#writer').click(function(){
		$.blockUI({ message: $(".loginform")});
		$('.blockOverlay').attr('title','单击关闭').click($.unblockUI); 	
		$('.close').click($.unblockUI);    
	});

});
