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
                    <a href="newplaylist.php" id="newplaylist" class="dropdown-item text-light"><i class="fas fa-plus"></i>
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
                    <a title="Page style | Afro" class="dropdown-item" href="stylePage.php?style=Afro&page=1">Afro</a>
                    <a title="Page style | Blues" class="dropdown-item" href="stylePage.php?style=Blues&page=1">Blues</a>
                    <a title="Page style | Classique" class="dropdown-item" href="stylePage.php?style=Classique&page=1">Classique</a>
                    <a title="Page style | Disco" class="dropdown-item" href="stylePage.php?style=Disco&page=1">Disco</a>
                    <a title="Page style | Electro" class="dropdown-item" href="stylePage.php?style=Electro&page=1">Electro</a>
                    <a title="Page style | Funk" class="dropdown-item" href="stylePage.php?style=Funk&page=1">Funk</a>
                    <a title="Page style | Gospel" class="dropdown-item" href="stylePage.php?style=Gospel&page=1">Gospel</a>
                    <a title="Page style | Kompa" class="dropdown-item" href="stylePage.php?style=Kompa&page=1">Kompa</a>
                    <a title="Page style | Metal" class="dropdown-item" href="stylePage.php?style=Metal&page=1">Metal</a>
                    <a title="Page style | Pop" class="dropdown-item" href="stylePage.php?style=Pop&page=1">Pop</a>
                    <a title="Page style | Punk" class="dropdown-item" href="stylePage.php?style=Punk&page=1">Punk</a>
                    <a title="Page style | Raï" class="dropdown-item" href="stylePage.php?style=Raï&page=1">Raï</a>
                    <a title="Page style | Rap" class="dropdown-item" href="stylePage.php?style=Rap&page=1">Rap</a>
                    <a title="Page style | Reggae" class="dropdown-item" href="stylePage.php?style=Reggae&page=1">Reggae</a>
                    <a title="Page style | R'n'B" class="dropdown-item" href="stylePage.php?style=R'n'B&page=1">R'n'B</a>
                    <a title="Page style | Rock" class="dropdown-item" href="stylePage.php?style=Rock&page=1">Rock</a>
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
                <a class="btn btn-light text-dark" href="forum.php?page=1" role="button">Forum</a>
            </li>
        </ul>
    </div>
</nav>