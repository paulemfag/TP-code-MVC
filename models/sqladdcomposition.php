<?php
require_once 'sqlparameters.php';
//Déclaration variables
$fileName = $_FILES['file']['name'];
$compositionStyle = $_POST['compositionStyle'] ?? '';
//explode afin de récupérer le titre du fichier sans l'extension
$title = explode('.', $fileName);
//Insertion en BDD : table `categories`
try {
    $sth = $db->prepare('INSERT INTO `categories` (`title`, `style`) VALUES (:title, :style)');
    $sth->bindValue(':title', $title[0], PDO::PARAM_STR);
    $sth->bindValue(':style', $compositionStyle, PDO::PARAM_STR);
    $sth->execute();
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
//Récupération en BDD : id de la compo dans la table `categories`
try {
    $stmt = $db->prepare('SELECT `id`, `style` FROM `categories`  WHERE `title` LIKE :title');
    if ($stmt->execute(array(':title' => $title[0])) && $row = $stmt->fetch()) {
        $idComposition = $row['id'];
        $compositionStyle = $row['style'];
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
//Insertion en BDD : table `compositions`
try {
    $sth = $db->prepare('INSERT INTO `compositions` (`title`, `file`, `id_users`, `id_categories`) VALUES (:title, :file, :idUser, :idCategory)');
    $sth->bindValue(':title', $title[0], PDO::PARAM_STR);
    $sth->bindValue(':file', 'uploads/_'. $fileName, PDO::PARAM_STR);
    $sth->bindValue(':idUser', $id, PDO::PARAM_INT);
    $sth->bindValue(':idCategory', $idComposition, PDO::PARAM_INT);
    $sth->execute();
    $compositionAdded = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <p>Votre composition "' .$title[0]. '" a bien été ajoutée.</p>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
