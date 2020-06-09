<?php
require_once '../controllers/sqlcomposition.php';
require_once 'require/header.php';
require_once '../controllers/form_validation.php';
if ($successfullCommented){
    header('test.php');
}
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
    <div class="form-group">
        <span class="text-danger float-right"><?= $errors['comment'] ?? '' ?></span>
        <textarea class="comment" placeholder="Veuillez saisir un commentaire" maxlength="500" name="comment" id="comment" cols="121" rows="4"><?= $_POST['comment'] ?? '' ?></textarea>
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
<?php echo $commentsAnnouncement. '<div class="container mt-1">' ?? '';
echo $commentReturn ?? '';
foreach ($commentList as $comment):
    //Récupération du nombre de caractères du pseudo et de la date
    $pseudoAndPublishedAtLength = strlen($comment['pseudo'] .', '. $comment['published_at_formatted'] .' :');
    //Determination du nombre d'espaces à ajouter (largeur du text area - pseudo et date)
    $numberOfSpace = 225 - $pseudoAndPublishedAtLength;
    //Stockage des espaces dans une varialbe
    $spaces = str_repeat(' ', $numberOfSpace);
    //Stockage du pseudo + de la date + des espaces dans une variable
    $pseudoAndPublishedAtAndSpaces = $comment['pseudo'] .', '. $comment['published_at_formatted'] .' :'. $spaces;
?>
<div class="bg-prima$ry">
    <textarea class="comment bg-primary text-light" wrap="hard" cols="121" rows="4" disabled><?= $pseudoAndPublishedAtAndSpaces. $comment['comment'] ?? '' ?></textarea>
</div>
<?php
endforeach;
if ($commentsAnnouncement){
    echo '</div>';
}
require_once 'require/footer.php'; ?>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
