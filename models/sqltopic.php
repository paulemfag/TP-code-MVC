<?php
/*if (empty($_GET['id'])){
    header('location:forum.php');
    exit();
}*/
require_once 'sqlparameters.php';
//récupère les informations du topic grace à l'id
$topicId = $_GET['id'];
try {
    $sth = $db->prepare('SELECT `title` FROM `topics` WHERE `id` = :id');
    $sth->bindValue(':id', $topicId, PDO::PARAM_INT);
    $sth->execute();
    $topics = $sth->fetch();
} catch (Exception $ex) {
    die('Connexion échoué !');
}
?>
    <div class="container bg-light mt-2 opacity">
        <a title="Fill | Forum" href="forum.php"><i class="mt-2 fas fa-home"></i></a>
        <h1 class="text-center ml-auto mr-auto"><?= $topics['title'] ?></h1>
    </div>
    <div id="scroll">
    <form action="post" method="post" name="post" id="quick_reply">
        <div id="card" class="bg-light card container mb-2">
            <div class="card-body">
                <label class="float-left col-12" for="response">Poster un message :</label>
                <div class="sceditor-toolbar" unselectable="on">
                    <div class="sceditor-group">
                        <a class="sceditor-button sceditor-button-bold" data-sceditor-command="bold" unselectable="on"
                           title="Gras">
                            <div unselectable="on">Gras</div>
                        </a>
                        <a class="sceditor-button sceditor-button-italic" data-sceditor-command="italic"
                           unselectable="on"
                           title="Ital.">
                            <div unselectable="on">Ital.</div>
                        </a>
                        <a class="sceditor-button sceditor-button-underline" data-sceditor-command="underline"
                           unselectable="on"
                           title="Soulig.">
                            <div unselectable="on">Soulig.</div>
                        </a>
                        <a class="sceditor-button sceditor-button-strike" data-sceditor-command="strike"
                           unselectable="on"
                           title="Barré">
                            <div unselectable="on">Barré</div>
                        </a>
                    </div>
                    <div class="sceditor-group">
                        <a class="sceditor-button sceditor-button-left" data-sceditor-command="left" unselectable="on"
                           title="Aligné à gauche">
                            <div unselectable="on">Aligné à gauche</div>
                        </a>
                        <a class="sceditor-button sceditor-button-center" data-sceditor-command="center"
                           unselectable="on"
                           title="Centré">
                            <div unselectable="on">Centré</div>
                        </a>
                        <a class="sceditor-button sceditor-button-right" data-sceditor-command="right" unselectable="on"
                           title="Aligné à droite">
                            <div unselectable="on">Aligné à droite</div>
                        </a>
                        <a class="sceditor-button sceditor-button-justify" data-sceditor-command="justify"
                           unselectable="on"
                           title="Justifié">
                            <div unselectable="on">Justifié</div>
                        </a>
                    </div>
                    <div class="sceditor-group">
                        <a class="sceditor-button sceditor-button-quote" data-sceditor-command="quote" unselectable="on"
                           title="'Citer'">
                            <div unselectable="on">'Citer'</div>
                        </a>
                        <a class="sceditor-button sceditor-button-code" data-sceditor-command="code" unselectable="on"
                           title="Code">
                            <div unselectable="on">Code</div>
                        </a>
                        <a class="sceditor-button sceditor-button-faspoiler" data-sceditor-command="faspoiler"
                           unselectable="on"
                           title="Spoiler">
                            <div unselectable="on">Spoiler</div>
                        </a>
                        <a class="sceditor-button sceditor-button-fahide" data-sceditor-command="fahide"
                           unselectable="on"
                           title="Caché">
                            <div unselectable="on">Caché</div>
                        </a>
                    </div>
                    <div class="sceditor-group">
                        <a class="sceditor-button sceditor-button-servimg" data-sceditor-command="servimg"
                           unselectable="on"
                           title="Héberger une image">
                            <div unselectable="on">Héberger une image</div>
                        </a>
                        <a class="sceditor-button sceditor-button-image" data-sceditor-command="image" unselectable="on"
                           title="Insérer une image">
                            <div unselectable="on">Insérer une image</div>
                        </a>
                        <a class="sceditor-button sceditor-button-link" data-sceditor-command="link" unselectable="on"
                           title="Insérer un lien">
                            <div unselectable="on">Insérer un lien</div>
                        </a>
                        <a class="sceditor-button sceditor-button-youtube" data-sceditor-command="youtube"
                           unselectable="on"
                           title="Insérer une vidéo Youtube">
                            <div unselectable="on">Insérer une vidéo Youtube</div>
                        </a>
                    </div>
                    <div class="sceditor-group">
                        <a class="sceditor-button sceditor-button-headers" data-sceditor-command="headers"
                           unselectable="on"
                           title="Format des titres">
                            <div unselectable="on">Format des titres</div>
                        </a>
                        <a class="sceditor-button sceditor-button-size" data-sceditor-command="size" unselectable="on"
                           title="Taille Police">
                            <div unselectable="on">Taille Police</div>
                        </a>
                        <a class="sceditor-button sceditor-button-color" data-sceditor-command="color" unselectable="on"
                           title="Couleur">
                            <div unselectable="on">Couleur</div>
                        </a>
                        <a class="sceditor-button sceditor-button-font" data-sceditor-command="font" unselectable="on"
                           title="Police">
                            <div unselectable="on">Police</div>
                        </a>
                        <a class="sceditor-button sceditor-button-removeformat disabled"
                           data-sceditor-command="removeformat"
                           unselectable="on" title="Supprimer le formatage du texte">
                            <div unselectable="on">Supprimer le formatage du texte</div>
                        </a>
                    </div>
                    <div class="sceditor-group">
                        <a class="sceditor-button sceditor-button-emoticon" data-sceditor-command="emoticon"
                           unselectable="on"
                           title="Smileys">
                            <div unselectable="on">Smileys</div>
                        </a>
                        <a class="sceditor-button sceditor-button-date" data-sceditor-command="date" unselectable="on"
                           title="Date actuelle">
                            <div unselectable="on">Date actuelle</div>
                        </a>
                        <a class="sceditor-button sceditor-button-time" data-sceditor-command="time" unselectable="on"
                           title="Heure actuelle">
                            <div unselectable="on">Heure actuelle</div>
                        </a>
                        <a class="sceditor-button sceditor-button-source hover" data-sceditor-command="source"
                           unselectable="on"
                           title="Basculer le mode d'édition">
                            <div unselectable="on">Basculer le mode d'édition</div>
                        </a>
                    </div>
                </div>
                <div id="textarea_content">
                    <textarea id="text_editor_textarea" rows="5" cols="60" class="col-12" name="response"></textarea>
                </div>
                <input type="submit" name="submitResponse" value="Poster"
                       class="btn btn-primary float-right mt-2 col-12">
            </div>
        </div>
    </form>
    <div id="textarea_content"
         style="width: 50%; clear: both; margin-left: auto; margin-right: auto; text-align: center;"><textarea
                id="text_editor_textarea" name="message"></textarea></div>
    <div style="text-align:center; margin-top:20px;"><input type="hidden" name="attach_sig" value=""/><input
                type="hidden" name="mode" value="reply"/>
        <!--<input type="hidden" name="sid" value="" /> -->
        <input type="hidden" name="tid" value="0adac9d46a521d89d7cf988863d82369">
        <input type="hidden" name="t" value="1">
        <input type="hidden" name="lt" value="1">
        <input type="hidden" name="notify" value="1">
        <script type="text/javascript">smilieoptions = {};</script>
        <input type="submit" name="preview" class="button2" value="Prévisualisation">
        &nbsp;<input type="submit" name="post" class="button2" value="Envoyer">
        <input type="hidden" name="auth[]" value="56002b12806e256cc0200d4ea87eb12e">
        <input type="hidden" name="auth[]" value="cdb875dcb3f82499b5029a5791a0860e">
        <?php
        try {
            $sth = $db->prepare('SELECT `id`, `message`, DATE_FORMAT(`published_at`, \'le %d/%m/%Y\ à %HH%i\') `published_at`, `id_users` FROM `publications` WHERE `id_topics` = :id ORDER BY `published_at` DESC');
            $sth->bindValue(':id', $topicId, PDO::PARAM_INT);
            $sth->execute();
            $publicationsList = $sth->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $ex) {
            die('Connexion échoué 1 !');
        }

        foreach ($publicationsList AS $publication): ?>
            <?php
            $id = $publication['id_users'];
            try {
                $sth = $db->prepare('SELECT `pseudo`, `number_of_messages` FROM `users` WHERE `id` = :id');
                $sth->bindValue(':id', $id, PDO::PARAM_INT);
                //$sth->bindValue(':accounttype', $accounttype, PDO::PARAM_STR);
                $sth->execute();
                $usersList = $sth->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $ex) {
                die('Connexion échoué 2 !');
            }
            foreach ($usersList as $user) {
                $pseudo = $user['pseudo'];
                $nmbrOfMessages = $user['number_of_messages'];
            }
            /*    if ($accounttype == 'commpositor'){
                    $textcolor = 'text-info';
                }
                elseif ($accounttype == 'particular'){
                    $textcolor = 'primary';
                }*/
            ?>
            <div id="cardForum" class="card container mb-2">
                <div class="card-body">
                    <p class="card-text float-right"
                       style="font-style: italic"><?= $pseudo . ', ' . $publication['published_at'] . '<br>nombre de messages publiés : ' . $nmbrOfMessages ?></p>
                    <p class="card-text float-left col-12"><?= $publication['message'] ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php
if (isset($_POST['submitResponse']) && !empty($_POST['response'])) {
//Update en BDD
    try {
        $sth = $db->prepare('UPDATE `users` SET number_of_messages = :number_of_messages + 1 WHERE `pseudo` = :pseudo');
        $sth->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $sth->bindValue(':number_of_messages', $nmbrOfMessages, PDO::PARAM_INT);
        $sth->execute();
        $changeAccount = 'isOk';
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
} else {
    $errors['changeAccountPassword'] = 'Veuillez renseigner votre réponse.';
}
//Le type de votre base de données.
//L’adresse du serveur de votre base de données ou DSN.
//Le port du serveur de votre base de données (dans bon nombre de cas cette information n’est pas nécessaire).
//Le nom de votre base de données.
//Le nom d’utilisateur et le mot de passe d’accès à votre base de données.