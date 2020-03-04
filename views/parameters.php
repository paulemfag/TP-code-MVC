<?php
$title = 'Fill | Paramètres';
require_once 'require/header.php';
require_once '../controllers/form_validation.php';
?>
<div class="container text-center bg-light mt-2 opacity">
    <h1>Paramètres :</h1>
</div>
<div id="parametersMenu" class="container bg-light mt-2 opacity">
    <ul id="parameters">
        <li><a id="changePass" href="#"><i class="fas fa-arrow-circle-right"></i> Changer mon mot de passe</a></li>
        <li><a id="changeAccount" href="#"><i class="fas fa-arrow-circle-right"></i> Changer mon type de compte</a></li>
        <li><a id="removeAccount" href="#"><i class="fas fa-arrow-circle-right"></i> Supprimmer mon compte</a></li>
    </ul>
</div>
<div id="scroll">
    <?= $message ?? '' ?>
<div id="changePasswordItems">
    <h2 class="container">Changement du mot de passe :</h2>
    <form class="container" action="#" method="post" novalidate>
        <div class="form-group">
            <label class="text-light" for="actualPassword">Mot de passe actuel :</label>
            <span class="text-danger float-right"><?= ($errors['actualPassword']) ?? '' ?></span>
            <input id="actualPassword" class="col-12 inputColor" name="actualPassword" type="password" value="<?= $actualPassword ?>" required>
        </div>
        <div class="form-group">
            <label class="text-light" for="newPassword">Nouveau mot de passe :</label>
            <span class="text-danger float-right"><?= ($errors['newPassword']) ?? '' ?></span>
            <input id="newPassword" class="col-12 inputColor" name="newPassword" type="password" value="<?= $newPassword ?>" required>
        </div>
        <div class="form-group">
            <label class="text-light" for="newPasswordConfirm">Confirmation du nouveau mot de passe :</label>
            <span class="text-danger float-right"><?= ($errors['newPasswordConfirm']) ?? '' ?></span>
            <input id="newPasswordConfirm" class="col-12 inputColor" name="newPasswordConfirm" type="password" value="<?= $newPasswordConfirm ?>" required>
        </div>
        <button class="btn btn-outline-success col-12" id="changeMyPassword" name="changeMyPassword" type="submit" value="<?= $changeMyPassword ?? '' ?>">Changer mon mot de passe</button>
    </form>
</div>
<div id="changeTypeOfAccount">
    <h2 class="container">Changement du type de compte :</h2>
    <form class="container" action="#" method="post" novalidate>
        <div class="form-group">
            <label class="text-light" for="actualType">Type de compte actuel :</label>
            <input class="col-12 inputColor" id="actualType" name="actualType" type="text" disabled value="<?php if($_SESSION['accounttype'] == 'compositor'){ echo 'compositeur'; } else{ echo 'particulier'; } ?>">
        </div>
        <div class="form-group">
            <label class="text-light" for="newType">Type de compte après changement :</label>
            <input class="col-12 inputColor" id="newType" name="newType" type="text" disabled value="<?php if($_SESSION['accounttype'] == 'compositor'){ echo 'particulier'; } else{ echo 'compositeur'; } ?>">
        </div>
        <div class="form-group">
            <label class="text-light" for="changeAccountPassword">Mot de passe :</label>
            <span class="text-danger float-right"><?= $errors['changeAccountPassword'] ?? '' ?></span>
            <input class="col-12 inputColor" id="changeAccountPassword" name="changeAccountPassword" type="password" value="<?= $_POST['changeAccountPassword'] ?? '' ?>">
        </div>
        <h2 class="text-danger">Attention après ces changements [...], vous serez déconnecté et devrez donc vous reconnecter.</h2>
        <button class="btn btn-outline-success col-12" id="changeAccountType" name="changeAccountType" type="submit" value="<?= $changeAccount ?? '' ?>">Changer mon type de compte</button>
    </form>
</div>
<div id="removeAccountItems">
    <h2 class="container">Suppression du compte :</h2>
    <form class="container" action="#" method="post" novalidate>
        <div class="form-group">
            <label class="text-light" for="Password">Veuillez taper votre mot de passe :</label>
            <span class="text-danger float-right"><?= ($errors['Password']) ?? '' ?></span>
            <input id="Password" class="col-12 inputColor" name="Password" type="password" value="<?= $actualPassword ?>" required>
        </div>
        <button class="btn btn-outline-danger col-12" id="removeMyAccount" name="removeMyAccount" type="submit" value="<?= $removeMyAccount ?? '' ?>"><i class="far fa-times-circle"></i> Supprimer mon compte</button>
    </form>
</div>
</div>
<?php require_once 'require/footer.php'; ?>
<script src="../assets/js/jquery-3.3.1.min.js"></script>
<script src="../assets/js/parameters.js"></script>
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
