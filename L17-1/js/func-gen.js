$(document).ready(function(){
	$("#l17-01 section.cabecera ul.menus li.menus").mouseenter(function(e){
		var nom = $(this).attr("tag");
		$("#l17-01 section.cabecera ul.menus li.menus " + "div.sub[tag='"+nom+"']").css("display", "block");
	});
	$("#l17-01 section.cabecera ul.menus li.menus").mouseleave(function(e){
		var nom = $(this).attr("tag");
		$("#l17-01 section.cabecera ul.menus li.menus " + "div.sub[tag='"+nom+"']").css("display", "none");
	});
});