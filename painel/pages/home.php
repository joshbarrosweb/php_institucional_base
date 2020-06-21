<?php
	$usuariosOnline = Painel::listarUsuariosOnline();

	$pegarVisitasTotais = MySql::conectar()->prepare("SELECT * FROM `tb_admin.visitas`");
	$pegarVisitasTotais->execute();

	$pegarVisitasTotais = $pegarVisitasTotais->rowCount();

	$pegarVisitasHoje = MySql::conectar()->prepare("SELECT * FROM `tb_admin.visitas` WHERE dia = ?");
	$pegarVisitasHoje->execute(array(date('Y-m-d')));

	$pegarVisitasHoje = $pegarVisitasHoje->rowCount();
?>

<div class="box-content w100">
	<h2><i class="fa fa-home"></i> Painel de Controle - <?php echo NOME_EMPRESA ?></h2>

	<div class="box-metricas">
		<div class="box-metrica-single">
			<div class="box-metrica-wraper">
				<h2>Usuários Online</h2>
				<p><?php echo count($usuariosOnline); ?></p>
			</div>
		</div>
		<div class="box-metrica-single">
			<div class="box-metrica-wraper">
				<h2>Total de Visitas</h2>
				<p><?php echo $pegarVisitasTotais; ?></p>
			</div>
		</div>
		<div class="box-metrica-single">
			<div class="box-metrica-wraper">
				<h2>Visitas Hoje</h2>
				<p><?php echo $pegarVisitasHoje; ?></p>
			</div>
		</div>
	<div class="clear"></div>
	</div>

</div>

<div class="box-content w100">
<h2><i class="fa fa-rocket"></i>Usuários Online</h2>
	<div class="table-responsive">
		<div class="row">
			<div class="col">
				<span>IP</span>
			</div>
			<div class="col">
				<span>Última Ação</span>
			</div>
			<div class="clear"></div>
		</div>

		<?php
			foreach ($usuariosOnline as $key => $value) {

		?>

		<div class="row">
			<div class="col">
				<span><?php echo $value['ip'] ?></span>
			</div>
			<div class="col">
				<span><?php echo date('d/m/y  H:i:s',strtotime($value['ultima_acao'])) ?></span>
			</div>
			<div class="clear"></div>
		</div>
		<?php } ?>
	</div>
</div>