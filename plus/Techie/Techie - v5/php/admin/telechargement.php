<?php   require_once ("Menu.php"); ?>



<?php  include_once ("../pdo/configPDO.php");  

if (isset($_POST)) {

    $id = htmlspecialchars($_POST['id']);
    $nom = htmlspecialchars($_POST['id']);
    $image = htmlspecialchars($_POST['id']);
    $description = htmlspecialchars($_POST['id']);

$sql = "INSERT INTO upload (id, nom, description, image) values('$id', '$nom', '$description', '$image')";
    
try {
    $dbh = new PDO($dsn, $user, $password); // On crée un objet nomme dbh
    $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}

catch (PDOException $e) {
    $msg = 'ERREUR PDO dans File'. $e->getFile() . 'L.' . $e->getLine() . ':' . $e->getMessage();
die($msg);
}

$com = $dbh->prepare($sql);
$com->execute();// On exécute la requête //donner
$row = $com->fetch(PDO::FETCH_ASSOC);// On stocke le résultat dans un tableau associatif // $row récupere es donner
//header('Location: Upload.php'); 
}
?>




<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Ajouter une image dans la base de données</title>
    <link rel="stylesheet" type="text/css" href="/css/vendor/bootstrap.min.css">
    <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../../assets/css/connexion.css" rel="stylesheet">
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  
</head>
<body>
    <div class="nav navbar-dark bg-danger">
        <div class="container-fluid">
            <h2 class="text-center" style="color:#FCEDFA;">Ajouter une image dans la base de données</h2>
        </div>
        <p>
</div>
<p>
<p>

<form action="telechargement.php" methode="post" enctype="multipart/form-data"></form>
<div class="container col-md-5 col-md-offset-3">
    <p> <p>      <div class="panel panel-danger">
<div class="panel-heading">Formulaire d'ajout d'images</div>

<div class="panel-body">
    <form method="post" action="telechargement.php"  enctype="multipart/form-data">
        <div class="form-group row">
            <label class=""col-sm-2 col-form-label>Nom</label>
            <div class="col-sm-10">
                    <input type="text" name="txtnom" class="form-control">
            </div>
        </div>
<p>
        <div class="form-group row">
            <label for="fileUpload" class=""col-sm-2 col-form-label>Info</label>
            <div class="col-sm-10">
                    <input type="text" name="txtinfo" class="form-control">
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
<input type="submit" name="submit" class="text-center btn btn-danger" value="Telecharger">
</div>
</div>

    </form>
</div>
        </div>
    </div>

    
</body>
</html>
