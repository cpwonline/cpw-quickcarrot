$(document).ready(function(){
	//Actualización
		//Al hacer click en el menú
			$('#sgac select[name="i_menu"]').change(function(e){
				//Animación
					$('#sgac div.espera').css('right', '.5cm');
					$('#sgac div.espera').html('Espere | <span>CPW Online</span>');
				//Recolección de datos
					var i_menu = $('#sgac select[name="i_menu"]').val();
					var tipo = "submenus";
				//Llamada AJAX
					$.post("enlaces/actualizar.php", {i_menu:i_menu, tipo:tipo},function(r){
						$('#sgac select[name="i_sub"]').html(r);
						$('#sgac div.espera').html("Listo");
						var retrasar = setTimeout(mov, 3000);
					});
			});
	//Guardar
		//Información
			//PASO 1
				$('#sgac a#configura_inf').click(function(e){
						e.preventDefault();
					//Animación
						$('#sgac div.espera').css('right', '.5cm');
						$('#sgac div.espera').html('Espere | <span>CPW Online</span>');
					//Recolección de datos
						var s_url = $('#sgac select[name="i_sub"]').val();
						var tipo = "carga_sub";
					//Llamada AJAX
						if(s_url == ""){
							$('#sgac div.espera').html("No ha elegido un submen&uacute;");
							var retrasar = setTimeout(mov, 3000);
						}else{
							$('#sgac form[name="enviar_inf"]').submit();
								//Plasmado del codigo en el editor
						}
				});
			//PASO 2
				$('#sgac a#guarda_inf').click(function(e){
					$("#sgac input[name='datos_cont']").val(CKEDITOR.instances.editor.getData());
				});
});









