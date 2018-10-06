$(function(){
	//Actualización
		//Al hacer click en el menú
			$('#quickCarrot select[name="i_menu"]').change(function(e){
				//Animación
					$('#quickCarrot div.espera').css('right', '.5cm');
					$('#quickCarrot div.espera').html('Espere | <span>CPW Online</span>');
				//Recolección de datos
					var i_menu = $('#quickCarrot select[name="i_menu"]').val();
					var tipo = "submenus";
				//Llamada AJAX
					$.post("enlaces/actualizar.php", {i_menu:i_menu, tipo:tipo},function(r){
						$('#quickCarrot select[name="i_sub"]').html(r);
						$('#quickCarrot div.espera').html("Listo");
						var retrasar = setTimeout(mov, 3000);
					});
			});
	//Guardar
		//Información
			//PASO 1
				$('#quickCarrot a#configura_inf').click(function(e){
						e.preventDefault();
					//Animación
						$('#quickCarrot div.espera').css('right', '.5cm');
						$('#quickCarrot div.espera').html('Espere | <span>CPW Online</span>');
					//Recolección de datos
						var s_url = $('#quickCarrot select[name="i_sub"]').val();
						var tipo = "carga_sub";
					//Llamada AJAX
						if(s_url == ""){
							$('#quickCarrot div.espera').html("No ha elegido un submen&uacute;");
							var retrasar = setTimeout(mov, 3000);
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









