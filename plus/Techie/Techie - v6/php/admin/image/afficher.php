<?php require ('../../pdo/menu.php');

include '../../pdo/configPDO.php';
try {
    $dbh = new PDO($dsn, $user, $password); // On crée un objet nomme dbh
    $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}

catch (PDOException $e) {
    $msg = 'ERREUR PDO dans File'. $e->getFile() . 'L.' . $e->getLine() . ':' . $e->getMessage();
die($msg);
}

$com = $dbh->prepare('SELECT * FROM image');
$com->execute();// On exécute la requête //donner

?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Tableau de image</title>
        
        <link href="../../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../../../assets/css/connexion.css" rel="stylesheet">
    <link href="../admin.css" rel="stylesheet">
        
    </head>
    <body>

<div class="container">

    <div class="row">

        <h1>Affichage du tableau</h1>
        <p>
        </div>
        <p>

            <div class="row">
                <a href="ajouter.php" class="bttn bttn-success" value="">Ajouter des images</a>                          
                    <div class="table-responsive">

                        <table class="table table-hover table-bordered">

                            <thead>

                                <th>Id</th>

                                <th>Nom</th>

                                <th>Déscription</th>

                                <th>Photo</th>

                                <th>
                                    <p class="centre" style="margin:0;">Modifier</p>
                                </th>

                                <th>
                                    <p class="centre" style="margin:0;">Supprimer</p>
                                </th>

                            </thead>

<?php while($row = $com->fetch(PDO::FETCH_ASSOC)) {    ?>
        <tbody>
            <div class="grid" data-isotope='{ "itemSelector": ".grid-item", "layoutMode": "fitRows" }'>
                    <td>
                        <?php echo $row["id"]; ?>
                    </td>
                    <td>
                        <?php echo $row["nom"]; ?>
                    </td>
                    <td>
                        <?php echo $row["description"]; ?>
                    </td>
                    <td>
                        <?php echo $row["image"]; ?>
                    </td>

                <td class="centre">
                    <a class="btn modif" href="modifier.php?id=<?php echo  $row['id']; ?> ">Modifier</a>
                </td>
                <td class="centre">
                    <a class="btn supprime" href="supprimer.php?id=<?php echo  $row['id']; ?> ">Supprimer</a>
                            
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
