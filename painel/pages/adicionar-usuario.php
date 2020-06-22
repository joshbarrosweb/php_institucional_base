<?php
	verificaPermissaoPagina(2);
?>

<div class="box-content">
<h2><i class="fa fa-pencil"> Adicionar Usuário</i></h2>

<form method="post" enctype="multipart/form-data">

<?php
	if(isset($_POST['acao'])){
		$login = $_POST['login'];
		$nome = $_POST['nome'];
		$senha = $_POST['password'];
		$imagem = $_FILES['imagem'];
		$cargo = $_POST['cargo'];

		if ($login == ''){
			Painel::alert('erro','O login está vazio');
		}else if($nome == ''){
			Painel::alert('erro','O nome está vazio');
		}else if($senha == ''){
			Painel::alert('erro','A senha está vazia');
		}else if($cargo == ''){
			Painel::alert('erro','O cargo está vazio');
		}else if($imagem['name'] == ''){
			Painel::alert('erro','A imagem precisa estar selecionada');
		}else{
			if($cargo >= $_SESSION['cargo']){
				Painel::alert('erro','Você precisa selecionar um cargo menor que o seu!');
			}else if(Painel::imagemValida($imagem) == false){
				Painel::alert('erro','O formato especificado não está correto');
			}else if(Usuario::userExists($login)){
				Painel::alert('erro','O login já existe, selecione outro por favor!');
			}else{
				$usuario = new Usuario();
				$imagem = Painel::uploadFile($imagem);
				$usuario->cadastrarUsuario($login, $senha, $imagem, $nome, $cargo);
				Painel::alert('sucesso','O cadastro do usuario '.$login.' foi feito com sucesso!');
			}
		}



	}
?>
	<div class="form-group">
		<label>Login: </label>
		<input type="text" name="login">
	</div>
	<div class="form-group">
		<label>Nome: </label>
		<input type="text" name="nome">
	</div>
	<div class="form-group">
		<label>Senha: </label>
		<input type="password" name="password">
	</div>
	<div class="form-group">
		<label>Cargo: </label>
		<select name="cargo">
			<?php
			foreach (Painel::$cargos as $key => $value){
				if($key < $_SESSION['cargo']) echo '<option value="'.$key.'">'.$value.'</option>';
			}
			?>
	</div>
	<div class="form-group">
		<label>Imagem: </label>
		<input type="file" name="imagem">
	</div>
		<div class="form-group">
		<input type="submit" name="acao" value="Cadastrar">
	</div>
</form>
</div>