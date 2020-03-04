<?php
$title = 'Fill | Ajout Composition';
require_once 'require/header.php';
require_once  '../controllers/sqlfile.php';
require_once '../controllers/form_validation.php';
echo $compositionAdded ?? '';
?>
<div class="container bg-light mt-2 opacity">
    <h1 class="text-center ml-auto mr-auto">Ajouter une composition :</h1>
</div>
<div id="scroll">
<form class="container" method="post" action="#" novalidate enctype="multipart/form-data">
    <div class="form-group">
        <label class="text-light float-left" for="file">Veuillez ajouter un fichier ( format mp3, m4a, m4b, aac, aax, mpc) :</label>
        <span class="text-danger float-right"><?= $errors['file'] ?? '' ?></span>
        <input type="hidden" name="MAX_FILE_SIZE" value="20000000">
-->        <input id="fileInput"  class="bg-light col-12" type="file" name="file" accept="audio/*">
    </div>
    <div class="form-group">
        <label class="text-light" for="compositionName">Nom de la composition :</label>
        <span class="text-danger float-right"><?= $errors['compositionName'] ?? '' ?></span>
        <input id="compositionName" class="col-12 inputColor" name="compositionName" type="text"
               value="<?= $_POST['compositionName'] ?? '' ?>">
    </div>
    <div class="form-group">
        <label class="text-light" for="compositionStyle"><i class="fas fa-music"></i> Style musical :</label>
        <span class="float-right text-danger"><?= $errors['compositionStyle'] ?? '' ?></span>
        <select class="col-12" name="compositionStyle" id="compositionStyle">
            <?= $styleOption ?>
            <option value="Autre">Autre</option>
            <option value="Afro">Afro</option>
            <option value="Blues">Blues</option>
            <option value="Classique">Classique</option>
            <option value="Disco">Disco</option>
            <option value="Electro">Electro</option>
            <option value="Funk">Funk</option>
            <option value="Gospel">Gospel</option>
            <option value="Kompa">Kompa</option>
            <option value="Metal">Metal</option>
            <option value="Pop">Pop</option>
            <option value="Punk">Punk</option>
            <option value="Raï">Raï</option>
            <option value="Rap">Rap</option>
            <option value="Reggae">Reggae</option>
            <option value="R'n'B">R'n'B</option>
            <option value="Rock">Rock</option>
        </select>
        <div id="otherChoice">
            <span class="text-danger float-right"><?= $errors['otherChoice'] ?? '' ?></span>
            <input name="otherChoice" class="col-12 inputColor" type="text" placeholder="Veuillez préciser" value="<?= $_POST['otherChoice'] ?? '' ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="text-light" for="instruments"><i class="fas fa-drum"></i> Instrument(s) employé(s) : ( facultatif )</label>
        <span class="text-danger float-right"><?= $errors['instruments'] ?? '' ?></span>
        <input id="instruments" class="col-12 inputColor" name="instruments" type="text"
               value="<?= $_POST['instruments'] ?? '' ?>">
    </div>
    <div class="form-group">
        <label class="text-light" for="chords">Accords employés : ( facultatif )</label>
        <span></span>
        <input id="chords" class="col-12 inputColor" name="chords" type="text" value="<?= $_POST['chords'] ?? '' ?>">
    </div>
    <button id="newComposition" name="newComposition" value="<?= $isOk ?? '' ?>" class="btn btn-success col-12" type="submit">Ajouter la composition</button>
</form>
</div>
<?php require_once 'require/footer.php'; ?>
<script src="../assets/js/jquery-3.3.1.min.js"></script>
<script src="../assets/js/addcomposition.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
