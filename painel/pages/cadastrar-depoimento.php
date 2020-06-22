<div class="box-content">
<h2><i class="fa fa-pencil"> Adicionar Usuário</i></h2>

<form method="post" enctype="multipart/form-data">

<?php
	if(isset($_POST['acao'])){
		if(Painel::insert($_POST)){
			Painel::alert('sucesso','O cadastro do depoimento foi feito com sucesso!');
		}else{
			Painel::alert('erro','Ocorreu um erro ao cadastrar!');
		}
	}
?>
	<div class="form-group">
		<label>Nome da pessoa</label>
		<input type="text" name="nome">
	</div>

	<div class="form-group">
		<label>Depoimento</label>
		<textarea name="depoimento"></textarea>
	</div>

	<div class="form-group">
		<label>Data</label>
		<input formato="data" type="text" name="data">
	</div>

	<div class="form-group">
		<input type="hidden" name="nome_tabela" value="tb_site.depoimentos">
		<input type="submit" name="acao" value="Cadastrar">
	</div>
</form>
</div>