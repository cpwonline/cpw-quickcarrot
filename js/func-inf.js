$(function(){
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
			//PASO 2
				$('#quickCarrot a#guarda_inf').click(function(e){
					$("#quickCarrot input[name='datos_cont']").val(CKEDITOR.instances.editor.getData());
				});
});









