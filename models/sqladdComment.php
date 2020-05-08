<?php
require_once 'sqlparameters.php';
//Déclaration variables
$comment = $_POST['comment'];
$id_composition = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$id_user = $_SESSION['id'];
$pseudo = $_SESSION['pseudo'];
try {
    $sth = $db->prepare('INSERT INTO `comments` (`published_at`, `comment`, `id_compositions`, `id_users`, `pseudo`) VALUES (CURRENT_TIMESTAMP, :comment, :id_composition, :id_users, :pseudo)');
    $sth->bindValue(':comment', $comment, PDO::PARAM_STR);
    $sth->bindValue(':id_composition', $id_composition, PDO::PARAM_INT);
    $sth->bindValue(':id_users', $user_id, PDO::PARAM_INT);
    $sth->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
    $sth->execute();
    $successfullyCommented = '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <p>Votre commentaire a bien été publié.</p>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
