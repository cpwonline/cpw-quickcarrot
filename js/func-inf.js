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
							$('#sgac div.espera').html("Listo");
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
					//Fusionamos el contenido con el diseño
						var res = fusion_inf(i_disegno, i_titulo, i_contenido, i_colorFondo, i_colorLetra);
						alert(res);
					//Creamos la información
						//Creamos el elemento y su contenido
							var primero = document.createElement('article');
							var contenido = document.createTextNode(res);
							primero.appendChild(contenido);
						//Asignamos el diseño
							var disegno = "background:" + i_colorFondo + ";color:" + i_colorLetra + ";padding:1.4cm;text-align:center;display:block;";
							primero.setAttribute("style", disegno);
					if(i_contenido == ""){
						$('#sgac div.espera').html("El contenido no debe de estar vac&iacute;o");
						var retrasar = setTimeout(mov, 3000);
					}else{
						//Agregamos la información
							doc.insertBefore(primero, cant[i_posicion]);
						//Notificación final
							$('#sgac div.espera').html("Listo");
							var retrasar = setTimeout(mov, 3000);
					}
				});
			//PASO 4
});
function fusion_inf(dis, tit, cont, fondo, letra){
	var res = "jas";
	alert("este es dis: "+dis);
	switch(dis){
		case "1":
			res = cont;
			break;
	}
	return res;
}










