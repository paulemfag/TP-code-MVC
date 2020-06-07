<?php
//initialisations variables vides
//formulaire inscription
$accounttype = $_POST['typeOfAccount'] ?? NULL;
$suscribepseudo = $_POST['suscribepseudo'] ?? NULL;
$suscribemailbox = $_POST['suscribemailbox'] ?? NULL;
$suscribepassword = $_POST['suscribepassword'] ?? NULL;
$suscribepasswordconfirmation = $_POST['suscribepasswordconfirmation'] ?? NULL;
//formulaire informations personnelles
$biography = $_POST['biography'] ?? NULL;
$instruments = $_POST['instruments'] ?? NULL;
$software = $_POST['software'] ?? $_POST['otherSoftware'] ?? NULL;
$tagsCompositorOne = $_POST['tagsCompositorOne'] ?? NULL;
$facebook = $_POST['facebookId'] ?? NULL;
$twitter = $_POST['twitterId'] ?? NULL;
//formulaire login
$pseudo = $_POST['pseudo'] ?? NULL;
$password = $_POST['password'] ?? NULL;
//création de playlist
$playlistName = $_POST['playlistName'] ?? NULL;
//formumaire changement du titre de la playlist
$playlistNewTitle = $_POST['playlistNewTitle'] ?? NULL;
//Ajout d'une composition
$compositionStyle = $_POST['compositionStyle'] ?? NULL;
//formulaire récupération mot de passe
$recuperationMailbox = $_POST['recuperationMailbox'] ?? NULL;
//formulaire ajout de commentaire
$comment = $_POST['comment'] ?? NULL;
//formulaire reset password
$passwordAfterReset = $_POST['passwordAfterReset'] ?? NULL;
$confirmPasswordAfterReset = $_POST['confirmPasswordAfterReset'] ?? NULL;
//formulaire changement du type de compte
$changeAccountPassword = $_POST['changeAccountPassword'] ?? NULL;
//formulaire changement de mot de passe
$actualPassword = $_POST['actualPassword'] ?? NULL;
$newPassword = $_POST['newPassword'] ?? NULL;
$newPasswordConfirm = $_POST['newPasswordConfirm'] ?? NULL;
//formulaire supperession du compte
$removeMyAccountPassword = $_POST['Password'] ?? NULL;
//regex pour le contrôle des formulaires
$regexPseudo = "/^[A-Za-zéÉ][A-Za-záàâäãåçéèêëíìîïñóòôöõúùûüýÿæœ]+((-| )[A-Za-záàâäãåçéèêëíìîïñóòôöõúùûüýÿæœ]+)?$/";
$regexCompositionName = '/^(([A-Z|a-z|áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœ]{0,50})+((-|\s)?)+([A-Z|a-z|áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœ]{0,50})((-|\s)+){0,5})$/';
$regexSoftware = '/^(Ableton Live|FL Studio|Logic Pro X|Avid Pro Tools|Propellerhead Reason|Garageband|Steinberg Cubase|Cockos Reaper|PreSonus Studio|Acid Pro)$/';
$regexFacebook = '/^(https?:\/\/)?(www\.)?facebook.com\/[a-zA-Z0-9(\.\?)?]/';
$regexTwitter = '/^(?:http(s?):\/\/)?(?:www\.)?twitter\.com\/(?:(?:\w)*#!\/)?(?:pages\/)?(?:[\w\-]*\/)*([\w\-]*)$/';
$regexStyle = '/^(Autre|Blues|Classique|Disco|Electro|Funk|Gospel|Kompa|Metal|Pop|Punk|Raï|Rap|Reggae|R\'n\'B|Rock|)$/';
//initialisation tableau d'erreurs vide
$errors = [];
//Vérifications formulaire d'inscription
if (isset($_POST['suscribe'])) {
    //ajoute une value au bouton m'inscrire pour le réafficher en js
    $suscribe = 'alreadySubmittedOnce';
    //contrôle pseudo
    $suscribepseudo = trim(filter_input(INPUT_POST, 'suscribepseudo', FILTER_SANITIZE_STRING));
    if (empty($suscribepseudo)) {
        $errors['suscribepseudo'] = 'Veuillez renseigner votre pseudo.';
    } elseif (!preg_match($regexPseudo, $suscribepseudo)) {
        $errors['suscribepseudo'] = 'Votre pseudo contient des caractères non autorisés !';
    }
    //contrôle adresse mail
    $suscribemailbox = trim(htmlspecialchars($_POST['suscribemailbox']));
    if (empty($suscribemailbox)) {
        $errors['suscribemailbox'] = 'Veuillez renseigner votre adresse mail.';
    } elseif (!filter_var($suscribemailbox, FILTER_VALIDATE_EMAIL)) {
        $errors['suscribemailbox'] = 'Veuillez saisir une adresse mail valide.';
    }
    //contrôle mots de passe
    if (empty($suscribepassword)) {
        $errors['suscribepassword'] = 'Veuillez renseigner votre mot de passe.';
    } elseif (isset($suscribepassword) && empty($suscribepasswordconfirmation)) {
        $errors['suscribepassword'] = 'Veuillez confirmer votre mot de passe';
    } elseif ($suscribepasswordconfirmation != $suscribepassword) {
        $errors['suscribepassword'] = 'Les mots de passe ne correspondent pas.';
    }
    //Si il n'y a pas d'erreurs execute l'insertion dans la BDD
    if (count($errors) == 0) {
        require_once 'sqlsuscribe.php';
    }
}
//Vérifications formulaire de connexion
if (isset($_POST['login'])) {
    //ajoute une value au bouton me connecter
    $login = 'alreadySubmittedOnce';
    if (empty($pseudo)) {
        $errors['pseudo'] = 'Veuillez renseigner votre pseudo.';
    }
    if (empty($password)) {
        $errors['password'] = 'Veuillez renseigner votre mot de passe.';
    }
    //Si il n'y a pas d'erreurs execute les vérifications en BDD et renvoi vers la page 'accueil.php'
    if (count($errors) == 0) {
        require_once 'sqllogin.php';
        $_POST['password'] = '';
        $pseudo = '';
    }
}
// Si la personne viens de la page 'activation.php' donne une valeur au bouton / affiche le formulaire de connexion (js)
if (isset($_GET['connectMe'])) {
    $login = 'alreadySubmittedOnce';
}
// Vérifications formulaire informations personnelles, page 'suscribe.php
if (isset($_POST['submitSuscribeCompositor'])) {
    //ajoute une value au bouton submit
    $submitSuscribeCompositor = 'alreadySubmittedOnce';
    //Vérifie que le logiciel employé est bien dans la liste ( que le select n'as pas été modifié ).
    if (!empty($software) && !preg_match($regexSoftware, $software)) {
        $errors['software'] = 'Une erreur c\'est produite merci de réessayer ultérieurement.';
    }
    //Vérifie le style préféré
    if (empty($tagsCompositorOne)) {
        $errors['tagsCompositor'] = 'Veuillez choisir un style correct.';
    }
    //Vérifie que la valeur du select soit bonne si elle est définie
    if (!preg_match($regexStyle, $tagsCompositorOne)) {
        $errors['tagsCompositor'] = 'Veuillez choisir un style correct.';
    }
    //si le champ facebook est rempli et que l'url fourni n'est pas bon
    if (!empty($facebook) && !preg_match($regexFacebook, $facebook)) {
        $errors['facebookId'] = 'Veuillez saisir un url correct.';
    }
    //si le champ twitter est rempli et que l'url fourni n'est pas bon
    if (!empty($twitter) && !preg_match($regexTwitter, $twitter)) {
        $errors['twitterId'] = 'Veuillez saisir un url correct.';
    }
    //si le tableau d'erreurs est vide, requiert le fichier qui fait l'insertion en BDD
    if (count($errors) == 0){
        require_once 'sqlpersonalInformations.php';
    }
}
//Vérifications modifications des informations personnelles page personalInformationsUpdate.php
if (isset($_POST['updatePersonalInformations'])){
    //si le champ facebook est rempli et que l'url fourni n'est pas bon
    if (!empty($facebook) && !preg_match($regexFacebook, $facebook)) {
        $errors['facebookId'] = 'Veuillez saisir un url correct.';
    }
    //si le champ twitter est rempli et que l'url fourni n'est pas bon
    if (!empty($twitter) && !preg_match($regexTwitter, $twitter)) {
        $errors['twitterId'] = 'Veuillez saisir un url correct.';
    }
    if (count($errors) == 0){
        $changePersonalInformations = true;
    }
}
//Vérifications nouvelle playlist
if (isset($_POST['submitPlaylist'])) {
    if (!filter_input(INPUT_POST, 'playlistName', FILTER_SANITIZE_STRING)) {
        $errors['playlistName'] = 'Veuillez saisir un titre valide.';
    }
    //si le tableau d'erreurs est vide, requiert le fichier qui fait l'update en BDD
    if (count($errors) == 0) {
        require_once 'sqlNewPlaylist.php';
    }
}
//vérifications changement du titre de la playlist
if (isset($_POST['playlistTitleChange'])){
    //si le nouveau titre de la playlist n'est pas défini
    if (empty($playlistNewTitle)){
        $errors['playlistNewTitle'] = 'Veuillez saisir le nouveau titre de la playlist.';
    }
    //si il n'y a pas d'erreurs
    if (count($errors) === 0){
        //définie la variable changeTitle à 'true' pour permettre l'update en base dans le fichier sqlplaylistUpdate
        $changeTitle = true;
    }
}
//option sélectionné page 'ajouter une composition'
$styleOption = '<option value="-- Sélectionner --" selected disabled>-- Sélectionner --</option>';
//Vérifications page 'ajouter une composition'
if (isset($_POST['newComposition'])) {
    //Si le champ ajouter un fichier n'est pas vide
    if (isset($_FILES['file'])) {
        $file = $_FILES['file'];
        //Nom du fichier
        $fileName = $_FILES['file']['name'];
        //lieu de stockage temporaire du fichier
        $fileTmpName = $_FILES['file']['tmp_name'];
        //taille du fichier
        $fileSize = $_FILES['file']['size'];
        //erreur, retourne un int (https://www.php.net/manual/fr/features.file-upload.errors.php)
        $fileError = $_FILES['file']['error'];
        //type de fichier
        $fileType = $_FILES['file']['type'];
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        //extensions autorisées
        $allowed = array('mp3', 'm4a', 'm4b', 'aac', 'aax', 'mpc');
        //si l'extension est bonne
        if (in_array($fileActualExt, $allowed)) {
            //si il n'y a pas derreurs
            if ($fileError === 0) {
                //si la taille du fichier est inférieure à 20000000 octets / 20 méga
                if ($fileSize < 20000000) {
                    //option de desination définie dans 'sqlfile.php'
                    $target_path = Settings::$uploadFolder;
                    $target_path = $target_path . '_' . basename($_FILES['file']['name']);
                    //si le fichié est correctement uploadé dans le dossier
                    if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
                        $compositionAdded = '';
                    } else {
                        $compositionAdded = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <p>Une erreur s\'est produite durant l\'upload du fichier "' . basename($_FILES['file']['name']) . '" merci de réessayer.</p>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
                    }
                } else {
                    $errors['file'] = 'La taille de votre fichier est trop grande.';
                }
            } else {
                $errors['file'] = 'Une erreur s\'est produite durant l\'upload de votre fichier merci de réessayer.';
            }
        } else {
            $errors['file'] = 'Le format de votre fichier n\'est pas valide.';
        }
    }
    //Si le message de validation du fichier n'est pas défini
    if (!isset($compositionAdded)) {
        $errors['file'] = 'Veuillez ajouter un fichier.';
    }
    if (empty($compositionStyle)) {
        $errors['compositionStyle'] = 'Veuillez choisir le style musical de la composition.';
    }
    // Si on choisi un style dans le select
    if (isset($compositionStyle)) {
        $styleOption = '<option value="' . $_POST['compositionStyle'] . '" selected>' . $_POST['compositionStyle'] . '</option>';
        // si l'option choisi est 'Autre'
        if ($compositionStyle == 'Autre') {
            // si le champ autre est vide
            if (empty($_POST['otherChoice'])) {
                $errors['otherChoice'] = 'Veuillez préciser le style musical de la composition.';
            }
        }
    }
    $compositionName = trim(filter_input(INPUT_POST, 'compositionName', FILTER_SANITIZE_STRING));
    if (empty($compositionName)) {
        $errors['compositionName'] = 'Veuillez ajouter un titre à la composition.';
    } elseif (!preg_match($regexCompositionName, $compositionName)) {
        $errors['compositionName'] = 'Votre titre contient des caratères non autorisés.';
    }
    //Si il n'y a pas d'erreurs requiert le fichier 'sqladdcomposition.php' qui fait l'ajout en BDD
    if (count($errors) == 0) {
        require_once 'sqladdcomposition.php';
    }
}
//Vérifification nouveau sujet
if (isset($_POST['submitsubject'])) {
    //vérification sujet
    $subject = trim(filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING));
    if (empty($subject)) {
        $errors['subject'] = 'Veuillez renseigner le sujet.';
    }
    elseif (count($errors) == 0) {
        require_once 'sqlnewsubject.php';
    }
}
//Vérifications RECUPERATION MOT DE PASSE
if (isset ($_POST['recuperation'])) {
    //ajoute une value au bouton
    $recuperation = 'alreadySubmittedOnce';
    //déclaration variable
    $recuperationMailbox = trim(htmlspecialchars($recuperationMailbox));
    if (empty($recuperationMailbox)) {
        $errors['recuperationMailbox'] = 'Veuillez renseigner votre adresse mail.';
    } elseif (!filter_var($recuperationMailbox, FILTER_VALIDATE_EMAIL)) {
        $errors['recuperationMailbox'] = 'Veuillez saisir une adresse mail valide.';
    } elseif (count($errors) == 0){
        require_once 'sqlrecuperation.php';
    }
}
//Formulaire ajout de commentaire
if (isset($_POST['submitComment'])){
    if (empty($comment)){
        $errors['comment'] = 'Veuillez saisir un commentaire.';
    }
    elseif (!filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_STRING)){
        $errors['comment'] = 'Votre commentaire contient des caractères non valides.';
    }
    elseif (count($errors) == 0){
        require_once 'sqladdComment.php';
    }
}
//Formulaire reset mot de passe après récupération
if (isset($_POST['resetMyPassword'])){
    if (empty($passwordAfterReset)){
        $errors['passwordAfterReset'] = 'Veuillez renseigner votre nouveau mot de passe';
    }
    elseif (empty($confirmPasswordAfterReset)){
        $errors['confirmPasswordAfterReset'] = 'Veuillez confirmer votre nouveau mot de passe';
    }
    elseif($passwordAfterReset !== $confirmPasswordAfterReset){
        $errors['passwordAfterReset'] = 'Les mots de passe ne correspondent pas.';
        $errors['confirmPasswordAfterReset'] = 'Les mots de passe ne correspondent pas.';
    }
    elseif (count($errors) == 0) {
        require_once '../controllers/sqlreset-password.php';
    }
}
//Vérification changement du type de compte
if (isset($_POST['changeAccountType'])) {
    //ajoute une valeur au bouton pour réafficher le formulaire grâce au JS
    $changeAccount = 'alreadySubmittedOnce';
    //vérification champ mot de passe
    if (!isset($changeAccountPassword)) {
        $errors['changeAccountPassword'] = 'Veuillez renseigner votre mot de passe.';
    }
    //Si il n'y a pas d'erreurs requiert le fichier "parameterspage.php" qui compare le mot de passe de la BDD
    elseif (count($errors) == 0) {
        require_once 'parameterspage.php';
    }
}
//Vérifications CHANGEMENT MOT DE PASSE
if (isset ($_POST['changeMyPassword'])) {
    //ajoute une value au bouton me connecter
    $changeMyPassword = 'alreadySubmittedOnce';
    if (empty($actualPassword)) {
        $errors['actualPassword'] = 'Veuillez saisir votre mot de passe.';
    }
    elseif (empty ($newPassword)) {
        $errors['newPassword'] = 'Veuillez choisir un nouveau mot de passe.';
    } elseif ($actualPassword == $newPassword) {
        $errors['newPassword'] = 'Le nouveau mot de passe et l\'ancien ne peuvent être identiques';
    }
    elseif (empty ($newPasswordConfirm)) {
        $errors['newPasswordConfirm'] = 'Veuillez confirmer votre nouveau mot de passe.';
    }
    elseif ($newPassword != $newPasswordConfirm) {
        $errors['newPassword'] = 'Les mots de passes ne correspondent pas.';
        $errors['newPasswordConfirm'] = 'Les mots de passes ne correspondent pas.';
    }
    elseif (count($errors) == 0) {
        require_once 'updatePassword.php';
        $errors['isok'] = 'Votre mot de passe à bien été changé.';
    }
}
//Vérifications suppression du compte
if (isset($_POST['removeMyAccount'])) {
    //ajoute une value au bouton me connecter
    $removeMyAccount = 'alreadySubmittedOnce';
    if (empty($removeMyAccountPassword)) {
        $errors['Password'] = 'Veuillez renseigner un mot de passe.';
    }
    elseif (count($errors) == 0) {
        require_once 'sqldeleteaccount.php';
    }
}

