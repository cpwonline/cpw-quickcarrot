<?php
	function head($dimension){
?>
		<!--Etiquetas META-->
			<meta name="charset" content="utf-8"/>
			<meta name="author" content="CPW Online"/>
			<meta name="copyright" content="CPW Online"/>
			<meta name="viewport" content="width=device-width, initial-scale=1"/>
			<meta name="description" content=
				"Sistema de control de contenidos (CMS) QuickCarrot."
			/>
			<meta name="keywords" content="p&aacute;ginas web, servidores, hosting, emprender, website, dominio, empresas"/>
			<!--Color en Chrome, Firefox y Opera-->
				<meta name="theme-color" content="#006699"/>
			<!--Color en Windows Phone-->
				<meta name="msapplication-navbutton-color" content="#006699"/>
			<!--Color en iOS y Safari-->
				<meta name="apple-mobile-web-app-capable" content="yes"/>
				<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
<?php
		$dir ="";
		$dir = calcDimension($dir, $dimension);
?>
		<!--Links de CSS-->
			<link rel="stylesheet" href="<?=$dir?>css/estilo-mod.css"/>
			<link rel="stylesheet" href="<?=$dir?>css/estilo-gen.css"/>
			<link rel="stylesheet" href="<?=$dir?>css/estilo-mi_info.css"/>
			<link rel="stylesheet" href="<?=$dir?>starFly/css/estilo-gen.css"/>
		<!--Links de JS-->
			<script src="<?=$dir?>js/jquery-3.0.0.min.js"></script>
			<script src="<?=$dir?>js/func-gen.js"></script>
			<script src="<?=$dir?>js/func-ope.js"></script>
			<script src="<?=$dir?>js/func-inf.js"></script>
			<script src="<?=$dir?>js/func-images.js"></script>
			<script src="<?=$dir?>vendor/ckeditor/ckeditor.js"/></script>
			<script src="<?=$dir?>js/ck-editor.js"/></script>
			<script src="<?=$dir?>js/main.js"/></script>
			<script src="<?=$dir?>starFly/js/func-gen.js"/></script>

<?php
	}
?>