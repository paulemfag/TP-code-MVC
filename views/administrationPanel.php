<?php
require_once '../controllers/sqlparameters.php';
$title = 'Fill | Administration Panel';
$query = 'SELECT id, pseudo, active, mailBox, accounttype, number_of_messages FROM `users`';
$usersQueryStat = $db->query($query);
$usersList = $usersQueryStat->fetchAll(PDO::FETCH_ASSOC);
session_start();
if ($_SESSION['id'] === '12'){
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="../assets/css/style.css"/>
    <!-- CDN Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- CDN font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <!-- CDN google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Odibee+Sans&display=swap" rel="stylesheet">
    <!--CDN logos Forum-->
    <link rel="stylesheet" href="https://illiweb.com/rs3/61/frm/SCEditor/src/themes/fa.default.min.css" type="text/css" media="all">
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-secondary">
    <img src="../assets/img/keyboards.png" alt="logo_clavier" height="40" width="60">
    <a class="navbar-brand text-light"><b>FILL</b></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link text-light" href="accueil.php">Accueil<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="mypage.php">Ma page</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="addcomposition.php">Ajouter une composition</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdownPlaylist" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Playlists
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownPlaylist">
                    <a href="newplaylist.php" id="newplaylist" class="dropdown-item text-light" style="hover: none"><i class="fas fa-plus"></i>
                        Nouvelle playlist</a>
                    <?php require_once '../controllers/playlistList.php'?>
                </div>
            </li>
            <!-- Menu Tags -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdownTags" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Tags
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownTags">
                    <a class="dropdown-item" href="#">Afro</a>
                    <a class="dropdown-item" href="#">Blues</a>
                    <a class="dropdown-item" href="#">Classique</a>
                    <a class="dropdown-item" href="#">Disco</a>
                    <a class="dropdown-item" href="#">Electro</a>
                    <a class="dropdown-item" href="#">Funk</a>
                    <a class="dropdown-item" href="#">Gospel</a>
                    <a class="dropdown-item" href="#">Kompa</a>
                    <a class="dropdown-item" href="#">Metal</a>
                    <a class="dropdown-item" href="#">Pop</a>
                    <a class="dropdown-item" href="#">Punk</a>
                    <a class="dropdown-item" href="#">Raï</a>
                    <a class="dropdown-item" href="#">Rap</a>
                    <a class="dropdown-item" href="#">Reggae</a>
                    <a class="dropdown-item" href="#">R'n'B</a>
                    <a class="dropdown-item" href="#">Rock</a>
                </div>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto mr-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdownMenu" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Menu
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenu">
                    <a class="dropdown-item" href="parameters.php">Paramètres</a>
                    <a class="dropdown-item" href="#">CGU</a>
                    <a class="dropdown-item text-danger" href="logout.php">Me déconnecter <i
                            class="fas fa-sign-out-alt"></i></a>
                </div>
            </li>
            <li>
                <a class="btn btn-light text-dark" href="forum.php" role="button">Forum</a>
            </li>
        </ul>
    </div>
</nav>
<div id="scroll">
<div class="container text-center bg-light mt-2 opacity">
    <h1>Administration Panel :</h1>
</div>
<table class="table-striped table-bordered container bg-info">
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
</div>
<?php require_once 'require/footer.php'; ?>
<script src="../assets/js/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
<?php
//récupération de l'id en GET quand on clique sur le bouton
if (isset($_GET['id']) && filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT)){
    //création d'une variable pour stocker la valeur
    $idGet = $_GET['id'];
    //suppression de l'utilisateur dans la BDD
    try {
        $sth = $db->prepare('DELETE FROM `users` WHERE `id` = ?');
        $sth->execute([$idGet]);
        //Message avertissant de la bonne suppression du compte et redirection vers la page d'administration pour vérifier les changements
        ?>
        <script>
            alert("L'utilisateur a bien été supprimé");
            function redir(){
                self.location.href="administrationPanel.php"
            }
            redir();
        </script><?php
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
}
else{
    header('location:accueil.php');
    exit();
}