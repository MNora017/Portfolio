<?php include '../../pdo/configPDO.php'; 
//on appelle notre fichier de config $id = null; if (!empty($_GET['id'])) { $id = $_REQUEST['id']; } if (null == $id) { header("location:index.php"); } else { //on lance la connection et la requete $pdo = Database ::connect(); $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) .
//$sql = "SELECT * FROM competence WHERE id=$id;";

$dbh = new PDO($dsn, $user, $password);

if (isset($_GET['id']) AND !empty($_GET['id'])) {
    $mod=$_GET['id'];
$sql = $dbh->prepare("SELECT * FROM competence WHERE id = $mod");
$sql->execute(array($mod));
if ($sql->rowCount() > 0) {
    $comp = $sql->fetch();
    $id = $comp['id'];
    $nom = $comp['nom'];
    $description = str_replace('<br />', '', $comp['description']);
    $icone = $comp['icone'];
    $couleur = $comp['couleur'];
    $url = $comp['url'];

    if (isset($_POST['Valider'])) {
        $saisi_id = htmlspecialchars($_POST['id']);
    $saisi_nom = htmlspecialchars($_POST['nom']);
    $saisi_description = nl2br(htmlspecialchars($_POST['description']));
    $saisi_icone = htmlspecialchars($_POST['icone']);
    $saisi_couleur = htmlspecialchars($_POST['couleur']);
    $saisi_url = htmlspecialchars($_POST['url']);
    
    $update = $dbh->prepare("UPDATE competence SET nom='$saisi_nom', description='$saisi_description', icone='$saisi_icone', couleur='$saisi_couleur', url='$saisi_url' WHERE id='$mod'");
    $update->execute();
    header('Location: ../modifier.php');
    }
    
    }
else {
    echo "Aucunne Competence trouvé";
}
} else {
    echo "Aucun ID n'est trouvé !";
}
/*
if (isset($_POST, $_POST['id'])) {

    if (isset($_POST, $_POST['id'])) {
        $requete = $dbh->prepare("update competence set nom=:nom, description=:description, icone=:icone, couleur=:couleur, url=:url where id=:id;");
        $requete->bindValue(':id', htmlspecialchars($_POST['id']));
        $requete->bindValue(':nom', htmlspecialchars($_POST['nom']));
        $requete->bindValue(':description', htmlspecialchars($_POST['description']));
        $requete->bindValue(':icone', htmlspecialchars($_POST['icone']));
        $requete->bindValue(':couleur', htmlspecialchars($_POST['couleur']));
        $requete->bindValue(':url', htmlspecialchars($_POST['url']));
        $requete->execute();
    }
    
}
$valeur = $dbh->prepare("SELECT * FROM competence WHERE id=:id;");
$valeur->bindValue(':id', htmlspecialchars($_GET['id']));

$valeur->execute();
$res = $valeur->fetch(PDO::FETCH_ASSOC);*/
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
<form class="centre" action="../competence.php" method="post">
<p>
<label class="control-label">ID</label> </td>
    <input name="id" type="int"  placeholder="ID" value="<?php echo $mod; //disabled php echo =?>">
    <p>
        <label class="control-label">Nom</label> </td>
    <input name="nom" type="text"  placeholder="Nom" value="<?php echo $nom; // php echo =?>">
    <p>
        <label class="control-label">Déscription</label>
<textarea name="description" id="description" cols="30" rows="10" value="<?= $description; //$res['description'] ?> ">  </textarea>    
<p>
        <label class="control-label">Icone</label>
    <input name="icone" type="text"  placeholder="Icone" value="<?= $icone; //$res['icone'] ?>">
    <p>
        <label class="control-label">Couleur</label>
    <input name="couleur" type="text"  placeholder="Couleur" value="<?= $couleur; // $res['couleur'] ?>">
    <p>
        <label class="control-label">URL</label>
<input name="url" type="text"  placeholder="URL" value="<?= $url; //$res['url'] ?>">
    
<p>
<input type="submit" class="btn btn-success modif" name="submit" value="Valider">
    

    <a class="btn " href="../competence.php?id=<?php echo $mod; // $res['id'] ; ?> "> <button type="submit" class="supprime" > Retour</button></a>
</form>

</body>
</html>