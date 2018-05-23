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
							$.post("enlaces/actualizar.php", {s_url:s_url, tipo:tipo},function(r){
								$('#sgac div.cam[tag="object_inf"]').html(r);
								$('#sgac div.espera').html("Listo");
								var retrasar = setTimeout(mov, 3000);
								//Se visualiza el siguiente paso
									$("#sgac article.bloque[tag='rep_inf_1']").css("display", "block");
							});
						}
				});
			//PASO 2
				$('#sgac a[tag="busca_pos"]').click(function(e){
					//Animación
						$('#sgac div.espera').css('right', '.5cm');
						$('#sgac div.espera').html('Espere | <span>CPW Online</span>');
					//Se selecciona el documento
						doc = document.querySelector('#sgac object[tag="t"]').contentWindow.document.querySelector('#l17-01');
					//Buscamos todos los movibles
						cant = doc.querySelectorAll(".movible");
					//Se asignan las posiciones
						var num = "";
						for(var a=1; a<=cant.length;a++){
							num = num+'<option value="'+a+'">'+a+'</option>';
						}
					//Se visualiza el siguiente paso
						if($("#sgac select[name='i_disegno']").val() == ""){
							$('#sgac div.espera').html("No ha elegido un dise&ntilde;o");
							var retrasar = setTimeout(mov, 3000);
						}else{
							$("#sgac select[name='i_posicion']").html(num);
							$("#sgac article.bloque[tag='rep_inf_2']").css("display", "block");
							//Mostramos y quitamos elementos de la inf. según el diseño
								/******************************************************************/
								$("#sgac input[name='i_titulo']").css("display", "none");
								$("#sgac textarea[name='i_contenido']").css("display", "none");
								$("#sgac input[name='i_colorFondo']").css("display", "none");
								$("#sgac input[name='i_colorLetra']").css("display", "none");
								$("#sgac input[name='i_url']").css("display", "none");
								$("#sgac input[name='i_texto_url']").css("display", "none");
								/********************************************************************/
								switch($("#sgac select[name='i_disegno']").val()){
									case "1":
										$("#sgac textarea[name='i_contenido']").css("display", "block");
										$("#sgac input[name='i_colorFondo']").css("display", "inline-block");
										$("#sgac input[name='i_colorLetra']").css("display", "inline-block");
										break;
									case "2":
										$("#sgac textarea[name='i_contenido']").css("display", "block");
										$("#sgac input[name='i_colorFondo']").css("display", "inline-block");
										$("#sgac input[name='i_colorLetra']").css("display", "inline-block");
										$("#sgac input[name='i_url']").css("display", "inline-block");
										$("#sgac input[name='i_texto_url']").css("display", "inline-block");
										break;
								}
							//Animación final
								$('#sgac div.espera').html("Listo, elija la posici&oacute;n");
								var retrasar = setTimeout(mov, 3000);
						}
				});
			//PASO 3
				$('#sgac a[tag="agrega_inf"]').click(function(e){
					//Animación
						$('#sgac div.espera').css('right', '.5cm');
						$('#sgac div.espera').html('Espere | <span>CPW Online</span>');
					//Recolectamos datos de diseño y estructura
						var i_disegno = $("#sgac select[name='i_disegno']").val();
						var i_posicion = $("#sgac select[name='i_posicion']").val() - 1;
						var i_titulo = $("#sgac input[name='i_titulo']").val();
						var i_contenido = $("#sgac textarea[name='i_contenido']").val();
						var i_colorFondo = $("#sgac input[name='i_colorFondo']").val();
						var i_colorLetra = $("#sgac input[name='i_colorLetra']").val();
						var i_url = $("#sgac input[name='i_url']").val();
						var i_texto_url = $("#sgac input[name='i_texto_url']").val();
					//Creamos la información
						var primero = document.createElement('article');
						primero.setAttribute("class", "movible");
						//Creamos el elemento y su contenido
							switch(i_disegno){
								case "1":
									//Estructura
										//Creamos texto
											var contenido = document.createTextNode(i_contenido);
										//Asignamos texto
											primero.appendChild(contenido);
									//Diseño
										var disegno = "background:" + i_colorFondo + ";color:" + i_colorLetra + ";padding:1.4cm;text-align:center;display:block;";
										primero.setAttribute("style", disegno);
									break;
								case "2":
									//Estructura
										//Creamos texto
											var d_parrafo = document.createTextNode(i_contenido);
											var d_boton = document.createTextNode(i_texto_url);
										//Creamos elementos internos
											var parrafo = document.createElement('p');
											var boton = document.createElement('a');
											primero.appendChild(parrafo);
											primero.appendChild(boton);
										//Asignamos texto
											parrafo.appendChild(d_parrafo);
											boton.appendChild(d_boton);
									//Diseño
										var disegno = "background:" + i_colorFondo + ";color:" + i_colorLetra + ";padding:1.4cm;text-align:center;display:block;overflow:hidden;";
										primero.setAttribute("style", disegno);
										parrafo.setAttribute("style", "display:inline-block;margin-right:.2cm;width:50%;float:none;");
										boton.setAttribute("href", i_url);
										boton.setAttribute("class", "btn-gen btn-1 btn-1c");
									break;
							}
					if(i_contenido == ""){
						$('#sgac div.espera').html("El contenido no debe de estar vac&iacute;o");
						var retrasar = setTimeout(mov, 3000);
					}else{
						//Agregamos la información
							doc.insertBefore(primero, cant[i_posicion]);
						alert("un p");
						//Notificación final
							$('#sgac div.espera').html("Listo");
							var retrasar = setTimeout(mov, 3000);
					}
				});
			//PASO 4
});









