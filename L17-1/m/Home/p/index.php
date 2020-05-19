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
		<!--Bloque: CABECERA<-->
			<section class="cabecera movible">
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
		<!--Bloque: CABECERA>-->
		<!--Seccion: ARTICULOS<-->
			<article class="art_1 movible">
				<section class="izq">
					<h3>Articles</h3>
				</section>
				<section class="der">
					<section class="cont_articulos">
						<div class="cent">
							<article class="art">
								<img src="../../../images/per/1.png" alt=""/>
								<h3>Cubilia Curae</h3>
							</article>
							<article class="art">
								<img src="../../../images/per/2.png" alt=""/>
								<h3>At posuere</h3>
							</article>
							<article class="art">
								<img src="../../../images/per/3.png" alt=""/>
								<h3>In Faucibus</h3>
							</article>
							<article class="art">
								<img src="../../../images/per/4.png" alt=""/>
								<h3>Tellus Id</h3>
							</article>
							<article class="art">
								<img src="../../../images/per/5.png" alt=""/>
								<h3>Posuere Cubilia</h3>
							</article>
							<article class="art">
								<img src="../../../images/per/6.png" alt=""/>
								<h3>Massa Ligula</h3>
							</article>
						</div>
					</section>
				</section>
				<a class="btn-gen btn-2 btn-1c" href="#" style="float:right;margin-right:.7cm;">More</a>
			</article>
		<!--Seccion: ARTICULOS>-->
		<!--Bloque: CONTENEDOR<-->
			<section class="contenedor movible">
				<article class="art_gen movible">
				
				</article>
			</section>
		<!--Bloque: CONTENEDOR>-->
		<!--Bloque: PIE<-->
			<footer class="pie movible">
				<?php 
					include('../../../pie.php'); 
				?>
			</footer>
		<!--Bloque: PIE>-->
	</body>
</html>
