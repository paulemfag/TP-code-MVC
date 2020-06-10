<?php
require_once '../controllers/forum_pagination.php';
$title = 'Fill | Forum';
require_once 'require/header.php';
//Si la variable Get 'page' n'est pas définie
if (!filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT)){
    //On redirige vers la page 1
    header('location:forum.php?page=1');
    exit();
}
echo $pages;
?>
<!-- barre et bouton rechercher -->
<div class="container mt-2 12-col">
    <div class="row" style="justify-content: center;">
        <input class="col-md-5 col-sm-2" type="search" placeholder="Entrez un sujet">
        <button class="btn btn-outline-primary my-2 my-sm-0 ml-2 col-md-2 col-sm-2" type="submit"><i
                    class="fas fa-search"></i> Rechercher
        </button>
        <a title="Créer un nouveau sujet" href="newsubject.php"
           class="btn btn-outline-success ml-1 col-md-2 col-sm-2"><i class="fas fa-plus"></i> Nouveau</a>
        <?php //Pagination
        //Si il n'y a pas qu'une seule page
        if ($pages != 1) :?>
        <div class="col-md-10 mt-2 d-flex">
            <nav aria-label="Page navigation mr-auto">
                <ul class="pagination">
                    <?php //Si on ne se trouve pas sur la première page affiche le bouton page précédente.
                    if ($page != 1) : ?>
                        <li class="page-item">
                            <a class="page-link" href="forum.php?page=<?= $previous; ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo; Page précédenter</span>
                            </a>
                        </li>
                    <?php endif; for($i = 1; $i<= $pages; $i++) : ?>
                        <li class="page-item">
                            <a class="page-link" href="forum.php?page=<?= $i; ?>"><?= $i; ?></a>
                        </li>
                    <?php endfor;
                    //Si on ne se trouve pas sur la dernière page affiche le bouton page suivante.
                    if ($pages != $page) :?>
                    <li class="page-item">
                        <a class="page-link" href="forum.php?page=<?= $next; ?>" aria-label="Next">
                            <span aria-hidden="true">Page suivante &raquo;</span>
                        </a>
                    </li>
                    <?php endif; ?>
                </ul>
            </nav>
        <?php endif; // liste déroulante ->vv ?>
            <form method="post" action="#" class="mt-2 ml-auto">
                <label class="text-light" for="limit-records">Nombre de topics par page : </label>
                <select name="limit-records" id="limit-records">
                    <?php //Si l'utilisateur ne définit pas le nombre de topics par page prend 10 par défaut
                    if (!isset($_POST)) : ?>
                    <option disabled="disabled" selected="selected">10</option>
                    <?php endif; foreach([10,20,30,40,50,100] as $limit): ?>
                        <option <?php if( isset($_POST['limit-records']) && $_POST['limit-records'] == $limit) echo 'selected' ?> value="<?= $limit; ?>"><?= $limit; ?></option>
                    <?php endforeach; ?>
                </select>
            </form>
        </div>
    </div>
</div>
<!-- tableau -->
<div class="container col-12">
    <div class="row" style="justify-content: center">
        <table class="table table-border table-striped table-sm bg-info p-0 m-0 mt-2 mr-1 ml-1 col-10">
            <thead class="text-light">
                <tr>
                    <th>Sujet :</th>
                    <th>Créateur :</th>
                    <th>Date de dernière modification :</th>
                    <th>Date de création :</th>
                </tr>
            </thead>
            <tbody>
                <?php require_once '../controllers/forum.php'; ?>
            </tbody>
        </table>
    </div>
    <!-- bouton réglement -->
    <button type="button" class="btn btn-outline-danger col-12 mt-2" data-toggle="modal" data-target="#rules"><i
                class="fas fa-list-ol"></i> Réglement
    </button>
    <?php
    //Pagination
    //Si il n'y a pas qu'une seule page
    if ($pages != 1) :
        ?>
        <div class="col-md-12 mt-2 d-flex justify-content-center">
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <?php //Si on ne se trouve pas sur la première page affiche le bouton page précédente.
                    if ($_GET['page'] != 1) : ?>
                        <li class="page-item">
                            <a class="page-link" href="forum.php?page=<?= $previous; ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo; Page précédenter</span>
                            </a>
                        </li>
                    <?php endif; for($i = 1; $i<= $pages; $i++) : ?>
                        <li class="page-item">
                            <a class="page-link" href="forum.php?page=<?= $i; ?>"><?= $i; ?></a>
                        </li>
                    <?php endfor;
                    //Si on ne se trouve pas sur la dernière page affiche le bouton page suivante.
                    if ($pages != $page) : ?>
                        <li class="page-item">
                            <a class="page-link" href="forum.php?page=<?= $next; ?>" aria-label="Next">
                                <span aria-hidden="true">Page suivante &raquo;</span>
                            </a>
                    </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    <?php endif; ?>
