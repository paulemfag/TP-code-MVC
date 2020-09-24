<?php
require_once 'sqlparameters.php';
try {
    $sth = $db->prepare('SELECT COUNT(`id`) FROM `messages` WHERE `recieverid` = :recieverid AND `alreadyread` = 0');
    $sth->bindValue(':recieverid', $_SESSION['id'], PDO::PARAM_INT);
    $sth->execute();
    $numberOfNewMessages = $sth->fetch();
} catch (Exception $ex) {
    die('Connexion échoué');
}
if ($numberOfNewMessages['COUNT(`id`)'] === '0'){
    $numberOfNewMessages['COUNT(`id`)'] = '';
}
else{
    $numberOfNewMessages['COUNT(`id`)'] = '( ' .$numberOfNewMessages['COUNT(`id`)']. ' )';
}