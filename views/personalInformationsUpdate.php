<?php
session_start();
$title = $_SESSION['pseudo'] .'| Mise à jour des informations personnelles';
require_once 'require/header.php';
require_once '../controllers/form_validation.php';
require_once '../controllers/sqlpersonalInformationsUpdate.php';
?>
<div class="row">
    <h1 class="text-center bg-light col-10 opacity mt-2 ml-auto mr-auto"><?= $_SESSION['pseudo'] ?> | Mise à jour des informations personnelles :</h1>
</div>
<div class="container">
    <form action="#" method="post" novalidate>
        <div class="form-group">
            <label class="text-light" for="biography"><i class="fas fa-address-card"></i> <b>Biographie :</b></label>
            <span class="float-right text-danger"></span>
            <input class="col-12 inputColor" name="biography" id="biography" type="text" value="<?= $biography ?? $biographyInDb ?>">
        </div>
        <div class="form-group">
            <label class="text-light" for="instruments"><i class="fas fa-drum"></i> <b>Instruments :</b></label>
            <span class="float-right text-danger"></span>
            <input class="col-12 inputColor" name="instruments" id="instruments" type="text" value="<?= $instruments ?? $instrumentsInDb ?>">
        </div>
        <div class="form-group">
            <label class="text-light" for="software"><i class="fas fa-compact-disc"></i> <b>Logiciel :</b></label>
            <span class="float-right text-danger"></span>
            <input class="col-12 inputColor" name="software" id="software" type="text" value="<?= $software ?? $softwareInDb ?>">
        </div>
        <div class="form-group">
            <label class="text-light" for="facebookId"><img class="mb-2" height="30" width="35" src="../assets/img/facebook-logo.png" alt="facebook_logo"><b>Url profil Facebook :</b></label>
            <span class="float-right text-danger"><?= $errors['facebookId'] ?? '' ?></span>
            <input class="col-12 inputColor" name="facebookId" id="facebookId" type="text" value="<?= $facebook ?? $facebookIdInDb ?>">
        </div>
        <div class="form-group">
            <label class="text-light" for="twitterId"><img class="mb-2" height="27" width="47" src="../assets/img/logo_twitter.png" alt="facebook_logo"><b>Url profil Twitter :</b></label>
            <span class="float-right text-danger"><?= $errors['twitterId'] ?? '' ?></span>
            <input class="col-12 inputColor" name="twitterId" id="twitterId" type="text" value="<?= $twitter ?? $twitterIdInDb ?>">
        </div>
        <div class="captcha">
            <div
                    class="g-recaptcha"
                    data-sitekey="6Lc2seAUAAAAABg_R6mlOzQuKOkLNxYkyQiRLf7x"
                    style="display: inline-block;">

            </div>
        </div>
        <div class="form-group">
            <input class="btn btn-outline-success col-12" name="updatePersonalInformations" id="updatePersonalInformations" type="submit" value="Modifier mes informations personnelles">
        </div>
    </form>
</div>
<?php require_once 'require/footer.php'?>
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

