<?php   
include '../../pdo/configPDO.php';
try {
    $dbh = new PDO($dsn, $user, $password); // On crée un objet nomme dbh
    $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}

catch (PDOException $e) {
    $msg = 'ERREUR PDO dans File'. $e->getFile() . 'L.' . $e->getLine() . ':' . $e->getMessage();
die($msg);
}

$com = $dbh->prepare('INSERT INTO video (id, nom, video, description) VALUE ');
$com->execute();// On exécute la requête //donner

// modifier
if (isset($_POST)) {
    
$saisi_id = '';//htmlspecialchars($_POST['id']);
$saisi_nom = '';//htmlspecialchars($_POST['nom']);
$saisi_description = '';//nl2br(htmlspecialchars($_POST['description']));
$saisi_video = '';//htmlspecialchars($_POST['video']);

$update = $dbh->prepare("UPDATE video SET nom='$saisi_nom', video='$saisi_video', description='$saisi_description' WHERE id='$saisi_id'");
$update->execute();


$com = $dbh->prepare('SELECT * FROM video');
$com->execute();// On exécute la requête //donner
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Tableau de video</title>
        
        <link href="../../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../../../assets/css/connexion.css" rel="stylesheet">
    <link href="../admin.css" rel="stylesheet">
        

    </head>
    <body>
    <?php
        require_once ("../../pdo/menu.php");
        ?>

<div class="container">

    <div class="row">

        <h1>Affichage du tableau</h1>
        <p>
        </div>
        <p>

            <div class="row">
                <a href="ajouter.php" class="bttn bttn-success" value="">Ajouter des vidéos</a>                          
                    <div class="table-responsive">

                        <table class="table table-hover table-bordered">

                            <thead>

                                <th>ID</th>

                                <th>Nom</th>
                                
                                <th>Vidéo</th>
                                
                                <th>Déscription</th>

                                <th>
                                    <a class="btn btn-success modif" href="modifier.php" >Modifier</a>
                                </th>

                                <th>
                                    <a class="btn btn-danger supprime" href="supprimer.php" >Supprimer</a>
                                </th>

                            </thead>


<?php while($row = $com->fetch(PDO::FETCH_ASSOC)) {    ?>
        <tbody>
            <div class="grid" data-isotope='{ "itemSelector": ".grid-item", "layoutMode": "fitRows" }'>
                    <td>
                        <?php echo  $row["id"]; ?>
                    </td>
                    <td>
                        <?php echo $row["nom"]; ?>
                    </td>
                    <td>
                        <?php echo $row["video"]; ?>
                    </td>
                    <td>
                        <?php echo $row["description"]; ?>
                    </td>
                    
                
                <td>
                    <a class="btn btn-success modif" href="modifier.php?id=<?php echo  $row['id']; ?> ">Modifier</a>
                </td>
                <td>
                    <a class="btn btn-danger supprime" onclick='return confirm(\"Etes vous sur de vouloir suprimer la ligne" <?php echo $row["id"] ?> "?"\)' href="supprimer.php?id=<?php echo $row['id']; ?>">Supprimer</a>
                            
                </td>
                </tr>
            </div>
        </tbody>

<?php } ?>

    <p><br><p>

    </table>

    </div> 
    </div>
    </div>
    </body>
</html>
