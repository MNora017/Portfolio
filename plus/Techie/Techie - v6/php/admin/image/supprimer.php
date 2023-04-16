<?php require ('../../pdo/acceuil.php');

include_once ("../../pdo/configPDO.php");

    $dbh = new PDO($dsn, $user, $password);

    if (isset($_GET['id']) AND !empty($_GET['id'])) {
        $mod=$_GET['id'];
    $sql = $dbh->prepare("SELECT * FROM image WHERE id = $mod");
    $sql->execute(array($mod));
    if ($sql->rowCount() > 0) {
        $comp = $sql->fetch();
        $id = $comp['id'];
        $nom = $comp['nom'];
        $description = str_replace('<br />', '', $comp['description']);
        $image = $comp['image'];
    }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    
    <link href="../../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../../../assets/css/connexion.css" rel="stylesheet">
    <link href="../admin.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
    </head>

<body>

<div class="container">
<div class="span10 offset1">

<div class="row">
<p>
<h2>Supprimer</h2>
<p>

</div>

<form action="confsupp.php" method="post">
            <h5>                
Est tu sur de vouloir supprimer la ligne suivant  ?
</h5>
<p>

<table class="table table-hover table-bordered"> 
<thead>
<tr> 
    <td>
        <label class="control-label">ID</label>
    </td>
    <td> 
        <label class="control-label">Nom</label> </td>
    <td>
        <label class="control-label">Déscription</label>
    </td>
    <td>
        <label class="control-label">Image</label>
    </td>

</tr>
</thead>

<tbody>
<tr> 
    
    <td>
    <?php echo $id; ?></p>  <?php  //echo !empty($id)?$id:'';?>
    </td>
    <td>
    <?php echo $nom; ?> <?php //echo !empty($nom)?$nom:'';?>
    </td>
    <td> 
    <?php echo $description; ?>    <?php //echo !empty($decription)?$description:'';?>
    <td>
    <?php echo $image; ?>    <?php //echo !empty($image)?$image:'';?>
    </td>

</tr>
</tbody>

</table>
<p>

    <a class="btn car marg  modif" href="confsupp.php?id=<?php echo $id?>">Oui</a>
        <a class="btn marg supprime" href="afficher.php">Non </a>

</form>
</div>
</div>

</body>
</html>

