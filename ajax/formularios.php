<?php
	include('../config.php');
	$data = array();
	$assunto = 'Nova Mensagem do Site!';
	$corpo = '';
	foreach ($_POST as $key => $value) {
		$corpo.=ucfirst($key).": ".$value;
		$corpo.="<hr>";
	}
	$info = array('assunto'=>$assunto,'corpo'=>$corpo);
	$mail = new Email('vps.joshbarrosweb.com', 'testes@joshbarrosweb.com', 'josh12345678', 'Josue');
	$mail->addAddress('contato@joshbarrosweb.com','Josue');
	$mail->formatarEmail($info);
	if($mail->enviarEmail()){
		$data['status'] = true;
	}else{
		$data['erro'] = true;
	}

	$data['retorno'] = 'sucesso';
	die(json_encode($data));
?>