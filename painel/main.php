<?php 
	if(isset($_GET['logout'])){
		Painel::logout();
	}
?>

<!DOCTYPE html>
<html>
<head>
		<title>Painel de Controle</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
		<meta name="author" content="Josue Barros">
		<meta name="keywords" content="brinquedos, bonecos, cadernos, sorvete">
		<meta name="description" content="Futuramente será um site de loja de brinquedos infantis">
		<link rel="stylesheet" href="<?php echo INCLUDE_PATH_PAINEL; ?>css/style.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;700&display=swap" rel="stylesheet">
</head>
<body>
<div class="menu">
	<div class="menu-wrapper">
	<div class="box-usuario">
		<?php
			if($_SESSION['img'] == ''){
		?>
		<div class="avatar-usuario">
			<i class="fa fa-user"></i>
		</div>

		<?php }else{ ?>
			<div class="imagem-usuario">
				<img src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $_SESSION['img']; ?>" />
			</div>
		<?php } ?>

		<div class="nome-usuario">
			<p><?php echo $_SESSION['nome'] ?></p>
			<p><?php echo pegaCargo($_SESSION['cargo']); ?></p>
		</div>
		<div class="items-menu">
			<h2>Cadastro</h2>
			<a href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-depoimento">Cadastrar Depoimentos</a>
			<a href="">Cadastrar Serviços</a>
			<a href="">Cadastrar Slides</a>
			<h2>Gestão</h2>
			<a href="">Listar Depoimentos</a>
			<a href="">Listar Serviços</a>
			<a href="">Listar Slides</a>
			<h2>Administração do Painel</h2>
			<a href="">Editar Usuários</a>
			<a href="">Adicionar Usuários</a>
			<h2>Configuração Geral</h2>
			<a href="">Editar</a>
		</div>
	</div>
</div>
</div>
<header>
		<div class="center">
			<div class="menu-btn">
				<i class="fa fa-bars"></i>
			</div>
		<div class="logout">
			<a href="<?php echo INCLUDE_PATH_PAINEL ?>"> <i class="fa fa-home"></i><span>Home</span></a>
			<a href="<?php echo INCLUDE_PATH_PAINEL ?>?logout"> <i class="fa fa-window-close"></i><span>Sair</span></a>
		</div>

		<div class="clear"></div>
</div>
</header>
		<div class="content">

		<?php Painel::carregarPagina(); ?>

		</div>
		<script src="<?php echo INCLUDE_PATH ?>js/jquery.min.js"></script>
		<script src="<?php echo INCLUDE_PATH_PAINEL ?>js/main.js"></script>
</body>
</html>