<?php require ('../../pdo/acceuil.php');

include '../../pdo/configPDO.php'; 

$dbh = new PDO($dsn, $user, $password);

if (isset($_GET['id']) AND !empty($_GET['id'])) {
$mod=$_GET['id'];
$sql = $dbh->prepare("SELECT * FROM competence WHERE id = $mod");
$sql->execute(array($mod));
if ($sql->rowCount() > 0) {
    $comp = $sql->fetch();
    $id = $comp['id'];
    $nom = $comp['nom'];
    $description =$comp['description'];
    $icone = $comp['icone'];
    $couleur = $comp['couleur'];
    $url = $comp['url'];
    
    }
else {
    echo "Aucunne Competence trouvé";
}
} 
else {
    echo "Aucun ID n'est trouvé !";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier</title>
    <link href="../../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../../../assets/css/connexion.css" rel="stylesheet">
    <link href="../admin.css" rel="stylesheet">
</head>
<body>
<div class="container">
<div class="row">
    <p>
<h2>Modification</h2>
<p>
<p>
<form class="centre" action="confirmodif.php" method="post">
<p>
<label class="control-label">ID</label> </td>
    <input name="id" type="int"  placeholder="ID" value="<?php echo $mod; //disabled php echo =?>">
    <p>
        <label class="control-label">Nom</label> </td>
    <input name="pnom" type="text"  placeholder="Nom" value="<?php echo $nom; // php echo =?>">
    <p>
        <label class="control-label">Déscription</label>
<textarea name="pdescription" id="description" cols="30" rows="10" value="<?= $description; //$res['description'] ?> "><?= $description; //$res['description'] ?>  </textarea>    
<p>
        <label class="control-label">Icone</label>
    <input name="picone" type="text"  placeholder="Icone" value="<?= $icone; //$res['icone'] ?>">
    <p>
        <label class="control-label">Couleur</label>
    <input name="pcouleur" type="text"  placeholder="Couleur" value="<?= $couleur; // $res['couleur'] ?>">
    <p>
        <label class="control-label">URL</label>
<input name="purl" type="text"  placeholder="URL" value="<?= $url; //$res['url'] ?>">
    
<p>

<input type="submit" class="car marg btn modif" name="submit" value="Valider">

    

    <a class="btn supprime " value="Retour" href="afficher.php?id=<?php echo $mod; // $res['id'] ; ?> "> Retour</a>
</form>

</body>
</html>