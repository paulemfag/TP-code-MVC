<?php
//Si la variable Get 'id' n'est pas définie.
if (!filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)) {
    //On redirige vers la page 1
    header('location:messagerie.php?page=1');
    exit();
}
//Si la page demandée est inférieure à la première page
if ($_GET['id'] < 1) {
    header('location:?page=1');
    exit();
}
require_once '../models/sqlmessage.php';
$title = 'Message | ' .$object;
require_once 'require/header.php';
?>
<div class="container">
    <h1 class="text-center bg-light col-12 opacity mt-2 ml-auto mr-auto"><?= $object ?></h1>
    <a title="Répondre à <?= $pseudo ?>" href="newmessage.php?id=<?= $id ?>" class="col-12 btn btn-primary" href="">Répondre</a>
    <a title="Supprimer le message | <?= $object ?>" class="col-12 btn btn-danger mt-2" href="">Supprimer le message</a>
    <p style="border: none;" class="col-8 bg-info mt-2 mb-0 text-light float-left"><?= $sender .', <i>'. $date ?></i></p>
    <textarea style="border: none;" class="col-12 mt-0 bg-info border-transparent text-light" maxlength="" name="message" id="message" wrap="hard" cols="121" rows="4" disabled><?= $message['message'] ?></textarea>
</div>
<?php require_once 'require/footer.php';
