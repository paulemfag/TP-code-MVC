<?php
require_once 'sqlparameters.php';
if (!filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)) {
    header('location:accueil.php');
    exit();
} else {
    $id = $_GET['id'];
}
//récupération des infos de la table compositions en BDD
$stmt = $db->prepare('SELECT compositions.id, compositions.title, compositions.file, compositions.chords, compositions.instrumentsUsed, compositions.id_users, categories.style FROM compositions INNER JOIN categories ON compositions.id = :id AND compositions.title = categories.title ');
if ($stmt->execute(array(':id' => $id)) && $row = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
    //stockage des informations dans des variables
    foreach ($row as $rowInfo) {
        $title = $rowInfo['title'];
        $file = $rowInfo['file'];
        $idUser = $rowInfo['id_users'];
        $chords = $rowInfo['chords'];
        $instrumentsUsed = $rowInfo['instrumentsUsed'];
        $style = $rowInfo['style'];
    }
    //Définition du titre de l'onglet / du <h1>
    $title = 'Page composition | ' . $title;
}
//récupération pseudo du compositeur
try {
    $sth = $db->prepare('SELECT `pseudo` FROM `users` WHERE `id` = :id');
    $sth->bindValue(':id', $idUser, PDO::PARAM_INT);
    $sth->execute();
    $user = $sth->fetch();
} catch (Exception $ex) {
    die('Connexion échoué !');
}
$compositorPseudo = $user['pseudo'];
//récupération des commentaires de la composition (dans l'ordre de publication)
try {
    $query = 'SELECT `pseudo`, `comment`, DATE_FORMAT(`published_at`, \'le %d/%m/%Y\ à %HH%i\') `published_at_formatted` FROM `comments` ORDER BY `published_at` DESC';
    $commentQueryStat = $db->query($query);
    $commentList = $commentQueryStat->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $ex) {
    die('Connexion échoué');
}
if ($commentList){
    $commentsAnnouncement = '<div class="row">
    <h2 class="text-center bg-light col-10 opacity mt-2 ml-auto mr-auto">Commentaires :</h2>
</div>';
}