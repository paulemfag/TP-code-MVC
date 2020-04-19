<?php
require_once '../controllers/sqlplaylist.php';
require_once 'require/header.php';
echo $successfulDelete ?? '';
?>
<div class="container text-center bg-light mt-2 opacity">
    <h1>Playlist | <?= $playlistTitle ?> :</h1>
</div>
<div class="container text-center">
    <a title="Suprimmer la playlist <?= $playlistTitle ?>" class="col-12 btn btn-success" href="">Changer le titre de la playlist</a>
    <button type="button" class="col-12 mt-2 btn btn-danger" data-toggle="modal" data-target="#deletePlaylist">
        Suprimmer la playlist
    </button>
</div>
<!--Modal Suprimmer la playlist-->
<div class="modal fade" id="deletePlaylist" tabindex="-1" role="dialog" aria-labelledby="deletePlaylist" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-center">Êtes vous sur de vouloir suprimmer la playlist <?= $playlistTitle ?> ?</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="mr-auto ml-auto btn btn-danger" data-dismiss="modal">Annuler la suppression</button>
                <button type="button" class="mr-auto ml-auto btn btn-success">Suprimmer la playlist</button>
            </div>
        </div>
    </div>
</div>
<table class="container mt-2 compositionsTables">
        <thead class="text-center">
        <tr>
        <th class="col-2 float-left">Titre :</th>
        <th class="col-2 float-left">Pseudo du compositeur:</th>
        <th class="col-2 float-left">Style :</th>
        <th class="col-3 float-left">Fichier :</th>
        <th class="col-3 float-left">Supprimer :</th>
        </tr>
        </thead>
        <tbody class="text-center">
        <?php foreach ($compositionsList as $value):?>
            <tr>
                <td class="col-2 float-left"><a rel="noopener" class="darkHref" target="_blank" title="Page composition | <?= $value['title'] ?>" href="composition.php?id=<?= $value['compositionid'] ?>"><?= $value['title'] ?></a></td>
                <td class="col-2 float-left"><a rel="noopener" class="darkHref" target="_blank" title="Page compositeur | <?= $value['pseudo'] ?>" href="compositor.php?id=<?= $value['id'] ?>"><?= $value['pseudo'] ?></a></td>
                <td class="col-2 float-left"><a rel="noopener" class="darkHref" target="_blank" title="Page style <?= $value['style'] ?>" href="stylePage.php?style=<?= $value['style'] ?>"><?= $value['style'] ?></a></td>
                <td class="col-3 float-left"><audio style="height: 20px;" controls controlsList="nodownload">
                        <source src="<?= $value['file'] ?>">
                    </audio>
                </td>
                <td class="col-3 float-left"><a title="Suprimmer la composition : <?= $value['title'] ?>" class="col-3 mr-auto btn-sm btn-outline-danger text-center" href="playlist.php?id=<?= $_GET['id'] ?>&idcomposition=<?= $value['compositionid'] ?>"><i class="col-3 fas fa-trash-alt"></i></a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
</table>
<!--Modal Suprimmer la composition-->
<div class="modal fade" id="deleteComposition" tabindex="-1" role="dialog" aria-labelledby="deleteComposition" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-center">Êtes vous sur de vouloir suprimmer la composition de la playlist ?</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="mr-auto ml-auto btn btn-danger" data-dismiss="modal">Annuler la suppression</button>
                <a href="playlist.php?id=<?= $_GET['id'] ?>&idcomposition=<?= $_GET['idcomposition'] ?>&delete=1" type="button" id="<?= $_GET['idcomposition'] ?>" class="text-light mr-auto ml-auto btn btn-success">Suprimmer la composition</a>
            </div>
        </div>
    </div>
</div>
<?php require_once 'require/footer.php'; ?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<?php if($show_modal):?>
    <script src="../assets/js/playlist.js"></script>
<?php endif;?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>