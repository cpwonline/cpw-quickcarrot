<?php
	// Borrado
	
		require_once('dbConnection.php');
		session_start();
		if(!isset($_SESSION['auUser'])){
			exit;
		}else if($_SESSION['auLevel'] > 0){
			echo "Usted no tiene permisos para realizar esta operaci&oacute;n.";
			exit;
		}
		switch($_POST['type']){
			case 'phoneLine':
				// Variables
					$plID = $_POST['plID'];
				// Consulta SQL
					$con = $mysqli->query("DELETE FROM phoneLine WHERE plID = '".$plID."'");
				//Verificamos el resultado de la consulta
					if($con){
						echo "Eliminado correctamente.";
					}else{
						echo "Fallo al eliminar";
					}
				break;
			case 'client':
				// Variables
					$affID = $_POST['id'];
				// Consulta SQL
					$con = $mysqli->query("DELETE FROM affiliation WHERE affID = '".$affID."'");
				//Verificamos el resultado de la consulta
					if($con){
						echo "Eliminado correctamente.";
					}else{
						echo "Fallo al eliminar";
					}
				break;
			case 'request':
				// Variables
					$reID = $_POST['id'];
				// Consulta SQL
					$con = $mysqli->query("DELETE FROM requests WHERE reID = '$reID'");
				//Verificamos el resultado de la consulta
					if($con){
						echo "Eliminado correctamente.";
					}else{
						echo "Fallo al eliminar";
					}
				break;
		}
?>
