<!DOCTYPE html>
<html lang="en">
<head><!--
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="admin.php">
    <link href="../../assets/css/connexion.css" rel="stylesheet">
    <title>Fichier</title>

    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <p>
    <br>
<div class="marg">
<form action="image.php" method="post" enctype="multipart/form-data">
<h2>
Le téléchargement du fichier est réussi</h2>


<label for="file_name">Filename:</label>
    <input type="file" name="fileToUpload" id="fileToUpload">
    
    <button type="submit">Télécharger</button> 
<p><strong>Note:</strong> Seuls les formats .jpg, .jpeg, .gif .png autorisés jusqu’à une taille maximale de 5 Mo.</p>

</form>
</div>
-->
</body>
</html>



<?php 
require '../pdo/menu.php';
include '../pdo/configPDO.php';

?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>fichier</title>
        
        <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../../assets/css/connexion.css" rel="stylesheet">
    <link href="admin.css" rel="stylesheet">
        

    </head>
    <body>

<div class="container">

    <div class="row">

        <h1>Le téléchargement du fichier est réussi</h1>
        
        <a class="espace btn car centre btn-success modif" href="image.php" >Retour</a>
            
    </body>
</html>
