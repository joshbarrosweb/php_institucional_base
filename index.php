<?php include('config.php'); ?>
<?php Site::updateUsuarioOnline(); ?>
<?php Site::contador(); ?>
<?php
	$infoSite = MySql::conectar()->prepare("SELECT * FROM `tb_site.config`");
	$infoSite->execute();
	$infoSite = $infoSite->fetch();
?>

<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $infoSite['titulo']; ?></title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
		<meta name="author" content="Josue Barros">
		<meta name="keywords" content="brinquedos, bonecos, cadernos, sorvete">
		<meta name="description" content="Futuramente será um site de loja de brinquedos infantis">
		<link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>css/style.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;700&display=swap" rel="stylesheet">
	</head>

	<body>
	<base base="<?php echo INCLUDE_PATH; ?>" />

	<?php
		$url = isset($_GET['url']) ? $_GET['url'] : 'home';
		switch ($url){
			case 'depoimentos':
				echo '<target target="depoimentos" />';
				break;

			case 'servicos':
				echo '<target target="servicos" />';
				break;
		}
	?>
		<div class="sucesso">Formulário enviado com sucesso!</div>
		<div class="overlay-loading">
			<img src="<?php echo INCLUDE_PATH ?>img/ajax-loader.gif" />
		</div>

		<header>
			<div class="center">
			<div class="logo left"><a href="#">Logomarca</a></div>
			<nav class="desktop right">
				<ul>
					<li><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
					<li><a href="<?php echo INCLUDE_PATH; ?>depoimentos">Depoimentos</a></li>
					<li><a href="<?php echo INCLUDE_PATH; ?>servicos">Serviços</a></li>
					<li><a realtime="contato" href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>
					<li><a href="<?php echo INCLUDE_PATH; ?>painel">Painel</a></li>
				</ul>
			</nav>

			<nav class="mobile right">
				<div class="botao-menu-mobile">
					<i class="fa fa-bars"></i>
				</div>
				<ul>
					<li><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
					<li><a href="<?php echo INCLUDE_PATH; ?>depoimentos">Depoimentos</a></li>
					<li><a href="<?php echo INCLUDE_PATH; ?>servicos">Serviços</a></li>
					<li><a realtime="contato" href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>
				</ul>
			</nav>
			<div class="clear"></div>
			</div>
		</header>

		<div class="container-principal">
		<?php
		if(file_exists('pages/'.$url.'.php')){
			include('pages/'.$url.'.php');
			}else{
				if($url != 'depoimentos' && $url != 'servicos'){
				$pagina404 = true;
				include('pages/404.php');
				}else{
					include('pages/home.php');
				}
			}
		?>

		</div>

		<footer <?php if(isset($pagina404) && $pagina404 == true) echo 'class="fixed"'; ?>>
			<div class="center">
				<p>Todos os direitos reservados</p>
			</div>
		</footer>

			<script src="<?php echo INCLUDE_PATH; ?>js/jquery.min.js"></script>
			<script src="<?php echo INCLUDE_PATH; ?>js/constants.js"></script>
			<!--<script src="<?php echo INCLUDE_PATH; ?>js/exemplo.js"></script>-->
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjGR2tzQY3-R8WM_VSxvWkwlo4ZiBhWCc&callback=initialize"></script>
			<script src="<?php echo INCLUDE_PATH; ?>js/scriptmap.js"></script>
			<script src="<?php echo INCLUDE_PATH; ?>js/scripts.js"></script>
			<?php
				if($url == 'home' || $url == ''){
			?>
			<script src="<?php echo INCLUDE_PATH; ?>js/slider.js"></script>
			<?php } ?>
			<?php
				if($url == 'contato'){
			?>

			<?php } ?>
			<script src="<?php echo INCLUDE_PATH; ?>js/formularios.js"></script>

	</body>
</html>