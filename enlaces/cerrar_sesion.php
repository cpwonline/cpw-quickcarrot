<?php
	session_start();
	if($_POST['tipo']=="admin"){
		if(empty($_SESSION['u_nombre']))
			echo 'La sesi&oacute;n ya ha sido cerrada.';
		else{
			session_destroy();
?>
			<script type="text/javascript">
				window.location.reload();
			</script>
<?php
		}
	}else{
		echo "Disculpe, ha ocurrido un error.";
	}
?>