<?php
session_start();
// si l'utilisateur n'est pas connecté
if (empty($_SESSION)) {
    header('location:../index.php');
}
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="../../assets/css/style.css"/>
    <link rel="stylesheet" href="../../vendor/mervick/emojionearea/dist/emojionearea.min.css"/>
    <!-- CDN Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- CDN font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <!-- CDN google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Odibee+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css"
          integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9"
          crossorigin="anonymous">
    <link rel="stylesheet" href="css/audioPlayer.css">
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
<?php
//Chargement de la bonne navbar selon le type de compte
if ($_SESSION['accounttype'] === 'compositor'){
    require_once 'navbar_compositor.php';
}
elseif ($_SESSION['accounttype'] === 'particular'){
    require_once 'navbar_particular.php';
}