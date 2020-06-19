<!DOCTYPE html>
<html>
<head>
	<title>Painel de Controle</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<link rel="stylesheet" href="<?php echo INCLUDE_PATH_PAINEL ?>css/style.css">
</head>
<body>

	<div class="box-login">
		<?php
			if(isset($_POST['acao'])){
				$user = $_POST['user'];
				$password = $_POST['password'];
				$sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE user = ? AND password = ?");
				$sql->execute(array($user,$password));
				if($sql->rowCount() == 1){
					$info = $sql->fetch();
					$_SESSION['login'] = false;
					$_SESSION['user'] = $user;
					$_SESSION['password'] = $password;
					$_SESSION['cargo'] = $info['cargo'];
					$_SESSION['nome'] = $info['nome'];
					$_SESSION['img'] = $info['img'];
					header('Location: '.INCLUDE_PATH_PAINEL);
					die();
				}else{
					//Login Failed
					echo '<div class="erro-box">Usuário ou senha incorretos</div>';
				}
			}
		?>

		<form method="POST">
			<h2>Efetue seu Login</h2>
			<input type="text" name="user" placeholder="Login..." required>
			<input type="password" name="password" placeholder="Senha..." required>
			<input type="submit" name="acao" value="Logar!">
		</form>

	</div>

</body>
</html>