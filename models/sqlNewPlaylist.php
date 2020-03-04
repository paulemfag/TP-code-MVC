<?php
require_once 'sqlparameters.php';
$id = $_SESSION['id'];
try {
    // insertion dans la base de donnée
    $sth = $db->prepare('INSERT INTO `playlists` (title, id_users)
VALUES (:title, :id)');
    $sth->bindValue(':title', $playlistName, PDO::PARAM_STR);
    $sth->bindValue(':id', $id, PDO::PARAM_INT);
    $sth->execute();
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}