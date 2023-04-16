<?php
if (isset($_POST['mailform'])) {
 

$header="MIME-Version: 1.0\r\n";
$header.='From:"PrimFX.com"<support@prinfx.com>'."\n";
$header.='Content-Type:text/html; cahset= "uft-8"'."\n";
$header.='Content-Transfer-Encoding: 8bit';

$message='

<html>

<body>
    <div align="center">
    J\'ai envoyé ce mail avec PHP !
    </div>
</body>
</html>
';


mail("nora.chamekh017@gmail.com","PHP test mail", $message, $header);

}
?>

<form action="POST">
    <input type="submit" value="Recevoir un mail !">
</form>