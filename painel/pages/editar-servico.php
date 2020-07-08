<?php
	if(isset($_GET['id'])){
		$id = (int)$_GET['id'];
		$servicos = Painel::select('tb_site.servicos','id = ?', array($id));
	}else{
		Painel::alert('erro','Você precisa passar o parametro ID.');
		die();
	}
?>

<div class="box-content">
<h2><i class="fa fa-pencil"> Editar Serviço</i></h2>

<form method="post" enctype="multipart/form-data">

<?php
	if(isset($_POST['acao'])){
		if(Painel::update($_POST)){
			Painel::alert('sucesso','O depoimento foi editado com sucesso!');
			$depoimento = Painel::select('tb_site.servicos', 'id = ?', array($id));
		}else{
			Painel::alert('erro','Campos vazios não são permitidos!');
		}
	}
?>

	<div class="form-group">
		<label>Serviço: </label>
		<textarea name="servico"><?php echo $servicos['servicos']; ?></textarea>
	</div>

	<div class="form-group">
		<input type="hidden" name="id" value="<?php echo $servicos['id']; ?>">
		<input type="hidden" name="nome_tabela" value="tb_site.servicos">
		<input type="submit" name="acao" value="Cadastrar">
	</div>
</form>
</div>