<?php
if (!empty($_GET)) { 
        echo '<p>Le bouton est le bouton n°'; 
        if (isset($_GET['bouton2'])) { 
            echo '2'; 
        } elseif (isset($_GET['bouton3'])) { 
            echo '3'; 
        } else { 
            echo '1';
        } 
    }
?>


<?php include '../../pdo/presentationAuteur.php';

    if (isset($_GET['err'])) { 
    echo "Connected!";
    $sql = "INSERT INTO conpetence (id,nom,description,icone,couleur, url) VALUES ('1', 'Nora17', 'Highway', 'Heee', 'rouge', 'htppp')";
    
    if (isset($_GET['err'])) {
    echo "1 record inserted";
    }
} $result = $dbh->query($sql);// envoyer la requete au sgbdr
$row = $result->fetch();//récupérer le jeu de résultat
        ?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Tableau de competence</title>
        
        <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../../assets/css/connexion.css" rel="stylesheet">       

        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
        
        <input type="SUBMIT" name="bouton1" value="Le bouton 1">
        <input type="SUBMIT" name="bouton2" value="Le bouton 2">
        <input type="SUBMIT" name="bouton3" value="Le bouton 3">
        </form>


        
    </body>
</html>