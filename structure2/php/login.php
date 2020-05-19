<?php
	// Log In
		require_once('dbConnection.php');
		session_start();
		
		// Variables
			$type = $_POST['type'];
		
		 if($type == 0){
			if(empty($_SESSION['auUser'])){
				echo "noLogIn.";
			}else{
				echo "login";
			}
		}else if($type == 1){
			// Variables
				$auUser = $_POST['auUser'];
				$auPassword = $_POST['auPassword'];
			// Consulta SQL
				$con = $mysqli->query("SELECT * FROM auth WHERE auUser = '".$auUser."' AND auPassword = '".$auPassword."' LIMIT 1");
			//Verificamos el resultado de la consulta
				if($con->num_rows === 0){
					echo "Usuario o clave incorrectos.";
					exit;
				}else{
					$row = $con->fetch_array();
					$_SESSION['auUser'] = $row['auUser'];
					$_SESSION['auID'] = $row['auID'];
					$_SESSION['auLevel'] = $row['auLevel'];
					echo "Iniciando.";
				}
				$con->close();
		}
		
?>
