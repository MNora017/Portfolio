<?php
include_once ("configPDO.php");


	if(!empty($_POST["send"])) {
		$name = $_POST["name"];
		$email = $_POST["email"];
		$subject = $_POST["subject"];
		$message = $_POST["message"];

		$toEmail = "nora.chamekh017@gmail.com";
		$mailHeaders = "From: " . $name . "<". $email .">\r\n";
		if(mail($toEmail, $subject, $message, $mailHeaders)) {
			$mail_msg = "Vos informations de contact ont été reçues avec succés.";
			$type_mail_msg = "success";
		}else{
			$mail_msg = "Erreur lors de l'envoi de l'e-mail.";
			$type_mail_msg = "error";
		}
	}


    if(!empty($_POST["send"])) {
		$name = $_POST["name"];
		$email = $_POST["email"];
		$subject = $_POST["subject"];
		$message = $_POST["message"];

		$result = "SELECT id, nom, prenom, mail, sujet,	message	 FROM contact";
        if($result){
			$db_msg = "Vos informations de contact sont enregistrées avec succés.";
			$type_db_msg = "success";
		}else{
			$db_msg = "Erreur lors de la tentative d'enregistrement de contact.";
			$type_db_msg = "error";
		}
	}


	
?>