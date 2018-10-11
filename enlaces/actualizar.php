
<?php
	require_once('../mysqli_db.php');
	session_start();
	switch($_POST['tipo']){
		case 'submenus': 
			$i_menu = $_POST['i_menu'];
			$con = $mysqli->query("SELECT s_titulo FROM submenus WHERE s_menu = '".$i_menu."' ");
			if($con->num_rows === 0)
				echo "<option value='m/".$i_menu."/p/'>Principal</option>";
			while($ro = $con->fetch_assoc()){
				$s_titulo = $ro['s_titulo'];
				echo "<option value='".$i_menu."/".$s_titulo."'>".$s_titulo."</option>";
			}
			break;
		case 'select_menus_sub':
				$con = $mysqli->query("SELECT m_titulo FROM menus ORDER BY m_freg DESC");
				if($con->num_rows === 0){
					echo "<div class='uni'><option>No hay resultados.</option></div>";
				}
				while($ro = $con->fetch_assoc()){
					$m_titulo = $ro['m_titulo'];
			?>
						<option value="<?=$m_titulo?>"><?=$m_titulo?></option>
			<?php
				}
			break;
	}
?>