<?php   require_once ("Menu.php");


include '../pdo/configPDO.php';
try {
    $dbh = new PDO($dsn, $user, $password); // On crée un objet nomme dbh
    $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}

catch (PDOException $e) {
    $msg = 'ERREUR PDO dans File'. $e->getFile() . 'L.' . $e->getLine() . ':' . $e->getMessage();
die($msg);
}

$com = $dbh->prepare('SELECT * FROM competence');
$com->execute();// On exécute la requête //donner

// modifier
if (isset($_POST)) {
    
$saisi_id = '';//htmlspecialchars($_POST['id']);
$saisi_nom = '';//htmlspecialchars($_POST['nom']);
$saisi_description = '';//nl2br(htmlspecialchars($_POST['description']));
$saisi_icone = '';//htmlspecialchars($_POST['icone']);
$saisi_couleur = '';//htmlspecialchars($_POST['couleur']);
$saisi_url = '';//htmlspecialchars($_POST['url']);

$update = $dbh->prepare("UPDATE competence SET nom='$saisi_nom', description='$saisi_description', icone='$saisi_icone', couleur='$saisi_couleur', url='$saisi_url' WHERE id='$saisi_id'");
$update->execute();


$com = $dbh->prepare('SELECT * FROM competence');
$com->execute();// On exécute la requête //donner


//$_SESSION['varname'] = $saisi_id;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Tableau de competence</title>
        
        <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../../assets/css/connexion.css" rel="stylesheet">
    <link href="admin.css" rel="stylesheet">
        

    </head>
    <body>
    <?php
        require_once ("Menu.php");
        ?>

<div class="container">

    <div class="row">

        <h1>Affichage du tableau</h1>
        <p>
        </div>
        <p>

            <div class="row">
                <a href="ajoutCompetence.php" class="bttn bttn-success" value="">Ajouter des compétences</a>                          
                    <div class="table-responsive">

                        <table class="table table-hover table-bordered">

                            <thead>

                                <th>Id</th>

                                <th>Nom</th>

                                <th>Déscription</th>

                                <th>Icone</th>

                                <th>Couleur</th>

                                <th>Url</th>

                                <th>
                                    <a class="btn btn-success modif" href="tableau/modifier.php" >Modifier</a>
                                </th>

                                <th>
                                    <a class="btn btn-danger supprime" href="tableau/supprimer.php" >Supprimer</a>
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
                        <?php echo $row["description"]; ?>
                    </td>
                    <td>
                        <?php echo $row["icone"]; ?>
                    </td>
                    <td>
                        <?php echo $row["couleur"]; ?>
                    </td>
                    <td>
                        <?php echo $row["url"]; ?>
                    </td>

                <td>
                    <a class="btn btn-success modif" href="tableau/modifier.php?id=<?php echo  $row['id']; ?> ">Modifier</a>
                </td>
                <td>
                    <a class="btn btn-danger supprime" onclick='return confirm(\"Etes vous sur de vouloir suprimer la ligne" <?php echo $row["id"] ?> "?"\)' href="tableau/supprimer.php?id=<?php echo $row['id']; ?>">Supprimer</a>
                            
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
