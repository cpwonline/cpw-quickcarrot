<?php
	require_once('../mysqli_db.php');
	switch($_POST['tipo']){
		case 'menus': 
			$m_m = explode("-", $_POST['m_m']);
			echo "El id es: ".$m_m[0];
			echo "<br>El titulo es: ".$m_m[1];
			//Condiciones
				$dir = "../../m/".$m_m[1];
				//Borrar archivos
					unlink($dir."/p/index.php");
					unlink($dir."/p/datos_ind.php");
					rmdir($dir."/p/");
					if(rmdir($dir)){
						$con = $mysqli->query("DELETE FROM menus WHERE m_id = '".$m_m[0]."' ");
						if($con)
							echo "El men&uacute; ha sido borrado con &eacute;xito.";
						else
							echo "Ha habido un error al borrar.";
					}else
						echo "Ha habido un error al borrar (Carpeta).";
		break;
		case 'submenus': 
			$s_id = $_POST['s_id'];
			$con = $mysqli->query("DELETE FROM submenus WHERE s_id = '".$s_id."' ");
			if($con)
				echo "El submen&uacute; ha sido borrado con &eacute;xito.";
			else
				echo "Ha habido un error al borrar.";
		break;
		case 'informacion': 
			$i_id = $_POST['i_id'];
			$con = $mysqli->query("DELETE FROM informaciones WHERE i_id = '".$i_id."' ");
			if($con)
				echo "La informaci&oacute;n ha sido borrado con &eacute;xito.";
			else
				echo "Ha habido un error al borrar.";
		break;
		case 'articulos': 
			$m_id = $_POST['m_id'];
			$con = $mysqli->query("DELETE FROM menus WHERE m_id = '".$m_id."' ");
			if($con)
				echo "El men&uacute; ha sido borrado con &eacute;xito.";
			else
				echo "Ha habido un error al borrar.";
		break;
	}
?>