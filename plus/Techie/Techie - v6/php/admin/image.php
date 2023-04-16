<?php include_once ("../pdo/configPDO.php");  

require_once ("../pdo/menu.php"); 

$dbh = new PDO($dsn, $user, $password); // On crée un objet nomme dbh
if (isset($_SESSION['id'])) {
    $add = $dbh->prepare('SELECT * FROM image (nom, image, description) VALUE(?)');
$add->execute(array($_SESSION['id']));

$image = $add->fetch();

if (isset($_POST['nom']) AND !empty($_POST['nom'])) {
    
    $newnom = htmlspecialchars($_POST['nom']);
    $nomima = $add->prepare("UPDATE image");
    $nomima->execute(array($newnom, $_SESSION['nom']));
    header('Location: fichier.php?id='.$_SESSION['id']);

}
if (isset($_POST['description']) AND !empty($_POST['description'])) {
    
    $newdes = htmlspecialchars($_POST['description']);
    $desima = $add->prepare("UPDATE image");
    $desima->execute(array($newdes, $_SESSION['description']));
    header('Location: fichier.php?id='.$_SESSION['id']);
}
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Télécharger une image</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/vendor/bootstrap.min.css">
    <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../../assets/css/connexion.css" rel="stylesheet">
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>
    <div class="nav navbar-dark bg-danger">
        <div class="container-fluid">
            <h2 class="text-center" style="color:#FCEDFA;">Télécharger une image</h2>
        </div>
        <p>
</div>
<p>
<p>

<form action="fichier.php" methode="post" enctype="multipart/form-data"></form>
        <div class="container col-md-5 col-md-offset-3">
            <p> <p>      <div class="panel panel-danger">
        <div class="panel-heading">Formulaire d'ajout d'images</div>

        <div class="panel-body">
        <form method="post" action=""  enctype="multipart/form-data">
                <div class="form-group row">
                    <label class=""col-sm-2 col-form-label>Nom</label>
                    <div class="col-sm-10">
                            <input type="text" name="nom" class="form-control">
                            
                    </div>
                </div>
        <p>
                <div class="form-group row">
                    <label for="fileUpload" class=""col-sm-2 col-form-label>Déscription</label>
                    <div class="col-sm-10">
                            <input type="text" name="description" class="form-control">
                    </div>
                </div>

            <div class="form-group row">
            <label for="fileUpload" class=""col-sm-2 col-form-label>Photo</label>
            <input type="file" name="image" id="image" class="form-control-file">
        </div>

        <?php // Importer les image dans le dossier upload //

        if(isset($_POST['submit']))
        { 
            $name_image=$_FILES['image']['name'];
            
            $temportaire=$_FILES['image']['tmp_name'];
            
            $extens=strrchr($name_image,'.');

            $autoriser = array('.png', '.PNG', '.jpg', '.JPG', '.jpeg', '.JPEG');

            $destination = 'upload/'.$name_image;

            if (in_array($extens, $autoriser)) {
                if (move_uploaded_file($temportaire, $destination)) {
                    echo "Succes !!";

                } else {
                    echo "Impossible de telecharger";
                }
                
            }else {
                echo "Ce fichier n'est pas une image";
            }
        }
        ?>

                    <div class="form-group row" style="padding:30 0; text-align:center;">
                    <label class=""col-sm-2 col-form-label></la bel>
                    <a href="fichier.php"><input type="submit" name="submit" class="text-center btn btn-danger" value="Telecharger">
                    </a></div>
                    </div>

    </form>
</div>
        </div>
    </div>

    
</body>
</html>
