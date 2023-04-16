<?php

header("Cache-Contol: no-cache, must-revalidate");
header("Content-type: text/html; charset=utf-8");

$dsn = 'mysql:host=localhost;dbname=club;ch rset=UTF8';
$user = 'root';
$password = '';


try {
    $dbh = new PDO ($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch (PDOException $e) {
    $msg = 'ERREUR PDO dans file'. $e->getFile() . 'L.' . $e->getLine() . ':' . $e->getMessage();
die($msg);
}

$sql = "SELECT*FROM adherent";
echo "<br/> $sql <br/>";

try {
    $result = $dbh->query($sql);

    while($rows = $result->fetch()) {
        echo "<h3> réponse de la requête sous forme de tableau associatif </h3>";
        echo "<h1>" .$rows["nom"] . " " .$rows["prenom"] . " " .$rows["dateNaissance"] . '</h1>'; 
        echo "<h3> réponse de la requête sous forme de tableau indexé par le numéro </h1>";
        echo "<h1>" .$rows[0] . " " .$rows[1] . " " .$rows[2] . '</h1>'; 

    }
}

catch (Exception $e) {
    echo "<br/> Errer sur la requête SELECT";
}

?>

<section>
    <div>
        <div>
            <div>
                <h5>
                    Je suis
                </h5>
                <h1>
                    <?php
                            echo $row ["prenom"];
                            echo "$nbsp;".$row["nom"];
                    ?>
                </h1>
                <h5>
                    <?php
                        echo $row["fonction"];
                    ?>
                </h5>
            </div>
        </div>
    </div>
</section>