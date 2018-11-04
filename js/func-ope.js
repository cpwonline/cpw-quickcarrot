//Guardado de la imagen del artículo
	function iniciar(id1, titulo1, tipo1){
		id = id1;
		titulo = titulo1;
		tipo = tipo1;
		cajadatos=document.querySelector('#quickCarrot div.cam[tag="'+id+'_'+titulo+'_'+tipo+'"]');
		var archivos=document.querySelector('#quickCarrot input[tag="'+id+'_'+titulo+'_'+tipo+'"]');
		archivos.addEventListener('change', subir, false);
	}
	function subir(e){
		var archivos=e.target.files;
		var archivo=archivos[0];
		var datos=new FormData();
		datos.append('archivo',archivo);
		datos.append('id', id);
		datos.append('titulo', titulo);
		datos.append('tipo', tipo);
		var url="enlaces/subir_imagen.php";
		var solicitud=new XMLHttpRequest();
		var xmlupload=solicitud.upload;
		xmlupload.addEventListener('loadstart',comenzar,false);
		xmlupload.addEventListener('progress',estado,false);
		solicitud.addEventListener('load',mostrar,false);
		solicitud.open("POST", url, true);
		solicitud.send(datos);
	}
	function comenzar(){
		cajadatos.innerHTML='<progress class="pro_imagen" value="0" max="100">0%</progress>';
	}
	function estado(e){
		if(e.lengthComputable){
			var por=parseInt(e.loaded/e.total*100);
			var barraprogreso=cajadatos.querySelector("progress.pro_imagen");
			barraprogreso.value=por;
			barraprogreso.innerHTML=por+'%';
		}
	}
	function mostrar(e){
		cajadatos.innerHTML = e.target.responseText;
	}
//fin Guardado de la imagen del pago

//Pedida de las partes-----------------------------------------------------------------------------
	function pedidas(valor, retorno){
		var tipo = "";
		switch(valor){
			case "menus":
				$.post("partes_act/menus.php", {tipo:tipo}, function(r){
					$('#quickCarrot div.tabla_gen.menus').html(r);
						//Borrar
							$("#quickCarrot div.tabla_gen.menus i.borrar_menu").on("click", function(){
								boton_borrar_menu(this);
							});
						//Editar
							$("#quickCarrot div.tabla_gen.menus i.editar_menu").on("click", function(){
								boton_editar_menu(this);
							});
				});
			break;
			case "submenus":
				$.post("partes_act/submenus.php", {tipo:tipo}, function(r){
					$('#quickCarrot div.tabla_gen.submenus').html(r);
						//Borrar
							$("#quickCarrot div.tabla_gen.submenus i.borrar_sub").on("click", function(){
								boton_borrar_sub(this);
							});
						//Editar
							$("#quickCarrot div.tabla_gen.submenus i.editar_sub").on("click", function(){
								boton_editar_sub(this);
							});
				});
			break;
			case "articulos":
				$.post("partes_act/articulos.php", {tipo:tipo}, function(r){
					$('#quickCarrot div.tabla_gen.articulos').html(r);
						//Borrar
							$("#quickCarrot div.tabla_gen.articulos i.borrar_art").on("click", function(){
								boton_borrar_art(this);
							});
						//Subir imagen
							$('#quickCarrot a.subir_imagen').on("click", function(){
								boton_subirImagen_art(this);
							});
				});
			break;
			case "todo":
				$.post("partes_act/menus.php", {tipo:tipo}, function(r){
					$('#quickCarrot div.tabla_gen.menus').html(r);
						//Borrar
							$("#quickCarrot div.tabla_gen.menus i.borrar_menu").on("click", function(){
								boton_borrar_menu(this);
							});
						//Editar
							$("#quickCarrot div.tabla_gen.menus i.editar_menu").on("click", function(){
								boton_editar_menu(this);
							});
				});
				$.post("partes_act/submenus.php", {tipo:tipo}, function(r){
					$('#quickCarrot div.tabla_gen.submenus').html(r);
						//Borrar
							$("#quickCarrot div.tabla_gen.submenus i.borrar_sub").on("click", function(){
								boton_borrar_sub(this);
							});
						//Editar
							$("#quickCarrot div.tabla_gen.submenus i.editar_sub").on("click", function(){
								boton_editar_sub(this);
							});
				});
				$.post("partes_act/articulos.php", {tipo:tipo}, function(r){
					$('#quickCarrot div.tabla_gen.articulos').html(r);
						//Borrar
							$("#quickCarrot div.tabla_gen.articulos i.borrar_art").on("click", function(){
								boton_borrar_art(this);
							});
						//Subir imagen
							$('#quickCarrot a.subir_imagen').on("click", function(){
								boton_subirImagen_art(this);
							});
				});
			break;
		}
		if(retorno == true){
			nuevoMsj_starFly('Listo.', ob_sF);
			borrarElemento_starFly(ob_sF, 0, 'xT');
		}
	}
