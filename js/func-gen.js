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
		$("#quickCarrot img.menu_boton").click(function(e){
			if($("#quickCarrot header.cabecera").css("width") != "0px"){
				$("#quickCarrot header.cabecera").css("width", "0%");
				$("#quickCarrot section.contenedor").css("width", "100%");
			}else{
				$("#quickCarrot section.contenedor").css("width", "75%");
				$("#quickCarrot header.cabecera").css("width", "25%");
			}
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


//Inicio copiado
//Variables generales de StarFly
	//De estilo
		estiloContenedor = "background:hsla(0, 0%, 30%, .9);padding:.2cm;margin-bottom:.1cm;overflow:hidden;text-align:right;border-radius:.1cm;-webkit-border-radius:.1cm;-moz-border-radius:.1cm;-o-border-radius:.1cm;transition:.3s all;-webkit-transition:.3s all;-moz-transition:.3s all;-o-transition:.3s all;";
		estiloIcono = "width:16px;height:16px;display:inline-block;";
		estiloTitulo = "font-size:12pt;color:#CCC;margin-bottom:.1cm;padding:.25cm;";
		estiloMensaje = "font-size:10pt;color:#FFF;";
		estiloBoton = "btn-gen";//Debes elegir una clase de estilo
//De personalización
		textoBotonGen = "Ok";
//Fin variables generales de StarFly
//Fin copiado


