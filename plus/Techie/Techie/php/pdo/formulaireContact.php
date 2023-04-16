<?php
include_once ("configPDO.php");

if (isset($_POST['valider'])) {
    $nom =$_POST['contact_nom'];
    $prenom =$_POST['contact_prenom'];
    $mail =$_POST['contact_mail'];
    $sujet =$_POST['contact_sujet'];
    $message =$_POST['contact_message'];

    $dbh = new PDO ($dsn, $user, $password);
    $query =$bdh->query("INSERT INTO users VALUES('')");
}
$to = "nora.chamekh017@gmail.com";
$sujet = "Contact par Porfolio";
/*
mail(
    string [$to],
    string [$sujet],
    string [$message];

): bool*/
?>
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