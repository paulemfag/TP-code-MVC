<?php
require_once '../controllers/form_validation.php';
require_once '../controllers/sqlplaylistUpdate.php';
require_once 'require/header.php';
//on avertit l'utilisateur si l'update s'est mal passé
echo $anErrorOccured ?? '';
?>
<div class="row">
    <h1 class="text-center bg-light col-10 opacity mt-3 ml-auto mr-auto">Changer le titre de la playlist | <?= $playlistTitle ?> :</h1>
</div>
<div class="container">
    <form action="#" method="post" novalidate>
        <div class="form-group">
            <label class="text-light" for="originalTitle">Titre d'origine</label>
            <input name="originalTitle" id="originalTitle" class="col-12 inputColor" type="text" value="<?= $playlistTitle ?>" disabled>
        </div>
        <div class="form-group">
            <label class="text-light" for="playlistNewTitle">Nouveau titre :</label>
            <span class="text-danger float-right"><?= $errors['playlistNewTitle'] ?? '' ?></span>
            <input name="playlistNewTitle" id="playlistNewTitle" class="col-12 inputColor" type="text" placeholder="Veuillez saisir le nouvea titre de la playlist" value="<?= $playlistNewTitle ?>">
        </div>
        <div class="form-group">
            <input class="btn btn-outline-success col-12" name="playlistTitleChange" id="playlistTitleChange" type="submit" value="Changer le titre de la playlist">
        </div>
    </form>
</div>
<?php
require_once 'require/footer.php';
?>
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
