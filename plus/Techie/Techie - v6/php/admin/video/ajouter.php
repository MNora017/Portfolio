<?php  require ('../../pdo/acceuil.php');

include_once ("../../pdo/configPDO.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id = $_POST['id'];
        $nom = $_POST['nom'];
        $description = $_POST['description'];
        $video = $_POST['video'];

    $sql = "INSERT INTO video (id, nom, description, video) values('$id', '$nom', '$description', '$video')";
        
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
header('Location: afficher.php'); 
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Ajout</title>
        <link href="../../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../../../assets/css/connexion.css" rel="stylesheet">
    <link href="../admin.css" rel="stylesheet"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js%22%3E"></script>    


<script language="JavaScript">

function submitForm()
{ 
    var req = null; 

    document.ajax.dyn.value="Started...";

    if (window.XMLHttpRequest)
    {
        req = new XMLHttpRequest();

    } 
    else if (window.ActiveXObject) 
    {
        try {
            req = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e)
        {
            try {
                req = new ActiveXObject("Microsoft.XMLHTTP"); //Ce constructeur est pour Internet Explorer.
            } catch (e) {} 
        }
        }

    req.onreadystatechange = function() //  On associe un traitement (une fonction anonyme en l'occurrence) à cet indicateur d'évènement.

    { 
        document.ajax.dyn.value="Wait server...";
        if(req.readyState == 4) //L'état 4 signifie que la réponse est envoyée par le serveur et disponible.
        {
            if(req.status == 200) //Ce status signifie ok, sinon un code d'erreur quelconque est envoyé, 404 par exemple.
            {
                document.ajax.dyn.value=req.responseText;	
            }	
            else	
            {
                document.ajax.dyn.value="Error: returned status code " + req.status + " " + req.statusText;
            }	
        } 
    }; 
    req.open("GET", "afficher.php", true); 
    req.send(null); 
} 
</script>
    
    </head>
    <body>
<br>
<div class="container centre">

<div class="row">

<h1>Ajouter un video</h1>
<p>

</div>
<p>

<form method="post" id="submit">
    <script>  
        $("#submit").click(function(){
            let ident = document.getElementById("ident").value;
            let nom = document.getElementById("nom").value;
            let description = document.getElementById("description").value;
            let image = document.getElementById("image").value;
            let video = document.getElementById("video").value;
            let url = document.getElementById("url").value;

            $.post("ajouter.php",
                {
                    id: ident,
                    nom: nom,
                    description: description,
                    image: image,
                    video: video,
                    url: url
                }
        }); 
    </script>

<div class="control-group encadre <?php echo !empty($idError)?'error':'';?>">
                        <label class="control-label">ID</label>

<div class="controls">
                <input name="id" id="ident" type="text"  placeholder="ID" value="<?php echo !empty($id)?$id:'';?>">
                <?php if (!empty($idError)): ?>
                    <span class="help-inline"><?php echo $idError;?></span>
                <?php endif; ?>
</div>
<p>

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


<div class="control-group <?php echo !empty($videoError)?'error':'';?>">
                        <label class="control-label">Vidéo</label>

<div class="controls">
            <input name="video" id="video" type="text"  placeholder="video" value="<?php  echo !empty($video)?$video:'';?>">
            <?php if (!empty($videoError)): ?>
                <span class="help-inline"><?php echo $videoError;?></span>
            <?php endif; ?>
</div>
<p>

</div>
<p>

<div class="form-actions" action="afficher.php" methode="post">
<input type="submit" class="car btn btn-success modif" name="submit" value="Ajouter" ONCLICK="submitForm()">
            <a class="btn supprime" href="afficher.php">Retour</a>
</div>
<p>

            </form>
<p>

</div>
<p>

    </body>
</html>