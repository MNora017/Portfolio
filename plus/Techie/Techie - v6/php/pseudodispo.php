<label for="">
    pseudo
</label>
<input type="text">
<button>validate</button>

<?php

include_once('pdo/configPDO.PHP');
if (isset($_POST['pseudoPHP'])&&!empty($_POST['pseudoPHP'])) {
    $pseudo =$_POST['pseudoPHP'];
    echo "<br/> sans PDO::quote pseudo = ".$pseudo;
    $pseudo = $pdo-> quote ($_POST['pseudoPHP']);
    echo ("<br/> avec PDO::quote pseudo = ");
    echo $pseudo;
    $sql="SELECT COUNT(*) FROM auteur WHERE nom = $pseudo";
    echo ("<br/>");
    echo $sql;
    $res = $pdo->query($sql);
    
    if ($res->fetchColumn()>0) {
        $sql="SELECT id, pseudo, nom, prenom FROM presentation WHERE id = 1";
        $query = $pdo->query($sql);
        $row =$query->fetch();
        echo ("<br/>");
        echo "<b>".$row['nom']."</b>";
        echo("Ce pseudo vient de la base de donnée");
        echo ("<br/> Le pseudo existe déjà !!!! Veuillez changer de pseudo. ");
        $pseudo = strislashes($pseudo);
        echo ('<br/> avec strislashes pseudo = ');
        echo $pseudo;
    } else {
        echo ("<h3> Le pseudo est disponible </h3>");
    }
    
} 

?>


<div id="exForm">
    
    
    <form action="connexion.php" method="post">
        
        <fieldset>
                <legend> <h2>Présentation </h2></legend>
                    
                    <label for="presentation">Pseudo :</label>
                    <input name="pseudo" type="text" placeholder="Entrer votre pseudo" required="Indiquez votre pseudo"><br>

                    <label for="presentation">Nom :</label>
                    <input name="nom" type="text" placeholder="Entrer votre nom" required="Indiquez votre nom"><br>

                    <label for="presentation">Prénom :</label>
                    <input name="prenom" type="text" placeholder="Entrer votre prénom" required="Indiquez votre prenmom"><br>

                    <button type="submit" >Ajouter </button>
        </fieldset>
    </form>
</div> 

</body>
</html>


<?php

if(isset($_POST["nom"]) && isset($_POST["prenom"])){
    $sql = "SELECT id, pseudo, nom, prenom FROM presentation ";
    //$query_nom = "INSERT INTO personne (nom) VALUES (:nom) ";
    }else{
        echo("Erreur");
    }

?>  
    
    <?php include_once ("pdo/configPDO.php");

$sql = "SELECT id, pseudo, nom, prenom FROM presentation ";

  // Vérifie qu'il provient d'un formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pseudo = $_POST["pseudo"]; 
    $prenom = $_POST["prenom"];
    $nom = $_POST["nom"]; 
    $row = $result->fetch();

    if (!isset($pseudo)){
        die("Veuillez entrez votre pseudo");
        echo $row ["pseudo"];

    }
    if (!isset($prenom)){
        die("Veuillez entrez votre prenom");
        echo $row ["nom"];
    
    }
    if (!isset($nom) || !filter_var($nom, FILTER_VALIDATE_EMAIL)){
        die("Veuillez entrez votre nom");
        echo $row ["prenom"];
    }
    
    print "Salut " . $prenom . $nom . "! Votre pseudo est ". $pseudo;
    }

    $dbh = new PDO($dsn, $user, $password); // On crée un objet nomme dbh
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $result = $dbh->query($sql); // envoyer la requete au sgbdr
    $row = $result->fetch();
    
?>  


<table class="table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Pseudo</th>
        <th>Nom</th>
        <th>Prénom</th>
    </tr>
    <tr>
        <th><?php echo $row ["id"]; ?></th>
        <th><?php echo $row ["pseudo"]; ?></th>
        <th><?php echo $row ["prenom"]; ?></th>
        <th><?php echo $row ["nom"]; ?></th>
    </tr>
    </thead>
    

</table>
