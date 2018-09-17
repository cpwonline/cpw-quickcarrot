function mov(){
	$('#sgac div.espera').css('right', '-50%');
}

/*Guardado de la imagen del artículo*/
	function iniciar(id1, titulo1, tipo1){
		id = id1;
		titulo = titulo1;
		tipo = tipo1;
		cajadatos=document.querySelector('#sgac div.cam[tag="'+id+'_'+titulo+'_'+tipo+'"]');
		var archivos=document.querySelector('#sgac input[tag="'+id+'_'+titulo+'_'+tipo+'"]');
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
		xmlupload.addEventListener('load',mostrar,false);
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
		cajadatos.innerHTML='Imagen guardada';
	}
/*fin Guardado de la imagen del pago*/

//Pedida de las partes-----------------------------------------------------------------------------
	function pedidas(valor, retorno){
		var tipo = "";
		switch(valor){
			case "menus":
				$.post("partes_act/menus.php", {tipo:tipo}, function(r){
					$('#sgac div.tabla_gen.menus').html(r);
						//Borrar
							$("#sgac div.tabla_gen.menus i.borrar_menu").on("click", function(){
								boton_borrar_menu(this);
							});
						//Editar
							$("#sgac div.tabla_gen.menus i.editar_menu").on("click", function(){
								boton_editar_menu(this);
							});
				});
			break;
			case "submenus":
				$.post("partes_act/submenus.php", {tipo:tipo}, function(r){
					$('#sgac div.tabla_gen.submenus').html(r);
						//Borrar
							$("#sgac div.tabla_gen.submenus i.borrar_sub").on("click", function(){
								boton_borrar_sub(this);
							});
						//Editar
							$("#sgac div.tabla_gen.submenus i.editar_sub").on("click", function(){
								boton_editar_sub(this);
							});
				});
			break;
			case "articulos":
				$.post("partes_act/articulos.php", {tipo:tipo}, function(r){
					$('#sgac div.tabla_gen.articulos').html(r);
						//Borrar
							$("#sgac div.tabla_gen.articulos i.borrar_art").on("click", function(){
								boton_borrar_art(this);
							});
						//Subir imagen
							$('#sgac a.subir_imagen').on("click", function(){
								boton_subirImagen_art(this);
							});
				});
			break;
			case "todo":
				$.post("partes_act/menus.php", {tipo:tipo}, function(r){
					$('#sgac div.tabla_gen.menus').html(r);
						//Borrar
							$("#sgac div.tabla_gen.menus i.borrar_menu").on("click", function(){
								boton_borrar_menu(this);
							});
						//Editar
							$("#sgac div.tabla_gen.menus i.editar_menu").on("click", function(){
								boton_editar_menu(this);
							});
				});
				$.post("partes_act/submenus.php", {tipo:tipo}, function(r){
					$('#sgac div.tabla_gen.submenus').html(r);
						//Borrar
							$("#sgac div.tabla_gen.submenus i.borrar_sub").on("click", function(){
								boton_borrar_sub(this);
							});
						//Editar
							$("#sgac div.tabla_gen.submenus i.editar_sub").on("click", function(){
								boton_editar_sub(this);
							});
				});
				$.post("partes_act/articulos.php", {tipo:tipo}, function(r){
					$('#sgac div.tabla_gen.articulos').html(r);
						//Borrar
							$("#sgac div.tabla_gen.articulos i.borrar_art").on("click", function(){
								boton_borrar_art(this);
							});
						//Subir imagen
							$('#sgac a.subir_imagen').on("click", function(){
								boton_subirImagen_art(this);
							});
				});
			break;
		}
		if(retorno == true){$('#sgac div.espera').html('Listo.');}
	}
//Funciones que se Actualizaron (ON)
	//Menus
		//Borrar
			function boton_borrar_menu(objeto){
			//Animación
					$('#sgac div.espera').css('right', '.5cm');
					$('#sgac div.espera').html('Espere | <span>CPW Online</span>');
				//Recolección de datos
					var m_m = $(objeto).attr("tag");
					var tipo = "menus";
					var frase = "el men&uacute;?";
					borrar_general(m_m, tipo, frase);
			}
		//Editar
			function boton_editar_menu(objeto){
			//Animación
					$('#sgac div.espera').css('right', '.5cm');
					$('#sgac div.espera').html('Espere | <span>CPW Online</span>');
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
					$('#sgac div.espera').css('right', '.5cm');
					$('#sgac div.espera').html('Espere | <span>CPW Online</span>');
				//Recolección de datos
					var m_m = $(objeto).attr("tag");
					var tipo = "submenus";
					var frase = "el submen&uacute;?";
					borrar_general(m_m, tipo, frase);
			}
		//Editar
			function boton_editar_sub(objeto){
				//Animación
					$('#sgac div.espera').css('right', '.5cm');
					$('#sgac div.espera').html('Espere | <span>CPW Online</span>');
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
					$('#sgac div.espera').css('right', '.5cm');
					$('#sgac div.espera').html('Espere | <span>CPW Online</span>');
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
				$('#sgac input[tag="'+id1+'_'+titulo1+'_'+tipo1+'"]').click();
				iniciar(id1, titulo1, tipo1);
			}

