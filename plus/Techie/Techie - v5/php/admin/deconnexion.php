<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Déconnexion</title>
    
</head>
<body>
  <?php

session_start();
if (isset($_SESSION["connexion"])) {
    unset($_SESSION["connexion"]);
session_destroy(); 
    header('Location: ./connexion.php');
}
header('Location: ./connexion.php');
?>  
</body>
</html>
