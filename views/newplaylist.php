<?php
$title = 'Fill | Nouvelle playlist';
require_once 'require/header.php';
require_once '../controllers/form_validation.php';
?>
<div class="container text-center bg-light mt-2 opacity">
    <h1>Nouvelle Playlist :</h1>
</div>
<form class="container" action="#" method="post">
    <div class="form-group">
        <label class="text-light" for="playlistName">Nom de la playlist :</label>
        <span class="text-danger float-right"><?= $errors['playlistName'] ?? '' ?></span>
        <input class="col-12 inputColor" id="playlistName" name="playlistName" type="text" value="<?= $playlistName ?>">
    </div>
    <input name="submitPlaylist" value="Créer la playlist" class="btn btn-outline-success col-12" type="submit">
</form>
<?php
require_once 'require/footer.php'; ?>
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
