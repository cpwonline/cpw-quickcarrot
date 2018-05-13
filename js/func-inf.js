$(document).ready(function(){
	//Funciones de Mi Información
		//Actualizar letra
			//Título
				$("#sgac input[name='inf_tit']").change(function(e){
					act_todo();
				});
			//Contenido
				$("#sgac textarea[name='inf_cont']").change(function(e){
					act_todo();
				});
		//Actualizar color
			//Fondo
				$("#sgac input[name='inf_cont_fondo']").change(function(e){
					act_todo();
				});
			//Letra
				//Título
					$("#sgac input[name='inf_tit_letra']").change(function(e){
						act_todo();
					});
				//Contenido
					$("#sgac input[name='inf_cont_letra']").change(function(e){
						act_todo();
					});
			//Borde
					$("#sgac input[name='inf_cont_borde']").change(function(e){
						act_todo();
					});
		//Cambiar diseño
			$("#sgac select[name='inf_disegno']").change(function(e){
				var disegno = $(this).val();
				switch(disegno){
					case "1":
						var dis = "<h3 tag='1'>Contenido centrado</h3>";
						$("#sgac div.tabla_gen div.fil[tag='tit']").css("display", "none");
						$("#sgac div.tabla_gen div.fil[tag='cont']").css("display", "table-row");
						break;
					case "2":
						var dis = "<h2 tag='2'>T&iacute;tulo arriba</h2><h3 tag='2'>Contenido debajo</h3>";
						$("#sgac div.tabla_gen div.fil[tag='tit']").css("display", "table-row");
						$("#sgac div.tabla_gen div.fil[tag='cont']").css("display", "table-row");
						break;
					case "3":
						var dis = "<h3 tag='3'>Contenido izquierda</h3><a tag='3' class='btn-gen'>Contactar</a>";
						$("#sgac div.tabla_gen div.fil[tag='tit']").css("display", "none");
						$("#sgac div.tabla_gen div.fil[tag='cont']").css("display", "table-row");
						break;
					case "4":
						var dis = "<h3 tag='4'>Contenido arriba</h3><a tag='4' class='btn-gen'>Contactar</a>";
						$("#sgac div.tabla_gen div.fil[tag='tit']").css("display", "none");
						$("#sgac div.tabla_gen div.fil[tag='cont']").css("display", "table-row");
						break;
					case "5":
						var dis = "<h2 tag='5'>T&iacute;tulo izquierda</h2><div tag='5' class='line'></div><h3 tag='5'>Contenido derecha</h3>";
						$("#sgac div.tabla_gen div.fil[tag='tit']").css("display", "table-row");
						$("#sgac div.tabla_gen div.fil[tag='cont']").css("display", "table-row");
						break;
					case "6":
						var dis = "<h3 tag='6'>Contenido izquierda</h3><div tag='6' class='line'></div><h2 tag='6'>T&iacute;tulo derecha</h2>";
						$("#sgac div.tabla_gen div.fil[tag='tit']").css("display", "table-row");
						$("#sgac div.tabla_gen div.fil[tag='cont']").css("display", "table-row");
						break;
				}
				$("#sgac section.mi_info div.cent").html(dis)
				act_todo();
			});
});
function act_todo(){
	//Funciones de Mi Información
		//Actualizar letra
			//Título
				var tit = $("#sgac input[name='inf_tit']").val();
				$("#sgac section.mi_info div.cent h2").html(tit);
			//Contenido
				var cont = $("#sgac textarea[name='inf_cont']").val();
				$("#sgac section.mi_info div.cent h3").html(cont);
		//Actualizar color
			//Fondo
				var fondo = $("#sgac input[name='inf_cont_fondo']").val();
				$("#sgac section.mi_info div.cent").css("background", fondo);
			//Letra
				//Título
					var tit = $("#sgac input[name='inf_tit_letra']").val();
					$("#sgac section.mi_info div.cent h2").css("color", tit);
				//Contenido
					var cont = $("#sgac input[name='inf_cont_letra']").val();
					$("#sgac section.mi_info div.cent h3").css("color", cont);
			//Borde
				var borde = $("#sgac input[name='inf_cont_borde']").val();
				$("#sgac section.mi_info div.cent").css("border-top", "1px solid "+borde);
				$("#sgac section.mi_info div.cent").css("border-bottom", "1px solid "+borde);
				$("#sgac section.mi_info div.cent div.line").css("border-right", "1px solid "+borde);
}













