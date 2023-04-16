<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <!-- Template Main CSS File -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="assets/vendor/aos/aos.css" rel="stylesheet">
<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
<link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
<link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
<!-- Template Main CSS File -->
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="../../assets/css/connexion.css" rel="stylesheet">

</head>
<body>

<div id="exForm">
    
    
    <form action="connexion.php" method="post">

        
        <fieldset>
                <legend> <h2>Connexion </h2></legend>

                    <label for="Connexion">Utilisateur :</label>
                    <input name="login" type="text" placeholder required="Indiquez ce champ"><br>

                    <label for="Connexion">Mot de passe :</label>
                    <input name="password" type="password" placeholder required="Indiquez ce champ"><br>

                    <button type="submit" >Connexion </button>
        </fieldset>
    </form>


<span color="pink">

<?php

$login = "toto";
$password = "1234";
session_start();

if(isset($_POST["login"]) && isset($_POST["password"])){
    if($_POST["login"] == $login && $_POST["password"] == $password) {

        $_SESSION['connexion'] = true;
    }else{
if ($login !== "toto") {
    echo "Erreur d'utilisateur";
}    
elseif ($password !== "1234") {
    echo  "Erreur de mot de passe";
}  
    echo("Erreur, votre nom d'utilisateur ou votre mot de passe est incorrect !");
    }
    
}

if (isset($_SESSION['connexion'])) {
    header('Location: ./admin.php');
}
?></span>
</div>


</body>
</html>