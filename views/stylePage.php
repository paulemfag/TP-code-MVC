<?php
if (empty($_GET['style'])) {
    header('location:accueil.php');
    exit();
}
$style = $_GET['style'];
$title = 'Fill | ' . $style;
require_once 'require/header.php';
require_once '../controllers/sqlstylePagination.php';
//Si l'entrée en base s'est correctement effectuée (récupération des paramètres d'url) affiche une alert bootstrap pour avertir l'utilisateur
if (filter_input(INPUT_GET, 'idPlaylist', FILTER_SANITIZE_NUMBER_INT) && filter_input(INPUT_GET, 'idComposition', FILTER_SANITIZE_NUMBER_INT)) {
    echo '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <p>La composition a bien été ajoutée à la playlist.</p>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
}
?>
<div class="row">
    <h1 class="text-center bg-light col-10 opacity mt-2 ml-auto mr-auto">Compositions Style <?= $style ?> :</h1>
</div>
<table class="container compositionsTables mt-2 text-center">
    <thead>
    <tr>
    <th>Nom de la composition :</th>
    <th>Compositeur :</th>
    <th>Morceau :</th>
    <th>Ajouter à une Playlist :</th>
    </tr>
    </thead>
    <tbody>
    <?php require_once '../controllers/sqlstyle.php'; ?>
    </tbody>
</table>
<?php //Pagination si il n'y a pas qu'une seule page
if ($pages > 1) : ?>
    <nav class="col-md-12 mt-2 d-flex justify-content-center">
        <ul class="pagination custom-pagination">
            <?php //Si on ne se trouve pas sur la première page.
            if ($page != 1) : ?>
                <li class="page-item"><a class="page-link" href="stylePage.php?style=<?= $_GET['style'] ?>&page=1" aria-label="Previous"><span aria-hidden="true">&laquo;&laquo; Première page</span></a></li>
                <li class="page-item"><a class="page-link" href="stylePage.php?style=<?= $_GET['style'] ?>&page=<?= $previous; ?>" aria-label="Previous"><span aria-hidden="true">&laquo; Page précédenter</span></a></li>
            <?php endif; ?>
            <li>
                <select class="form-control" onchange="location = this.value;">
                    <?php for($i = 1; $i<= $page - 1; $i++) : ?>
                        <option value="stylePage.php?style=<?= $_GET['style'] ?>&page=<?= $i ?>"><?= $i ?></option>
                    <?php endfor; ?>
                    <option value="stylePage.php?style=<?= $_GET['style'] ?>&page=<?= $page ?>" disabled selected><?= $page ?></option>
                    <?php for($i = $page + 1; $i<= $pages; $i++) : ?>
                        <option value="stylePage.php?style=<?= $_GET['style'] ?>&page=<?= $i ?>"><?= $i ?></option>
                    <?php endfor; ?>
                </select>
            </li>
            <?php //Si on ne se trouve pas sur la dernière page.
            if ($pages != $page) : ?>
                <li class="page-item"><a class="page-link" href="stylePage.php?style=<?= $_GET['style'] ?>&page=<?= $next; ?>" aria-label="Next"><span aria-hidden="true">Page suivante &raquo;</span></a></li>
                <li class="page-item"><a class="page-link" href="stylePage.php?style=<?= $_GET['style'] ?>&page=<?= $pages; ?>" aria-label="Next"><span aria-hidden="true">Dernière page &raquo;&raquo;</span></a></li>
            <?php endif; ?>
        </ul>
    </nav>
<?php endif;
require_once 'require/footer.php'; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>