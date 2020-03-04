<?php require_once '../controllers/form_validation.php'; ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Fill | Bienvenue</title>
    <link rel="stylesheet" href="assets/css/style.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- CDN font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <!-- CDN google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Odibee+Sans&display=swap" rel="stylesheet">
</head>
<body>
<!-- Navbar bootstrap -->
<nav class="navbar navbar-expand-lg navbar-light bg-secondary col-12">
    <img src="../assets/img/keyboards.png" alt="logo_clavier" height="40" width="60">
    <a id="FILL" class="navbar-brand text-light" style="font-weight: bold;">FILL</a>
</nav>
<div class="container text-center bg-light mt-2 opacity">
    <h1>Récupération du mot de passe :</h1>
</div>
<form class="container" action="#" method="post" novalidate>
    <div class="form-group">
        <label class="text-light" for="passwordAfterReset">Nouveau mot de passe :</label>
        <span class="text-danger float-right"><?= ($errors['passwordAfterReset']) ?? '' ?></span>
        <input value="<?= $passwordAfterReset ?>" name="passwordAfterReset" id="passwordAfterReset" class="col-12 inputColor" type="password">
    </div>
    <div class="form-group">
        <label class="text-light" for="confirmPasswordAfterReset">Confirmation du nouveau mot de passe :</label>
        <span class="text-danger float-right"><?= ($errors['confirmPasswordAfterReset']) ?? '' ?></span>
        <input value="<?= $confirmPasswordAfterReset ?>" name="confirmPasswordAfterReset" id="confirmPasswordAfterReset" class="col-12 inputColor" type="password">
    </div>
    <input name="resetMyPassword" class="btn btn-outline-success col-12" value="Changer le mot de passe" type="submit">
</form>
<?php require_once 'require/footer.php'?>
</body>
</html>
