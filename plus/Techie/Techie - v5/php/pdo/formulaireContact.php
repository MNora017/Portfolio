<?php
include_once ("configPDO.php");

if (isset($_POST['valider'])) {
    $nom =$_POST['contact_nom'];
    $prenom =$_POST['contact_prenom'];
    $mail =$_POST['contact_mail'];
    $sujet =$_POST['contact_sujet'];
    $message =$_POST['contact_message'];

    $dbh = new PDO ($dsn, $user, $password);
    $query =$bdh->query("INSERT INTO users VALUES('')");
}
$to = "nora.chamekh017@gmail.com";
$sujet = "Contact par Porfolio";

mail(
    string [$to],
    string [$sujet],
    string [$message];

): bool
?>
