<!DOCTYPE HTML>
<html lang="es">
	<!--
		QuickCarrot | CPW Online
			- Versión 1.0.3
	-->
	<head>
		<title>QuickCarrot | CPW Online</title>
		
		<?php
			require_once('../../mysqli_db.php');
			session_start();
		?>
		<!--Links de CSS-->
			<link rel="stylesheet" href="../../css/estilo-mod.css"/>
			<link rel="stylesheet" href="../../css/estilo-gen.css"/>
			<link rel="stylesheet" href="../../css/estilo-mi_info.css"/>
		<!--Links de JS-->
			<script src="../../js/jquery-3.0.0.min.js"></script>
			<script src="../../js/func-gen.js"></script>
			<script src="../../js/func-ope.js"></script>
			<script src="../../js/func-inf.js"></script>
			<script src="../../js/func-images.js"></script>
			<script src="../../vendor/ckeditor/ckeditor.js"/></script>
			<script src="../../js/ck-editor.js"/></script>
			<script src="../../js/main.js"/></script>
	</head>
	<body id="quickCarrot">
		<div class="espera">Espere un momento... | <span>CPW Online</span></div>
		<?php
			//Comprobar que la URL No esté vacía
				if(isset($_GET['i_sub'])){
					$i_sub = "../../../".$_GET['i_sub']."index.php";
				}else{
					$i_sub = "";
				}
			//Comprobado del inicio de sesión
			if(empty($_SESSION['u_nombre'])){
		?>
				<section class="inicio_sesion">
					<h3>¡Bienvenido a QuickCarrot!</h3>
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
				<h3>QuickCarrot | Ultimate</h3>
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
				<span>Bienvenido <i><?=$_SESSION['u_nombre']?></i> | QuickCarrot &nbsp; <a href="#" class="cerrar_sesion btn-gen2">Cerrar sesi&oacute;n</a></span>
			</section>
			<!--Editor de páginas-->
				<article class="art_gen" id="art_1" tag="menus">
					<h3>Editor de p&aacute;ginas</h3>
					<section class="dentro_art">
						<!--Artículos de una cabecera-->
							<!--Añadir menú-->
								<article class="bloque b2">
									<h4>Edici&oacute;n</h4>
									<div id="editor">
										<?php
										//Función que quita tabulaciones y espacios en blanco entre etiquetas
											function limpia_html($codigo){
												$buscar = array('/\>[^\S ]+/s','/[^\S ]+\</s','/(\s)+/s');
												$reemplazar = array('>', '<', '\\1');
												$codigo = preg_replace($buscar, $reemplazar, $codigo);
												$codigo = str_replace("> <", "><", $codigo);
												$codigo = str_replace("<?php", "<!--PHP", $codigo);
												$codigo = str_replace("?>", "-->", $codigo);
												$codigo = str_replace("<?=", "<--PHP", $codigo);
												$codigo = str_replace("?>", "-->", $codigo);
												return $codigo;
											}
											//Lectura del archivo
												$FP = FOPEN($i_sub, "r");
													$cont_int = "";
													$inicio = '<!--Bloque: CONTENEDOR<-->';$i = false;
													$fin = '<!--Bloque: CONTENEDOR>-->';
													$ignorado = ['vacio', 'vacio'];$ig = false;
												while(!feof($FP)){
													$codigo = FGETS($FP);
													$res = limpia_html($codigo);
													//Verificamos si se entra
														if($res == $inicio){
															$i = true;
															continue;
														}
														if($res == $ignorado[0]){
															$ig = true;
															continue;
														}
													//Verificamos si se sale
														if($res == $fin){
															break;
														}
														if ($res == $ignorado[1]) {
															$ig = false;
															continue;
														}
													//Imprimimos
														if($i == true && $ig == false)
															echo $res;
														elseif($ig == true)
															$cont_int .= $res;

												}
												FCLOSE($FP);

										?>
									</div>
									<input type="text" name="datos_cont"/>
									<textarea name="datos_int"><?=$cont_int?></textarea>
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