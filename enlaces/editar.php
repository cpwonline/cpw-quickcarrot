
<?php
	require_once('../mysqli_db.php');
	session_start();
	switch($_POST['tipo']){
		case 'menus': 
			$m_m = explode("-", $_POST['m_m']);
			$m_titulo = $_POST['m_titulo'];
			$m_posicion = $_POST['m_posicion'];
			$m_url = "m/".$m_titulo."/";
			$m_url1 = "../../".$m_url;
			$m_url2= "../../m/".$m_titulo."/p/";
			$m_url3 = $m_url2."datos_ind.php";

			$dir1 = "../../m/".$m_m[1]."/";
			$dir2 = $dir1."p/datos_ind.php";

			if(!rename($dir1, $m_url1)){
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
				break;
			}

	}
?>