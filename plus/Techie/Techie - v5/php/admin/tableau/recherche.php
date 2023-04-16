<?php
  //session_start();
  include '../../pdo/configPDO.php';
 



  
  if(isset($_GET['competence'])){
    $competence = (String) trim($_GET['competence']);
    
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req = $dbh->query("SELECT * FROM competence 
    WHERE nom 
    /*LIKE id*/
    LIMIT 10", 
    array("$competence%"));
 
    $res = $req->fetchALL();
  
    foreach($res as $r){
      ?>   
        <div style="margin-top: 20px 0; border-bottom: 2px solid #ccc">
        <?php echo $r['nom'] . " " . $r['description'] . " " . $r['icone'] . " " . $r['couleur'] . " " . $r['url'] ?></div>
        <?php    
    }
  } 
?>
    