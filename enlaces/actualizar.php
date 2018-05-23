<?php
	require_once('../mysqli_db.php');
	session_start();
	switch($_POST['tipo']){
		case 'submenus': 
			$i_menu = $_POST['i_menu'];
			$con = $mysqli->query("SELECT s_id, s_titulo, s_url FROM submenus WHERE s_menu = '".$i_menu."'");
			if($con->num_rows === 0)
				echo "<option value='m/".$i_menu."/p/'>Principal</option>";
			while($ro = $con->fetch_array()){
				$s_titulo = $ro['s_titulo'];
				$s_url = $ro['s_url'];
				echo "<option value='".$s_url."'>".$s_titulo."</option>";
			}
			break;
		case 'carga_sub':
			$s_url = $_POST['s_url'];
			$dir = "../".$s_url."index.php";
			echo "<object data='".$dir."' width='100%' height='100%' type='text/html' tag='t'></object>";
			break;
	}
?>