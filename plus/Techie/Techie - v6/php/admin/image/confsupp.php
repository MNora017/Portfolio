<?php require ('../../pdo/menu.php');


include '../../pdo/configPDO.php';
try {
    $dbh = new PDO($dsn, $user, $password); // On crée un objet nomme dbh
    $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}

catch (PDOException $e) {
    $msg = 'ERREUR PDO dans File'. $e->getFile() . 'L.' . $e->getLine() . ':' . $e->getMessage();
die($msg);
}

if (isset($_GET)) {

$saisi_id = $_GET['id'];

$sup = $dbh->prepare("DELETE FROM image WHERE id = $saisi_id");
$sup->execute(); 

}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Tableau de mage</title>
        
        <link href="../../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../../../assets/css/connexion.css" rel="stylesheet">
    <link href="../admin.css" rel="stylesheet">
        

    </head>
    <body>

<div class="container">

    <div class="row">

        <h1>Les changement ont bien été supprimer </h1>
        
        <a class="espace btn car centre btn-success modif" href="afficher.php" >Retour</a>
                            
    </body>
</html>
