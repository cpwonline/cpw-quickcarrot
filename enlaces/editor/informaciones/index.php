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
		<script type="text/javascript">
			$(function(){
				$("#quickCarrot header.cabecera nav.menu li[tag='informaciones']").click();
			});
		</script>
	</head>
	<body id="quickCarrot">
		<?php
			//Comprobar que la URL No esté vacía
				if(isset($_GET['i_sub'])){
					$i_sub = "../../../".$_GET['i_sub']."index.php";
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