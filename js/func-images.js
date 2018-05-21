
/*Guardado de la imagen del pago
	function iniciar(v_id, v_tipo){
		id = v_id;
		tipo = v_tipo;
		cajadatos=document.querySelector('#sgac div.cam[tag="'+id+'"]');
		var archivos=document.querySelector('#sgac input[tag="imagen_'+id+'"]');
		archivos.addEventListener('change', subir, false);
	}
	function subir(e){
		var archivos=e.target.files;
		var archivo=archivos[0];
		var datos=new FormData();
		datos.append('archivo', archivo);
		datos.append('id', id);
		datos.append('tipo', tipo);
		var url="../enlaces/subir_imagen.php";
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
/*fin Guardado de la imagen del pago

$(document).ready(function(){
	//Click al boton de subir imagen
		//General
			$('#sgac a.subir_imagen').click(function(e){
				e.preventDefault();
				var id = $(this).attr('tag');
				$('#sgac input[tag="imagen_'+a_id+'"]').click();
				var tipo = $(this).attr('href');
				iniciar(id, tipo);
			});
});*/