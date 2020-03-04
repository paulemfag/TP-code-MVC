<?php
require_once 'sqlparameters.php';
// Récupération de la valeur du champ actif pour le login $login
$stmt = $db->prepare("SELECT `id`, `pseudo`, `mailBox`, `active`, `password`, `accounttype` FROM `users` WHERE pseudo LIKE :pseudo ");
if ($stmt->execute(array(':pseudo' => $pseudo)) && $row = $stmt->fetch()) {
    $id = $row['id'];
    $pseudo = $row['pseudo'];
    $mailbox = $row['mailBox'];
    $active = $row['active']; // $actif contient alors 0 ou 1
    $password = $row['password'];
    $accounttype = $row['accounttype'];
    // Si la valeur de la colonne active est égale à 0, on invite l'utilisateur à confirmer son compte via le mail
    if ($active == '0' && $pseudo == $_POST['pseudo'] && password_verify($_POST['password'], $password)) {
    //Vérifie le type d'adresse mail pour personnaliser le message d'erreur
    require_once 'mailboxhost.php';
    //si l'extension mail est trouvée :
    if (!empty($hrefTitle) && !empty($mailhref)) {
        $notConfirmetYet = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <p>Bonjour ' . $pseudo . ', veuillez activer votre compte à l\'aide du lien d\'activation qui vous a été envoyé par <a class="alert-link" target="_blank" title="' . $hrefTitle . '" href="' . $mailhref . '">mail</a> afin de pouvoir vous connecter.</p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }
    else{
        $notConfirmetYet = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <p>Bonjour ' . $pseudo . ', veuillez activer votre compte à l\'aide du lien d\'activation qui vous a été envoyé par mail afin de pouvoir vous connecter.</p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }
    }
    // Si l'utilisateur viens de la page 'activation.php' et que la valeur de la colonne active est égale à 1, on autorise la connexion et on le renvoi vers la page infos personnelles
    if (isset($_GET['connectMe']) && $active == '1' && $pseudo == $_POST['pseudo'] && password_verify($_POST['password'], $password)) {
        session_set_cookie_params(10,"/");
        session_start();
        $_SESSION['pseudo'] = $pseudo;
        $_SESSION['accounttype'] = $accounttype;
        $_SESSION['id'] = $id;
        header('location:views/suscribe.php');
        exit();
    }

    // Si la valeur de la colonne active est égale à 1, on autorise la connexion
    if ($active == '1' && $pseudo == $_POST['pseudo'] && password_verify($_POST['password'], $password)) {
        session_set_cookie_params(10, "/");
        session_start();
        $_SESSION['pseudo'] = $pseudo;
        $_SESSION['accounttype'] = $accounttype;
        $_SESSION['id'] = $id;
        header('location:views/accueil.php');
        exit();
    } // Sinon la connexion est refusé...
    else {
        $errors['login'] = 'Votre identifiant ou mot de passe est incorrect merci de réessayer.';
    }
} else {
    $errors['login'] = 'Votre identifiant ou mot de passe est incorrect merci de réessayer.';
}
