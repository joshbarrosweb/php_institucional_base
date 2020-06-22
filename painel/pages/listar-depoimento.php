<?php
	$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
	$porPagina = 3;

	$depoimentos = Painel::selectAll('tb_site.depoimentos',($paginaAtual - 1) * $porPagina,$porPagina);

?>

<div class="box-content">
	<h2><i class="fa fa-id-card-o"></i>Depoimentos Cadastrados</h2>
	<div class="wraper-table">
	<table>
		<tr>
			<td>Nome</td>
			<td>Data</td>
			<td>Editar</td>
			<td>Deletar</td>
		</tr>

		<?php
			foreach ($depoimentos as $key => $value) {
		?>

		<tr>
			<td><?php echo $value['nome']; ?></td>
			<td><?php echo $value['data']; ?></td>
			<td><a class="btn edit" href=""><i class="fa fa-pencil"></i> Editar</a></td>
			<td><a class="btn delete" href=""><i class="fa fa-times"></i> Excluir</a></td>
		</tr>

		<?php } ?>
		</table>
	</div>

	<div class="paginacao">
		<?php

			$totalPaginas = ceil(count(Painel::selectAll('tb_site.depoimentos')) / $porPagina);

			for($i = 1; $i <= $totalPaginas; $i++){
				if($i == $paginaAtual)
					echo '<a class="page-selected" href="'.INCLUDE_PATH_PAINEL.'listar-depoimento?pagina='.$i.'">'.$i.'</a>';
				else
					echo '<a href="'.INCLUDE_PATH_PAINEL.'listar-depoimento?pagina='.$i.'">'.$i.'</a>';
			}

		?>
	</div>

</div>