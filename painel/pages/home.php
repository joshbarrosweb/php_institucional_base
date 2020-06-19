<div class="box-content w100">
	<h2><i class="fa fa-home"></i> Painel de Controle - <?php echo NOME_EMPRESA ?></h2>

	<div class="box-metricas">
		<div class="box-metrica-single">
			<div class="box-metrica-wraper">
				<h2>Usuários Online</h2>
				<p>10</p>
			</div>
		</div>
		<div class="box-metrica-single">
			<div class="box-metrica-wraper">
				<h2>Total de Visitas</h2>
				<p>10</p>
			</div>
		</div>
		<div class="box-metrica-single">
			<div class="box-metrica-wraper">
				<h2>Visitas Hoje</h2>
				<p>10</p>
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
			for($i = 0;$i < 10; $i++){
		?>

		<div class="row">
			<div class="col">
				<span>199.199.199.199</span>
			</div>
			<div class="col">
				<span>19/09/2017 19:00:00</span>
			</div>
			<div class="clear"></div>
		</div>
		<?php } ?>
	</div>
</div>