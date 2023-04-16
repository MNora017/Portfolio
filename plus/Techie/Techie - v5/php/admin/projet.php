

<?php //include_once ("../pdo/configPDO.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        //$id = $_POST['id'];
        $nom = $_POST['nom'];
        $description = $_POST['description'];
        $photo = $_POST['photo'];
        $video = $_POST['video'];


    $sql = "INSERT INTO competence (id, nom, description, photo, video) values('$id', '$nom', '$description', '$photo', '$video')";
        
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
    $res = $com->fetch(PDO::FETCH_ASSOC);// On stocke le résultat dans un tableau associatif // $row récupere es donner
   header('Location: ../../start.php'); 
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../../assets/css/connexion.css" rel="stylesheet">
    <link href="admin.css" rel="stylesheet"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js%22%3E"></script>    

    <title>Projets</title>


    <div class="container centre">


<div class="row">


<h1>Ajouter des Projets</h1>
<p>

</div>
<p>


    <form method="post" id="submit">
    <script>  
        $("#submit").click(function(){
            let ident = document.getElementById("ident").value;
            let nom = document.getElementById("nom").value;
            let description = document.getElementById("description").value;
            let photo = document.getElementById("photo").value;
            let video = document.getElementById("video").value;
            

            $.post("projet.php",
                {
                    id: ident,
                    nom: nom,
                    description: description,
                    photo: photo,
                    video: video,
                
                }
        }); 
    </script>


<div class="control-group <?php echo !empty($nomError)?'error':'';?>">
                        <label class="control-label">Nom</label>

<div class="controls">
                <input name="nom" id="nom" type="text"  placeholder="Nom" value="<?php echo !empty($nom)?$nom:'';?>">
                <?php if (!empty($nomError)): ?>
                    <span class="help-inline"><?php echo $nomError;?></span>
                <?php endif; ?>
</div>
<p>

</div>
<p>
                

<div class="control-group <?php echo !empty($descriptiontError)?'error':'';?>">
                    <label class="control-label">Déscription </label>

<div class="controls">
            <textarea rows="4" cols="30" id="description" name="description" ><?php if(isset($description)) echo $description;?></textarea>    
            <?php if(!empty($descriptiontError)):?>
                <span class="help-inline"><?php echo $descriptiontError ;?></span>
            <?php endif;?>
</div>
<p>

</div>
<p>

<div class="control-group <?php echo !empty($photoError)?'error':'';?>">
                        <label class="control-label">Photo</label>

<div class="controls">
            <input name="photo" id="photo" type="text"  placeholder="Photo" value="<?php  echo !empty($photo)?$photo:'';?>">
            <?php if (!empty($photoError)): ?>
                <span class="help-inline"><?php echo $photoError;?></span>
            <?php endif; ?>
</div>
<p>

</div>
<p>


<p>


<div class="control-group  <?php echo !empty($videoError)?'error':'';?>">
                    <label class="control-label">Vidéo</label>

<br />
<div class="controls">
            <input type="text" id="video" name="video" value="<?php echo !empty($video)? $video:'' ; ?>">
            <?php if(!empty($videoError)):?>
            <span class="help-inline"><?php echo $videoError ;?></span>
            <?php endif;?>
</div>
<p>

</div>
<p>

<div class="form-actions" action="../../start.php" methode="post">
<input type="submit" class="btn btn-success modif" name="submit" value="Ajouter" ONCLICK="submitForm()">
            <a class="btn supprime" href="admin.php">Retour</a>
</div>
<p>

            </form>
<p>
                    
</div>
<p>


</head>
<body>
