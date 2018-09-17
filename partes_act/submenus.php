<?=include("../mysqli_db.php");?>

<div class="fil pr">
	<div class="cam">T&iacute;tulo:</div>
	<div class="cam">Men&uacute;</div>
	<div class="cam">Posici&oacute;n</div>
	<div class="cam">Creado el:</div>
	<div class="cam">Creado por:</div>
</div>
<?php
	$con = $mysqli->query("SELECT * FROM submenus ORDER BY s_freg DESC");
	if($con->num_rows === 0){
		echo "<div class='uni'>No hay resultados.</div>";
	}
	while($ro = $con->fetch_assoc()){
		$s_id = $ro['s_id'];
		$s_titulo = $ro['s_titulo'];
		$s_posicion = $ro['s_posicion'];
		$s_freg = $ro['s_freg'];
		$s_usuario = $ro['s_usuario'];
		$s_menu = $ro['s_menu'];
?>
		<div class="fil">
			<div class="cam"><?=$s_titulo?></div>
			<div class="cam"><?=$s_menu?></div>
			<div class="cam"><?=$s_posicion?></div>
			<div class="cam"><?=$s_freg?></div>
			<div class="cam"><?=$s_usuario?></div>
			<div class="cam"><i class="img_col editar neg boton editar_sub" tag="<?=$s_id?>-<?=$s_menu?>-<?=$s_titulo?>"></i></div>
			<div class="cam"><i class="img_col borrar neg boton borrar_sub" tag="<?=$s_id?>-<?=$s_menu?>-<?=$s_titulo?>"></i></div>
		</div>
<?php
	}
?>