<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<form action="/ma-page-de-traitement" method="post">
    <div>
        <label for="name">Prénom :</label>
        <input type="text" id="surname" name="user_name">
    </div>
    <div>
        <label for="name">Nom :</label>
        <input type="text" id="name" name="user_name">
    </div>
    <div>
        <label for="mail">Mail :</label>
        <input type="email" id="mail" name="user_mail">
    </div>
    <div>
        <label for="msg">Sujet :</label>
        <input id="msg" name="user_sujet"></input>
    </div>
    <div>
        <label for="msg">Message :</label>
        <textarea id="msg" name="user_message"></textarea>
    </div>
</form>

<?php

include_once("pdo/configPDO.php");

try {
  $dbh = new PDO ($dsn, $user, $password); // On crée un objet nomme dbh
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch (PDOException $e) {
  $msg = 'ERREUR PDO dans File'. $e->getFile() . 'L.' . $e->getLine() . ':' . $e->getMessage();
die($msg);
}

$sql = "SELECT id, nom, prenom, mail, sujet, message FROM contact"; //Base de données / création de la base de données sql
// echo "<br/> $sql <br/>";

try {
  $result = $dbh->query($sql); // envoyer la requete au sgbdr
  $row = $result->fetch(); //récupérer le jeu de résultat 
//echo $row['nom']; 
}

catch (Exception $e) {
  $msg = 'ERREUR PDO dans File' . $e->getFile() . 'L.' . $e->getLine() . ';' .$e->getMessage(); 
}

  $receiving_email_address = 'nora.chamekh017@gmail.com';


 /* if( file_exists($php_mail_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_mail_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }
*/


if( file_exists($php_mail_form = 'formulaire.php' )) {
  include( $php_mail_form );
} else {
  die( 'Unable to load the "PHP Email Form" Library!');
}

  $contact = new PHP_Mail_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->form_prenom = $_POST['prenom'];
  $contact->form_nom = $_POST['nom'];
  $contact->form_mail = $_POST['mail'];
  $contact->sujet = $_POST['sujet'];

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

  $contact->add_message( $_POST['nom'], 'Nom');
  $contact->add_message( $_POST['prenom'], 'Prénom');
  $contact->add_message( $_POST['mail'], 'Mail');
  $contact->add_message( $_POST['sujet'], 'Sujet');
  $contact->add_message( $_POST['message'], 'Message', 10);

  echo $contact->send();
?>


</body>
</html>
