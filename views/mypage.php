<?php
if (isset ($deleteStatus)){
    sleep(2);
    header('location:mypage.php');
    exit();
}
$title = 'Fill | Ma page';
require_once 'require/header.php';
require_once '../controllers/sqlmypage.php';
//message d'alerte en cas de suppression de composition
echo $deleteStatus ?? '';
?>
<div class="row">
    <h1 class="text-center bg-light col-10 opacity mt-2 ml-auto mr-auto"><?= $_SESSION['pseudo'] ?> | Informations personnelles :</h1>
</div>
<!-- container -->
<div class="container bg-light opacity">
    <div class="row">
        <div class="col-12">
            <p><i class="fas fa-address-card"></i><b> Biographie :</b><br><br>
                <?= $biography ?? '' ?>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <p><i class="fas fa-drum"></i><b> Instruments :</b><br><br>
                <?= $instruments ?? '' ?>
            </p>
        </div>
        <div class="col-6">
            <p><i class="fas fa-compact-disc"></i><b> Logiciel :</b><br><br>
                <?= $software ?? '' ?>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <a><i class="fas fa-network-wired"></i><b> Réseaux :</b></a>
            <a title="Profil Facebook de <?= $pseudo ?>" rel="noopener" target="_blank" href="<?= $facebookId ?? '#' ?>"><img
                        src="../assets/img/facebook-logo.png" width="80" height="60" alt="logo_facebook"></a>
            <a title="Profil Twitter de <?= $pseudo ?>" rel="noopener" target="_blank" href="<?= $twitterId ?? '#' ?>"><img
                        src="../assets/img/logo_twitter.png" width="80" height="60" alt="logo_twitter"></a>
        </div>
    </div>
</div>
<div class="container compositionsTables mt-2">
    <div class="row playlistTable text-center">
        <a class="col-3 float-left"><i class="fas fa-music"></i><b> Composition :</b></a>
        <a class="col-2 float-left"><b>Style :</b></a>
        <a class="col-5 float-left"><b>Fichier :</b></a>
        <a class="col-2"><b>Supprimer :</b></a>
        <?php foreach ($compositionsList as $composition) {
            //récupération du titre sans l'extension de fichier (array)
            $compositionTitle = explode('.', $composition['title']);
            $file = $composition['file'];
            echo '<a title="Page composition ' .$compositionTitle[0]. '" href="composition.php?id=' .$composition['id']. '" class="col-3 text-dark">' . $compositionTitle[0] . '</a>' . '
<a title="Page style ' .$composition['style']. '" href="stylePage.php?style=' .$composition['style']. '" class="col-2 text-dark">' .$composition['style']. '</a>
<audio style="height: 20px;" class="float-right col-5" controls>
            <source src="' . $file . '" preload="auto" controls type="audio/mp3">
            </audio>
            <a title="Suprimmer la composition : ' .$compositionTitle[0]. '" class="col-1 ml-auto mr-auto btn-sm btn-outline-danger text-center" href="?idcomposition=' .$composition['id']. '"><i class="fas fa-trash-alt"></i></a>';
        } ?>
    </div>
</div>
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
