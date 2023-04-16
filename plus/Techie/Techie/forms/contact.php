<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */
/*
  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'nora.chamekh017@gmail.com';

  if( file_exists($php_email_form = '../php/mail.php' )) {//'../assets/vendor/php-email-form/php-email-form.php'
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_name = $_POST['surname'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subjet'];
*/
  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */
/*
  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);

  echo $contact->send();*/
?>

<?php/*
// the message
$msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail("nora.chamekh017@gmail.com","My subject",$msg);*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="../assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="../php/admin/admin.css">
  <title>Document</title>
</head>
<body>

<?php     /*
$to_email = 'nora.chamekh017@gmail.com';
$subject = 'Testing PHP Mail';
$message = 'This mail is sent using the PHP mail function';
$headers = 'From: noreply@company.com';
mail($to_email,$subject,$message,$headers);*/
?>

<?php
    $to      = 'nora.chamekh017@gmail.com';
    $subject = 'the subject';
    $message = 'hello';
    $headers = 'From: webmaster@example.com'       . "\r\n" .
                'Reply-To: webmaster@example.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);
?>
</body>
</html>
<?php
/* Page: contact.php */
//mettez ici votre adresse mail
$VotreAdresseMail="cnora1701@gmail.com";
// si le bouton "Envoyer" est cliqué
if(isset($_POST['envoyer'])) {
    //on vérifie que le champ mail est correctement rempli
    if(empty($_POST['mail'])) {
        echo "Le champ mail est vide";
    } else {
        //on vérifie que l'adresse est correcte
        if(!preg_match("#^[a-z0-9_-]+((\.[a-z0-9_-]+){1,})?@[a-z0-9_-]+((\.[a-z0-9_-]+){1,})?\.[a-z]{2,}$#i",$_POST['mail'])){
            echo "L'adresse mail entrée est incorrecte";
        }else{
            //on vérifie que le champ sujet est correctement rempli
            if(empty($_POST['sujet'])) {
                echo "Le champ sujet est vide";
            }else{
                //on vérifie que le champ message n'est pas vide
                if(empty($_POST['message'])) {
                    echo "Le champ message est vide";
                }else{
                    //tout est correctement renseigné, on envoi le mail
                    //on renseigne les entêtes de la fonction mail de PHP
                    $Entetes = "MIME-Version: 1.0\r\n";
                    $Entetes .= "Content-type: text/html; charset=UTF-8\r\n";
                    $Entetes .= "From: Nom de votre site <".$_POST['mail'].">\r\n";//de préférence une adresse avec le même domaine de là où, vous utilisez ce code, cela permet un envoie quasi certain jusqu'au destinataire
                    $Entetes .= "Reply-To: Nom de votre site <".$_POST['mail'].">\r\n";
                    //on prépare les champs:
                    $Mail=$_POST['mail']; 
                    $Sujet='=?UTF-8?B?'.base64_encode($_POST['sujet']).'?=';//Cet encodage (base64_encode) est fait pour permettre aux informations binaires d'être manipulées par les systèmes qui ne gèrent pas correctement les 8 bits (=?UTF-8?B? est une norme afin de transmettre correctement les caractères de la chaine)
                    $Message=htmlentities($_POST['message'],ENT_QUOTES,"UTF-8");//htmlentities() converti tous les accents en entités HTML, ENT_QUOTES Convertit en + les guillemets doubles et les guillemets simples, en entités HTML
                    //en fin, on envoi le mail
                    if(mail($VotreAdresseMail,$Sujet,nl2br($Message),$Entetes)){//la fonction nl2br permet de conserver les sauts de ligne et la fonction base64_encode de conserver les accents dans le titre
                        echo "Le mail à été envoyé avec succès!";
                    } else {
                        echo "Une erreur est survenue, le mail n'a pas été envoyé";
                    }
                }
            }
        }
    }
}
?>

<form class="centre" style="margin: 200px;" action="mailto:cnora1701@gmail.com" method="get" enctype="text/plain">
            <input type="text" name="object" placeholder="Entrez votre email">
            <input class="car  supprime"  type="submit" name="submit" value="Envoyez">
        </form>