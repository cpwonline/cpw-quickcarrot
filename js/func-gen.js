function mov(){
	$('#quickCarrot div.espera').css('right', '-50%');
}
$(document).ready(function(){
	//Pedida de los menus
		lista = new Array(7);
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
				$('#quickCarrot div.espera').css('right', '.5cm');
				$('#quickCarrot div.espera').html('Espere | <span>CPW Online</span>');
			//Recolección de datos
				var tipo = "admin";
			//Llamada AJAX
				$.post("enlaces/cerrar_sesion.php", {tipo:tipo}, function(r){
					$('#quickCarrot div.espera').html(r);
					var retrasar = setTimeout(mov, 3000);
				});
		});
});

function lista_menus(){
	lista = new Array('menus', 'articulos', 'informaciones', 'diagnostico', 'estadisticas', 'ajustes', 'ayuda', 'acercade');
	return lista;
}