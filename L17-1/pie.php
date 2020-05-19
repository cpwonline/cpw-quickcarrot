<div class="cab_footer">
	<?php 
		//Ver el nombre de la web y datos
			$cx = FOPEN("datos_ind.php", "r");$pagina = FGETS($cx);FCLOSE($cx);
			cab($pagina);
	?>
</div>
<div class="copy">
	<span>&copy; <?=date('Y')?> Todos los derechos reservados | <strong>CPW Online</strong></span>
</div>