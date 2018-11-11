<!DOCTYPE HTML>
<html lang="es">
	<!--
		QuickCarrot | CPW Online
	-->
	<head>
		<title>Art&iacute;culos - QuickCarrot | CPW Online</title>
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
						<img src="images/logo_qc_Fondo-Trans_Letra-Blanca.png" alt="QuickCarrot Logo"/>
						<h3>- <?=$_SESSION['u_plan']?> -</h3>
					</section>
				<!--Menú-->
					<nav class="menu">
						<ul class="menu_prin">
							<li class="w3-hover-gray" tag="articulos" title="&Eacute;ste es el espacio reservado para gestionar los temas que sus lectores reciben a diario."><i class="img_col articulos blan"></i><a>Art&iacute;culos</a></li>
						</ul>
					</nav>
			</header>
	<!--Contenedor-->
		<section class="contenedor w3-col m8 l9 w3-right">
			<!--Principal-->
				<section class="inf_prin w3-container w3-display-container">
					<div class="menu_boton w3-button w3-display-left">
						<img src="images/menu_blanco_F-Trans.png" alt="" class="menu_boton"/>
					</div>
					<h5>Bienvenido <i><?=$_SESSION['u_nombre']?></i> | QuickCarrot &nbsp; <a href="#" class="cerrar_sesion w3-button w3-border">Cerrar sesi&oacute;n</a></h5>
				</section>
			<!--Editor de artículos-->
				<article class="art_gen" id="art_1" tag="menus">
					<h3>Editar un art&iacute;culo</h3>
					<section class="dentro_art">
						<!--Artículos de una cabecera-->
							<!--Pedimos la información del servidor-->
								<?php
									isset($_GET['a_id'])? $a_id = palabraSegura($_GET['a_id']) : $a_id = NULL;
									$con = $mysqli->query("SELECT * FROM articulos WHERE a_id = '".$a_id."' ");
									if($con->num_rows === 0){							
										echo 'Disculpe no se ha encontrado el art&iacute;culo especificado';
										exit;
									}
									$ro = $con->fetch_assoc();
									$a_id = $ro['a_id'];
									$a_titulo = $ro['a_titulo'];
									$a_des_c = $ro['a_des_c'];
									$a_contenido = $ro['a_contenido'];
									$a_imagen = $ro['a_imagen'];
									$a_usuario = $ro['a_usuario'];
								?>
							<!--Título-->
								<article class="bloque w3-col m6 l6">
									<div class="w3-container w3-gray"><h4 class="">Edite el t&iacute;tulo</h4></div>
									<div class="tabla_gen">
										<div class="fil">
											<div class="cam">T&iacute;tulo:</div>
											<div class="cam">
												<input type="text" name="e_a_titulo" placeholder="Escriba el t&iacute;tulo de su art&iacute;culo" value="<?=$a_titulo?>"/>
												<input type="hidden" name="e_a_id" value="<?=$a_id?>"/>
											</div>
										</div>
										<div class="fil">
											<div class="cam"><a class="btn-gen" id="e_guarda_art_titulo">Guardar</a></div>
										</div>
									</div>
								</article>
							<!--Imagen-->
								<article class="bloque w3-col m6 l6">
									<div class="w3-container w3-gray"><h4 class="">Cambie la imagen</h4></div>
									<div class="tabla_gen">
										<div class="fil">
											<div class="cam">
												<img width="100px" src="../../<?=$a_imagen?>" alt="Img" tag="a_imagen_vis"/>
												<input type="file" name="e_a_imagen"/>
												<input type="hidden" name="e_a_imagen_url" value="<?=$a_imagen?>"/>
											</div>
											<div class="cam"><a class="btn-gen2" id="e_carga_art_imagen">Cambiar imagen</a></div>
										</div>
										<div class="fil">
											<div class="cam"><a class="btn-gen" id="e_guarda_art_imagen">Guardar imagen</a></div>
										</div>
									</div>
								</article>
							<!--Descripción corta-->
								<article class="bloque w3-col m6 l6">
									<div class="w3-container w3-gray"><h4 class="">Edite la descripci&oacute;n corta</h4></div>
									<div class="tabla_gen">
										<div class="fil">
											<div class="cam">
												<textarea name="e_a_des_c" maxlength="200"><?=$a_des_c?></textarea>
											</div>
										</div>
										<div class="fil">
											<div class="cam"><a class="btn-gen" id="e_guarda_art_des_c">Guardar</a></div>
										</div>
									</div>
								</article>
							<!--Contenido-->
								<article class="bloque 3-col m12 l12">
									<div class="w3-container w3-gray"><h4 class="">Edite el texto del art&iacute;culo</h4></div>
									<div class="tabla_gen">
										<div class="fil">
											<div class="cam">
												<div id="editor"><?=$a_contenido?></div>
											</div>
										</div>
										<div class="fil">
											<div class="cam">
												<a class="btn-gen" id="e_guarda_art_contenido">Guardar</a>
											</div>
										</div>
									</div>
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