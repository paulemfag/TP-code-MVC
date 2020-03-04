<?php
require_once '../controllers/sqlparameters.php';
require_once '../controllers/sqlcomposition.php';
require_once 'require/header.php';
?>
<div class="container text-center bg-light mt-2 opacity">
    <h1><?= $title ?> :</h1>
</div>
<div class="container bg-light mt-2 opacity">
    <p>
    Style : <?= $style ?>.
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
<?php require_once 'require/footer.php'; ?>
<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/audio.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