//Función general para borrar
	function borrar_general(m_m, tipo, frase){
		//Confirmación
			$("#sgac #conf_borrar_gen span[tag='2']").html(frase);
			$("#sgac #conf_borrar_gen").css("display", "block");
			$("#sgac #conf_borrar_gen a[tag='si']").click(function(e){
				$("#sgac #conf_borrar_gen").css("display", "none");
				//Llamada AJAX
					$.post("enlaces/borrar.php", {m_m:m_m, tipo:tipo},function(r){
						$('#sgac div.espera').html(r);
						var retrasar = setTimeout(mov, 3000);
					});
			});
			$("#sgac #conf_borrar_gen a[tag='cancelar']").click(function(e){
				var retrasar = setTimeout(mov, 100);
			});
	}

//Función general para editar
	function editar_general(m_m, tipo, frase){
		//Confirmación
			//Colocamos la frase
				$("#sgac #conf_editar_gen span[tag='2']").html(frase);
			//Mostramos el modal
				$("#sgac #conf_editar_gen").css("display", "block");
			//Desaparecemos todos los bloques
				$("#sgac #conf_editar_gen div[tag='editar_menus']").css('display', 'none');
				$("#sgac #conf_editar_gen div[tag='editar_sub']").css('display', 'none');
				//$("#sgac #conf_editar_gen div[tag='editar_art']").css('display', 'none');
			//Mostramos la edición 
				switch(tipo){
					case 'menus':
						//Mostramos el bloque correspondiente
							$("#sgac #conf_editar_gen div[tag='editar_menus']").css('display', 'block');
						//Si elije guardar la edición
							$("#sgac #conf_editar_gen a[tag='e_guarda_menu']").click(function(e){
								$("#sgac #conf_editar_gen").css("display", "none");
								//Datos
									var m_titulo = $('#sgac input[name="e_m_titulo"]').val();
									var m_posicion = $('#sgac select[name="e_m_posicion"]').val();
								//Llamada AJAX
									$.post("enlaces/editar.php", {m_m:m_m, tipo:tipo, m_titulo:m_titulo, m_posicion:m_posicion},function(r){
										$('#sgac div.espera').html(r);
										var retrasar = setTimeout(mov, 3000);
									});
							});
						break;
					case 'submenus':
						//Mostramos el bloque correspondiente
							$("#sgac #conf_editar_gen div[tag='editar_sub']").css('display', 'block');
						//Si elije guardar la edición
							$("#sgac #conf_editar_gen a[tag='e_guarda_sub']").click(function(e){
								$("#sgac #conf_editar_gen").css("display", "none");
								//Datos
									var s_titulo = $('#sgac input[name="e_s_titulo"]').val();
									var s_posicion = $('#sgac select[name="e_s_posicion"]').val();
								//Llamada AJAX
									$.post("enlaces/editar.php", {s_m:m_m, tipo:tipo, s_titulo:s_titulo, s_posicion:s_posicion},function(r){
										$('#sgac div.espera').html(r);
										var retrasar = setTimeout(mov, 3000);
									});
							});
						break;
				}
			$("#sgac #conf_editar_gen a[tag='cancelar']").click(function(e){
				var retrasar = setTimeout(mov, 100);
			});
	}


