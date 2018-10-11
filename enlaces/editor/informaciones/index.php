<!DOCTYPE HTML>
<html lang="es">
	<!--
		QuickCarrot | CPW Online
	-->
	<head>
		<title>QuickCarrot | CPW Online</title>
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
		<script>
			$(function(){
				$("#quickCarrot header.cabecera nav.menu li[tag='informaciones']").click();
			});
		</script>
	</head>
	<body id="quickCarrot">
		<?php
			//Comprobar que la URL No esté vacía
				if(isset($_GET['i_sub'])){
					$i_sub = $_GET['i_sub']."index.php";
				}else{
					$i_sub = "";
				}
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
					<li tag="informaciones"><i class="img_col informaciones blan"></i><a>Informaciones</a></li>
				</ul>
			</nav>
		</header>
		
	<!--Contenedor-->
		<section class="contenedor">
			<!--Principal-->
			<section class="inf_prin">
				<span>Bienvenido <i><?=$_SESSION['u_nombre']?></i> | QuickCarrot &nbsp; <a href="#" class="cerrar_sesion btn-gen2">Cerrar sesi&oacute;n</a></span>
			</section>
			<!--Editor de páginas-->
				<article class="art_gen" id="art_1" tag="informaciones">
					<h3>Editor de p&aacute;ginas</h3>
					<section class="dentro_art">
						<!--Artículos de una cabecera-->
							<!--Edición de informaciones-->
								<article class="bloque b2">
									<h4>Edici&oacute;n</h4>
									<section class="body_2">
										<?php
											$dir = "../".calcDimension($i_sub, $dimension);
											echo '<object type="text/html" data="'.$dir.'" width="100%", height="1000"></object>';
										?>
									</section>
								</article>
								<article class="bloque b1">
									<h4>¿Desea guardar?</h4>
									<div class="tabla_gen">
										<div class="fil">
											<div class="cam"><a class="btn-gen">Guardar</a></div>
											<div class="cam"><a class="btn-gen2">Descartar</a></div>
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
	<!--MODALES-->
		<!--Modal de conf_borrar_gen------------------------------------------------>
			<div class="gen_modal" id="conf_borrar_gen">
				<div class="modal-content">
					<div class="header otro"><h2>Confirmaci&oacute;n</h2></div>
					<div class="copy" id="copy">
						<p style="text-align: center;">
							<span tag="1">¿Est&aacute; seguro de borrar</span>
							<span tag="2"></span>
						</p>
					</div>
					<div class="cf footer">
						<section class="cont_a">
							<a class="btn-gen2" onclick="$('#quickCarrot #conf_borrar_gen').css('display','none');" tag="cancelar">Cancelar</a>
							<a class="btn-gen" tag="si" href="#">S&iacute;</a>
						</section>
					</div>
				</div>
				<div class="overlay"></div>
			</div>
		<!--Modal de conf_borrar_gen------------------------------------------------->
		
	</body>
</html>