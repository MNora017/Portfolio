<?php include_once ("../pdo/configPDO.php");

/*
//Vous pouvez prendre tout le contenu de cette page pour l'insérer là où vous voulez sur votre site, attention à bien mettre ce code dans un page avec l'extension .php pour que le code fonctionne

//enregistrer le mail dans une base de donnée ou le recevoir par mail ?
$queFaitOn = 'mail'; //'mail' ou 'bdd'
//votre mail pour recevoir les nouvelles adresses:
$mail_admin='cnora1701@email.com';
//si le bouton "S'inscrire" est cliqué, on traite le formulaire
if(!empty($_POST['mail'])){
    
    //on vérifie la validité de l'adresse mail
    //pour une explication de cette regex, vous pouvez aller ici : https://www.c2script.com/scripts/verifier-une-adresse-mail-en-php-s2.html
    if(!preg_match("#^[-\w]+((\.[-\w]+){1,})?@[-\w]+\1?\.[a-z]{2,}$#i",$_POST['mail']))
        echo "<p>L'adresse mail est incorrecte.</p>";
    else {
        
        //soit on s'envoi le mail par courriel, soit un l'enregistre dans une base de données
        
        if($queFaitOn == 'mail'){
            
            //l'envoyer par mail
            mail($mail_admin,"Nouveau mail","Nouvelle inscription newsletter pour {$_SERVER['HTTP_HOST']} : ".$_POST['mail']);
        
        } else {
            
            //l'enregistrer en BDD
            
            //il vous faudra bien évidemment ouvrir un connexion MySQLi avec mysqli_connect() et créer la table newsletter
            
            //juste par sécurité, il vous faudra protéger contre les attaques de injections SQL mais avec la preg_match ya pas besoin :)
            mysqli_query($mysqli,"INSERT INTO newsletter SET mail='".$_POST['mail']."'");
        
        }
        
        echo "<p>Merci pour votre inscription, nous allons bientôt vous envoyer nos newsletters !</p>";
    }
    
}*/


$dbh = new PDO($dsn, $user, $password); // On crée un objet nomme dbh
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql="SELECT * INTO newsletter ";
if (isset($_GET)) {
    $sql="INSERT INTO newsletter (mail)";
}

?>


