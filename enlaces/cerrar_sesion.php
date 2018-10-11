<?php
	session_start();
	if($_POST['tipo']=="admin"){
		if(empty($_SESSION['u_nombre']))
			echo 'La sesi&oacute;n ya ha sido cerrada.';
		else{
			session_destroy();
			echo '7correcto';
		}
	}else{
		echo "Disculpe, ha ocurrido un error.";
	}
?>