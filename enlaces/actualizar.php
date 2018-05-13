<?php
	require_once('../mysqli_db.php');
	switch($_POST['tipo']){
		case 'menus': 
			//Actualización
?>
				<div class="fil pr">
					<div class="cam">T&iacute;tulo:</div>
					<div class="cam">Posici&oacute;n</div>
					<div class="cam">Creado el:</div>
					<div class="cam">Creado por:</div>
				</div>
<?php
					$con = $mysqli->query("SELECT * FROM menus ORDER BY m_freg DESC");
					if($con->num_rows === 0){
						echo "<div class='uni'>No hay resultados.</div>";
						exit;
					}
					while($ro = $con->fetch_assoc()){
						$m_titulo = $ro['m_titulo'];
						$m_posicion = $ro['m_posicion'];
						$m_freg = $ro['m_freg'];
						$m_usuario = $ro['m_usuario'];
?>
						<div class="fil">
							<div class="cam"><?=$m_titulo?></div>
							<div class="cam"><?=$m_posicion?></div>
							<div class="cam"><?=$m_freg?></div>
							<div class="cam"><?=$m_usuario?></div>
							<div class="cam"><i class="img_col editar neg boton" tag="editar_menu"></i></div>
							<div class="cam"><i class="img_col borrar neg boton" tag="borrar_menu"></i></div>
						</div>
<?php
					}
			//Fin de Actualización
		break;
		case 'submenus': 
			//Actualización
?>
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
						exit;
					}
					while($ro = $con->fetch_assoc()){
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
							<div class="cam"><i class="img_col editar neg boton" tag="editar_sub"></i></div>
							<div class="cam"><i class="img_col borrar neg boton" tag="borrar_sub"></i></div>
						</div>
<?php
					}
					
			//Fin de Actualización
		break;
		case 'informacion': 
			echo "informaciones";
		break;
		case 'articulos': 
			//Actualización
?>
					<div class="fil pr">
						<div class="cam">T&iacute;tulo:</div>
						<div class="cam">Creado el:</div>
						<div class="cam">Creado por:</div>
					</div>
					<?php
						$con = $mysqli->query("SELECT * FROM articulos ORDER BY a_freg DESC");
						if($con->num_rows === 0){
							echo "<div class='uni'>No hay resultados.</div>";
							exit;
						}
						while($ro = $con->fetch_assoc()){
							$a_titulo = $ro['a_titulo'];
							$a_contenido = $ro['a_contenido'];
							$a_freg = $ro['a_freg'];
							$a_usuario = $ro['a_usuario'];
?>
							<div class="fil">
								<div class="cam"><?=$a_titulo?></div>
								<div class="cam"><?=$a_contenido?></div>
								<div class="cam"><?=$a_freg?></div>
								<div class="cam"><?=$a_usuario?></div>
								<div class="cam"><i class="img_col editar neg boton" tag="editar_articulo"></i></div>
								<div class="cam"><i class="img_col borrar neg boton" tag="borrar_articulo"></i></div>
							</div>
<?php
						}
			//Fin de Actualización
		break;
	}
?>