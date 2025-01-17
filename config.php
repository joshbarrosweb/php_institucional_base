<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	session_start();
	date_default_timezone_set('America/Sao_Paulo');
	$autoload = function($class){
		if($class == 'Email'){
			require_once ('classes/phpmailer/src/Exception.php');
			require_once ('classes/phpmailer/src/PHPMailer.php');
			require_once ('classes/phpmailer/src/SMTP.php');
			//include('classes/phpmailer/PHPMailerAutoload.php');
		}
		include('classes/'.$class.'.php');
	};

	spl_autoload_register($autoload);

	define('INCLUDE_PATH','http://localhost/php_institucional_alpha/');
	define('INCLUDE_PATH_PAINEL', INCLUDE_PATH.'painel/');

	define('BASE_DIR_PAINEL',__DIR__.'/painel');
	
	//Conectar com Banco de Dados (MYSQL)
	define('HOST','localhost');
	define('USER', 'root');
	define('PASSWORD', '');
	define('DATABASE', 'institucional_01');

	define('NOME_EMPRESA','Josh Barros Web');

	function pegaCargo($indice){

			return Painel::$cargos[$indice];
	}

	function selecionadoMenu($par){
		$url = explode('/',@$_GET['url'])[0];
		if($url == $par){
			echo 'class="menu-active"';
		}
	}

	function verificaPermissaoMenu($permissao){
		if($_SESSION['cargo'] >= $permissao){
			return;
		}else{
			echo 'style="display:none;"';
		}	
	}

	function verificaPermissaoPagina($permissao){
		if($_SESSION['cargo'] >= $permissao){
			return;
		}else{
			include('painel/pages/permissao_negada.php');
			die();
		}
	}
?>