<?php include_once ("configPDO.php"); 

$dbh = new PDO($dsn, $user, $password); // On crée un objet nomme dbh
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT * FROM competence";

$result = $dbh->query($sql); // envoyer la requete au sgbdr
    $res = $result->fetch(); //récupérer le jeu de résultat 
//echo $row['nom']; 

?>