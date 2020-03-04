<?php
$title = 'Fill | Forum';
require_once 'require/header.php';
?>
<div id="scroll">
<!-- barre et bouton rechercher -->
<div class="container mt-2 12-col">
    <div class="row" style="justify-content: center;">
        <input class="col-md-5 col-sm-2" type="search" placeholder="Entrez un sujet">
        <button class="btn btn-outline-primary my-2 my-sm-0 ml-2 col-md-2 col-sm-2" type="submit"><i
                    class="fas fa-search"></i> Rechercher
        </button>
        <a title="Créer un nouveau sujet" href="newsubject.php"
           class="btn btn-outline-success ml-1 col-md-2 col-sm-2"><i class="fas fa-plus"></i> Nouveau</a>
    </div>
</div>
<!-- tableau -->
<div class="container col-12">
    <div class="row" style="justify-content: center">
        <table class="table table-border table-striped table-sm bg-info mt-2 col-10">
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
</div>
<!-- bouton réglement -->
<div class="container col-12">
    <div class="row" style="justify-content: center;">
        <button type="button" class="btn btn-outline-danger col-10" data-toggle="modal" data-target="#rules"><i
                    class="fas fa-list-ol"></i> Réglement
        </button>
    </div>
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
<!-- Pagination -->
    <ul class="pagination">
        <li><a href="?pageno=1">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
        </li>
        <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
    </ul>
    <!--
<nav aria-label="Page navigation example">
    <ul class="pagination mt-2" style="opacity: 0.6; justify-content: center;">
        <li class="page-item"><a class="page-link" href="#">page précédente</a></li>
        <li class="page-item"><a class="page-link" href="#">page suivante</a></li>
    </ul>
</nav>-->
</div>
<?php require_once 'require/footer.php'; ?>
<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/forum.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
