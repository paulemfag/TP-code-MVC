<?php
require_once 'require/header.php';
require_once '../controllers/administrationPanel.php';
$title = 'Fill | Administration Panel';
session_start();
if ($_SESSION['id'] === '12'){
?>
<div class="container text-center bg-light mt-2 opacity">
    <h1>Administration Panel :</h1>
</div>
<table class="mt-2 table-striped compositionsTables container">
    <thead class="text-center">
    <th>ID :</th>
    <th>Pseudo :</th>
    <th>Actif :</th>
    <th>Adresse mail :</th>
    <th>Type de compte :</th>
    <th>Nombre de messages publiés :</th>
    <th>Suprimmer :</th>
    </thead>
    <tbody>
    <?php foreach ($usersList AS $user): ?>
        <tr class="text-center">
            <td><?= $user['id'] ?></td>
            <td><?= $user['pseudo'] ?></td>
            <td><?= $user['active'] ?></td>
            <td><?= $user['mailBox'] ?></td>
            <td><?= $user['accounttype'] ?></td>
            <td><?= $user['number_of_messages'] ?></td>
            <td><a name="submit" href="<?= '?id='. $user['id'] ?>" class="btn btn-sm btn-danger mt-1 mb-1 delete" type="submit"><i class="fas fa-user-times"></i></a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
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
<?php
}
else{
    header('location:accueil.php');
    exit();
}