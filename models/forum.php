<?php
$search = $_GET['search'];
$searchValue = $_POST['searchValue'];
if (isset($search)){
    try {
        //Récupération des informations de la table topic
        $topicQueryStat = $db->query("SELECT `id`, `title`, DATE_FORMAT(`created_at`, 'le %d/%m/%Y\ à %HH%i') `created_at_formatted`, DATE_FORMAT(`updated_at`, 'le %d/%m/%Y\ à %HH%i') `updated_at`, `id_users` FROM `topics` WHERE `title` = ". $searchValue ." ORDER BY `created_at` DESC LIMIT $start, $limit");
        $topicList = $topicQueryStat->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $ex) {
        die('Connexion échoué');
    }
    foreach ($topicList AS $topic): ?>
        <tr class="shadow">
        <td><a class="text-dark" title="<?= $topic['title'] ?>" href="topic.php?id=<?= $topic['id'] ?>&page=1"><?= $topic['title'] ?></a></td>
        <?php
        try {
            $query = 'SELECT `pseudo` FROM `users` WHERE id =' . $topic['id_users'];
            $userQueryStat = $db->query($query);
            $userList = $userQueryStat->fetchAll(PDO::FETCH_ASSOC);
            foreach ($userList AS $user) {
                $id = $topic['id_users'];
                $topic['id_users'] = $user['pseudo'];
            }
        } catch (Exception $ex) {
            die('Connexion échoué');
        } ?>
        <td class="text-dark"><?= $topic['id_users'] ?></td>
        <td class="text-dark"><?= $topic['updated_at'] ?></td>
        <td class="text-dark"><?= $topic['created_at_formatted'] ?></td>
    <?php endforeach;} else{
try {
    //Récupération des informations de la table topic
    $topicQueryStat = $db->query("SELECT `id`, `title`, DATE_FORMAT(`created_at`, 'le %d/%m/%Y\ à %HH%i') `created_at_formatted`, DATE_FORMAT(`updated_at`, 'le %d/%m/%Y\ à %HH%i') `updated_at`, `id_users` FROM `topics` ORDER BY `created_at` DESC LIMIT $start, $limit");
    $topicList = $topicQueryStat->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $ex) {
    die('Connexion échoué');
}
foreach ($topicList AS $topic): ?>
    <tr class="shadow">
    <td><a class="text-light" title="<?= $topic['title'] ?>" href="topic.php?id=<?= $topic['id'] ?>&page=1"><?= $topic['title'] ?></a></td>
    <?php
    try {
        $query = 'SELECT `pseudo` FROM `users` WHERE id =' . $topic['id_users'];
        $userQueryStat = $db->query($query);
        $userList = $userQueryStat->fetchAll(PDO::FETCH_ASSOC);
        foreach ($userList AS $user) {
            $id = $topic['id_users'];
            $topic['id_users'] = $user['pseudo'];
        }
    } catch (Exception $ex) {
        die('Connexion échoué');
    } ?>
    <td><?= $topic['id_users'] ?></td>
    <td><?= $topic['updated_at'] ?></td>
    <td><?= $topic['created_at_formatted'] ?></td>
<?php endforeach;
}