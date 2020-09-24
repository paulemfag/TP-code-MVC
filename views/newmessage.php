<?php
$title = 'Fill | Nouveau message';
require_once 'require/header.php';
require_once '../controllers/form_validation.php' ?>
<div class="row">
    <h1 class="text-center bg-light col-10 opacity mt-2 ml-auto mr-auto"><i class="fas fa-mail-bulk"></i> Nouveau message :</h1>
</div>
<form class="container" action="#" method="post" novalidate>
    <div class="form-group">
        <label class="text-light" for="pseudo"><i class="far fa-id-card"></i> Pseudo du destinataire :</label>
        <span class="float-right text-danger"><?= $errors['pseudo'] ?></span>
        <input minlength="1" maxlength="50" id="pseudo" name="pseudo" type="text" class="col-12" placeholder="Veuillez saisir un pseudo" value="<?= $pseudo ?>">
    </div>
    <div class="form-group">
        <label class="text-light" for="objet">Objet :</label>
        <span class="float-right text-danger"><?= $errors['obeject'] ?></span>
        <input minlength="1" maxlength="20" id="objet" name="objet" type="text" class="col-12" placeholder="Veuillez saisir l'objet du message" value="<?= $object ?>">
    </div>
    <div class="form-group">
        <label class="text-light" for="message"><i class="fas fa-comment-alt"></i> Message :</label>
        <span class="float-right text-danger"><?= $errors['message'] ?></span>
        <textarea minlength="1" maxlength="500" class="col-12" name="message" id="message" cols="122" rows="4" placeholder="Veuillez saisir votre message"><?= $message ?></textarea>
    </div>
    <div class="form-group">
        <button class="col-12 btn btn-success" type="submit"><i class="fas fa-paper-plane"></i> Envoyer</button>
    </div>
</form>
<?php require_once 'require/footer.php'; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
