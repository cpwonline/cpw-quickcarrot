<?php
	require_once('../mysqli_db.php');
	session_start();
	$u_nombre = palabraSegura($_POST['u_nombre']);
	$u_clave = palabraSegura($_POST['u_clave']);
	$contador = $_POST['contador'];
	$con = $mysqli->query("SELECT * FROM usuarios WHERE u_nombre = '".$u_nombre."' AND u_clave = '".$u_clave."' LIMIT 1");
	
	if($con->num_rows === 0){
		echo "Usuario o clave incorrectos. ";
		if($contador>9){
			$con2 = $mysqli->query("UPDATE usuarios SET u_estado = 'Bloqueado' WHERE u_nombre = '".$u_nombre."' ");
			if($con2)
				echo "Usted ha alcanzado el l&iacute;mite de intentos fallidos. ";
			echo "Comun&iacute;quese con los desarrolladores.";
		}
		exit;
	}else{
		$row = $con->fetch_array();
		if($row['u_estado']!="Bloqueado"){
			echo "Bienvenido: ".$u_nombre;
			$_SESSION['u_nombre'] = $row['u_nombre'];
			$_SESSION['u_control'] = $row['u_control'];
			$_SESSION['u_estado'] = $row['u_estado'];
			$_SESSION['u_plan'] = $row['u_plan'];
?>
			<script type="text/javascript">
				window.location.reload();
			</script>
<?php
		}else{
			echo "Disculpe, este usuario est&aacute; bloqueado. Comun&iacute;quese con los desarrolladores.";
		}
	}
?>