$(document).ready(function(){
	$('#sgac div.espera').css('right', '.5cm');
	$('#sgac div.espera').html("Preferiblemente, visualice estas secci&oacute;n desde un PC de escritorio.");
	var retrasar = setTimeout(mov, 3000);

	//Iniciar sesión//
		//General
			$('#sgac button#iniciar_sesion').click(function(e){
				iniciar_sesion();
			});
		//Mediante el teclado
			$('#sgac input[name="u_nombre"]').keydown(function(tecla){
			  	if (tecla.keyCode == 10 || tecla.keyCode == 13) { 
					iniciar_sesion();
			  	}
			});﻿
			$('#sgac input[name="u_clave"]').keydown(function(tecla){
			  	if (tecla.keyCode == 10 || tecla.keyCode == 13) {
					iniciar_sesion();
			  	}
			});﻿
			//Función para inciar sesión
				function iniciar_sesion(){
					//Animación
						$('#sgac div.espera').css('right', '.5cm');
						$('#sgac div.espera').html('Espere | <span>CPW Online</span>');
					//Recolección de datos
						var u_nombre = $('#sgac input[name="u_nombre"]').val();
						var u_clave = $('#sgac input[name="u_clave"]').val();
						var contador = $('#sgac input[name="contador"]').val();
						$('#sgac input[name="contador"]').val(contador*1+1);
					//Llamada AJAX
						$.post("enlaces/iniciar_sesion.php", {u_nombre:u_nombre, u_clave:u_clave, contador:contador},function(r){
							$('#sgac div.espera').html(r);
							var retrasar = setTimeout(mov, 3000);
						});
			}
	//Actualizar
		//General
			$('#sgac i.img_col.actualizar').click(function(e){
				//Animación
					$('#sgac div.espera').css('right', '.5cm');
					$('#sgac div.espera').html('Espere | <span>CPW Online</span>');
				//Recolección de datos
					var tipo = $(this).attr("tag");
				//Llamada AJAX
					pedidas(tipo, true);
					var retrasar = setTimeout(mov, 3000);
			});
		//Select de Menús
			$('#sgac i.img_col.actualizar.select').click(function(e){
				//Animación
					$('#sgac div.espera').css('right', '.5cm');
					$('#sgac div.espera').html('Espere | <span>CPW Online</span>');
				//Recolección de datos
					var tipo = $(this).attr("tag");
				//Llamada AJAX
					$.post("enlaces/actualizar.php", {tipo:tipo},function(r){
						$('#sgac select[name="s_menu"]').html(r);
						$('#sgac div.espera').html("Listo.");
						var retrasar = setTimeout(mov, 3000);
					});
			});
	//Guardar------------------------------------------------------------------------------
		//Menus-------------------------------------------------
			$('#sgac #guarda_menu').click(function(e){
				//Animación
					$('#sgac div.espera').css('right', '.5cm');
					$('#sgac div.espera').html('Espere | <span>CPW Online</span>');
				//Recolección de datos
					var m_titulo = $('#sgac input[name="m_titulo"]').val();
					var m_posicion = $('#sgac select[name="m_posicion"]').val();
					var tipo = "menus";
				//Llamada AJAX
					$.post("enlaces/guardar.php", {m_titulo:m_titulo, m_posicion:m_posicion, tipo:tipo},function(r){
						$('#sgac div.espera').html(r);
						var retrasar = setTimeout(mov, 3000);
					});
			});
		//Submenus--------------------------------------------------
			$('#sgac #guarda_sub').click(function(e){
				//Animación
					$('#sgac div.espera').css('right', '.5cm');
					$('#sgac div.espera').html('Espere | <span>CPW Online</span>');
				//Recolección de datos
					var s_titulo = $('#sgac input[name="s_titulo"]').val();
					var s_posicion = $('#sgac select[name="s_posicion"]').val();
					var s_menu = $('#sgac select[name="s_menu"]').val();
					var tipo = "sub";
				//Llamada AJAX
					$.post("enlaces/guardar.php", {s_titulo:s_titulo, s_posicion:s_posicion, s_menu:s_menu, tipo:tipo},function(r){
						$('#sgac div.espera').html(r);
						var retrasar = setTimeout(mov, 3000);
					});
			});
		//Artículos--------------------------------------------------
			$('#sgac #guarda_art').click(function(e){
				//Animación
					$('#sgac div.espera').css('right', '.5cm');
					$('#sgac div.espera').html('Espere | <span>CPW Online</span>');
				//Recolección de datos
					var a_titulo = $('#sgac input[name="a_titulo"]').val();
					var a_des_c = $('#sgac textarea[name="a_des_c"]').val();
					var a_contenido = CKEDITOR.instances.editor.getData();
					var tipo = "articulo";
				//Llamada AJAX
					$.post("enlaces/guardar.php", {a_titulo:a_titulo, a_des_c:a_des_c, a_contenido:a_contenido, tipo:tipo},function(r){
						$('#sgac div.espera').html(r);
						var retrasar = setTimeout(mov, 3000);
					});
			});
		//Informaciones--------------------------------------------------
			$('#sgac #guarda_inf').click(function(e){
				//Animación
					$('#sgac div.espera').css('right', '.5cm');
					$('#sgac div.espera').html('Espere | <span>CPW Online</span>');
				//Recolección de datos
					var i_menu = $('#sgac select[name="inf_menu"]').val();
					var i_sub = $('#sgac select[name="inf_sub"]').val();
					var i_titulo = $('#sgac input[name="inf_tit"]').val();
					var i_titulo_letra = $('#sgac input[name="inf_tit_letra"]').val();
					var i_contenido = $('#sgac textarea[name="inf_cont"]').val();
					var i_contenido_fondo = $('#sgac input[name="inf_cont_fondo"]').val();
					var i_contenido_borde = $('#sgac input[name="inf_cont_borde"]').val();
					var i_contenido_letra = $('#sgac input[name="inf_cont_letra"]').val();
					var i_posicion = $('#sgac select[name="inf_pos"]').val();
					var i_disegno = $('#sgac select[name="inf_disegno"]').val();
					var tipo = "informacion";
				//Llamada AJAX
					$.post("enlaces/guardar.php", {i_menu:i_menu, i_sub:i_sub, i_titulo:i_titulo, i_titulo_letra:i_titulo_letra, i_contenido:i_contenido, i_contenido_fondo:i_contenido_fondo, i_contenido_borde:i_contenido_borde, i_contenido_letra:i_contenido_letra, i_posicion:i_posicion, i_disegno:i_disegno, tipo:tipo},function(r){
						$('#sgac div.espera').html(r);
						var retrasar = setTimeout(mov, 3000);
					});
			});
	//Pedida de las partes
		pedidas("todo", false);
});
