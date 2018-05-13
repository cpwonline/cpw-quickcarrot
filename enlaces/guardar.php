<?php
	require_once('../mysqli_db.php');
	session_start();
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
				$con_filas = $mysqli->query("SELECT s_id FROM submenus");
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
					$con = $mysqli->query("INSERT INTO submenus (s_titulo, s_posicion, s_usuario, s_menu, s_url, s_freg) VALUES ('".$s_titulo."', '".$s_posicion."', '".$s_usuario."', '".$s_menu."', '".$s_url."', NOW())");
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
			$a_titulo = $_POST['a_titulo'];
			$a_contenido = $_POST['a_contenido'];
			if($a_titulo == "" || $a_contenido ==""){
				echo "No deben haber campos vac&iacute;os";
				exit;
			}
			$a_usuario = $_SESSION['u_nombre'];
			$con = $mysqli->query("INSERT INTO articulos (a_titulo, a_contenido, a_usuario, a_freg) VALUES ('".$a_titulo."', '".$a_contenido."', '".$a_usuario."', NOW())");
			if($con){
				echo "El art&iacute;culo se ha guardado correctamente | <span>CPW Online</span>";
			}else{
				echo "Fallo al guardar | <span>CPW Online</span>";
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