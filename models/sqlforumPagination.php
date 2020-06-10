<?php
require_once 'sqlparameters.php';
//Définition de la limit par rapport au select du form, si non définie prend 10 comme valeur.
$limit = isset($_POST['limit-records']) ? $_POST['limit-records'] : 10;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;
try {
    //Calcul du nombre de topics.
    $topicQueryOne = $db->query("SELECT count(`id`) AS `id` FROM `topics`");
    $topicCount = $topicQueryOne->fetchAll(PDO::FETCH_ASSOC);
    //Stockage du nombre de topics dans la variable 'total'.
    $total = $topicCount[0]['id'];
    //Calcul du nombre de pages.
    $pages = ceil( $total / $limit );
    //Définition du bouton page précédente.
    $previous = $page - 1;
    //Définition du bouton page suivante.
    $next = $page + 1;
} catch (Exception $ex) {
    die('Connexion échoué');
}
//Si la page sur laquelle on se trouve est supérieure à la dernière page
if ($page > $pages){
    //On redirige vers la dernière page
    header('location:forum.php?page=' .$pages);
    exit();
}