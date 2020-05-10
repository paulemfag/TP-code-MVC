<?php
if (empty($_GET['style'])) {
    header('location:accueil.php');
    exit();
}
$style = $_GET['style'];
$title = 'Fill | ' . $style;
require_once 'require/header.php';
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