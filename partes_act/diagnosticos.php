<?php
    include("../enlaces/mysqli_db.php");
    session_start();
?>

<div class="fil pr">
	<div class="cam">ID</div>
	<div class="cam">T&iacute;tulo</div>
	<div class="cam">Estado</div>
	<div class="cam">Contenido</div>
	<div class="cam">Resuelto</div>
	<div class="cam">Fecha</div>
</div>
<?php
	$con = $mysqli->query("SELECT * FROM diagnosticos WHERE d_usuario = '".$_SESSION["u_nombre"]."' ORDER BY d_freg DESC");
	if($con->num_rows === 0){
		echo "<div class='uni'>No hay resultados.</div>";
	}
	while($ro = $con->fetch_assoc()){
		$d_id = $ro['d_id'];
		$d_usuario = $ro['d_usuario'];
		$d_estado = $ro['d_estado'];
		$d_titulo = $ro['d_titulo'];
		$d_cont = $ro['d_cont'];
		$d_resuelto = $ro['d_resuelto'];
		$d_freg = $ro['d_freg'];
?>
		<div class="fil">
			<div class="cam"><?=$d_id?></div>
			<div class="cam"><?=$d_titulo?></div>
			<div class="cam"><?=$d_estado?></div>
			<div class="cam"><?=$d_cont?></div>
            <?php
                if($d_resuelto == 0){
            ?>
			    <div class="cam"><a class="w3-btn w3-deep-orange listo_diag" tag="<?=$d_id?>">Marcar como resuelto  <i class="img_col acercade blan"></i></a></div>
            <?php
                }else{
                    echo "Resuelto.";
                }
            ?>
			<div class="cam"><?=$d_freg?></div>
			<div class="cam"><i class="img_col borrar neg boton borrar_diag" tag="<?=$d_id?>-<?=$d_resuelto?>"></i></div>
		</div>
<?php
	}
?>