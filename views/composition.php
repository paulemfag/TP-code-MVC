<?php
require_once '../controllers/sqlcomposition.php';
require_once '../vendor/autoload.php';
require_once 'require/header.php';
require_once '../controllers/form_validation.php';
?>
<div class="row">
    <h1 class="text-center bg-light col-10 opacity mt-2 ml-auto mr-auto"><?= $title ?> :</h1>
</div>
<div class="container mt-1 compositionsTables">
    <p>
        Style : <a class="text-dark" href="stylePage.php?style=<?= $style ?>"><?= $style ?>.</a>
    <br>
    Compositeur : <a class="text-dark" href="compositor.php?id=<?= $idUser ?>"><?= $compositorPseudo ?>.</a>
    <br>
    Instruments employés : <?= $instrumentsUsed ?? 'non définis' ?>.
    <br>
    Accords employés : <?= $chords ?? 'non définis' ?>.
    </p>
    <div class="row">
    <p class="col-6">
    Fichier :
    </p>
    <audio ontimeupdate="updateTime()" style="height: 20px;" class="col-6" controls controlsList="nodownload">
        <source src="<?= $file ?>" type="audio/mp3">
    </audio>
    </div>
</div>
<div class="row">
    <h2 class="text-center bg-light col-10 opacity mt-2 ml-auto mr-auto">Laisser un commentaire :</h2>
</div>
<form class="container mt-1" method="post" action="#">
    <div class="form-group row">
        <span class="text-danger ml-auto"><?= $errors['comment'] ?? '' ?></span>
        <textarea class="noResize" placeholder="Veuillez saisir un commentaire." maxlength="500" name="comment" id="comment" cols="121" rows="4"><?= $_POST['comment'] ?? '' ?></textarea>
    </div>
    <div class="captcha">
        <div
                class="g-recaptcha"
                data-sitekey="6Lc2seAUAAAAABg_R6mlOzQuKOkLNxYkyQiRLf7x"
                style="display: inline-block;">
        </div>
    </div>
    <div class="form-group">
        <input name="submitComment" id="submitComment" class="btn btn-outline-success mt-2 col-12" value="Envoyer" type="submit">
    </div>
</form>
<?php echo $commentsAnnouncement
?? '';
echo $commentReturn ?? '';
foreach ($commentList as $comment):
    //Récupération du nombre de caractères du pseudo et de la date.
    $pseudoAndPublishedAtLength = strlen($comment['pseudo'] .', '. $comment['published_at_formatted'] .' :');
    //Determination du nombre d'espaces à ajouter (largeur du textarea - pseudo et date).
    $numberOfSpace = 233 - $pseudoAndPublishedAtLength;
    //Stockage des espaces dans une varialbe.
    $spaces = str_repeat(' ', $numberOfSpace);
    //Stockage du pseudo + de la date + des espaces dans une variable.
    $pseudoAndPublishedAtAndSpaces = $comment['pseudo'] .', '. $comment['published_at_formatted'] .' :'. $spaces;
    //On définit le bouton "Supprimer mon commentaire".
    $deleteButton = '<a data-toggle="modal" data-target="#exampleModal" data-target="#exampleModal" class="btn-sm btn-danger text-light d-flex justify-content-center"><i class="fas fa-arrow-circle-down mt-1 mr-2"></i>Supprimer mon commentaire<i class="fas fa-trash-alt mt-1 ml-2"></i></a>';
?>
<div>
    <?php
    //Si c'est cet utilisateur qui a publié le commmentaire.
    if ($comment['pseudo'] === $_SESSION['pseudo']){
        //On affiche le bouton "Supprimer mon commentaire".
        echo $deleteButton;
    } ?>
    <textarea class="noResize text-light" wrap="hard" cols="121" rows="4" disabled><?= $pseudoAndPublishedAtAndSpaces. $comment['comment'] ?? '' ?></textarea>
</div>
<div class="modal" tabindex="-1" id="exampleModal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h5 class="modal-title">Voulez vous vraiment supprimer le commentaire ?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <a title="Supprimer mon commentaire" href="composition.php?id=<?= $_GET['id'] ?>&idComment=<?= $comment['id'] ?>" class="btn btn-danger">Supprimer</a>
            </div>
        </div>
    </div>
</div>
<?php endforeach;
if ($commentsAnnouncement){
    echo
'</div>';
}
require_once 'require/footer.php'; ?>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="../vendor/mervick/emojionearea/dist/emojionearea.min.js"></script>
<script src="../assets/js/composition_min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
