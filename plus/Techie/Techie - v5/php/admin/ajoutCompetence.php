<?php include_once ("../pdo/configPDO.php");
 /* if($_SERVER["REQUEST_METHOD"]== "POST" && !empty($_POST)){ //on initialise nos messages d'erreurs; $nameError = ''; $firstnameError=''; $ageError=''; $telError =''; $emailError =''; $paysError=''; $commentError=''; $metierError=''; $urlError=''; // on recupère nos valeurs $name = htmlentities(trim($_POST['name'])); $firstname=htmlentities(trim($_POST['firstname'])); $age = htmlentities(trim($_POST['age'])); $tel=htmlentities(trim($_POST['tel'])); $email = htmlentities(trim($_POST['email'])); $pays=htmlentities(trim($_POST['pays'])); $comment=htmlentities(trim($_POST['comment'])); $metier=htmlentities(trim($_POST['metier'])); $url=htmlentities(trim($_POST['url'])); // on vérifie nos champs $valid = true; if (empty($name)) { $nameError = 'Please enter Name'; $valid = false; }else if (!preg_match("/^[a-zA-Z ]*$/",$name)) { $nameError = "Only letters and white space allowed"; } if(empty($firstname)){ $firstnameError ='Please enter firstname'; $valid= false; }else if (!preg_match("/^[a-zA-Z ]*$/",$name)) { $nameError = "Only letters and white space allowed"; } if (empty($email)) { $emailError = 'Please enter Email Address'; $valid = false; } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) { $emailError = 'Please enter a valid Email Address'; $valid = false; } if (empty($age)) { $ageError = 'Please enter your age'; $valid = false; } if (empty($tel)) { $telError = 'Please enter phone'; $valid = false; }else if(!preg_match("#^0[1-68]([-. ]?[0-9]{2}){4}$#",$tel)){ $telError = 'Please enter a valid phone'; $valid = false; } if (!isset($pays)) { $paysError = 'Please select a country'; $valid = false; } if(empty($comment)){ $commentError ='Please enter a description'; $valid= false; } if(empty($metier)){ $metierError ='Please select a job'; $valid= false; } if(empty($url)){ $urlError ='Please enter website url'; $valid= false; } else if(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$url)) { $urlError='Enter a valid url'; $valid=false; } // si les données sont présentes et bonnes, on se connecte à la base if ($valid) { $pdo = Database::connect(); $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO competence (id, nom, description, icone, couleur, url) values('$id', '$nom', '$description', '$icone', '$couleur', '$url')";

            //$q->execute(array($nom,$description,$icone, $couleur, $url));
    */
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id = $_POST['id'];
        $nom = $_POST['nom'];
        $description = $_POST['description'];
        $icone = $_POST['icone'];
        $couleur = $_POST['couleur'];
        $url = $_POST['url'];

        //echo $id;

    $sql = "INSERT INTO competence (id, nom, description, icone, couleur, url) values('$id', '$nom', '$description', '$icone', '$couleur', '$url')";
        
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
   header('Location: competence.php'); 
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Ajout</title>
        <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../../assets/css/connexion.css" rel="stylesheet">
    <link href="admin.css" rel="stylesheet"> 
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
    req.open("GET", "competence.php", true); 
    req.send(null); 
} 
</script>
    
    </head>
    <body>

<div class="container centre">


<div class="row">


<h1>Ajouter une competence</h1>
<p>

</div>
<p>

<form method="post" id="submit">
    <script>  
        $("#submit").click(function(){
            let ident = document.getElementById("ident").value;
            let nom = document.getElementById("nom").value;
            let description = document.getElementById("description").value;
            let icone = document.getElementById("icone").value;
            let couleur = document.getElementById("couleur").value;
            let url = document.getElementById("url").value;

            $.post("ajoutCompetence.php",
                {
                    id: ident,
                    nom: nom,
                    description: description,
                    icone: icone,
                    couleur: couleur,
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

<div class="control-group <?php echo !empty($iconeError)?'error':'';?>">
                        <label class="control-label">Icone</label>

<div class="controls">
            <input name="icone" id="icone" type="text"  placeholder="Icone" value="<?php  echo !empty($icone)?$icone:'';?>">
            <?php if (!empty($iconeError)): ?>
                <span class="help-inline"><?php echo $iconeError;?></span>
            <?php endif; ?>
</div>
<p>

</div>
<p>

<div class="control-group <?php echo !empty($couleurError)?'error':'';?>">
                        <label class="control-label">Couleur</label>

<div class="controls">
<select name="" id="couleur">

<option value="<?php echo !empty($couleur)?$couleur:'rose';?>"> Rose</option>
    <option value="<?php echo !empty($couleur)?$couleur:'rouge';?>"> Rouge</option>
    <option value="<?php echo !empty($couleur)?$couleur:'orange';?>">Orange</option>
    <option value="<?php echo !empty($couleur)?$couleur:'jaune';?>">Jaune</option>
    <option value="<?php echo !empty($couleur)?$couleur:'vert';?>">Vert</option>
    <option value="<?php echo !empty($couleur)?$couleur:'bleu';?>">Bleu</option>
    <option value="<?php echo !empty($couleur)?$couleur:'violet';?>">Violet</option>
    <option value="<?php echo !empty($couleur)?$couleur:'marron';?>">Marron</option>

   
</select>
            
            <?php if (!empty($couleurError)): ?>
                <span class="help-inline"><?php echo $couleurError;?></span>
            <?php endif; ?>
</div>
<p>

</div>
<p>


<div class="control-group  <?php echo !empty($urlError)?'error':'';?>">
                    <label class="control-label">URL</label>

<br />
<div class="controls">
            <input type="text" id="url" name="url" value="<?php echo !empty($url)? $url:'' ; ?>">
            <?php if(!empty($urlError)):?>
            <span class="help-inline"><?php echo $urlError ;?></span>
            <?php endif;?>
</div>
<p>

</div>
<p>

<div class="form-actions" action="competence.php" methode="post">
<input type="submit" class="btn btn-success modif" name="submit" value="Ajouter" ONCLICK="submitForm()">
            <a class="btn supprime" href="admin.php">Retour</a>
</div>
<p>

            </form>
<p>
            
            
            
</div>
<p>
        


<?php

function switchcolor()
{ 
static $couleur;
$rouge = "#f81212";
$orange = "#e56f38";
$jaune = "#e2e538";
$vert = "#69e538";
$bleu = "#0e58c7";
$violet = "#920ec7";
$marron = "#793f2e";
$noir = "#00000";

if ($couleur == $rouge)
    {
    if ($couleur == $orange) {
        if ($couleur == $jaune) {
            if ($couleur == $vert) {
                if ($couleur == $bleu) {
                    if ($couleur == $violet) {
                        $couleur = $marron;
                    }
                }
            }
        }
    }
    }
    
else
    {
    $couleur = $noir;
    }
return $couleur; 
}


?>
    </body>
</html>