<?php


	include('../config.php');

	//deixar função abaixo como FALSE após concluir o PAINEL!!!
	if(Painel::logado() == false){
		include('login.php');
	}else{
		include('main.php');
	}


?>