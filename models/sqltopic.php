<?php
if (empty($_GET['id'])){
    header('location:forum.php');
    exit();
}
require_once 'sqlparameters.php';
//récupère les informations du topic grace à l'id
$topicId = $_GET['id'];
//Récupération du titre du sujet
try {
    $sth = $db->prepare('SELECT `title` FROM `topics` WHERE `id` = :id');
    $sth->bindValue(':id', $topicId, PDO::PARAM_INT);
    $sth->execute();
    $topics = $sth->fetch();
} catch (Exception $ex) {
    die('Connexion échoué !');
}
//Récupération de la liste des publications que contient le sujet
try {
    $sth = $db->prepare('SELECT `id`, `message`, DATE_FORMAT(`published_at`, \'le %d/%m/%Y\ à %HH%i\') `published_at`, `id_users`, `pseudo` FROM `publications` WHERE `id_topics` = :id ORDER BY `published_at` DESC');
    $sth->bindValue(':id', $topicId, PDO::PARAM_INT);
    $sth->execute();
    $publicationsList = $sth->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $ex) {
    die('Connexion échoué !');
}
//Si il n'y pas d'erreurs (form_validation.php : ligne 264) réalise l'insertion du message dans la table publications en BDD
if ($insertMessage){
    try {
        $sth = $db->prepare('INSERT INTO `publications` (`message`, `published_at`, `id_topics`, `id_users`, `pseudo`) VALUES (:message, CURRENT_TIMESTAMP, `:id_topics`, `:id_user`, `:pseudo`)');
        $sth->bindValue(':message', $message, PDO::PARAM_STR);
        $sth->bindValue(':id_topics', $topicId, PDO::PARAM_INT);
        $sth->bindValue(':id_user', $_SESSION['id'], PDO::PARAM_INT);
        $sth->bindValue(':pseudo', $_SESSION['pseudo'], PDO::PARAM_STR);
        $sth->execute();
        echo 'ok';
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