</div>
<!-- Modal réglement -->
<div class="modal" id="rules" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fas fa-book"></i> Réglement du Forum :</h4>
            </div>
            <div class="modal-body">
                <p>
                    Ce forum est modéré a posteriori, les messages que vous postez sont directement publiés sans aucun
                    contrôle
                    préalable. Il est de votre responsabilité de veiller à ce que vos contributions ne portent pas
                    préjudice à autrui et soient
                    conforment à la réglementation en vigueur. Les organisateurs du forum et les modérateurs se
                    réservent le droit de
                    retirer toute contribution qu’ils estimeraient déplacée, inappropriée, contraire aux lois et
                    règlements, à cette charte
                    d’utilisation ou susceptible de porter préjudice directement ou non à des tiers.
                    <br><br>
                    Les messages qui ne sont pas en relation avec les thèmes de discussion ou avec l’objet du forum
                    peuvent être
                    supprimés sans préavis par les modérateurs. Seront aussi supprimées, sans préjudice d'éventuelles
                    poursuites
                    disciplinaires ou judiciaires, les contributions qui :
                    <br><br>
                    1. incitent à la discrimination fondée sur la race, le sexe, la religion, à la haine, à la violence,
                    au racisme ou au révisionnisme
                    <br><br>
                    2. incitent à la commission de délits
                    <br><br>
                    3. sont contraire à l'ordre public et aux bonnes mœurs,
                    <br><br>
                    4. font l’apologie des crimes ou délits et particulièrement du meurtre, viol, des crimes de guerre
                    et crimes contre l'humanité,
                    <br><br>
                    5. ont un caractère injurieux, diffamatoire, insultant ou grossier
                    <br><br>
                    6. portent manifestement atteinte aux droits d’autrui et particulièrement ceux qui portent atteinte
                    à l'honneur ou à la réputation d'autrui,
                    <br><br>
                    7. sont liés à un intérêt manifestement commercial ou ont un but promotionnel sans objet avec le
                    forum.
                    <br><br>
                    L’utilisation d’un pseudonyme ne rend pas anonyme, conformément à la législation les prestataires
                    techniques sont
                    tenus de conserver et de déférer à l’autorité judiciaire les informations de connections (log, IP,
                    date/heure) permettant
                    la poursuite de l’auteur d’une infraction. Toutes les informations nécessaires seront donc
                    conservées pour la durée
                    légale prévue. Elles seront détruites au terme du délai légal de conservation.
                    <br><br>
                    Les organisateurs du forum se réservent le droit d’exclure du forum, de façon temporaire ou
                    définitive, toute personne
                    dont les contributions sont en contradiction avec les règles mentionnées dans le présent document.
                    Les organisateurs
                    pourront transmettre aux autorités de police ou de justice toutes les pièces ou documents postés sur
                    le forum s’ils
                    estiment de leur devoir d’informer les autorités compétentes ou que la législation leur en fait
                    obligation.
                </p>
            </div>
            <div class="modal-footer">
                <button id="rulesDecline" type="button" class="btn btn-outline-danger" data-dismiss="modal"><i
                            class="fas fa-times"></i> Je refuse
                </button>
                <button id="rulesAllow" type="button" class="btn btn-outline-success" data-dismiss="modal"><i
                            class="fas fa-times"></i> J'accepte
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php require_once 'require/footer.php'; ?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="../assets/js/forum_min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
