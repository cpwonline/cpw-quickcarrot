
<?php
	require_once('../mysqli_db.php');
	session_start();
	switch($_POST['tipo']){
		case 'menus': 
			$m_m = explode("-", $_POST['m_m']);
			$m_titulo = $_POST['m_titulo'];
			$m_posicion = $_POST['m_posicion'];
			$m_url1 = "../../m/".$m_titulo."/";
			$m_url2= "../../m/".$m_titulo."/p/";
			$m_url3 = $m_url2."datos_ind.php";

			$dir1 = "../../m/".$m_m[1]."/";
			$dir2 = $dir1."p/datos_ind.php";

			if(!rename($dir1, $m_url1)){
				echo "Fallo al editar (Renombrado) | <span>CPW Online</span>";
			}else{
				$con = $mysqli->query("UPDATE menus SET m_titulo = '".$m_titulo."', m_posicion = '".$m_posicion."', m_url = '".$m_url1."' WHERE menus.m_id = '".$m_m[0]."'");
				if($con){
					//Creado del archivo de información
						$FP = FOPEN($m_url3, "w");
						FPUTS($FP, $m_titulo);
						FCLOSE($FP);
					echo 'Edici&oacute;n realizada correctamente.';
				}else
					echo "Fallo al editar (Registro) | <span>CPW Online</span>";
				break;
			}

	}
?>