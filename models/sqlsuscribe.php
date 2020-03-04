<?php
require_once 'sqlparameters.php';
// récupération des valeurs du formulaire dans des variables
try {
    $pseudo = $_POST['suscribepseudo'];
    $mailbox = $_POST['suscribemailbox'];
    $password = password_hash($_POST['suscribepassword'], PASSWORD_DEFAULT);
    $accountType = $_POST['typeOfAccount'];
    // insertion dans la base de donnée
    $sth = $db->prepare('INSERT INTO `users` (pseudo, mailbox, password, accounttype)
VALUES (:pseudo, :mailbox, :password, :accountType)');
    $sth->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
    $sth->bindValue(':mailbox', $mailbox, PDO::PARAM_STR);
    $sth->bindValue(':password', $password, PDO::PARAM_STR);
    $sth->bindValue(':accountType', $accountType, PDO::PARAM_STR);
    $sth->execute();
    //Fichier vérifiant le type d'adresse mail
    require_once 'mailboxhost.php';
    // si l'extension mail match avec une des regex le text mail est un href redirigeant vers la boite mail correspondante
    if (isset($mailhref)) {
        $activeYourAccount = '
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <p>Votre compte a bien été créé, pour finaliser votre inscription merci de valider votre boite mail à l\'aide de <a href="' . $mailhref . '" target="_blank" class="alert-link">l\'email</a> d\'activation qui viens de vous être envoyé.</p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    } //sinon
    else {
        $activeYourAccount = '
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <p>Votre compte a bien été créé, pour finaliser votre inscription merci de valider votre boite mail à l\'aide de l\'email d\'activation qui viens de vous être envoyé.</p>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

// Génération aléatoire d'une clé
$key = md5(microtime(TRUE) * 100000);

// Insertion de la clé dans la base de données
try {
    $stmt = $db->prepare('UPDATE `users` SET activationkey = :cle WHERE pseudo = :pseudo');
    $stmt->bindValue(':cle', $key, PDO::PARAM_STR);
    $stmt->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
    $stmt->execute();
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
//récupération du fichier requis
require_once '../vendor/autoload.php';
$messageToSend = 'Bienvenue sur Fill ' . $pseudo . ',
 
Pour activer votre compte, veuillez cliquer sur le lien ci-dessous
ou le copier/coller dans votre navigateur Internet.
 
http://fill.info/activation.php?log=' . urlencode($pseudo) . '&cle=' . urlencode($key) . '
 
 
------------------------------------------------------------------------------
Ceci est un mail automatique, Merci de ne pas y répondre.';

//Requiert le fichier "smtpParameters.php" contenant les informations de connexion (constantes)
require_once 'smtpParameters.php';
// Informations du transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
    ->setUsername(SMTPUSER)
    ->setPassword(SMTPPASSWORD);

// Création du mailer en utilisant le transport
$mailer = new Swift_Mailer($transport);

// Création du message
$message = (new Swift_Message('Activation de votre compte Fill'))
    ->setContentType("text/html")
    ->setFrom(['suscribe@fill.info' => 'Fill | Service inscription'])
    ->setTo([$mailbox => $pseudo])
    ->setBody($messageToSend);
$Name = 'Fill | Suscribe Service';
$email = 'fill@service.info';
$header = 'De: '. $Name . ' <' . $email . '>\r\n';
$mail = mail('' .$mailbox,'Fill | Activation de votre compte', $messageToSend, $header);