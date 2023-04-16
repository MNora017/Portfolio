<?php

$hn = 'localhost';
$un = 'root';
$pw = '';
$dbn = 'portfolio';

// creation loien base de donnée

$pdo = new PDO(
    "mysql:host=$hn;port=3306;dbname=$dbn",
    "$un",
    "$pw"
);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->exec('SET NAMES UTF8');




if(isset($_POST['mail'])){
    // if(preg_match( "/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/", $_POST['mail'])){
        
        try {
            $requete = $pdo->prepare("insert into contact(prenom,nom,mail,sujet,message) value (:prenom,:nom,:mail,:sujet,:message);");
            $requete->bindValue(':prenom', $_POST['prenom']);
            $requete->bindValue(':nom', $_POST['nom']);
            $requete->bindValue(':mail', $_POST['mail']);
            $requete->bindValue(':sujet', $_POST['sujet']);
            $requete->bindValue(':message', $_POST['message']);
            $requete->execute();

        } catch (Exception $e) {
            echo "Erreur";
        }


        header("Location: Portfolio.html");
        
 //   }
}
?>