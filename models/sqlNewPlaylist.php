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
    $successfullyCreated = '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <p>La playlist "'. $_POST['playlistName'] .'" a bien été crée.</p>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}