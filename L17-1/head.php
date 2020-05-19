<?php
	function head(){
?>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="shorcuticon" href="../../../images/shorcut_icon.png"/>
		
		<!--Links de CSS-->
			<link rel="stylesheet" href="../../../css/estilo-gen.css"/>
		<!--Links de JS-->
			<script src="../../../js/jquery-3.0.0.min.js"/></script>
			<script src="../../../js/func-gen.js"/></script>
<?php
	}
	function informaciones($especial){
		$con = $mysqli->query("SELECT * FROM informaciones WHERE i_especial = '".$especial."' ORDER BY i_posicion ASC, i_freg DESC");
		if($con->num_rows === 0){
			echo 'Bienvenido. Esta p&aacute;gina est&aacute; vac&iacute;a';
			exit;
		}
		while($r = $con->fetch_array()){
			$i_id = $r['i_id'];
			$i_titulo = $r['i_titulo'];
			$i_titulo_letra = $r['i_titulo_letra'];
			$i_contenido = $r['i_contenido'];
			$i_contenido_fondo = $r['i_contenido_fondo'];
			$i_contenido_borde = $r['i_contenido_borde'];
			$i_contenido_letra = $r['i_contenido_letra'];
			$i_posicion = $r['i_posicion'];
			$i_disegno = $r['i_disegno'];
			$i_usuario = $r['i_usuario'];
			$i_freg = $r['i_freg'];
			
			switch($i_disegno){
					case "1":
						echo "<h3 tag='1'>Contenido centrado</h3>";
						break;
					case "2":
						echo "<h2 tag='2'>T&iacute;tulo arriba</h2><h3 tag='2'>Contenido debajo</h3>";
						break;
					case "3":
						echo "<h3 tag='3'>Contenido izquierda</h3><a tag='3' class='btn-gen'>Contactar</a>";
						break;
					case "4":
						echo "<h3 tag='4'>Contenido arriba</h3><a tag='4' class='btn-gen'>Contactar</a>";
						break;
					case "5":
						echo "<h2 tag='5'>T&iacute;tulo izquierda</h2><div tag='5' class='line'></div><h3 tag='5'>Contenido derecha</h3>";
						break;
					case "6":
						echo "<h3 tag='6'>Contenido izquierda</h3><div tag='6' class='line'></div><h2 tag='6'>T&iacute;tulo derecha</h2>";
						break;
			}
		}
	}
?>