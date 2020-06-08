<?php 

	class Email
	{

		private $mailer;

		public function __construct($host, $username, $senha, $name)
		{

			$this->mailer = new PHPMailer(true);

			try {
			    //Server settings
			    $this->mailer->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
			    $this->mailer->isSMTP();                                            // Send using SMTP
			    $this->mailer->Host       = $host;                    // Set the SMTP server to send through
			    $this->mailer->SMTPAuth   = true;                                   // Enable SMTP authentication
			    $this->mailer->Username   = $username;                     // SMTP username
			    $this->mailer->Password   = $senha;                               // SMTP password
			    $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
			    $this->mailer->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

			    //Recipients
			    $this->mailer->setFrom($username, $name);
			    $this->mailer->isHTML(true);                                  // Set email format to HTML
			    $this->mailer->Charset = 'UTF-8';


			    $mail->send();
			    echo 'Message has been sent';
			} catch (Exception $e) {
			    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			}
			
			public function addAddress($email, $nome){
				$this->mailer->addAddress($email, $nome);
			}

			public function formatarEmail($info){
				$mail->Subject = $info['assunto'];
				$mail->Body = $info['corpo'];
				$mail->AltBody = strip_tags($info['corpo']);
			}

			public function enviarEmail(){
				if($this->mailer->send()){
					return true;
				}else{
					return false;
				}
			}
		}
	}
?>