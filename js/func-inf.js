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
					$('#sgac div#conf_inf').css("display", "block");
					$('#sgac div.espera').css('right', '.5cm');
					$('#sgac div.espera').html('Espere | <span>CPW Online</span>');
				//Recolección de datos
					var s_url = $('#sgac select[name="i_sub"]').val();
					var tipo = "carga_sub";
				//Llamada AJAX
					$.post("enlaces/actualizar.php", {s_url:s_url, tipo:tipo},function(r){
						$('#sgac div#conf_inf div.cont').html(r);
						$('#sgac div.espera').html("Listo");
						var retrasar = setTimeout(mov, 3000);
					});
			});
			$('#sgac a[tag="cambiar"]').click(function(e){
				var doc = document.getElementById('t').contentWindow.document.querySelector('#l17-01 .contenedor');
				doc.style.background="#ccc";
				var primero = document.createElement('article').appendChild(document.createTextNode('nuevo aqui jejeje'));
				var segundo = doc.querySelector("article.art_1");
				segundo.style.display = "none";
				alert(segundo);
				doc.insertBefore(primero, segundo);
			});
});












