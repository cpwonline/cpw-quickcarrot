<?=include("../enlaces/mysqli_db.php");?>

<div class="fil pr">
	<div class="cam">T&iacute;tulo:</div>
	<div class="cam">Posici&oacute;n</div>
	<div class="cam">Submen&uacute;</div>
	<div class="cam">Creado el:</div>
	<div class="cam">Creado por:</div>
</div>
<?php
	$con = $mysqli->query("SELECT * FROM menus ORDER BY m_posicion DESC");
	if($con->num_rows === 0){
		echo "<div class='uni'>No hay resultados.</div>";
	}
	while($ro = $con->fetch_assoc()){
		$m_id = $ro['m_id'];
		$m_titulo = $ro['m_titulo'];
		$m_posicion = $ro['m_posicion'];
		$m_borrable = $ro['m_borrable'];
		$m_sub = $ro['m_sub'];$m_sub == 1 ? $m_sub = "S&iacute;" : $m_sub = "No";
		$m_freg = $ro['m_freg'];
		$m_usuario = $ro['m_usuario'];
?>
		<div class="fil">
			<div class="cam"><?=$m_titulo?></div>
			<div class="cam"><?=$m_posicion?></div>
			<div class="cam"><?=$m_sub?></div>
			<div class="cam"><?=$m_freg?></div>
			<div class="cam"><?=$m_usuario?></div>
			<div class="cam"><i class="img_col editar neg boton editar_menu" tag="<?=$m_id?>-<?=$m_titulo?>"></i></div>
			<?php
				if($m_borrable){
			?>
					<div class="cam"><i class="img_col borrar neg boton borrar_menu" tag="<?=$m_id?>-<?=$m_titulo?>"></i></div>
			<?php
				}
			?>
		</div>
<?php
	}
?>