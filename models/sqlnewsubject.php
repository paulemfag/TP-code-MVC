<?php
require_once 'sqlparameters.php';
if (empty($_GET['id'])){
    header('location:newsubject.php#');
    exit();
}
$id = $_GET['id'];
try {
    //Insertion en BDD.
    $sth = $db->prepare('INSERT INTO `topics` ( `title`, `created_at`, `id_users`) VALUES ( :subject, CURRENT_TIMESTAMP, :id_user)');
    $sth->bindValue(':subject', $subject, PDO::PARAM_STR);
    $sth->bindValue(':id_user', $id, PDO::PARAM_INT);
    $sth->execute();
    //Récupération de l'id du topic pour rediriger l'utilisateur vers la page topic.
    try {
        $sth = $db->prepare('SELECT `id` FROM `topics` WHERE `title` = :subject AND `id_users` = :id_user');
        $sth->bindValue(':subject', $subject, PDO::PARAM_STR);
        $sth->bindValue(':id_user', $id, PDO::PARAM_INT);
        $sth->execute();
        $topicId = $sth->fetchAll(PDO::FETCH_ASSOC);
/*        header('location:topic.php?id=' .$topicId);
        exit();*/
        echo '
<div class="alert alert-success alert-dismissible fade show" role="alert">
<p>Votre topic a bien été crée' .$topicId[0]. '</p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}