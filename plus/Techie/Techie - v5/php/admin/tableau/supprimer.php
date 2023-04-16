<?php include '../../pdo/configPDO.php';  
/*
try {
    $dbh = new PDO($dsn, $user, $password); // On crée un objet nomme dbh
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
}

catch (PDOException $e) {
    $msg = 'ERREUR PDO dans File'. $e->getFile() . 'L.' . $e->getLine() . ':' . $e->getMessage();
die($msg);
}

$sql = "DELETE * FROM competence WHERE id=:id"; //Base de données / création de la base de données sql
// echo "<br/> $sql <br/>";

try {
    $result = $dbh->query($sql); // envoyer la requete au sgbdr
    $row = $result->fetch(); //récupérer le jeu de résultat 
//echo $row['nom']; 
}

catch (Exception $e) {
    $msg = 'ERREUR PDO dans File' . $e->getFile() . 'L.' . $e->getLine() . ';' .$e->getMessage(); 
}
*//*
$dbh = new PDO($dsn, $user, $password);
//$msg = '';
// Check that the competence ID exists
if (isset($_GET['id']) AND !empty($_GET['id'])) {
    if (confirm("Êtes vous sur de votre choix ")) {
$sup=$_GET['id'];
    $requet = $dbh->prepare('SELECT * FROM competence WHERE id = :id');
    $requet->bindValue(":id",$sup);
$requet->execute();
    $compt = $requet->fetch(PDO::FETCH_ASSOC);
    }*/
    // Select the record that is going to be deleted


    

/*
if ($sql->rowCount() > 0) {
    $compt=$dbh->prepare('DELETE FROM competence WHERE id = :id');
    $compt->execute(array($sup));
    header('Location: ../competence.php');
*/
    //$sql->execute([$_GET['id']]);
    /*  $comp = $sql->fetch(PDO::FETCH_ASSOC);
    if (!$comp) {
        exit('L\'ID n\'existe pas !');
    }
    // Make sure the user confirms beore deletion
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'oui') {
            // User clicked the "Yes" button, delete record
            $sql = $dbh->prepare('DELETE FROM competence WHERE id=$id');
            $sql->execute([$_GET['id']]);
            $msg = 'tu as supprimer cette competence !';
        }else {
            // User clicked the "No" button, redirect them back to the read page
            header('Location: ../competence.php');
            exit;
        }*/ 
   /*}
//} 
else {
    exit(' L\'ID n\'est pas specifier!');
}*/

/*
try {
    $dbh = new PDO($dsn, $user, $password); // On crée un objet nomme dbh
    $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}

catch (PDOException $e) {
    $msg = 'ERREUR PDO dans File'. $e->getFile() . 'L.' . $e->getLine() . ':' . $e->getMessage();
die($msg);
}

$result = $dbh->prepare('SELECT * FROM competence');
$result->execute();// On exécute la requête //donner

if($_SERVER["REQUEST_METHOD"]== "POST" && !empty($_POST)){

    $sql = "DELETE FROM competence WHERE id = ['id']";

    $query = $dbh->prepare($sql);

    $query->bindValue('id', $id, PDO::PARAM_INT);
    
//$result = $query->fetch();
$result = $query->fetch(PDO::FETCH_ASSOC);
    header('Location: ../competence.php');
}
$id=$_POST['id'];
$nom=$_POST['nom'];
		$description=$_POST['description'];
		$icone=$_POST['icone'];
		$couleur=$_POST['couleur'];
        $url=$_POST['url'];

*/
/*
$id=0; 
if(!empty($_GET['id'])){ $id=$_REQUEST['id']; } 
if(!empty($_POST)){ $id= $_POST['id']; //$pdo=PDO::connect(); 
    $bdh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql ="DELETE from competence where id = '$id'";
    //$sql = "DELETE *  FROM competence WHERE $result[id]";
   // $sql = "DELETE FROM competence  WHERE id = ?";
        $bdh->exec($sql);
    //$q = $bdh->prepare($sql);
        //$q->execute(array($id));
        //Database::disconnect();
        header("Location:../competence.php");
    
}
*/

/*
if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = strip_tags($_GET['id']);
    $sql = "DELETE FROM competence WHERE id=$id;";

    $query = $dbh->prepare($sql);

    $query->bindValue('id', $id, PDO::PARAM_INT);
    $query->execute();

    header('Location: ../competence.php');
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    if (!empty($id) && is_numeric($id)) {
        $query = "Suprimer le compétence de la lign id=$id";
        $bdh = execute($query);
        header("Location: ../competence.php");
    }
}*/

?>

