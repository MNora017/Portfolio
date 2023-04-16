<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    
    <link href="../../assets/css/connexion.css" rel="stylesheet">
    <title>Fichier</title>

    <link rel="stylesheet" href="admin.css">
</head>
<body>
    
<div class="picker-content">
<form action="telechargement.php" method="post" enctype="multipart/form-data">
<h2></h2>
Télécharger une image
<label for="file_name">Filename:</label>
    <input type="file" name="fileToUpload" id="fileToUpload">
    
    <button type="submit">Télécharger</button> 
<p><strong>Note:</strong> Seuls les formats .jpg, .jpeg, .gif .png autorisés jusqu’à une taille maximale de 5 Mo.</p>
    </form>
</div>

</body>
</html>