<?php
	$dat = 1;
	if($dat){
		// Remote connection
			$mysqli = new mysqli('localhost', 'test', 'test', 'test');
			if($mysqli->connect_errno){
				echo "\n Fallo al conectar a la base de datos (Server).\n";
				echo "\n".$mysqli->connect_errno."\n";
				exit; 
			}
	}else{
		// Local connection
			$mysqli = new mysqli('127.0.0.1', 'user1', 'user1', 'test1');
			if($mysqli->connect_errno){
				echo "\n Fallo al conectar a la base de datos (Local).\n";
				echo "\n".$mysqli->connect_errno."\n";
				exit;
			}
	}
?>