<?php /*include '../../pdo/configPDO.php'; 
$dbh = new PDO($dsn, $user, $password);
//$msg = '';
// Check that the competence ID exists
if (isset($_GET['id'])) {
    $id = htmlentities($dbh->quote($_GET['id']));
$sup=$_GET['id'];
    $delete = $dbh->query("DELETE FROM competence WHERE id=$id ");
    if ($delete) {
        echo "Le compte à été supprimé.";
    }
}


if (isset($_POST['oui'])) {
    $nom = htmlentities($dbh->quote($_GET['nom']));
    $description = htmlentities($dbh->quote($_GET['description']));
    $icone = htmlentities($dbh->quote($_GET['icone']));
    $couleur = htmlentities($dbh->quote($_GET['couleur']));
    $url = htmlentities($dbh->quote($_GET['url']));

    $requet = $dbh->query("INSERT INTO competence SET nom=$nom, description=$description, icone=$icone, couleur=$couleur, url=$url");
    $select = $dbh->query("SELECT * FROM competence");
    while ($tabValeurs = $requet->fetch()) {
        echo "ID : ".$tabValeurs[0]." Nom : ".$tabValeurs[1]." Déscription : ".$tabValeurs[0]." Icone : ".$tabValeurs[0]." Couleur : ".$tabValeurs[0]." URL : ".$tabValeurs[0]."<ahref='supprimer.php?id=".$tabValeurs[0]."'>Suprimer</a></br>";
    }
}*/

?>


<?php include_once ("../../pdo/configPDO.php");

//$var_value = $_GET['varname'];
//$id = $_POST['id'];
//$id =  "10";
//echo $id;
//$sql = "SELECT competence (id, nom, description, icone, couleur, url) values('$id', '$nom', '$description', '$icone', '$couleur', '$url')";
    //echo $var_value;
    echo $row['id'];
    $sql = "DELETE FROM competence WHERE id = 3";
        
    try {
        $dbh = new PDO($dsn, $user, $password); // On crée un objet nomme dbh
        $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    }
    
    catch (PDOException $e) {
        $msg = 'ERREUR PDO dans File'. $e->getFile() . 'L.' . $e->getLine() . ':' . $e->getMessage();
    die($msg);
    }
    

    $com = $dbh->prepare($sql);
    $com->execute();// On exécute la requête //donner
    $row = $com->fetch(PDO::FETCH_ASSOC);// On stocke le résultat dans un tableau associatif // $row récupere es donner
//header('Location: ../competence.php'); 

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

    <script language="JavaScript">
     /*   function choix() {
if (confirm("Êtes vous sur de votre choix ")) {
*/
    <?php/* include '../../pdo/configPDO.php'; 
$dbh = new PDO($dsn, $user, $password);
//$msg = '';
// Check that the competence ID exists
if (isset($_GET['id']) AND !empty($_GET['id'])) {
    if (confirm("Êtes vous sur de votre choix ")) {
$sup=$_GET['id'];
    $requet = $dbh->prepare('SELECT * FROM competence WHERE id = :id');
    $requet->bindValue(":id",$sup);
$requet->execute();
    $compt = $requet->fetch(PDO::FETCH_ASSOC);
    }
    }
else {
    exit(' L\'ID n\'est pas specifier!');
}*/
?>
}
} 
    </script>
    
<body>

<div class="container">
<div class="span10 offset1">

<div class="row">
<p>
<h2>Supprimer</h2>
<p>

</div>

<form class="form-horizontal" action="suprimer.php" method="post">
                <!--   <input type="hidden" name="id" value="<?php //echo $id;?>"/>-->  
    <p>                
Est tu sur de vouloir supprimer la ligne suivant  ?
</p>
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
        <label class="control-label">Icone</label>
    </td>
    <td>
        <label class="control-label">Couleur</label>
    </td>
    <td>
        <label class="control-label">Couleur</label>
    </td>
</tr>
</thead>

<tbody>
<tr> 
    
    <td>
    <?php //echo $sup; ?>  <?php  //echo !empty($id)?$id:'';?>
    </td>
    <td>
    <?php //echo $compt["nom"]; ?> <?php //echo !empty($nom)?$nom:'';?>
    </td>
    <td> 
    <?php //echo $compt["description"]; ?>    <?php //echo !empty($decription)?$description:'';?>
    <td>
    <?php //echo $compt["icone"]; ?>    <?php //echo !empty($icone)?$icone:'';?>
    </td>
    <td>
    <?php //echo $compt["couleur"]; ?> <?php //echo !empty($couleur)?$couleur:'';?>
    </td>
    <td>
    <?php //echo $compt["url"]; ?> <?php //echo !empty($url)?$url:'';?>
    </td>
</tr>
</tbody>

</table>
<p>

    <a href="../competence.php?id=<?php //echo  $compt['id'] ; ?>">
    <button class=" modif" value="oui" 
    <?php  //$sql = $dbh->prepare("DELETE * FROM competence WHERE id = :id"); $sql->bindValue(":id",$sup); $sql->execute(); ?> >OUI</button>
</a>


        <a class=""  href="../competence.php?id=<?php //echo  $compt['id'] ; ?> "><button class="supprime" value="non">NON</button> </a>

</form>
</div>
</div>

</body>
</html>


