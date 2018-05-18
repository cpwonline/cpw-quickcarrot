<?=include("../mysqli_db.php");?>

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
				if(empty($a_imagen)){
					echo '<div class="cam" tag="'.$a_id.'">
							<input type="file" name="a_imagen" tag="a_imagen_'.$a_id.'"/>
							<a class="btn-gen subir_imagen_ariculo"  tag="'.$a_id.'">Subir</a>
						</div>';
				}else{
					echo '<div class="cam">S&iacute;</div>';
				}
			?>
			<div class="cam"><?=$a_freg?></div>
			<div class="cam"><?=$a_usuario?></div>
			<div class="cam"><i class="img_col editar neg boton" tag="editar_articulo"></i></div>
			<div class="cam"><i class="img_col borrar neg boton borrar_art" tag="<?=$a_id?>"></i></div>
		</div>
<?php
	}
?>