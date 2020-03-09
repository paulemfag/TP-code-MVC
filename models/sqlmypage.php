<?php
require_once 'sqlparameters.php';
try {
    $sth = $db->prepare('SELECT `pseudo`, `biography`, `instruments`, `software`, `facebookId`, `twitterId` FROM `users` WHERE `id` = :id');
    $sth->bindValue(':id', $id, PDO::PARAM_INT);
    $sth->execute();
    $userInformations = $sth->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
//stockage des informations dans des variables
foreach ($userInformations as $row){
    $pseudo = $row['pseudo'];
    $biography = $row['biography'];
    $instruments = $row['instruments'];
    $software = $row['software'];
    $facebookId = $row['facebookId'];
    $twitterId = $row['twitterId'];
}
try {
    $sth = $db->prepare('SELECT compositions.id, compositions.title, compositions.file, categories.style FROM compositions INNER JOIN categories ON compositions.id_users = :id AND compositions.title = categories.title ORDER BY compositions.title ASC');
    $sth->bindValue(':id', $id, PDO::PARAM_INT);
    $sth->execute();
    $compositionsList = $sth->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
// si le compositeur clique sur suprimmer, récupère l'id de la composition en GET
if (filter_input(INPUT_GET, 'idcomposition', FILTER_SANITIZE_NUMBER_INT)){
    //stockage de l'id dans une variable
    $idcomposition = $_GET['idcomposition'];
    //suppression de la composition dans les playlists utilisateurs (table compo_in_playlist)
    try {
        $sth = $db->prepare('DELETE FROM `compo_in_playlist` WHERE `id_compositions` = :composition_id');
        $sth->bindValue(':composition_id', $idcomposition, PDO::PARAM_INT);
        $sth->execute();
    } catch (PDOException $e) {
        $successfullDelete = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <p>Une erreur est survenue pendant la suppression, merci de réessayer ultérieurement.</p>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }
    //récupération du titre dans la table compositions pour permettre la suppresion dans la table catégories
    try {
        $sth = $db->prepare('SELECT `title` FROM `compositions` WHERE `id` = :composition_id');
        $sth->bindValue(':composition_id', $idcomposition, PDO::PARAM_INT);
        $sth->execute();
        $stmt = $sth->fetchAll(PDO::FETCH_ASSOC);
        foreach ($row as $rowinfo){
            $compositionsTitle = $rowinfo['title'];
        }
        
    }  catch (PDOException $e) {
        $successfullDelete = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <p>Une erreur est survenue pendant la suppression, merci de réessayer ultérieurement.</p>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }
    //suppression de la composition dans la table compositions
    try {
        $sth = $db->prepare('DELETE FROM `compositions` WHERE `id` = :composition_id');
        $sth->bindValue(':composition_id', $idcomposition, PDO::PARAM_INT);
        $sth->execute();
    } catch (PDOException $e) {
        $successfullDelete = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <p>Une erreur est survenue pendant la suppression, merci de réessayer ultérieurement.</p>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }
    //suppression de la composition dans la table categories
    try {
        $sth = $db->prepare('DELETE FROM `categories` WHERE `title` = :title');
        $sth->bindValue(':title', $compositionsTitle, PDO::PARAM_STR);
        $sth->execute();
        $successfullDelete = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <p>Votre composition a bien été suprimmée.</p>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    } catch (PDOException $e) {
        $successfullDelete = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <p>Une erreur est survenue pendant la suppression, merci de réessayer ultérieurement.</p>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }
}
print_r($compositionsTitle);
