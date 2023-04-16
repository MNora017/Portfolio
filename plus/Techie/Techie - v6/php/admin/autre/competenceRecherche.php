<?php include '../../pdo/configPDO.php';
/*
session_start();

if (isset($_GET['contenu'])) {
 // $comp = (string) trim($_GET['comp']);
  //$req = $dbh->query("SELECT * FROM competence WHERE id <> ?", array($_SESSION['id']));
  //$req =$req->fetchALL();
  $valid = true;
$contenu = (string) trim($_GET['contenu']);
    
if (empty($contenu)) {
      $valid = false;
      $erreur = "Indiquez votre recherche";
    }
    
  if ($valid) {
    $req_research = $dbh->query("SELECT * FROM competence WHERE nom LIKE '?%' ORDER BY nom, description, icone, couleur, url LIMIT 100",array($contenu . "%"));

  // $req_research = $dbh->query("SELECT * FROM competence WHERE id ORDER BY nom, description, icone, couleur, url",array($contenu);
    $req_research = $req_research>fetchALL();
  }
  }

if (!empty($_POST)) {
  extract($_POST);
  $valid = true ;
}*/
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link href="../../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../../../assets/css/connexion.css" rel="stylesheet">

    <link href="../admin.css" rel="stylesheet">

    <title>Resultat</title>

</head>
<body>
    <!--
<div class="container">
    <div class="row">
        <div class="col-sm-0 col-md-2 col-lg-3"></div>
            <div class="col-sm-12 col-md-8 col-lg-6">
                <h1> Recherche des competence</h1>
                <p>
                <div class="form-group">
                    <input class="form-control" type="text" id="search-competence" value="" placeholder="Indiquez votre recherche" >
                </div>
                <p>
                <div id="result-competence"></div>
            </div>
        
    </div>
</div>


<div class="container">
    <br/>
	<div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8">
                        
                            <form class="form-group card card-sm" method="post" action="recherche.php">
                                <div class="card-body row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <i class="bi  bi-search fas fa-search h4 text-body"></i>
                                    </div>
                                    
                                    <div class="col">
                                        <input class="form-control form-control-lg form-control-borderless" id="search-competence" type="search" placeholder="Recherche" value="<?php if(isset($contenu)){ echo $contenu;} ?>">
                                    </div>
                                    <p>
                                    <div id="result-competence">
                                        </div>
                                <div class="col-auto">
                                        <input class="btn btn-lg" type="submit" value="Rechercher">
                                    </div>
                                <div  id="result-search">
                                    </div>
            
                                </div>
                            </form>
                            </div>
                        
                    </div>
</div>-->

<?php include '../../pdo/configPDO.php';

$resultat ="";
$nbreParametres = 2;
if (isset($_POST['recherche']) && !empty($_POST['recherche'])) {
    
$recherche = preg_replace("#[^a-zA-Z ?0-9]#i", "", $_POST['recherche'] );

if ($_POST['filtre'] == "entier") {
    $nbreParametres = 4;
    $sql = "(SELECT * AS title, table FROM competence WHERE nom Like ? OR description LIKE ?) UNION 
    (SELECT * AS title FROM ajout WHERE nom Like ? OR description LIKE ?) ";

} elseif ($_POST['filtre'] == "competence") {
    $sql = "SELECT * AS title FROM competence WHERE nom Like ? OR description LIKE ?";
}elseif ($_POST['filtre'] == "projet") {
    $sql = "SELECT * AS title FROM ajout WHERE nom Like ? OR description LIKE ?";
}


include ("../../pdo/sql.php");

$req = $dbh->prepare($sql);
if ($nbreParametres == 2) {
    $req->execute(array('%'.$recherche.'%', '%'.$recherche.'%'));
} else {
    $req->execute(array('%'.$recherche.'%', '%'.$recherche.'%', '%'.$recherche.'%', '%'.$recherche.'%'));
}

$count = $req->rowCount();

if ($count >=1) {
    echo " $count trouver pour <strong>$recherche</strong><hr/> $sql";
    while ($data = $req->fetch(PDO::FETCH_OBJ)) {
        echo '#'.$data->id.' -Titre: '.$data->title.'<br/>';
    }
    echo '<hr/>';
}else {
    echo "<hr/> Aucun de résultat trouver pour <strong>$recherche</strong><hr/> $sql";
}

}
?>


<div class="container">
    <br/>
	<div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8">
                        
                            <form class="form-group card card-sm" method="post" action="competence.php">
                                <div class="card-body row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <i class="bi  bi-search fas fa-search h4 text-body"></i>
                                    </div>
                                    
                                    <div class="col">
                                        <input class="form-control form-control-lg form-control-borderless" id="recherche" type="search" placeholder="Recherche" name="recherche" value="<?php if(isset($contenu)){ echo $contenu;} ?>">
                                    </div>
                                    <p>
                                    <div id="result-competence">
                                        <select name="filtre" id="">
                                            <option value="entier">Tous </option>
                                            <option value="competence">Competence</option>
                                            <option value="projet">Projet</option>
                                        </select>
                                        </div>
                                <div class="col-auto">
                                        <input class="btn btn-lg" type="submit" value="Rechercher">
                                    </div>
                                <div  id="result-search">
                                    </div>
            
                                </div>
                            </form>
                            </div>
                        
                    </div>
</div>

<?php echo $resultat; ?>

                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    
    <script>
  $(document).ready(function(){
    $('#search-competence').keyup(function(){
      $('#result-competence').html('');
 
      var competence = $(this).val();
 
      if(competence != ""){
        $.ajax({
          type: 'GET',
          url: 'recherche.php',
          data: 'competence=' + encodeURIComponent(competence),
          success: function(data){
            if(data != ""){
              $('#result-search').append(data);
            }else{
              document.getElementById('result-competence').innerHTML = "<div style='font-size: 20px; text-align: center; margin-top: 10px'>Aucun utilisateur</div>"
            }
          }
        });
      }
    });
  });
</script>

                            <?php
/*
                            if (isset($erreur)) {
                                echo $erreur;
                            }
if (isset($_GET['contenu']) && $valid) {

    if (count($req_search) == 0) {
        echo "Auncun résultat";
    }
    foreach ($req_search as $rs) {
        echo "<div style='border-bottom: 1px solid'>" . $rs['nom'] . " " . $rs['description'] . " " . $rs['icone'] . " " . $rs['couleur'] . " " . $rs['url'] . "</div>";
    }
}
                        */    ?>

</body>
</html>
