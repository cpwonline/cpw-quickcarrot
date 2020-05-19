<?php
	// Modificaciones
	
		require_once('dbConnection.php');
		session_start();
		if(!isset($_SESSION['auUser'])){
			exit;
		}else if($_SESSION['auLevel'] > 1){
			echo "Usted no tiene permisos para realizar esta operaci&oacute;n.";
			exit;
		}
		switch($_POST['type']){
			case 'phoneLine':
				// Variables
					$plID = $_POST['plID'];
					$plNumber = $_POST['plNumber'];
					$plPlace = $_POST['plPlace'];
					$plPort = $_POST['plPort'];
				// Consulta SQL
					$con = $mysqli->query("UPDATE phoneLine SET plNumber = '".$plNumber."', plPlace = '".$plPlace."', plPort = '".$plPort."'WHERE plID = '".$plID."' ");
				//Verificamos el resultado de la consulta
					if($con){
						echo "La informaci&oacute;n se ha actualizado correctamente";
					}else{
						echo "Fallo al actualizar";
					}
				break;
			case 'client':
				// Variables
					$affID =  $_POST['affID'];
					$affClient =  $_POST['affClient'];
					$affIdentity =  $_POST['affIdentity'];
					$affIdentityType =  $_POST['affIdentityType'];
					$affPaymentMade = $_POST['affPaymentMade'];
					$affAccountType = $_POST['affAccountType'];
					$affPlan = $_POST['affPlan'];
					$affPlanPrice = $_POST['affPlanPrice'];
					$affCoin = $_POST['affCoin'];
					$affInternetType = $_POST['affInternetType'];
					$affInstallation = $_POST['affInstallation'];
				// Consulta SQL
					$con = $mysqli->query("UPDATE affiliation SET affClient = '$affClient', affIdentity = '$affIdentity', affIdentityType = '$affIdentityType', affPaymentMade = '$affPaymentMade', affAccountType = '$affAccountType', affPlan = '$affPlan', affPlanPrice = '$affPlanPrice', affCoin = '$affCoin',affInternetType = '$affInternetType', affInstallation = '$affInstallation' WHERE affID = '$affID'");
				//Verificamos el resultado de la consulta
					if($con){
						echo "La informaci&oacute;n se ha actualizado correctamente";
					}else{
						echo "Fallo al actualizar";
					}
				break;
			case 'request':
				// Variables
					$reID =  $_POST['reID'];
					$reSubject =  $_POST['reSubject'];
					$reType =  $_POST['reType'];
					$reStatus =  $_POST['reStatus'];
					$reDescription =  $_POST['reDescription'];
				// Consulta SQL
					$con = $mysqli->query("UPDATE requests SET reSubject = '$reSubject', reType = '$reType', reStatus = '$reStatus', reDescription = '$reDescription' WHERE reID = '$reID'");
				//Verificamos el resultado de la consulta
					if($con){
						echo "La informaci&oacute;n se ha actualizado correctamente";
					}else{
						echo "Fallo al actualizar";
					}
				break;
		}
?>
