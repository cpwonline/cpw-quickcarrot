<?php
	$dat = 0;
	if($dat){
		/*Conexión a la base de datos de de la página*/
			$mysqli = new mysqli('142.44.139.35', 'cpwonlin_general', 'Juniorydamaglys2', 'cpwonlin_general');
			if($mysqli->connect_errno){
				echo "\n Fallo al conectar a la base de datos.\n";
				echo "\n".$mysqli->connect_errno."\n";
				exit; 
			}
	}else{
		/*Conexión a la base de datos local*/
			$mysqli = new mysqli('localhost', 'josefelixrc', '26552160', 'web_general');
			if($mysqli->connect_errno){
				echo "\n Fallo al conectar a la base de datos.\n";
				echo "\n".$mysqli->connect_errno."\n";
				exit;
			}
	}
?>
