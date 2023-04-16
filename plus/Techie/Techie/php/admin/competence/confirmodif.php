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

// On exécute la requête //donner


if (isset($_POST)) {

$saisi_id = $_POST['id'];//htmlspecialchars($_POST['id']);
$saisi_nom = $_POST['pnom'];//htmlspecialchars($_POST['nom']);
$saisi_description = $_POST['pdescription'];//nl2br(htmlspecialchars($_POST['description']));
$saisi_icone = $_POST['picone'];//htmlspecialchars($_POST['icone']);
$saisi_couleur = $_POST['pcouleur'];//htmlspecialchars($_POST['couleur']);
$saisi_url = $_POST['purl'];//htmlspecialchars($_POST['url']);

$update = $dbh->prepare("UPDATE competence SET nom='$saisi_nom', description='$saisi_description', icone='$saisi_icone', couleur='$saisi_couleur', url='$saisi_url' WHERE id='$saisi_id'");
$update->execute();
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Tableau de competence</title>
        
        <link href="../../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../../../assets/css/connexion.css" rel="stylesheet">
    <link href="../admin.css" rel="stylesheet">
        

    </head>
    <body>


<div class="container ">

    <div class="row">

        <h1 class="espace">Les changement ont bien été modifier </h1>
        
                                    <a class="espace btn car centre btn-success modif" href="afficher.php" >Retour</a>
                            

    </body>
</html>
