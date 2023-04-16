
    
    <?php include '../pdo/configPDO.php';
    $dbh = new PDO($dsn, $user, $password); // On crée un objet nomme dbh
        
$rec = $dbh->query('SELECT * FROM competence ORDER BY id DESC');

if(isset($_GET['q']) AND !empty($_GET['q'])){

  $q =htmlspecialchars($_GET['q']);
  $rec = $dbh->query('SELECT * FROM competence WHERE nom LIKE "%'.$q.'%" ORDER BY id DESC');

  if ($rec->rowCount() == 0) {
    $rec = $dbh->query('SELECT * FROM competence WHERE CONCAT(nom,description) LIKE "%'.$q.'%" ORDER BY id DESC');
  }
}

    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../../assets/css/connexion.css" rel="stylesheet">
    <link href="admin.css" rel="stylesheet">
      
      
      <title>Recherche</title>
    </head>
    <body>

<div class="container">
    <br/>
	<div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8">
                        
                            <form class="form-group card card-sm" method="GET" style="padding: 0 20px 0 0;">
                                <div class="card-body row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <i class="bi  bi-search fas fa-search h4 text-body"></i>
                                    </div>
                                    
                                    <div class="col">
                                        <input class="form-control form-control-lg form-control-borderless" id="recherche" type="search" placeholder="Rechercher" name="q" >
                                    </div>
                                    <p>
                                    <div id="result-competence">
                                        
                                        </div>
                                <div class="col-auto centre"><p>
                                        <input class="modif btn btn-lg" type="submit" value="Rechercher">
                                    </div>
                                <div  id="result-search">
                                    </div>
            
                                </div>
                            </form>
                            </div>
                        <br>
                    </div>
                    <br>
</div>


    <?php if ($rec->rowCount() > 0) { ?>
  <ul>
    <?php while ($a = $rec->fetch()) {
      ?> 
      
      
  <div class="table-responsive">
<p>
    <table class=" table-hover table-bordered">
      <thead>
        <th>
          Nom
        </th>
        <th>
          Déscription
        </th>
      </thead>
      <tr> 
        <p>
      <tbody>
      <div class="grid" data-isotope='{ "itemSelector": ".grid-item", "layoutMode": "fitRows" }'>
                    
        <td> <?php echo $a['nom']; ?> </td>
        <td><?php echo $a['description']; ?></td>
      
      </div>
      <tbody>

      </tr>
      <?php } ?>
    </table>
  </div>
    
    </ul>
<?php } else { ?> 
  <p class="centre">
    Aucun résultat trouver pour : 
  
  <?php echo $q; ?> 
  ... </p>
<?php } ?>
    
    </body>
    </html>