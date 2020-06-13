<?php
$title = 'Fill | Panel d\'administration';
require_once 'require/header.php';
require_once '../controllers/sqladministrationPanelPagination.php';
require_once '../controllers/administrationPanel.php';
$title = 'Fill | Administration Panel';
session_start();
if ($_SESSION['id'] === '12'){
?>
<div class="container text-center bg-light mt-2 opacity">
    <h1>Panel d'administration :</h1>
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
            <td><a class="text-dark" href="compositor.php?id=<?= $user['id'] ?>"><?= $user['pseudo'] ?></a></td>
            <td><?= $user['active'] ?></td>
            <td><?= $user['mailBox'] ?></td>
            <td><?= $user['accounttype'] ?></td>
            <td><?= $user['number_of_messages'] ?></td>
            <td><a name="submit" href="<?= '?id='. $user['id'] ?>" class="btn btn-sm btn-danger mt-1 mb-1 delete" type="submit"><i class="fas fa-user-times"></i></a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php //Pagination si il n'y a pas qu'une seule page
if ($pages > 1) : ?>
    <nav class="col-md-12 mt-2 d-flex justify-content-center">
        <ul class="pagination custom-pagination">
            <?php //Si on ne se trouve pas sur la première page.
            if ($page != 1) : ?>
                <li class="page-item"><a class="page-link" href="administrationPanel.php?page=1" aria-label="Previous"><span aria-hidden="true">&laquo;&laquo; Première page</span></a></li>
                <li class="page-item"><a class="page-link" href="administrationPanel.php?page=<?= $previous; ?>" aria-label="Previous"><span aria-hidden="true">&laquo; Page précédenter</span></a></li>
            <?php endif; ?>
            <li>
                <select class="form-control" onchange="location = this.value;">
                    <?php for($i = 1; $i<= $page - 1; $i++) : ?>
                        <option value="administrationPanel.php?page=<?= $i ?>"><?= $i ?></option>
                    <?php endfor; ?>
                    <option value="administrationPanel.php?page=<?= $page ?>" disabled selected><?= $page ?></option>
                    <?php for($i = $page + 1; $i<= $pages; $i++) : ?>
                        <option value="administrationPanel.php?page=<?= $i ?>"><?= $i ?></option>
                    <?php endfor; ?>
                </select>
            </li>
            <?php //Si on ne se trouve pas sur la dernière page.
            if ($pages != $page) : ?>
                <li class="page-item"><a class="page-link" href="administrationPanel.php?page=<?= $next; ?>" aria-label="Next"><span aria-hidden="true">Page suivante &raquo;</span></a></li>
                <li class="page-item"><a class="page-link" href="administrationPanel.php?page=<?= $pages; ?>" aria-label="Next"><span aria-hidden="true">Dernière page &raquo;&raquo;</span></a></li>
            <?php endif; ?>
        </ul>
    </nav>
<?php endif; ?>
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