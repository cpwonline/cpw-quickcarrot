<?php
	function cab($prin){
		include('mysqli_db.php');
		//Llamada para el despliegue de menús
			$con = $mysqli->query("SELECT * FROM menus ORDER BY m_posicion ASC, m_freg DESC");
			if($con->num_rows === 0)
				exit;
			while($fil = $con->fetch_array()){
				$m_titulo = $fil['m_titulo'];
				$m_url = $fil['m_url'];
				$m_sub = $fil['m_sub'];
				$tab[$m_titulo] = $m_titulo;
				$tab2[$m_titulo] = $m_sub;
			}
			foreach($tab as $i => $elemento){
				if($elemento==$prin){
					$p = true;
					comprobar_sub($i, $p, $tab2, $elemento);
				}else{
					$p = false;
					comprobar_sub($i, $p, $tab2, $elemento);
				}
			}
	}
	function comprobar_sub($i, $p, $tab2, $elemento){
		include('mysqli_db.php');
		//Es principal o no
			if($p)
				$clase = "menus prin";
			else
				$clase = "menus";
		//Comprobar si tiene submenús el menú
			if($tab2[$i]){
				$con = $mysqli->query("SELECT * FROM submenus WHERE s_menu = '".$i."' ORDER BY s_posicion ASC, s_freg DESC");
				if($con->num_rows !== 0){
					echo '<li class="'.$clase.'" tag="'.$i.'">'.$elemento.'<div class="sub" tag="'.$i.'">';
					while($fil = $con->fetch_array()){
						$s_titulo = $fil['s_titulo'];
						$s_menu = $fil['s_menu'];
						echo '<div class="li"><a  class="sub" href="../../../m/'.$s_menu.'/'.$s_titulo.'/">'.$s_titulo.'</a></div>';
					}
					echo '</div></li>';
				}
			}else{
				$dir = "../../".$i."/p/";
				echo '<li class="'.$clase.'"><a class="menus" href="'.$dir.'">'.$elemento.'</a></li>';
			}
	}
?>
