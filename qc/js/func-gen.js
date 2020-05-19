$(function(){
	//Pedida de los menus
		lista = new Array();
		lista = lista_menus();
		//Función click de los menus de la cabecera
			//Función
				$('#quickCarrot .cabecera nav.menu ul.menu_prin li').click(function(e){
					var estoy = $(this).attr("tag");
					for(var a = 0; a < 8; a++){
						if(lista[a] === estoy){
							$('#quickCarrot article[tag="'+lista[a]+'"]').css("display", "block");
							$('#quickCarrot .cabecera nav.menu ul.menu_prin li[tag="'+lista[a]+'"]').css("background", "#f60");
							
						}else{
							$('#quickCarrot article[tag="'+lista[a]+'"]').css("display", "none");
							$('#quickCarrot .cabecera nav.menu ul.menu_prin li[tag="'+lista[a]+'"]').css("background", "#444");
						}
					}
				});
			//Por la URL
			abreMenu(window.location.hash);
				
				
	//Cerrado de la sesión
		$("#quickCarrot a.cerrar_sesion").click(function(e){
			e.preventDefault();
			//Animación
				ob_sF = starFly('Cerrando sesión', 'Espere | CPW Online', 2, 5000, "information");//Not. que se quita manualmente con código
			//Recolección de datos
				var tipo = "admin";
			//Llamada AJAX
				$.post("enlaces/cerrar_sesion.php", {tipo:tipo}, function(r){
					if(r === '7correcto'){
						window.location.reload();
					}else{
						nuevoMsj_starFly(r, ob_sF);
						borrarElemento_starFly(ob_sF, 1, 'xT');
					}
				});
		});
	//Abrimos/Cerramos el menú
		$("#quickCarrot div.menu_boton").click(function(e){
			$("#quickCarrot header.cabecera").css("width", "25%");
			$("#quickCarrot section.contenedor").css("width", "75%");
			$("#quickCarrot div.menu_boton").hide();
			$("#quickCarrot div.menu_boton_x").show();
		});
		$("#quickCarrot div.menu_boton_x").click(function(e){
			$("#quickCarrot header.cabecera").css("width", "0%");
			$("#quickCarrot section.contenedor").css("width", "100%");
			$("#quickCarrot div.menu_boton").show();
			$("#quickCarrot div.menu_boton_x").hide();
		});
});
function lista_menus(){
	lista = new Array(
		'menus', 
		'articulos', 
		'informaciones', 
		'diagnostico', 
		'estadisticas', 
		'ajustes', 
		'ayuda', 
		'acercade'
	);
	return lista;
}
function abreMenu(q){
	//Depuramos la variable
		var res = "", h = false;
		for(var a = 0; a < q.length; a++){
			if(q[a] == "#")
				h = true;
			if((q[a] == "0" || q[a] == "1" || q[a] == "2" || q[a] == "3" || q[a] == "4" || q[a] == "5" || q[a] == "6" || q[a] == "7" || q[a] == "8" || q[a] == "9") && h == true){
				res += q[a];
			}
		}
		res == ""? q = 0 : q = res;
	//Pedida de los menus
		lista = new Array();
		lista = lista_menus();
		if(q > lista.length || q < 0){
			$('#quickCarrot .cabecera nav.menu ul.menu_prin li[tag="' + lista[0] + '"]').click();
		}else{
			$('#quickCarrot .cabecera nav.menu ul.menu_prin li[tag="' + lista[q] + '"]').click();
		}

}