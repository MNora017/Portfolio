<?php /*
// Récupération des informations du formulaire
if (get_magic_quotes_gpc())
{
 $nom = stripslashes(trim($_POST['nom']));
 $prenom = stripslashes(trim($_POST['prenom']));
 $dossier = stripslashes(trim($_POST['dossier']));    
 $societe = stripslashes(trim($_POST['societe']));
 $rcs = stripslashes(trim($_POST['rcs']));
 $code = stripslashes(trim($_POST['code']));
 $ville = stripslashes(trim($_POST['ville']));
 $telephone = stripslashes(trim($_POST['telephone']));
 $fax = stripslashes(trim($_POST['fax']));
 $mail = stripslashes(trim($_POST['mail']));
 $motif = stripslashes(trim($_POST['motif']));
 $message = stripslashes(trim($_POST['message']));
}     
else      
{
 $nom = trim($_POST['nom']);
 $prenom = trim($_POST['prenom']);
 $dossier = trim($_POST['dossier']);
 $societe = trim($_POST['societe']);
 $rcs = trim($_POST['rcs']);
 $adresse = trim($_POST['adresse']);
 $code = trim($_POST['code']);
 $ville = trim($_POST['ville']);
 $telephone = trim($_POST['telephone']);
 $fax = trim($_POST['fax']);
 $mail = trim($_POST['mail']);
 $motif = trim($_POST['motif']);
 $message = trim($_POST['message']);
}
//Vérifie si l'adresse mail est au bon format 
 $regex_mail = '/^[-+.w]{1,64}@[-.w]{1,64}.[-.w]{2,6}$/i'; 
 //Verifie qu il n y est pas d en tête dans les données
$regex_head = '/[nr]/';   
//Vérifie qu il n y est pas d erreur dans adresse mail
 if (!preg_match($regex_mail, $mail))
 {
 $alert = 'L\'adresse '.$mail.' n\'est pas valide';      
 }
 else
{ 
 $courriel = 1;
}   
// On affiche l'erreur s'il y en a une 
if (!empty($alert))
{
 $courriel = 0;
}     
// On vérifie qu'il n'y a aucun header dans les champs  
if (preg_match($regex_head, $nom)
 || preg_match($regex_head, $prenom)
 || preg_match($regex_head, $dossier)
 || preg_match($regex_head, $societe)
 || preg_match($regex_head, $rcs)
 || preg_match($regex_head, $adresse)
 || preg_match($regex_head, $code)
 || preg_match($regex_head, $ville)
 || preg_match($regex_head, $telephone)
 || preg_match($regex_head, $fax)
 || preg_match($regex_head, $mail)
 || preg_match($regex_head, $motif)
 || preg_match($regex_head, $message))
{  
 $alert = 'En-têtes interdites dans les champs du formulaire'; 
}
else
{ 
 $header = 1;
}   
// On affiche l'erreur s'il y en a une  
if (!empty($alert))
{
 $header = 0;
}
if (empty($telephone) 
 || empty($nom) 
 || empty($message))
{  
 $alert = 'Tous les champs doivent être renseignés';
} 
else
{  
 $renseigne = 1;
}   
//  On affiche l'erreur s'il y en a une  
if (!empty($alert))
{
 $renseigne = 0;
}
//  Si les variables sont bonne 
if ($renseigne == 1 AND $header == 1 AND $courriel == 1)
{
// Envoi du mail

// Le destinataire
$to="demo@fafa-informatique.com";

// Le sujet du message qui apparaitra
$sujet="Message depuis le site";
$msg = '';
//Le message en lui même
//$msg = 'Mail envoye depuis le site' "rnrn";
$msg .= 'Nom : '.$nom."rnrn";
$msg .= 'Prenom : '.$prenom."rnrn";
$msg .= 'Dossier : '.$dossier."rnrn";
$msg .= 'Societe : '.$societe."rnrn";
$msg .= 'RCS : '.$rcs."rnrn";
$msg .= 'Adresse : '.$adresse."rnrn";
$msg .= 'Code : '.$code."rnrn";
$msg .= 'Ville : '.$ville."rnrn";
$msg .= 'Telephone : '.$telephone."rnrn";
$msg .= 'Fax : '.$fax."rnrn";
$msg .= 'Mail : '.$mail."rnrn";
$msg .= 'Motif : '.$motif."rnrn";
$msg .= 'Message : '.$message."rnrn";
// Les en-têtes du mail
$headers = 'From: MESSAGE DU SITE FAFA<demo@fafa-informatique>'."rn";
$headers .= "rn";
// L'envoi du mail - Et page de redirection
mail($to, $sujet, $msg, $headers);
header('Location:http://www.fafa-informatique.com');
}
else
{
header('Location:http://www.fafa-informatique.com');
}*/






/* Page: contact.php */
//mettez ici votre adresse mail
$VotreAdresseMail="votreemail@votresite.tld";
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