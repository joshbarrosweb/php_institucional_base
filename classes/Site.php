<?php

	class Site{

		public static function updateUsuarioOnline(){
			if(isset($_SESSION['online'])){
				$token = $_SESSION['online'];
				$horarioAtual = date('Y-m-d H:i:s');
				$sql = MySql::conectar()->prepare("UPDATE `tb_admin.online` SET ultima_acao = ? WHERE token = ?");
				$sql->execute(array($horarioAtual,$token));
			}else{
				$_SESSION['online'] = uniqid();
				$ip = $_SERVER['REMOTE_ADDR'];
				$token = $_SESSION['online'];
				$horarioAtual = date('Y-m-d H:i:s');
				$sql = MySql::conectar()->prepare("INSERT INTO `tb_admin.online` VALUES (null,?,?,?)");
				$sql->execute(array($ip,$horarioAtual,$token));
			}
		}
	}

?>