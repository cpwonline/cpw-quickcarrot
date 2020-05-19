<?php
	// Inserciones
	
		require_once('dbConnection.php');
		session_start();
		if(!isset($_SESSION['auUser'])){
			exit;
		}else if($_SESSION['auLevel'] > 2){
			echo "Usted no tiene permisos para realizar esta operaci&oacute;n";
			exit;
		}
		switch($_POST['type']){
			case 'phoneLine':
				// Variables
					$plNumber = $_POST['plNumber'];
					$plPlace = $_POST['plPlace'];
					$plPort = $_POST['plPort'];
				// Consulta SQL
					$con = $mysqli->query("INSERT INTO phoneLine (plNumber, plPlace, plPort, plFreg) VALUES ('$plNumber', '$plPlace', '$plPort', NOW())");
				//Verificamos el resultado de la consulta
					if($con){
						echo "La informaci&oacute;n se ha guardado correctamente";
					}else{
						echo "Fallo al guardar".$mysqli->error;
					}
				break;
			case 'client':
				// Variables
					$affClient =  $_POST['affClient'];
					$affIdentity =  $_POST['affIdentity'];
					$affIdentityType =  $_POST['affIdentityType'];
					$affPaymentMade = $_POST['affPaymentMade'];
					$affAccountType = $_POST['affAccountType'];
					$affPlan = $_POST['affPlan'];
					$affPlanPrice = $_POST['affPlanPrice'];
					$affInternetType = $_POST['affInternetType'];
					$affInstallation = $_POST['affInstallation'];
				// Consulta SQL
					$con = $mysqli->query("INSERT INTO affiliation (affClient, affIdentity, affIdentityType, affPaymentMade, affAccountType, affPlan, affPlanPrice, affInternetType, affInstallation, affFreg) VALUES ('$affClient', '$affIdentity', '$affIdentityType', '$affPaymentMade', '$affAccountType', '$affPlan', '$affPlanPrice', '$affInternetType', '$affInstallation', NOW())");
				//Verificamos el resultado de la consulta
					if($con){
						echo "La informaci&oacute;n se ha guardado correctamente";
					}else{
						echo "Fallo al guardar ";
					}
				break;
			case 'note':
				// Variables
					$noteClientID =  $_POST['noteClientID'];
					$noteStatus =  $_POST['noteStatus'];
					$noteState =  $_POST['noteState'];
					$noteDescription =  $_POST['noteDescription'];
					$noteUser =  $_SESSION['auUser'];
				// Consulta SQL
					$con = $mysqli->query("INSERT INTO notes (noteClientID, noteStatus, noteState, noteDescription, noteUser, noteFreg) VALUES ('$noteClientID', '$noteStatus', '$noteState', '$noteDescription', '$noteUser' ,NOW())");
				//Verificamos el resultado de la consulta
					if($con){
						echo "La informaci&oacute;n se ha guardado correctamente";
					}else{
						echo "Fallo al guardar";
					}
				break;
			case 'request':
				// Variables
					$reSubject =  $_POST['reSubject'];
					$reType =  $_POST['reType'];
					$reStatus =  $_POST['reStatus'];
					$reDescription =  $_POST['reDescription'];
					$reUser =  $_SESSION['auUser'];
				// Consulta SQL
					$con = $mysqli->query("INSERT INTO requests (reSubject, reType, reStatus, reUser, reDescription, reFreg) VALUES ('$reSubject', '$reType', '$reStatus', '$reUser', '$reDescription', NOW())");
				//Verificamos el resultado de la consulta
					if($con){
						echo "La informaci&oacute;n se ha guardado correctamente";
					}else{
						echo "Fallo al guardar";
					}
				break;
		}
?>
