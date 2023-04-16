

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menu</title>

    <!-- Favicons -->
    <link href="assets/image/papillon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="../../assets/css/style.css" rel="stylesheet">
  <link href="admin.css" rel="stylesheet">
  <!-- <link href="../../assets/css/connexion.css" rel="stylesheet">-->
</head>
<body>
  

<!-- ======= Header ======= -->

<!-- ======= Header ======= -->
<header id="header" class="fixed-top " style="position:fixed;">
    <div class="container d-flex align-items-center justify-content-between">
      <h1 class="centre logo"><a href="start.php"><img src="../../assets/image/Nom-pro.png"> Nora</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="../../start.php">Apercue</a></li>
          <li><a class="nav-link scrollto " href="competence/afficher.php"> Compétence</a></li>
          <li><a class="nav-link scrollto " href="projet/projet.php"> Projets</a></li>
          <li><a class="nav-link scrollto" href="image/Upload.php"> Image</a></li>
          <li><a class="nav-link scrollto" href="#services">Vidéo</a></li>
          

        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

          <!-- Déconnexion -->

<form class="deco " action="deconnexion.php" method="post">
<button type="submit"> Déconnexion</button>
</form>
<!-- -->
          
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

</body>
</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Connexion</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
</head>
<body>
<p><p></br></br></br>
    <?php include ("../pdo/presentationAuteur.php");
      session_start();

      if (isset($_SESSION["connexion"])) {
        
        ?>
</br>
  
          
    <?php
    echo('<h3> <p> Vous êtes bien connecté ! </h3>');
    echo(' <h1 >Bienvenue');
                        echo ('<h2 class="centre">'). $row ["prenom"];
                        echo "&nbsp;".$row["nom"]. ('</h2>');
                ?> 
<?php  


        
    } else {
        header('Location: ./connexion.php');
    }
?> 


<?php
require_once 'recherche.php';
?>
</body>
</html>