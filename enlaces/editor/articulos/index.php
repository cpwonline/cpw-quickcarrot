<!DOCTYPE HTML>
<html lang="es">
	<!--
		SGAC | CPW Online
	-->
	<head>
		<title>SGAC | CPW Online</title>
		
		<?php
			require_once('../../../mysqli_db.php');
			session_start();
		?>
		<!--Links de CSS-->
			<link rel="stylesheet" href="../../../css/estilo-mod.css"/>
			<link rel="stylesheet" href="../../../css/estilo-gen.css"/>
			<link rel="stylesheet" href="../../../css/estilo-mi_info.css"/>
		<!--Links de JS-->
			<script src="../../../js/jquery-3.0.0.min.js"></script>
			<script src="../../../js/func-gen.js"></script>
			<script src="../../../js/func-ope.js"></script>
			<script src="../../../js/func-inf.js"></script>
			<script src="../../../js/func-images.js"></script>
			<script src="../../../vendor/ckeditor/ckeditor.js"/></script>
			<script src="../../../js/ck-editor.js"/></script>
			<script src="../../../js/main.js"/></script>

	</head>
	<body id="sgac">
		<div class="espera">Espere un momento... | <span>CPW Online</span></div>
		<?php
			//Comprobado del inicio de sesión
			if(empty($_SESSION['u_nombre'])){
		?>
				<section class="inicio_sesion">
					<h3>¡Bienvenido a SGAC!</h3>
					<h4>El sistema que le ayudar&aacute; a gestionar sus contenidos.</h4>
					<input type="text" name="u_nombre" placeholder="Usuario"/>
					<input type="password" name="u_clave" placeholder="Contrase&ntilde;a"/><br>
					<input type="hidden" name="contador" value="1"/>
					<button class="btn-gen" id="iniciar_sesion">Entrar</button>
					<button class="btn-gen2">Olvid&eacute; mi contrase&ntilde;a</button>
				</section>
		<?php
			}else{
		?>
	<!--Cabecera-->
		<header class="cabecera">
			<section class="logo">
				<h3>SGAC | Ultimate</h3>
			</section>
			<nav class="menu">
				<ul class="menu_prin">
					<li tag="menus"><i class="img_col menus blan"></i><a>Men&uacute;s</a></li>
				</ul>
				<ul class="menu_prin">
					<li tag="articulos"><i class="img_col articulos blan"></i><a>Art&iacute;culos</a></li>
					<li tag="informaciones"><i class="img_col informaciones blan"></i><a>Informaciones</a></li>
				</ul>
				<ul class="menu_prin">
					<li tag="diagnostico"><i class="img_col diagnostico blan"></i><a>Diagn&oacute;stico de errores</a></li>
					<li tag="estadisticas"><i class="img_col estadisticas blan"></i><a>Estad&iacute;sticas</a></li>
				</ul>
				<ul class="menu_prin">
					<li tag="ajustes"><i class="img_col ajustes blan"></i><a>Ajustes</a></li>
					<li tag="ayuda"><i class="img_col ayuda blan"></i><a>Ayuda</a></li>
					<li tag="acercade"><i class="img_col acercade blan"></i><a>Acerca de</a></li>
				</ul>
			</nav>
		</header>
		
	<!--Contenedor-->
		<section class="contenedor">
			<!--Principal-->
			<section class="inf_prin">
				<span>Bienvenido <i><?=$_SESSION['u_nombre']?></i> | SGAC &nbsp; <a href="#" class="cerrar_sesion btn-gen2">Cerrar sesi&oacute;n</a></span>
			</section>
			<!--Editor de artículos-->
				<article class="art_gen" id="art_1" tag="menus">
					<h3>Editor de artículos</h3>
					<section class="dentro_art">
						<!--Artículos de una cabecera-->
							<!--Editor de artículos-->
								<article class="bloque b2">
									<h4>Edici&oacute;n</h4>
									<?php
									echo "hola";
										isset($_GET['a_id'])? $a_id = palabraSegura($_GET['a_id']) : $a_id = NULL;
										$con = $mysqli->query("SELECT * FROM articulos WHERE a_id = '".$a_id."' ");
										if($con->num_rows === 0){							
											echo 'Disculpe no se ha encontrado el art&iacute;culo especificado';
											exit;
										}
										$ro = $con->fetch_assoc();
										$a_titulo = $ro['a_titulo'];
										$a_contenido = $ro['a_contenido'];
										$a_imagen = $ro['a_imagen'];
									?>
									<div id="editor"><?=$a_contenido?></div>
									<a class="btn-gen" id="guarda_inf">Guardar cambios</a>
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