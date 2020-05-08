<?php
require_once '../controllers/sqlcomposition.php';
require_once 'require/header.php';
require_once '../controllers/form_validation.php';
echo $commentReturn ?? '';
?>
<div class="container text-center bg-light mt-2 opacity">
    <h1><?= $title ?> :</h1>
</div>
<div class="container mt-2 compositionsTables">
    <p>
        Style : <a class="text-dark" href="stylePage.php?style=<?= $style ?>"><?= $style ?>.</a>
    <br>
    Compositeur : <?= $compositorPseudo ?>.
    <br>
    Instruments employés : <?= $instruments ?? 'non définis' ?>.
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
<div class="container text-center bg-light mt-2 opacity">
    <h2>Laisser un commentaire :</h2>
</div>
<form class="container mt-2" method="post" action="#">
    <span class="text-danger float-right"><?= $errors['comment'] ?? '' ?></span>
    <textarea name="comment" id="comment" cols="121" rows="4"><?= $_POST['comment'] ?? '' ?></textarea>
    <input name="submitComment" id="submitComment" class="btn btn-outline-success mt-2 col-12" value="Envoyer" type="submit">
</form>
<?php require_once 'require/footer.php'; ?>
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
