<!DOCTYPE HTML>
<html lang="es">
	<!--
		QuickCarrot | CPW Online
	-->
	<head>
		<title>Informaciones - QuickCarrot | CPW Online</title>
		<?php 
			//Principal
				require_once('../../../mysqli_db.php');
				session_start();
			//Etiqueta global de donde estamos
				global $dimension;
				$dimension = 3;

			//Gestionamos el HEAD
				$dir = "head.php";
				$dir = calcDimension($dir, $dimension);
				include_once($dir);
				echo head($dimension);
			//Fin gestionamos el HEAD
		?>
	</head>
	<body id="quickCarrot" class="w3-row">
		<!--StarFly-->
			<section id="starFly"><div id="pie_starFly"></div></section>
		<!--Fin StarFly-->
		<?php
			//Comprobado del inicio de sesión
				if(empty($_SESSION['u_nombre'])){
					//Gestionamos el inicioSesion
						$dir = "inicioSesion.php";
						$dir = calcDimension($dir, $dimension);
						include($dir);
						head($dimension);
					//Fin gestionamos el inicioSesion
				}else{
		?>
	<!--Cabecera-->
		<header class="cabecera w3-col m4 l3">
			<!--Logo e informacion principal-->
				<section class="logo w3-container w3-display-container">
					<!--Boton para cerrar menu-->
						<div class="menu_boton_x w3-button w3-display-topright">
							<span class="w3-text-white">X</span>
						</div>
					<?php
						$dir = "images/logo_qc_Fondo-Trans_Letra-Blanca.png";
						$dir = calcDimension($dir, $dimension);
					?>
					<img src="<?=$dir?>" alt="QuickCarrot Logo"/>
					<h3>- <?=$_SESSION['u_plan']?> -</h3>
				</section>
			<!--Menú-->
				<nav class="menu">
					<ul class="menu_prin">
						<li class="w3-hover-gray" tag="informaciones" title="Esta secci&oacute;n es para la creaci&oacute;n, modificaci&oacute;n y eliminaci&oacute;n de los banners o secciones de su sitio web. Puede crear interactivos y elegantes bloques y agregarles textos de informaci&oacute;n."><i class="img_col informaciones blan"></i><a href="#2">Informaciones</a></li>
					</ul>
				</nav>
		</header>
	<!--Contenedor-->
		<section class="contenedor w3-col m8 l9 w3-right">
			<!--Principal-->
				<section class="inf_prin w3-container w3-display-container">
					<div class="menu_boton w3-button w3-display-left">
						<?php
							$dir = "images/menu_blanco_F-Trans.png";
							$dir = calcDimension($dir, $dimension);
						?>
						<img src="<?=$dir?>" alt="menu_boton" class="menu_boton"/>
					</div>
					<h5>Bienvenido <i><?=$_SESSION['u_nombre']?></i> | QuickCarrot &nbsp; <a href="#" class="cerrar_sesion w3-button w3-border">Cerrar sesi&oacute;n</a></h5>
				</section>
			<!--Editor de páginas-->
				<article class="art_gen" id="art_1" tag="informaciones">
					<h3>Editor de informaciones</h3>
					<section class="dentro_art">
						<!--Artículos de una cabecera-->
							<!--General-->
								<article class="bloque w3-col m12 l12">
									<div class="w3-container w3-gray"><h4 class="">General</h4></div>
									<section class="body_2">
										<?php
											if(isset($_GET["i_sub"])){
												$i_menu = $_GET["i_menu"];
												$i_sub = $_GET["i_sub"];
												$dir = "../".calcDimension($i_sub, $dimension);
												echo '<object id="ob_inf" type="text/html" data="'.$dir.'" width="100%", height="1000"></object>';
											}else{
												echo "
													<div class='w3-panel w3-pale-red w3-leftbar w3-border-red'>
														<p>Disculpe, ha habido un error (Localizaci&oacute;n)</p>
													</div>
												";
											}
										?>
									</section>
								</article>
							<!--Navegador de informaciones Omnipresencial-->
								<div class="navegador_omni w3-bar w3-black">
									<a href="#" tag="inf_anterior" class="w3-bar-item w3-button w3-padding-16">Anterior</a>
									<a href="#" tag="inf_siguiente" class="w3-bar-item w3-button w3-padding-16">Siguiente</a>
									<a href="#" tag="inf_editar" class="w3-bar-item w3-button w3-padding-16">Editar</a>
									<a href="#" tag="inf_eliminar" class="w3-bar-item w3-button w3-padding-16">Eliminar</a>
									<a href="#" tag="inf_nuevo" class="w3-bar-item w3-button w3-padding-16">Nuevo</a>
									<a href="#" tag="inf_guardar" class="w3-bar-item w3-button w3-green w3-right w3-padding-16">Guardar todo</a>
								</div>
							<!--Datos-->
								<article class="bloque w3-col m12 l12">
									<div class="w3-container w3-gray"><h4 class="">Datos</h4></div>
										<ul class="w3-ul w3-hoverable">
											<li><input name="inf_cont" type="text" value="-1"/></li>
										</ul>
								</article>
						<!--Fin Artículos de una cabecera-->
					</section>
				</article>
		</section>
	<!--Pie-->
		<footer class="pie">
			
		</footer>
		<!--Añadimos los modales-->
			<?php
				$dir = "modales.php";
				$dir = calcDimension($dir, $dimension);
				include_once($dir);	
			?>	
		<!--Fin añadimos los modales-->
	<?php
		}
	?>
	</body>
</html>