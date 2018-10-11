$(function(){
	//Pedida de los menus
		lista = new Array();
		lista = lista_menus();
		//Función click de los menus de la cabecera
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
			$('#quickCarrot .cabecera nav.menu ul.menu_prin li[tag="menus"]').click();
	//Cerrado de la sesión
		$("#quickCarrot a.cerrar_sesion").click(function(e){
			e.preventDefault();
			//Animación
				ob_sF = starFly('Cerrando sesión', 'Espere | CPW Online', 2, 5000);//Not. que se quita manualmente con código
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