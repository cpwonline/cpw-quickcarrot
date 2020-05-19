<?php
	require_once('mysqli_db.php');
	include("enviarCorreo.php");
	session_start();
	if(isset($_POST["vares"])){
		$_POST["tipo"] = (explode(",", $_POST["vares"]))[2];
	}
	switch($_POST['tipo']){
		case 'menus': 
			//Datos
				$m_titulo = $_POST['m_titulo'];
				$m_posicion = $_POST['m_posicion'];
				if($m_titulo == "" || $m_posicion ==""){
					echo "No deben haber campos vac&iacute;os";
					exit;
				}
				$m_usuario = $_SESSION['u_nombre'];
				$m_url = "m/".$m_titulo."/p/";
				$dir1 = "../../".$m_url;
				$dir2 = "../../m_s_base.php";
				$dir3 = $dir1."index.php";
			
			//Condiciones para guardar el menú
				$con_menu = $mysqli->query("SELECT m_id FROM menus WHERE m_titulo='".$m_titulo."' LIMIT 1");
				//Si el número de registros es igual a siete
				$con_filas = $mysqli->query("SELECT m_id FROM menus");
				if($con_filas->num_rows==7){
					echo "Usted ha alcanzado el l&iacute;mite de men&uacute;s | <span>CPW Online</span>";
					exit;
				//Si ya existe el nombre del menú
				}elseif($con_menu->num_rows!==0){
					echo "Este nombre de men&uacute; ya est&aacute; registrado | <span>CPW Online</span>";
					exit;
				//Creado de la carpeta
				}elseif(!mkdir($dir1, 0700, true)){
					echo "Fallo al guardar (Carpeta) | <span>CPW Online</span>";
					exit;
				//Copiado del archivo base
				}elseif(!copy($dir2, $dir3)){
					echo "Fallo al guardar (Copiado) | <span>CPW Online</span>";
					exit;
				}else{
					//Guardado en la base de datos
						$con = $mysqli->query("INSERT INTO menus (m_titulo, m_posicion, m_usuario, m_url, m_freg) VALUES ('".$m_titulo."', '".$m_posicion."', '".$m_usuario."', '".$m_url."', NOW())");
						if($con){
							//Creado del archivo de información
								$FP = FOPEN($dir1."datos_ind.php", "w");
								FPUTS($FP, $m_titulo);
								FCLOSE($FP);
							echo "El men&uacute; se ha guardado correctamente | <span>CPW Online</span>";
						}else{
							echo "Fallo al guardar (Registro) | <span>CPW Online</span>";
							exit;
						}
				}
		break;
		case 'sub': 
			//Datos
				$s_titulo = $_POST['s_titulo'];
				$s_posicion = $_POST['s_posicion'];
				$s_menu = $_POST['s_menu'];
				$s_usuario = $_SESSION['u_nombre'];
			
				$s_url = "m/".$s_menu."/".$s_titulo."/";
				$dir1 = "../../".$s_url;
				$dir2 = "../../m_s_base.php";
				$dir3 = $dir1."index.php";
			//Condiciones para guardar el submenú
				//Nombres vacios
				if($s_titulo == "" || $s_posicion =="" || $s_menu == ""){
					echo "No deben haber campos vac&iacute;os";
					exit;
				}
				//Inexistencia de menús
				if($s_menu == "No hay resultados." || empty($s_menu)){
					echo "Deben de haber Men&uacute;s registrados.";
					exit;
				}
				//Si el número de registros es igual a siete
				$con_sub = $mysqli->query("SELECT s_id FROM submenus WHERE s_titulo='".$s_titulo."' LIMIT 1");
				$con_filas = $mysqli->query("SELECT s_id FROM submenus WHERE s_menu ='".$s_menu."' ");
				if($con_filas->num_rows==7){
					echo "Usted a alcanzado el l&iacute;mite de submen&uacute;s | <span>CPW Online</span>";
					exit;
				//Si ya existe el nombre del submenú
				}elseif($con_sub->num_rows!==0){
					echo "Este nombre de submen&uacute; ya est&aacute; registrado | <span>CPW Online</span>";
					exit;
				//Creado de la carpeta
				}elseif(!mkdir($dir1, 0700, true)){
					echo "Fallo al guardar (Carpeta) | <span>CPW Online</span>";
					exit;
				//Copiado del archivo base
				}elseif(!copy($dir2, $dir3)){
					echo "Fallo al guardar (Copiado) | <span>CPW Online</span>";
					exit;
				}else{
					$con = $mysqli->query("INSERT INTO submenus (s_titulo, s_posicion, s_usuario, s_menu, s_freg) VALUES ('".$s_titulo."', '".$s_posicion."', '".$s_usuario."', '".$s_menu."', NOW())");
					$con2 = $mysqli->query("UPDATE menus SET m_sub = '1' WHERE m_titulo = '".$s_menu."'");//Indicación al menú de que hay sub
					if($con && $con2){
						//Creado del archivo de información
							$FP = FOPEN($dir1."datos_ind.php", "w");
							FPUTS($FP, $s_titulo);
							FCLOSE($FP);
						echo "El submen&uacute; se ha guardado correctamente | <span>CPW Online</span>";
					}else{
						echo "Fallo al guardar | <span>CPW Online</span>";
					}
				}
		break;
		case 'articulo':
			if(isset($_POST["vares"])){
				$tipo2 = (explode(",", $_POST["vares"]))[3];
			}else{
				$tipo2 = "";
			}
			switch($tipo2){
				case "imagen": 
					//Datos recibidos
						$id = (explode(",", $_POST["vares"]))[0];
						$titulo = (explode(",", $_POST["vares"]))[1];
						$imagen = $_FILES['archivo'];
					//Realizamos operaciones con variables
						$url =  '../../articulos/img/'.$_SESSION['u_nombre']."/";
						$nombre_imagen = $id."_".$imagen['name'];
						$nombre_completo = $url.$nombre_imagen;
					//Empezamos el copiado
						if(!is_dir($url))
							mkdir($url, 0777, true);
						if(copy($imagen['tmp_name'], $nombre_completo)){
							$con = $mysqli->query("UPDATE articulos SET a_imagen = '".$nombre_completo."' WHERE a_id='".$id."' ");
							if($con){
								echo "Guardado correctamente.";
							}else{
								echo "Hubo un error al guardar (Registro).";
							}
						}else{
							echo "Hubo un error al guardar (Copiado).";
						}
					break;
				default:
					$a_titulo = $_POST['a_titulo'];
					$a_des_c = $_POST['a_des_c'];
					$a_contenido = $_POST['a_contenido'];
					if($a_titulo == "" || $a_contenido ==""){
						echo "No deben haber campos vac&iacute;os";
						exit;
					}
					$a_usuario = $_SESSION['u_nombre'];
					$con = $mysqli->query("INSERT INTO articulos (a_titulo, a_des_c,a_contenido, a_usuario, a_freg) VALUES ('".$a_titulo."', '".$a_des_c."','".$a_contenido."', '".$a_usuario."', NOW())");
					if($con){
						echo "El art&iacute;culo se ha guardado correctamente | <span>CPW Online</span>";
					}else{
						echo "Fallo al guardar | <span>CPW Online</span>";
					}
					break;
			}
		break;
		case "diagnostico":
			$d_titulo = $_POST['d_titulo'];
			$d_estado = $_POST['d_estado'];
			$d_cont = $_POST['d_cont'];
			if($d_titulo == "" || $d_cont == ""){
				echo "No deben haber campos vac&iacute;os";
				exit;
			}
			$d_usuario = $_SESSION['u_nombre'];

			//$con = $mysqli->query("INSERT INTO diagnosticos (d_titulo, d_estado, d_cont, d_usuario, d_freg) VALUES ('".$d_titulo."', '".$d_estado."','".$d_cont."', '".$d_usuario."', NOW())");
			//if($con){
			if(1){
				//Enviar un correo
					$mensaje = "
						Se ha detectado un error en: ".$_SERVER["SERVER_ADDR"]." <br>
						Estado: ".$d_estado."<br>
						Mensaje del usuario:<br>
						".$d_cont."
					";
					$asunto = $d_titulo. " - Diagn&oacute;stico de errores";
					$para = "juniorrivas185@gmail.com";
					$de = $_SESSION['u_correo'];
					
					$rep1 = new enviarCorreo($mensaje, $asunto, $de, $para);
					//$rep1->enviarM();
					/*if($rep1->enviarM())
						echo "El diagn&oacute;stico se ha enviado correctamente, espere la respuesta de los desarrolladores. | <span>CPW Online</span>";
					else{
						echo "Fallo al enviar (Correo) | <span>CPW Online</span>";
					}*/
			}else{
				echo "Fallo al enviar (Registro) | <span>CPW Online</span>";
			}
			break;
		case 'informacion': 
			$i_menu = $_POST['i_menu'];
			$i_sub = $_POST['i_sub'];
			$i_titulo = $_POST['i_titulo'];
			$i_titulo_letra = $_POST['i_titulo_letra'];
			$i_contenido = $_POST['i_contenido'];
			$i_contenido_fondo = $_POST['i_contenido_fondo'];
			$i_contenido_borde = $_POST['i_contenido_borde'];
			$i_contenido_letra = $_POST['i_contenido_letra'];
			$i_posicion = $_POST['i_posicion'];
			$i_disegno = $_POST['i_disegno'];
			if($i_titulo == "" || $i_contenido ==""){
				echo "No deben haber campos vac&iacute;os";
				exit;
			}
			$i_usuario = $_SESSION['u_nombre'];
			$con = $mysqli->query("INSERT INTO informaciones (i_menu, i_sub, i_titulo, i_titulo_letra, i_contenido, i_contenido_fondo, i_contenido_borde, i_contenido_letra, i_posicion, i_usuario, i_disegno, i_freg) VALUES ('".$i_menu."', '".$i_sub."', '".$i_titulo."', '".$i_titulo_letra."', '".$i_contenido."', '".$i_contenido_fondo."', '".$i_contenido_borde."', '".$i_contenido_letra."', '".$i_posicion."', '".$i_usuario."', '".$i_disegno."', NOW())");
			if($con){
				echo "La informaci&oacute;n se ha guardado correctamente | <span>CPW Online</span>";
			}else{
				echo "Fallo al guardar | <span>CPW Online</span>";
			}
		break;
		case 'ajustes': 
		
		break;
	}
?>