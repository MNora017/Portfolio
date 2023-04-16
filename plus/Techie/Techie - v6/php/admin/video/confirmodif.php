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

if (isset($_POST)) {

$saisi_id = $_POST['id'];//htmlspecialchars($_POST['id']);
$saisi_nom = $_POST['pnom'];//htmlspecialchars($_POST['nom']);
$saisi_description = $_POST['pdescription'];//nl2br(htmlspecialchars($_POST['description']));
$saisi_video = $_POST['pvideo'];//htmlspecialchars($_POST['video']);

$update = $dbh->prepare("UPDATE video SET nom='$saisi_nom', description='$saisi_description', image='$saisi_image', video='$saisi_video', url='$saisi_url' WHERE id='$saisi_id'");
$update->execute();
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Tableau de vidéo</title>
        
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
