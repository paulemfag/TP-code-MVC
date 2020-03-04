<?php
if (empty($_GET['style'])) {
    header('location:accueil.php');
    exit();
}
$style = $_GET['style'];
$title = 'Fill | ' . $style;
require_once 'require/header.php';
?>
<div class="container text-center bg-light mt-2 opacity">
    <h1>Compositions Style <?= $style ?> :</h1>
</div>
<table class="container bg-light mt-2 text-center">
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
<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>