//Funciones que se Actualizaron (ON)
	//Menus
		//Borrar
			function boton_borrar_menu(objeto){
			//Animación
				ob_sF = starFly('Notificación', 'Espere | CPW Online', 2, 5000);//Not. que se quita manualmente con código
			//Recolección de datos
				var m_m = $(objeto).attr("tag");
				var tipo = "menus";
				var frase = "el men&uacute;?";
				borrar_general(m_m, tipo, frase);
			}
		//Editar
			function boton_editar_menu(objeto){
			//Animación
				ob_sF = starFly('Notificación', 'Espere | CPW Online', 2, 5000);//Not. que se quita manualmente con código
			//Recolección de datos
				var m_m = $(objeto).attr("tag");
				var tipo = "menus";
				var frase = "el men&uacute;?";
				editar_general(m_m, tipo, frase);
			}
	//Submenús
		//Borrar
			function boton_borrar_sub(objeto){
				//Animación
					ob_sF = starFly('Notificación', 'Espere | CPW Online', 2, 5000);//Not. que se quita manualmente con código
				//Recolección de datos
					var m_m = $(objeto).attr("tag");
					var tipo = "submenus";
					var frase = "el submen&uacute;?";
					borrar_general(m_m, tipo, frase);
			}
		//Editar
			function boton_editar_sub(objeto){
				//Animación
					ob_sF = starFly('Notificación', 'Espere | CPW Online', 2, 5000);//Not. que se quita manualmente con código
				//Recolección de datos
					var m_m = $(objeto).attr("tag");
					var tipo = "submenus";
					var frase = "el submen&uacute;?";
					editar_general(m_m, tipo, frase);
			}
	//Artículos
		//Borrar
			function boton_borrar_art(objeto){
				//Animación
					ob_sF = starFly('Notificación', 'Espere | CPW Online', 2, 5000);//Not. que se quita manualmente con código
				//Recolección de datos
					var m_m = $(objeto).attr("tag");
					var tipo = "articulos";
					var frase = "el art&iacute;culo?";
					borrar_general(m_m, tipo, frase);
			}
		//Subir imagen
			function boton_subirImagen_art(objeto){
				var todo = $(objeto).attr('tag'), id1="", titulo1="", tipo1="", cont=0;
				for(var a = 0; a < todo.length; a++){
					if(todo[a]!="_")
						switch(cont){
							case 0: 
								id1 = id1+todo[a];
								break;
							case 1:
								titulo1 = titulo1+todo[a];
								break;
							case 2:
								tipo1 = tipo1+todo[a];
								break;
						}else
							cont++;
				}
				$('#quickCarrot input[tag="'+id1+'_'+titulo1+'_'+tipo1+'"]').click();
				iniciar(id1, titulo1, tipo1);
			}

