<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;


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

	define('INCLUDE_PATH','http://localhost/institucional_mvc/')
?>