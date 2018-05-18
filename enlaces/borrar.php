<?php
	require_once('../mysqli_db.php');
	function delTree($dir){
		$files = array_diff(scandir($dir), array('.','..'));
		foreach($files as $file){
			(is_dir("$dir/$file"))? delTree("$dir/$file") : unlink("$dir/$file");
		}
		return rmdir($dir);
	}
echo $_POST['tipo'];
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
								//Comprobar que no hayan más submenús
									$con1 = $mysqli->query("SELECT s_id FROM submenus WHERE s_menu = '".$m_m[1]."' ");
									if($con1->num_rows===0){
										$con1 = $mysqli->query("UPDATE menus SET m_sub = 0 WHERE menus.m_titulo = '".$m_m[1]."'");
										if($con1)
											echo "El submen&uacute; ha sido borrado con &eacute;xito.";
										else
											echo "Ha habido un error al borrar (Registro: Submen&uacute;s del men&uacute;).";
									}else
										echo "El submen&uacute; ha sido borrado con &eacute;xito.";
							}else
								echo "Ha habido un error al borrar (Registro: Submen&uacute;s).";
					}
		break;
		case 'articulos': 
			$a_id = $_POST['a_id'];
			//Borrado de la imagen
			$con = $mysqli->query("DELETE FROM aticulos WHERE a_id = '".$a_id."' ");
			if($con)
				echo "El art&iacute;culo ha sido borrado con &eacute;xito.";
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
	}
?>