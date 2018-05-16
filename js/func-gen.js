function mov(){
	$('#sgac div.espera').css('right', '-50%');
}
$(document).ready(function(){
	//Pedida de los menus
		lista = new Array(7);
		lista = lista_menus();
		//Función click de los menus de la cabecera
			$('#sgac .cabecera nav.menu ul.menu_prin li').click(function(e){
				var estoy = $(this).attr("tag");
				for(var a = 0; a < 8; a++){
					if(lista[a] === estoy){
						$('#sgac article[tag="'+lista[a]+'"]').css("display", "block");
						$('#sgac .cabecera nav.menu ul.menu_prin li[tag="'+lista[a]+'"]').css("background", "#f60");
						
					}else{
						$('#sgac article[tag="'+lista[a]+'"]').css("display", "none");
						$('#sgac .cabecera nav.menu ul.menu_prin li[tag="'+lista[a]+'"]').css("background", "#444");
					}
				}
			});
			$('#sgac .cabecera nav.menu ul.menu_prin li[tag="menus"]').click();
	//Cerrado de la sesión
		$("#sgac a.cerrar_sesion").click(function(e){
			e.preventDefault();
			//Animación
				$('#sgac div.espera').css('right', '.5cm');
				$('#sgac div.espera').html('Espere | <span>CPW Online</span>');
			//Recolección de datos
				var tipo = "admin";
			//Llamada AJAX
				$.post("enlaces/cerrar_sesion.php", {tipo:tipo}, function(r){
					$('#sgac div.espera').html(r);
					var retrasar = setTimeout(mov, 3000);
				});
		});
});

function lista_menus(){
	lista = new Array('menus', 'articulos', 'informaciones', 'diagnostico', 'estadisticas', 'ajustes', 'ayuda', 'acercade');
	return lista;
}