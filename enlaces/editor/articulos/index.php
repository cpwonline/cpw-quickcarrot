<!DOCTYPE HTML>
<html lang="es">
	<!--
		QuickCarrot | CPW Online
	-->
	<head>
		<title>Articulos - QuickCarrot | CPW Online</title>
		<!--Incluimos el HEAD-->
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
		<!--Fin Incluimos el HEAD-->
		<script type="text/javascript">
			$(function(){
				$("#quickCarrot header.cabecera nav.menu li[tag='articulos']").click();
			});
		</script>
	</head>
	<body id="quickCarrot">
		<!--Administrador de notificaciones-->
			<section id="starFly">
				<div id="pie_starFly"></div>
			</section>
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
		<header class="cabecera">
			<section class="logo">
				<h3>QuickCarrot | <?=$_SESSION['u_plan']?></h3>
			</section>
			<nav class="menu">
				<ul class="menu_prin">
					<li tag="articulos"><i class="img_col articulos blan"></i><a>Art&iacute;culos</a></li>
				</ul>
			</nav>
		</header>
		
	<!--Contenedor-->
		<section class="contenedor">
			<!--Principal-->
			<section class="inf_prin">
				<span>Bienvenido <i><?=$_SESSION['u_nombre']?></i> | QuickCarrot &nbsp; <a href="#" class="cerrar_sesion btn-gen2">Cerrar sesi&oacute;n</a></span>
			</section>
			<!--Editor de artículos-->
				<article class="art_gen" id="art_1" tag="articulos">
					<h3>Editor de artículos</h3>
					<section class="dentro_art">
						<!--Artículos de una cabecera-->
							<!--Editor de artículos-->
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
								<article class="bloque b1">
									<h4>T&iacute;tulo</h4>
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
								<article class="bloque b1">
									<h4>Imagen</h4>
									<div class="tabla_gen">
										<div class="fil">
											<div class="cam"><img width="100px" src="../../<?=$a_imagen?>" alt="Img"/></div>
										</div>
										<div class="fil">
											<div class="cam"><a class="btn-gen" tag="e_guarda_art_imagen">Cambiar</a></div>
										</div>
									</div>
								</article>
								<article class="bloque b2">
									<h4>Edite la descripci&oacute;n corta</h4>
									<div class="tabla_gen">
										<div class="fil">
											<div class="cam">
												<textarea><?=$a_des_c?></textarea>
											</div>
										</div>
										<div class="fil">
											<div class="cam"><a class="btn-gen" id="e_guarda_art_des_c">Guardar</a></div>
										</div>
									</div>
								</article>
								<article class="bloque b2">
									<h4>Edite el texto del art&iacute;culo</h4>
									<div class="tabla_gen">
										<div class="fil">
											<div class="cam">
												<div id="editor"><?=$a_contenido?></div>
											</div>
										</div>
									</div>
								</article>
								<article class="bloque b2">
									<h4>Si no has guardado, a&uacute;n no has terminado</h4>
									<div class="tabla_gen">
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
		<footer class="pie">
			
		</footer>
	<?php
		}
	?>
	</body>
</html>