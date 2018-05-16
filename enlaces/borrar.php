<?php
	require_once('../mysqli_db.php');
	function delTree($dir){
		$files = array_diff(scandir($dir), array('.','..'));
		foreach($files as $file){
			(is_dir("$dir/$file"))? delTree("$dir/$file") : unlink("$dir/$file");
		}
		return rmdir($dir);
	}
	switch($_POST['tipo']){
		case 'menus': 
			$m_m = explode("-", $_POST['m_m']);
			//Condiciones
				$dir = "../../m/".$m_m[1];
				//Borrar archivos
					if(!delTree($dir)){
						echo "Ha habido un error al borrar (&Aacute;rbol de archivos).";
					}else{
						//Borrar registros del menú
							$con = $mysqli->query("DELETE FROM menus WHERE m_id = '".$m_m[0]."' ");
							if($con){
								//Borrar registros del submenú
									$con1 = $mysqli->query("DELETE FROM submenus WHERE s_menu = '".$m_m[1]."' ");
									if($con1)
										echo "El men&uacute; ha sido borrado con &eacute;xito.";
									else
										echo "Ha habido un error al borrar (Registro: Submen&uacute;s).";
							}else
								echo "Ha habido un error al borrar (Registro: Men&uacute;s).";
					}
		break;
		case 'submenus': 
			$m_m = explode("-", $_POST['m_m']);
			//Condiciones
				$dir = "../../m/".$m_m[1]."/".$m_m[2];
				//Borrar archivos
					if(!delTree($dir)){
						echo "Ha habido un error al borrar (&Aacute;rbol de archivos).";
					}else{
						//Borrar registros del submenú
							$con = $mysqli->query("DELETE FROM submenus WHERE s_id = '".$m_m[0]."' ");
							if($con){
								echo "El submen&uacute; ha sido borrado con &eacute;xito.";
							}else
								echo "Ha habido un error al borrar (Registro: Submen&uacute;s).";
					}
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