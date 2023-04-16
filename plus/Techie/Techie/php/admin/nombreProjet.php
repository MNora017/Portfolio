<?php
//include_once ("../pdo/configPDO.php");
try {
    $dbh = new PDO($dsn, $user, $password); // On crée un objet nomme dbh
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch (PDOException $e) {
    $msg = 'ERREUR PDO dans File'. $e->getFile() . 'L.' . $e->getLine() . ':' . $e->getMessage();
die($msg);
}

$sql = "SELECT * FROM nbrprojet"; //Base de données / création de la base de données sql
// echo "<br/> $sql <br/>";

try {
    $result = $dbh->query($sql); // envoyer la requete au sgbdr
    $res = $result->fetch(); //récupérer le jeu de résultat 
//echo $row['nom']; 
}

catch (Exception $e) {
    $msg = 'ERREUR PDO dans File' . $e->getFile() . 'L.' . $e->getLine() . ';' .$e->getMessage(); 
}

?>
