
<?php
	require_once('../mysqli_db.php');
	session_start();
	switch($_POST['tipo']){
		case 'menus': 
			//Datos nuevos
				$m_m = explode("-", $_POST['m_m']);
				$m_titulo = $_POST['m_titulo'];
				$m_posicion = $_POST['m_posicion'];
				$m_url = "m/".$m_titulo."/";
				$m_url1 = "../../".$m_url;
				$m_url2= "../../m/".$m_titulo."/p/";
				$m_url3 = $m_url2."datos_ind.php";
			//Datos viejos
				$dir1 = "../../m/".$m_m[1]."/";
			//Consulta para śaber si ya se ha registrado
				$con_r = $mysqli->query("SELECT m_id FROM menus WHERE m_titulo = '".$m_titulo."' ");

			if($con_r->num_rows !=0){
				echo "Este nombre ya est&aacute; registrado y pertenece a un men&uacute; | <span>CPW Online</span>";
			}elseif(empty($m_titulo) || empty($m_posicion)){
				echo "No deben haber campos vac&iacute;os | <span>CPW Online</span>";
			}elseif(!rename($dir1, $m_url1)){
				echo "Fallo al editar (Renombrado) | <span>CPW Online</span>";
			}else{
				//Modificado en el menú
					$con = $mysqli->query("UPDATE menus SET m_titulo = '".$m_titulo."', m_posicion = '".$m_posicion."', m_url = '".$m_url."' WHERE menus.m_id = '".$m_m[0]."'");
				if($con){
					//Creado del archivo de información
						$FP = FOPEN($m_url3, "w");
						FPUTS($FP, $m_titulo);
						FCLOSE($FP);
					//Modificado en los submenús
						//Consultamos los submenus
							$con_t =  $mysqli->query("SELECT s_titulo FROM menus WHERE menus.m_id = '".$m_m[0]."'");
						//Vemos si hay 
							if($con_t !== 0){
								//Si hay 
									$con2 = $mysqli->query("UPDATE submenus SET s_menu='".$m_titulo."' WHERE submenus.s_menu = '".$m_m[1]."'");
									if($con2)
										echo 'Edici&oacute;n realizada correctamente.';
									else
										echo "Fallo al editar (Registro:Submen&uacute;) | <span>CPW Online</span>";
							}else{
								echo 'Edici&oacute;n realizada correctamente.';
							}
				}else
					echo "Fallo al editar (Registro:Men&uacute;) | <span>CPW Online</span>";
			}
			break;
		case 'submenus':
			//Datos nuevos
				$s_m = explode("-", $_POST['s_m']);
				$s_titulo = $_POST['s_titulo'];
				$s_posicion = $_POST['s_posicion'];

				$s_url = "m/".$s_m[1]."/".$s_titulo."/";
				$s_url1 = "../../".$s_url;
				$s_url2= $s_url1;
				$s_url3 = $s_url2."datos_ind.php";
			//Datos viejos
				$dir1 = "../../m/".$s_m[1]."/".$s_m[2]."/";
			//Consulta para śaber si ya se ha registrado
				$con_r = $mysqli->query("SELECT s_id FROM submenus WHERE s_titulo = '".$s_titulo."' ");

			if($con_r->num_rows != 0){
				echo "Este nombre ya est&aacute; registrado y pertenece a un submen&uacute; | <span>CPW Online</span>";
			}elseif(empty($s_titulo) || empty($s_posicion)){
				echo "No deben haber campos vac&iacute;os | <span>CPW Online</span>";
			}elseif(!rename($dir1, $s_url1)){
				echo "Fallo al editar (Renombrado) | <span>CPW Online</span>";
			}else{
				//Modificado en el submenú
					$con = $mysqli->query("UPDATE submenus SET s_titulo = '".$s_titulo."', s_posicion = '".$s_posicion."' WHERE submenus.s_id = '".$s_m[0]."'");
				if($con){
					//Creado del archivo de información
						$FP = FOPEN($s_url3, "w");
						FPUTS($FP, $s_titulo);
						FCLOSE($FP);

						echo 'Edici&oacute;n realizada correctamente.';
				}else
					echo "Fallo al editar (Registro:Men&uacute;) | <span>CPW Online</span>";
			}
			break;
		case "articulos":
			$e_a_id= $_POST['e_a_id'];
			$e_a_titulo = $_POST['e_a_titulo'];
			switch($_POST['tipo2']){
				case "titulo":
					if(empty($e_a_titulo)){
						echo "No deben haber campos vac&iacute;os | <span>CPW Online</span>";
					}else{
						//Modificado del título del artículo
							$con = $mysqli->query("UPDATE articulos SET a_titulo = '".$e_a_titulo."' WHERE articulos.a_id = '".$e_a_id."'");
						if($con){
								echo 'Edici&oacute;n realizada correctamente.';
						}else
							echo "Fallo al editar (Registro:Men&uacute;) | <span>CPW Online</span>";
					}
					break;
				case "des_c":
					break;
				case "contenido":
					break;
				case "imagen":
					break;
			}
			break;

	}
?>