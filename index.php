<!DOCTYPE HTML>
<html lang="es">
	<!--
		QuickCarrot | CPW Online
	-->
	<head>
		<title>QuickCarrot | CPW Online</title>
		<?php 
			//Principal
				require_once('mysqli_db.php');
				session_start();
			//Etiqueta global de donde estamos
				global $dimension;
				$dimension = 0;

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
						<li class="w3-hover-gray" tag="menus" title="Aqu&iacute; podr&aacute; gestionar (crear, editar, borrar) todos los men&uacute;s y submen&uacute;s de su sitio web."><i class="img_col menus blan"></i><a href="#0">Men&uacute;s</a></li>
					</ul>
					<ul class="menu_prin">
						<li class="w3-hover-gray" tag="articulos" title="&Eacute;ste es el espacio reservado para gestionar los temas que sus lectores reciben a diario."><i class="img_col articulos blan"></i><a href="#1">Art&iacute;culos</a></li>
						<li class="w3-hover-gray" tag="informaciones" title="Esta secci&oacute;n es para la creaci&oacute;n, modificaci&oacute;n y eliminaci&oacute;n de los banners o secciones de su sitio web. Puede crear interactivos y elegantes bloques y agregarles textos de informaci&oacute;n."><i class="img_col informaciones blan"></i><a href="#2">Informaciones</a></li>
					</ul>
					<ul class="menu_prin">
						<li class="w3-hover-gray" tag="diagnostico" title="Si presenta errores con el sistema, env&iacute;e sus declaraciones aqu&iacute;, los desarrolladores har&aacute;n lo posible de solventar el problema."><i class="img_col diagnostico blan"></i><a href="#3">Diagn&oacute;stico de errores</a></li>
						<li class="w3-hover-gray" tag="estadisticas" title="Parte fundamental que le ayuda a mantenerse informado del d&iacute;a a d&iacute;a de su sitio."><i class="img_col estadisticas blan"></i><a href="#4">Estad&iacute;sticas</a></li>
					</ul>
					<ul class="menu_prin">
						<li class="w3-hover-gray" tag="ajustes" title="Configure el sistema a su gusto con las opciones disponibles."><i class="img_col ajustes blan"></i><a href="#5">Ajustes</a></li>
						<li class="w3-hover-gray" tag="ayuda" title="Si presenta dudas, dir&iacute;jase a esta secci&oacute;n de valiosos recursos."><i class="img_col ayuda blan"></i><a href="#6">Ayuda</a></li>
						<li class="w3-hover-gray" tag="acercade" title="Si quiere saber m&aacute;s acerca de CPW Online, lea lo que tenemos para usted."><i class="img_col acercade blan"></i><a href="#7">Acerca de</a></li>
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
			<!--Menús-->
				<article class="art_gen" id="art_1" tag="menus">
					<h3>Men&uacute;s</h3>
					<section class="dentro_art">
						<!--Artículos de una cabecera-->
							<!--Añadir menú-->
								<article class="bloque w3-col m6 l6">
									<div class="w3-container w3-gray"><h4 class="">A&ntilde;adir un men&uacute;</h4></div>
									<div class="tabla_gen">
										<div class="fil">
											<div class="cam">T&iacute;tulo:</div>
											<div class="cam"><input type="text" name="m_titulo" placeholder="Escriba el t&iacute;tulo de su men&uacute;"/></div>
										</div>
										<div class="fil">
											<div class="cam">Posici&oacute;n:</div>
											<div class="cam">
												<select name="m_posicion">
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>
													<option value="6">6</option>
													<option value="7">7</option>
												</select>
											</div>
										</div>
										<div class="fil">
											<div class="cam"><a class="w3-btn w3-deep-orange" id="guarda_menu">Guardar</a></div>
										</div>
									</div>
								</article>
							<!--Añadir submenú-->
								<article class="bloque w3-col m6 l6">
									<div class="w3-container w3-gray"><h4 class="">A&ntilde;adir un submen&uacute;</h4></div>
									<div class="tabla_gen">
										<div class="fil">
											<div class="cam">T&iacute;tulo:</div>
											<div class="cam"><input type="text" name="s_titulo" placeholder="Escriba el t&iacute;tulo de su submen&uacute;"/></div>
										</div>
										<div class="fil">
											<div class="cam">Posici&oacute;n:</div>
											<div class="cam">
												<select name="s_posicion">
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>
													<option value="6">6</option>
													<option value="7">7</option>
												</select>
											</div>
										</div>
										<div class="fil">
											<div class="cam">Men&uacute; al que pertenece:</div>
											<div class="cam">
												<select name="s_menu">
													<?php
														$con = $mysqli->query("SELECT m_titulo FROM menus ORDER BY m_freg DESC");
														if($con->num_rows === 0){
															echo "<div class='uni'><option>No hay resultados.</option></div>";
														}
														while($ro = $con->fetch_assoc()){
															$m_titulo = $ro['m_titulo'];
													?>
																<option value="<?=$m_titulo?>"><?=$m_titulo?></option>
													<?php
														}
													?>
												</select>
											</div>
											<div class="cam">
												<i class="img_col actualizar neg boton" tag="select_menus_sub" title="Actualizar los men&uacute;s"></i>
											</div>
										</div>
										<div class="fil">
											<div class="cam"><a class="w3-btn w3-deep-orange" id="guarda_sub">Guardar</a></div>
										</div>
									</div>
								</article>
							<!--Mis menús-->
								<article class="bloque w3-col m12 l12">
									<div class="w3-display-container w3-gray">
										<h4 class="">Mis men&uacute;s</h4>
										<i class="w3-padding-large w3-display-right img_col actualizar neg boton" tag="menus"></i>
									</div>
									<div class="tabla_gen menus">
										<!--PARTE: MENUS-->
									</div>
								</article>
							<!--Mis submenús-->
								<article class="bloque w3-col m12 l12">
									<div class="w3-display-container w3-gray">
										<h4 class="">Mis submen&uacute;s</h4>
										<i class="w3-padding-large w3-display-right img_col actualizar neg boton" tag="submenus"></i>
									</div>
									<div class="tabla_gen submenus">
										<!--PARTE: SUBMENUS-->
									</div>
								</article>
						<!--Fin Artículos de una cabecera-->
					</section>
				</article>
			<!--Artículos-->
				<article class="art_gen" id="art_2" tag="articulos">
					<h3>Art&iacute;culos</h3>
					<section class="dentro_art">
						<!--Artículos de una cabecera-->
							<!--Añadir artículo-->
								<article class="bloque w3-col m6 l6">
									<div class="w3-container w3-gray"><h4>A&ntilde;ade un art&iacute;culo</h4></div>
									<div class="tabla_gen">
										<div class="fil">
											<div class="cam">T&iacute;tulo:</div>
											<div class="cam"><input type="text" name="a_titulo" placeholder="Escriba el t&iacute;tulo de su art&iacute;culo"/></div>
										</div>
									</div>
								</article>
								<article class="bloque w3-col m6 l6">
									<div class="w3-container w3-gray"><h4>A&ntilde;ade una descripci&oacute;n corta</h4></div>
									<div class="tabla_gen">
										<textarea style="width:100%" name="a_des_c" placeholder="De qu&eacute; tratar&aacute; su art&iacute;culo" maxlength="200"></textarea>
									</div>
								</article>
								<article class="bloque w3-col m12 l12">
									<div class="w3-container w3-gray"><h4 class="">A&ntilde;ade texto al art&iacute;culo</h4></div>
									<div class="tabla_gen">
										<div class="fil">
											<div class="cam">
												<div id="editor"></div>
											</div>
										</div>
									</div>
								</article>
								<article class="bloque w3-col m12 l12">
									<div class="w3-container w3-gray"><h4 class="">Si no has guardado, a&uacute;n no has terminado</h4></div>
									<div class="tabla_gen">
										<div class="fil">
											<div class="cam">
												<a class="w3-btn w3-deep-orange" id="guarda_art">Guardar</a>
											</div>
										</div>
									</div>
								</article>
							<!--Mis artículos-->
								<article class="bloque w3-col m12 l12">
									<div class="w3-display-container w3-gray">
										<h4>Mis art&iacute;culos</h4>
										<i class="w3-padding-large w3-display-right img_col actualizar neg boton" tag="articulos"></i>
									</div>
									<div class="tabla_gen articulos">
										<!--PARTE: ARTÍCULOS-->
									</div>
								</article>
						<!--Fin Artículos de una cabecera-->
					</section>
				</article>
			<!--Informaciones-->
				<article class="art_gen" id="art_3" tag="informaciones">
					<h3>Informaciones</h3>
					<section class="dentro_art">
						<!--Artículos de una cabecera-->
							<!--Localización de la información-->
								<article class="bloque w3-col m6 l6">
									<form name="enviar_inf" method="GET" action="enlaces/editor/informaciones#2">
										<div class="w3-container w3-gray"><h4>PASO 1: Localizaci&oacute;n de la inf.</h4></div>
										<div class="tabla_gen">
											<div class="fil">
												<div class="cam"><span>A&ntilde;adir informaci&oacute;n en: </span></div>
												<div class="cam">
													<select name="i_menu">
														<option value="">Seleccione...</option>
														<?php
															$con = $mysqli->query("SELECT * FROM menus ORDER BY m_posicion, m_freg DESC");
															while($ro = $con->fetch_array()){
																$m_id = $ro['m_id'];
																$m_titulo = $ro['m_titulo'];
																echo '<option value="'.$m_titulo.'">'.$m_titulo.'</option>';
															}
														?>
													</select>
												</div>
											</div>
											<div class="fil">
												<div class="cam"><span>Submen&uacute;: </span></div>
												<div class="cam">
													<select name="i_sub"><option value="">Seleccione...</option></select>
												</div>
											</div>
											<div class="fil">
												<div class="cam"><a class="w3-btn w3-deep-orange" id="configura_inf">Configurar</a></div>
											</div>
										</div>
									</form>
								</article>
							<!--Mis informaciones-->
								<article class="bloque w3-col m12 l12">
									<div class="w3-container w3-gray"><h4 class="">Mis informaciones</h4></div>
									<div class="tabla_gen">
										<!--PARTE: INFORMACIONES-->
									</div>
								</article>
						<!--Fin Artículos de una cabecera-->
					</section>
				</article>
			<!--Diagnóstico de errores-->
				<article class="art_gen" id="art_4" tag="diagnostico">
					<h3>Diagn&oacute;stico de errores</h3>
					<section class="dentro_art">
						<!--Artículos de una cabecera-->
							<!--Diagnosticar un error-->
								<article class="bloque w3-col m12 l12">
									<div class="w3-container w3-gray"><h4 class="">Informar acerca de un error</h4></div>
									<div class="tabla_gen">
										<div class="fil">
											<div class="cam">Estado:</div>
											<div class="cam">
												<select name="inf_pos">
													<option value="Normal">Normal</option>
													<option value="Preocupante">Preocupante</option>
													<option value="Urgente">Urgente</option>
													<option value="Alarmante">Alarmante</option>
												</select>
											</div>
										</div>
										<div class="fil">
											<div class="cam">Describa el error:</div>
											<div class="cam"><textarea name="inf_cont" placeholder="Sea detallista"></textarea></div>
										</div>
										<div class="fil">
											<div class="cam">URL del error:</div>
											<div class="cam"><input type="url" name="inf_cont" placeholder="Escriba la URL de la p&aacute;gina donde encontr&oacute; el error"/></div>
										</div>
										<div class="fil">
											<div class="cam"><a class="w3-btn w3-deep-orange" id="enviar_diag">Enviar</a></div>
										</div>
									</div>
								</article>
						<!--Fin Artículos de una cabecera-->
					</section>
				</article>
			<!--Estadísticas-->
				<article class="art_gen" id="art_5" tag="estadisticas">
					<h3>Estad&iacute;sticas</h3>
					<section class="dentro_art">
						<!--Artículos de una cabecera-->
							<!--Visitas: Hoy-->
								<article class="bloque w3-col m12 l12">
								<div class="w3-container w3-gray"><h4 class="">Visitas: Ayer</h4></div>
									<div class="tabla_gen">
										<div id="e_hoy"></div>
									</div>
								</article>
							<!--Visitas: Esta semana-->
								<article class="bloque w3-col m12 l12">
								<div class="w3-container w3-gray"><h4 class="">Visitas: semana pasada</h4></div>
									<div class="tabla_gen">
										<div id="e_semana"></div>
									</div>
								</article>
							<!--Visitas: Este mes-->
								<article class="bloque w3-col m12 l12">
								<div class="w3-container w3-gray"><h4 class="">Visitas: mes pasado</h4></div>
									<div class="tabla_gen">
										<div id="e_mes"></div>
									</div>
								</article>
							<!--Visitas: Este año-->
								<article class="bloque w3-col m12 l12">
								<div class="w3-container w3-gray"><h4 class="">Visitas: A&ntilde;o pasado</h4></div>
									<div class="tabla_gen agno">
										<div id="e_agno"></div>
									</div>
								</article>
						<!--Fin Artículos de una cabecera-->
					</section>
				</article>
			<!--Ajustes-->
				<article class="art_gen" id="art_6" tag="ajustes">
					<h3>Ajustes</h3>
					<section class="dentro_art">
						<!--Artículos de una cabecera-->
							<!--Cambiar clave-->
								<article class="bloque w3-col m16 l6">
								<div class="w3-container w3-gray"><h4 class="">Cambiar clave</h4></div>
									<div class="tabla_gen">
										<div class="fil">
											<div class="cam">Clave actual:</div>
											<div class="cam"><input type="password" name="ant_clave" placeholder="Escriba su actual clave"/></div>
										</div>
										<div class="fil">
											<div class="cam">Clave nueva:</div>
											<div class="cam"><input type="password" name="nueva_clave" placeholder="Escriba su nueva clave"/></div>
										</div>
										<div class="fil">
											<div class="cam">Repita su clave actual:</div>
											<div class="cam"><input type="password" name="repita_clave" placeholder="Reescriba su actual clave"/></div>
										</div>
										<div class="fil">
											<div class="cam"><a class="w3-btn w3-deep-orange" id="editar_clave">Guardar</a></div>
										</div>
									</div>
								</article>
						<!--Fin Artículos de una cabecera-->
					</section>
				</article>
			<!--Ayuda-->
				<article class="art_gen" id="art_7" tag="ayuda">
					<h3>Ayuda</h3>
					<section class="dentro_art">
						<!--Artículos de una cabecera-->
							<!--Ayuda general-->
								<article class="bloque w3-col m6 l6">
								<div class="w3-container w3-gray"><h4 class="">Ayuda general</h4></div>
									<div class="tabla_gen">
										<div class="fil">
											<div class="cam">Descargue nuestros PDFs para poder saber todas las informaciones.</div>
										</div>
										<div class="fil">
											<div class="cam">Entre en <a href="https://www.cpwonline.com.ve/informacion/" target="_blank">CPW Online > Informaciones</a></div>
										</div>
										<div class="fil">
											<div class="cam">O comun&iacute;quese con nosotros a trav&eacute;s de nuestras redes sociales.</div>
										</div>
									</div>
								</article>
						<!--Fin Artículos de una cabecera-->
					</section>
				</article>
			<!--Acerca de-->
				<article class="art_gen" id="art_8" tag="acercade">
					<h3>Acerca de</h3>
					<section class="dentro_art">
						<!--Artículos de una cabecera-->
							<!--Acerca de-->
								<article class="bloque w3-col m6 l6">
								<div class="w3-container w3-gray"><h4 class="">¡Somos CPW Online&excl;</h4></div>
									<div class="tabla_gen">
										<div class="fil">
											<div class="cam">Descargue nuestros PDFs para poder saber todas las informaciones.</div>
										</div>
										<div class="fil">
											<div class="cam">Entre en <a href="https://www.cpwonline.com.ve/informacion/#acercade" target="_blank">CPW Online > Informaciones</a>.</div>
										</div>
									</div>
								</article>
						<!--Fin Artículos de una cabecera-->
					</section>
				</article>
		</section>
	<!--Pie-->
		<footer class="pie">
			<!--
			//Tabla general
			<div class="dentro_bloque">
				<div class="fil pr">
					<div class="cam">jun</div>
					<div class="cam">jun1</div>
					<div class="cam">jun2</div>
				</div>
				<div class="fil">
					<div class="cam">dam</div>
					<div class="cam">dam1</div>
					<div class="cam">dam2</div>
				</div>
				<div class="fil">
					<div class="cam">ada</div>
					<div class="cam">ada1</div>
					<div class="cam">ada2</div>
				</div>
			</div>
			-->

			<!--
				<article class="bloque w3-col m6 l6">
					<div class="w3-container w3-gray"><h4>A&ntilde;ade un art&iacute;culo</h4></div>
				</article>
				<article class="bloque w3-col m12 l12">
					<div class="w3-container w3-gray"><h4 class="">Titulo</h4></div>
					<div class="tabla_gen">
						<div class="fil">
							<div class="cam">
								<a class="w3-btn w3-deep-orange" id="guarda_art">Boton</a>
							</div>
						</div>
					</div>
				</article>
				<article class="bloque w3-col m12 l12">
					<div class="w3-display-container w3-gray">
						<h4>Mis art&iacute;culos</h4>
						<i class="w3-padding-large w3-display-right img_col actualizar neg boton" tag="articulos"></i>
					</div>
				</article>
			-->
		</footer>
		<!--Añadimos archivos finales-->
			<?php
				//Modales
					$dir = "modales.php";
					$dir = calcDimension($dir, $dimension);
					include_once($dir);	
				//Script de estadísticas
					$dir = "js/frappe-charts.min.js";
					$dir = calcDimension($dir, $dimension);
					$dir2 = "js/func-st.js";
					$dir2 = calcDimension($dir2, $dimension);
					echo '
						<script src="'.$dir.'"></script>
						<script src="'.$dir2.'"></script>
					';
			?>	
		<!--Fin añadimos archivos finales-->
	<?php
		}
	?>
	</body>
</html>