//Función general para borrar
	function borrar_general(m_m, tipo, frase){
		//Confirmación
			$("#quickCarrot #conf_borrar_gen span[tag='2']").html(frase);
			$("#quickCarrot #conf_borrar_gen").css("display", "block");
			$("#quickCarrot #conf_borrar_gen a[tag='si']").click(function(e){
				$("#quickCarrot #conf_borrar_gen").css("display", "none");
				//Llamada AJAX
					$.post("enlaces/borrar.php", {m_m:m_m, tipo:tipo},function(r){
						nuevoMsj_starFly(r, ob_sF);
						borrarElemento_starFly(ob_sF, 1, 'xT');
					});
			});
			$("#quickCarrot #conf_borrar_gen a[tag='cancelar']").click(function(e){
				borrarElemento_starFly(ob_sF, 1, 'inst');
			});
	}
function calc_posicion(sel, p){
	var mensaje = "";
	for(var h = 1; h < p+1; h++){
		if(sel == h){
			mensaje = mensaje + "<option value='"+h+"' selected>"+h+"</option>";
		}else{
			mensaje = mensaje + "<option value='"+h+"'>"+h+"</option>";
		}
	}
	return mensaje;
}
//Función general para editar
	function editar_general(m_m, tipo, frase){
		//Confirmación
			//Colocamos la frase
				$("#quickCarrot #conf_editar_gen span[tag='2']").html(frase);
			//Mostramos el modal
				$("#quickCarrot #conf_editar_gen").css("display", "block");
			//Desaparecemos todos los bloques
				$("#quickCarrot #conf_editar_gen div[tag='editar_menus']").css('display', 'none');
				$("#quickCarrot #conf_editar_gen div[tag='editar_sub']").css('display', 'none');
				//$("#quickCarrot #conf_editar_gen div[tag='editar_art']").css('display', 'none');
			//Mostramos la edición 
				switch(tipo){
					case 'menus':
						//Mostramos el bloque correspondiente
							$("#quickCarrot #conf_editar_gen div[tag='editar_menus']").css('display', 'block');
						//Mostramos los datos anteriores para editar
							var datos_padre = $($("#quickCarrot i.editar_menu[tag='"+m_m+"']").parent()).parent();
							var a = $(datos_padre).children();
							var b = calc_posicion($($(a).eq(1)).text(), 7);
							$('#quickCarrot input[name="e_m_titulo"]').val($($(a).eq(0)).text());
							$('#quickCarrot select[name="e_m_posicion"]').html(b);
						//Si elije guardar la edición
							$("#quickCarrot #conf_editar_gen a[tag='e_guarda_menu']").click(function(e){
								$("#quickCarrot #conf_editar_gen").css("display", "none");
								//Datos
									var m_titulo = $('#quickCarrot input[name="e_m_titulo"]').val();
									var m_posicion = $('#quickCarrot select[name="e_m_posicion"]').val();
								//Llamada AJAX
									$.post("enlaces/editar.php", {m_m:m_m, tipo:tipo, m_titulo:m_titulo, m_posicion:m_posicion},function(r){
										nuevoMsj_starFly(r, ob_sF);
										borrarElemento_starFly(ob_sF, 1, 'xT');
									});
							});
						break;
					case 'submenus':
						//Mostramos el bloque correspondiente
							$("#quickCarrot #conf_editar_gen div[tag='editar_sub']").css('display', 'block');
						//Mostramos los datos anteriores para editar
							var datos_padre = $($("#quickCarrot i.editar_sub[tag='"+m_m+"']").parent()).parent();
							var a = $(datos_padre).children();
							var b = calc_posicion($($(a).eq(2)).text(), 7);
							$('#quickCarrot input[name="e_s_titulo"]').val($($(a).eq(0)).text());
							$('#quickCarrot select[name="e_s_posicion"]').html(b);
						//Si elije guardar la edición
							$("#quickCarrot #conf_editar_gen a[tag='e_guarda_sub']").click(function(e){
								$("#quickCarrot #conf_editar_gen").css("display", "none");
								//Datos
									var s_titulo = $('#quickCarrot input[name="e_s_titulo"]').val();
									var s_posicion = $('#quickCarrot select[name="e_s_posicion"]').val();
								//Llamada AJAX
									$.post("enlaces/editar.php", {s_m:m_m, tipo:tipo, s_titulo:s_titulo, s_posicion:s_posicion},function(r){
										nuevoMsj_starFly(r, ob_sF);
										borrarElemento_starFly(ob_sF, 1, 'xT');
									});
							});
						break;
				}
			$("#quickCarrot #conf_editar_gen a[tag='cancelar']").click(function(e){
				borrarElemento_starFly(ob_sF, 1, 'inst');
			});
	}

