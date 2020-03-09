<?php
//Vérifie si l'id n'est pas vide et si c'est un entier
if (!filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)) {
    //redirection vers la page d'accueil
    header('location:accueil.php');
    exit();
} else {
    //récupération de la variable Get
    $idPlaylist = $_GET['id'];
}
//récupérations des infos, log BDD
require_once 'sqlparameters.php';
//récupération des infos de la playlist en BDD
try {
    $sth = $db->prepare('SELECT * FROM `playlists` WHERE `id` = :id');
    $sth->bindValue(':id', $idPlaylist, PDO::PARAM_INT);
    $sth->execute();
    $playlists = $sth->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $ex) {
    die('Connexion échoué');
}
foreach ($playlists as $rowInfo) {
    $playlistTitle = $rowInfo['title'];
}
//titre de l'onglet
$title = 'Fill | ' . $playlistTitle;
//récupératioon de toutes les informations des titres de la playlist dans les tables
try {
    $sth = $db->prepare(
        'SELECT compositions.id as compositionid, compositions.title, compositions.file, categories.style, users.id, users.pseudo  FROM `compo_in_playlist` 
JOIN compositions ON compositions.id = compo_in_playlist.id_compositions
JOIN categories ON categories.title = compositions.title
JOIN users ON compositions.id_users = users.id
JOIN playlists ON playlists.id = compo_in_playlist.id_playlists 
WHERE playlists.id = :id'
    );
    $sth->bindValue(':id', $idPlaylist, PDO::PARAM_INT);
    $sth->execute();
    $compositionsList = $sth->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $ex) {
    die('Connexion échoué');
}
if (filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT) && filter_input(INPUT_GET, 'idcomposition', FILTER_SANITIZE_NUMBER_INT)) {
    //Stocakge de l'id récupéré en GET dans une variable
    $idcomposition = $_GET['idcomposition'];
    //suppression de la table compo_in_playlist
    try {
        $sth = $db->prepare('DELETE FROM compo_in_playlist WHERE `id_playlists` = :idplaylist AND `id_compositions` = :idcomposition');
        $sth->bindValue(':idplaylist', $idPlaylist, PDO::PARAM_INT);
        $sth->bindValue(':idcomposition', $idcomposition, PDO::PARAM_INT);
        $sth->execute();
        $successfulDelete = '
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <p>La composition a bien été suprimmée.</p>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
        sleep(2);
        header('location:playlist.php?id=' . $idPlaylist . '');
    } catch (Exception $ex) {
        die('Connexion échoué');
    }
}
