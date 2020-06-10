<?php
$title = 'Forum | Sujet';
require_once 'require/header.php';
require_once '../controllers/form_validation.php';
require_once '../controllers/sqltopic.php';
?>
<div class="container bg-light mt-2 opacity">
    <a id="returnArrow" title="Fill | Forum" href="forum.php"><i class="mt-2 fas fa-home"
                                                                 style="font-size: 50px;"></i></a>
    <h1 class="text-center ml-auto mr-auto"><?= $topics['title'] ?></h1>
</div>
<div class="container">
    <form class="mt-3" action="#" method="post" novalidate>
        <div class="form-group">
            <label class="text-light" for="message">Poster un message :</label>
            <span class="text-danger float-right"><?= $errors['message'] ?? '' ?></span>
            <textarea class="noResize" maxlength="500" name="message" id="message" cols="121" rows="5" placeholder="Veuillez saisir un message"><?= $message ?></textarea>
        </div>
        <div class="captcha">
            <div
                    class="g-recaptcha"
                    data-sitekey="6Lc2seAUAAAAABg_R6mlOzQuKOkLNxYkyQiRLf7x"
                    style="display: inline-block;">

            </div>
        </div>
        <div class="form-group">
            <input name="topicMessageSubmit" id="topicMessageSubmit" class="btn btn-outline-success col-12" type="submit" value="Poster le message">
        </div>
    </form>
<?php foreach ($publicationsList AS $publication): ?>
    <div class="card mt-2">
        <div class="card-body compositionsTables">
            <p class="card-text"><i><a class="text-dark" title="Profil de <?= $publication['pseudo'] ?>" href="mypage.php?id=<?= $publication['id_users'] ?>"><?= $publication['pseudo'] .'</a>, '. $publication['published_at'] .' :' ?></i></p>
            <p class="card-text"><?= $publication['message'] ?></p>
        </div>
    </div>
<?php endforeach; ?>
</div>
<?php require_once 'require/footer.php'; ?>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="assets/js/topic_min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>