$(function(){
	//Iniciar sesión//
		//General
			$('#quickCarrot button#iniciar_sesion').click(function(e){
				iniciar_sesion();
			});
		//Mediante el teclado
			$('#quickCarrot input[name="u_nombre"]').keydown(function(tecla){
			  	if (tecla.keyCode == 10 || tecla.keyCode == 13) {
					iniciar_sesion();
			  	}
			});
			$('#quickCarrot input[name="u_clave"]').keydown(function(tecla){
			  	if (tecla.keyCode == 10 || tecla.keyCode == 13) {
					iniciar_sesion();
			  	}
			});
			//Función para inciar sesión
				function iniciar_sesion(){
					//Animación				
						ob_sF = starFly('Notificación', 'Espere | CPW Online', 2, 5000);//Not. que se quita manualmente con código
					//Recolección de datos
						var u_nombre = $('#quickCarrot input[name="u_nombre"]').val();
						var u_clave = $('#quickCarrot input[name="u_clave"]').val();
						var contador = $('#quickCarrot input[name="contador"]').val();
						$('#quickCarrot input[name="contador"]').val(contador*1+1);
					//Llamada AJAX
						$.post("enlaces/iniciar_sesion.php", {u_nombre:u_nombre, u_clave:u_clave, contador:contador},function(r){
							if(r === '7correcto'){
								nuevoMsj_starFly('Bienvenido, por favor espere.', ob_sF);
								window.location.reload();
							}else{
								nuevoMsj_starFly(r, ob_sF);
								borrarElemento_starFly(ob_sF, 1, 'xT');
							}
						});
			}
	//Actualizar
		var l = '#quickCarrot i.img_col.actualizar';
		//General
			$(l+':not('+l+'[tag="select_menus_sub"])').click(function(e){
				//Animación
					ob_sF = starFly('Notificación', 'Espere | CPW Online', 2, 5000);//Not. que se quita manualmente con código
				//Recolección de datos
					var tipo = $(this).attr("tag");
				//Llamada AJAX
					pedidas(tipo, true);
			});
		//Select de Menús
			$(l+'[tag="select_menus_sub"]').click(function(e){
				//Animación						
					ob_sF = starFly('Notificación', 'Espere | CPW Online', 2, 5000);//Not. que se quita manualmente con código
				//Recolección de datos
					var tipo = $(this).attr("tag");
				//Llamada AJAX
					$.post("enlaces/actualizar.php", {tipo:tipo},function(r){
						$('#quickCarrot select[name="s_menu"]').html(r);
						nuevoMsj_starFly('Listo.', ob_sF);
						borrarElemento_starFly(ob_sF, 1, 'xT');
					});
			});
	//Guardar------------------------------------------------------------------------------
		//Menus-------------------------------------------------
			$('#quickCarrot #guarda_menu').click(function(e){
				//Animación
					ob_sF = starFly('Notificación', 'Espere | CPW Online', 2, 5000);//Not. que se quita manualmente con código
				//Recolección de datos
					var m_titulo = $('#quickCarrot input[name="m_titulo"]').val();
					var m_posicion = $('#quickCarrot select[name="m_posicion"]').val();
					var tipo = "menus";
				//Llamada AJAX
					$.post("enlaces/guardar.php", {m_titulo:m_titulo, m_posicion:m_posicion, tipo:tipo},function(r){
						nuevoMsj_starFly(r, ob_sF);
						borrarElemento_starFly(ob_sF, 1, 'xT');
					});
			});
		//Submenus--------------------------------------------------
			$('#quickCarrot #guarda_sub').click(function(e){
				//Animación					
					ob_sF = starFly('Notificación', 'Espere | CPW Online', 2, 5000);//Not. que se quita manualmente con código
				//Recolección de datos
					var s_titulo = $('#quickCarrot input[name="s_titulo"]').val();
					var s_posicion = $('#quickCarrot select[name="s_posicion"]').val();
					var s_menu = $('#quickCarrot select[name="s_menu"]').val();
					var tipo = "sub";
				//Llamada AJAX
					$.post("enlaces/guardar.php", {s_titulo:s_titulo, s_posicion:s_posicion, s_menu:s_menu, tipo:tipo},function(r){
						nuevoMsj_starFly(r, ob_sF);
						borrarElemento_starFly(ob_sF, 1, 'xT');
					});
			});
		//Artículos--------------------------------------------------
			$('#quickCarrot #guarda_art').click(function(e){
				//Animación					
					ob_sF = starFly('Notificación', 'Espere | CPW Online', 2, 5000);//Not. que se quita manualmente con código
				//Recolección de datos
					var a_titulo = $('#quickCarrot input[name="a_titulo"]').val();
					var a_des_c = $('#quickCarrot textarea[name="a_des_c"]').val();
					var a_contenido = CKEDITOR.instances.editor.getData();
					var tipo = "articulo";
				//Llamada AJAX
					$.post("enlaces/guardar.php", {a_titulo:a_titulo, a_des_c:a_des_c, a_contenido:a_contenido, tipo:tipo},function(r){
						nuevoMsj_starFly(r, ob_sF);
						borrarElemento_starFly(ob_sF, 1, 'xT');
					});
			});
		//Informaciones--------------------------------------------------
			$('#quickCarrot #guarda_inf').click(function(e){
				//Animación
					ob_sF = starFly('Notificación', 'Espere | CPW Online', 2, 5000);//Not. que se quita manualmente con código
				//Recolección de datos
					var i_menu = $('#quickCarrot select[name="inf_menu"]').val();
					var i_sub = $('#quickCarrot select[name="inf_sub"]').val();
					var i_titulo = $('#quickCarrot input[name="inf_tit"]').val();
					var i_titulo_letra = $('#quickCarrot input[name="inf_tit_letra"]').val();
					var i_contenido = $('#quickCarrot textarea[name="inf_cont"]').val();
					var i_contenido_fondo = $('#quickCarrot input[name="inf_cont_fondo"]').val();
					var i_contenido_borde = $('#quickCarrot input[name="inf_cont_borde"]').val();
					var i_contenido_letra = $('#quickCarrot input[name="inf_cont_letra"]').val();
					var i_posicion = $('#quickCarrot select[name="inf_pos"]').val();
					var i_disegno = $('#quickCarrot select[name="inf_disegno"]').val();
					var tipo = "informacion";
				//Llamada AJAX
					$.post("enlaces/guardar.php", {i_menu:i_menu, i_sub:i_sub, i_titulo:i_titulo, i_titulo_letra:i_titulo_letra, i_contenido:i_contenido, i_contenido_fondo:i_contenido_fondo, i_contenido_borde:i_contenido_borde, i_contenido_letra:i_contenido_letra, i_posicion:i_posicion, i_disegno:i_disegno, tipo:tipo},function(r){
						nuevoMsj_starFly(r, ob_sF);
						borrarElemento_starFly(ob_sF, 1, 'xT');
					});
			});
	//Editar------------------------------------------------------------------------------
		//Artículos--
			//Título--
				$('#quickCarrot #e_guarda_art_titulo').click(function(e){
					//Animación
						ob_sF = starFly('Notificación', 'Espere | CPW Online', 2, 0);//Not. que se quita manualmente con código
					//Recolección de datos
						var e_a_titulo = $('#quickCarrot input[name="e_a_titulo"]').val();
						var e_a_id = $('#quickCarrot input[name="e_a_id"]').val();
						var tipo = "articulos";
						var tipo2 = "titulo";
					//Llamada AJAX
						$.post("../../editar.php", {e_a_id:e_a_id, e_a_titulo:e_a_titulo, tipo:tipo, tipo2:tipo2},function(r){
							nuevoMsj_starFly(r, ob_sF);
							borrarElemento_starFly(ob_sF, 1, 'xT');
						});
				});
			//Descripción corta--
				$('#quickCarrot #e_guarda_art_des_c').click(function(e){
					//Animación
						ob_sF = starFly('Notificación', 'Espere | CPW Online', 2, 0);//Not. que se quita manualmente con código
					//Recolección de datos
						var e_a_des_c = $('#quickCarrot textarea[name="e_a_des_c"]').val();
						var e_a_id = $('#quickCarrot input[name="e_a_id"]').val();
						var tipo = "articulos";
						var tipo2 = "des_c";
					//Llamada AJAX
						$.post("../../editar.php", {e_a_id:e_a_id, e_a_des_c:e_a_des_c, tipo:tipo, tipo2:tipo2},function(r){
							nuevoMsj_starFly(r, ob_sF);
							borrarElemento_starFly(ob_sF, 1, 'xT');
						});
				});
			//Contenido--
				$('#quickCarrot #e_guarda_art_contenido').click(function(e){
					//Animación
						ob_sF = starFly('Notificación', 'Espere | CPW Online', 2, 0);//Not. que se quita manualmente con código
					//Recolección de datos
						var e_a_contenido = CKEDITOR.instances.editor.getData();
						var e_a_id = $('#quickCarrot input[name="e_a_id"]').val();
						var tipo = "articulos";
						var tipo2 = "contenido";
					//Llamada AJAX
						$.post("../../editar.php", {e_a_id:e_a_id, e_a_contenido:e_a_contenido, tipo:tipo, tipo2:tipo2},function(r){
							nuevoMsj_starFly(r, ob_sF);
							borrarElemento_starFly(ob_sF, 1, 'xT');
						});
				});
			//Contenido--
				//Cargar contenido--
					//Hacer clic
						$('#quickCarrot #e_carga_art_imagen').click(function(e){
							var e_a_imagen = document.querySelector('#quickCarrot input[name="e_a_imagen"]');
							$(e_a_imagen).click();
							e_a_imagen.addEventListener("change", previewImage, false);
						});
					//Visualizar la imagen
						function previewImage(e) {
							var reader = new FileReader();
							reader.readAsDataURL(e.target.files[0]);
							reader.onload = function (e2) {
								$("#quickCarrot img[tag=a_imagen_vis]").attr("src", e2.target.result);
							};
						}
				//Guardar contenido
					$('#quickCarrot #e_guarda_art_imagen').click(function(e){
						//$('#quickCarrot input[name="e_a_imagen"]').click(function(es){
							//Animación
								ob_sF = starFly('Notificación', 'Espere | CPW Online', 2, 0);//Not. que se quita manualmente con código
							//Recolección de datos
								var e_a_id = $('#quickCarrot input[name="e_a_id"]').val();
								var e_a_imagen = document.querySelector('#quickCarrot input[name="e_a_imagen"]');
								var e_a_imagen_url = $('#quickCarrot input[name="e_a_imagen_url"]').val();
								var tipo = "articulos";
								var tipo2 = "imagenArt";
							//Llamada AJAX
								if(e_a_imagen.files[0] == null){
									nuevoMsj_starFly("No ha seleccionado archivo alguno", ob_sF);
									borrarElemento_starFly(ob_sF, 1, 'xT');
								}else{
									//Creamos un array con todos lo datos
										var datos = [e_a_id, e_a_imagen_url, tipo, tipo2];
									//Llamada a la subida
										subirArch(e_a_imagen, "../../editar.php", ob_sF.querySelector("p"), "image/png", datos);
										borrarElemento_starFly(ob_sF, 1, 'xT');
								}
					});
	//Pedida de las partes
		pedidas("todo", false);
});