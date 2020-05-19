<!DOCTYPE HTML>

	<!--
		Sitio web modelo: L17 - 01
		Desarrollado por CPW Online.
	-->

<html lang="es">
	<head>
		<?php 
			//Ver el nombre de la web y datos
				$cx = FOPEN("../../../datos.php", "r");$web = FGETS($cx);FCLOSE($cx);
				$cx = FOPEN("datos_ind.php", "r");$pagina = FGETS($cx);FCLOSE($cx);
				echo "<title>".$pagina." | ".$web."</title>";
			//Incluir las cabeceras
				include('../../../head.php');
				head();
				require_once('../../../mysqli_db.php');
		?>
	</head>
	<body id="l17-01">
		<!--Bloque: CABECERA-->
			<section class="cabecera">
				<nav class="menus">
					<img class="logo" alt="" src="../../../images/logo.png"/>
					<ul class="menus">
						<?php 
							//Incluir la barra de navegación
								require_once('../../../cab.php');
								cab($pagina);
						?>
					</ul>
					<div class="cont_b"><a class="btn-gen btn-1 btn-1c" href="../../../qc/">Login</a></div>
				</nav>
				<!--Artículo 1 de Cabecera-->
				<article class="art_cab_1">
					<section class="izq">
						<div class="texto">
							<h3>The best</h3>
							<h2>FOOD</h2>
							<h4>24/7/365</h4>
						</div>
					</section>
					<section class="der">
						<img tag="pollo" src="../../../images/per/pollo.png" alt=""/>
					</section>
				</article>
			</section>
		<!--Bloque: CONTENEDOR-->
			<section class="contenedor">
				<article class="art_gen">
					<?php
						//Pedido de las informaciones
						
					?>
				</article>
			</section>
		<!--Bloque: PIE-->
			<footer class="pie">
				<?php include('../../../pie.php'); ?>
			</footer>
	</body>
</html>
