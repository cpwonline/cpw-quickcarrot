<?php
	session_start();
	if(empty($_SESSION['auUser']))
		echo 'La sesi&oacute;n ya ha sido cerrada.';
	else{
		session_destroy();
	}
?>
