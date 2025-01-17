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
			<a <?php selecionadoMenu('cadastrar-depoimento'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-depoimento">Cadastrar Depoimentos</a>
			<a <?php selecionadoMenu('cadastrar-servico'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-servico">Cadastrar Serviços</a>
			<a <?php selecionadoMenu('cadastrar-slides'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-slides">Cadastrar Slides</a>
			<h2>Gestão</h2>
			<a <?php selecionadoMenu('listar-depoimento'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>listar-depoimento">Listar Depoimentos</a>
			<a <?php selecionadoMenu('listar-servicos'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>listar-servicos">Listar Serviços</a>
			<a <?php selecionadoMenu('listar-slides'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>listar-slides">Listar Slides</a>
			<h2>Administração do Painel</h2>
			<a <?php selecionadoMenu('editar-usuario'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>editar-usuario">Editar Usuários</a>
			<a <?php selecionadoMenu('adicionar-usuario'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>adicionar-usuario">Adicionar Usuários</a>
			<h2>Configuração Geral</h2>
			<a <?php selecionadoMenu('editar-site'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>editar-site">Editar Site</a>
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
			<a <?php if(@$_GET['url'] == ''){?> style="background: #60727A; padding: 14px 15px 10px 15px;" <?php } ?> href="<?php echo INCLUDE_PATH_PAINEL ?>"> <i class="fa fa-home"></i><span>Home</span></a>
			<a href="<?php echo INCLUDE_PATH_PAINEL ?>?logout"> <i class="fa fa-window-close"></i><span>Sair</span></a>
		</div>

		<div class="clear"></div>
</div>
</header>
		<div class="content">

		<?php Painel::carregarPagina(); ?>

		</div>
		<script src="<?php echo INCLUDE_PATH ?>js/jquery.min.js"></script>
		<script src="<?php echo INCLUDE_PATH_PAINEL ?>js/jquery.mask.js"></script>
		<script src="<?php echo INCLUDE_PATH_PAINEL ?>js/main.js"></script>
</body>
</html>