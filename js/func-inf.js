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
			$('#sgac a#configura_inf').click(function(e){
				//Animación
					$('#sgac div.espera').css('right', '.5cm');
					$('#sgac div.espera').html('Espere | <span>CPW Online</span>');
				//Recolección de datos
					var s_url = $('#sgac select[name="i_sub"]').val();
					var tipo = "carga_sub";
				//Llamada AJAX
					$.post("enlaces/actualizar.php", {s_url:s_url, tipo:tipo},function(r){
						$('#sgac div.cam[tag="object_inf"]').html(r);
						$('#sgac div.espera').html("Listo");
						var retrasar = setTimeout(mov, 3000);
					});
			});
			$('#sgac a[tag="agrega_inf"]').click(function(e){
				//Se selecciona el documento
					var doc = document.querySelector('#sgac #t').contentWindow.document.querySelector('#l17-01');
				//Buscamos todos los movibles
					var cant = doc.querySelectorAll(".movible");
				//Recolectamos datos de diseño y estructura
					var i_disegno = $("#sgac input[name='i_disegno']").val();
					var i_posicion = $("#sgac input[name='i_posicion']").val();
					var i_titulo = $("#sgac input[name='i_titulo']").val();
					var i_contenido = $("#sgac input[name='i_contenido']").val();
					var i_colorFondo = $("#sgac input[name='i_colorFondo']").val();
					var i_colorLetra = $("#sgac input[name='i_colorLetra']").val();
				//Fusionamos el contenido con el diseño
					var res = fusion_inf(i_disegno, i_titulo, i_contenido, i_colorFondo, i_colorLetra);
				//Agregamos la información
					var primero = document.createElement('article').appendChild(document.createTextNode(i_contenido));
					doc.insertBefore(primero, cant[1]);
			});
});
function funsion_inf(){
	
}











