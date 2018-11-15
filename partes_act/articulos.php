<?=include("../enlaces/mysqli_db.php");?>

<div class="fil pr">
	<div class="cam">T&iacute;tulo</div>
	<div class="cam">Imagen</div>
	<div class="cam">Creado el</div>
	<div class="cam">Creado por</div>
</div>
<?php
	$con = $mysqli->query("SELECT * FROM articulos ORDER BY a_freg DESC");
	if($con->num_rows === 0){
		echo "<div class='uni'>No hay resultados.</div>";
	}
	while($ro = $con->fetch_assoc()){
		$a_id = $ro['a_id'];
		$a_titulo = $ro['a_titulo'];
		$a_contenido = $ro['a_contenido'];
		$a_imagen = $ro['a_imagen'];
		$a_freg = $ro['a_freg'];
		$a_usuario = $ro['a_usuario'];
?>
		<div class="fil">
			<div class="cam"><?=$a_titulo?></div>
			<?php
				//En este caso se les colocará a cada etiqueta un codigo que contendra el id titulo y tipo 
				//Para luego separarlos con Js y así obtener con más presición las etiquetas
					if(empty($a_imagen)){
						echo '<div class="cam" tag="'.$a_id.'_'.$a_titulo.'_articulo">
								<input type="file" name="imagen" tag="'.$a_id.'_'.$a_titulo.'_articulo"/>
								<a class="w3-btn w3-deep-orange subir_imagen" tag="'.$a_id.'_'.$a_titulo.'_articulo">Subir  <i class="img_col subir blan"></i></a>
							</div>';
					}else{
						echo '<div class="cam">S&iacute;</div>';
					}
			?>
			<div class="cam"><?=$a_freg?></div>
			<div class="cam"><?=$a_usuario?></div>
			<div class="cam"><a href="enlaces/editor/articulos/?a_id=<?=$a_id?>#1" target="_blank"><i class="img_col editar neg boton"></i></a></div>
			<div class="cam"><i class="img_col borrar neg boton borrar_art" tag="<?=$a_id?>"></i></div>
		</div>
<?php
	}
?>