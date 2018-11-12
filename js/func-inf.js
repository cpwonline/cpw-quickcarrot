$(function(){
alert("ge");

	//Actualización
		//Al hacer click en el menú
			$('#quickCarrot select[name="i_menu"]').change(function(e){
				//Animación
					ob_sF = starFly('Notificación', 'Espere | CPW Online', 2, 5000);//Not. que se quita manualmente con código
				//Recolección de datos
					var i_menu = $('#quickCarrot select[name="i_menu"]').val();
					var tipo = "submenus";
				//Llamada AJAX
					$.post("enlaces/actualizar.php", {i_menu:i_menu, tipo:tipo},function(r){
						$('#quickCarrot select[name="i_sub"]').html(r);
						nuevoMsj_starFly('Listo.', ob_sF);
						borrarElemento_starFly(ob_sF, 0, 'xT');
					});
			});
	//Guardar
		//Información
			//PASO 1
				$('#quickCarrot a#configura_inf').click(function(e){
						e.preventDefault();
					//Animación
						ob_sF = starFly('Notificación', 'Espere | CPW Online', 2, 5000);//Not. que se quita manualmente con código
					//Recolección de datos
						var s_url = $('#quickCarrot select[name="i_sub"]').val();
						var tipo = "carga_sub";
					//Llamada AJAX
						if(s_url == ""){
							nuevoMsj_starFly('No ha elegido un submenú;', ob_sF);
							borrarElemento_starFly(ob_sF, 0, 'xT');
						}else{
							$('#quickCarrot form[name="enviar_inf"]').submit();
								//Plasmado del codigo en el editor
						}
				});
			//Anterior
				$('#quickCarrot a[tag=inf_anterior]').click(function(e){
					e.preventDefault();
					rondaObj(-1);
				});
			//Siguiente
				$('#quickCarrot a[tag=inf_siguiente]').click(function(e){
					e.preventDefault();
					rondaObj(1);
				});
});
function rondaObj(van){
	//Se selecciona el documento
		doc = document.querySelector('#quickCarrot object#ob_inf').contentWindow.document.querySelector('#l17-01');
	//Buscamos todos los movibles
		cant = doc.querySelectorAll(".movible");

	estaba = $('#quickCarrot input[name=inf_cont]').val();
	$('#quickCarrot input[name=inf_cont]').val(estaba*1+van);
	var cont = $('#quickCarrot input[name=inf_cont]').val();
	alert("estaba:"+estaba+" cont:"+cont);

	if(cont >= cant.length){
		$('#quickCarrot input[name=inf_cont]').val("-1");
		rondaObj(1);
	}else if(cont < 0 ){
		$('#quickCarrot input[name=inf_cont]').val(cant.length);
		rondaObj(-1);
	}else{
		var estoy = cant[cont];
		$(estoy).css("border", "1cm solid green");
		$(cant[estaba]).css("border", "none");
	}
}








