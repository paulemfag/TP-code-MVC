<?php
require_once 'sqlparameters.php';
//pagination
if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$conn = mysqli_connect('localhost',USER,PASSWORD,'fill');
//nombre de résultat par page
$no_of_records_per_page = 10;
$offset = ($pageno-1) * $no_of_records_per_page;
//connection à la base
if (mysqli_connect_errno()){
    echo 'Impossible de se connecter :' . mysqli_connect_error();
    die();
}
//récupération du nombres total de topics
$total_pages_sql = 'SELECT COUNT(*) FROM `topics`';
$result = mysqli_query($conn,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);
//requête
$sql = 'SELECT * FROM `topics` LIMIT $offset, $no_of_records_per_page';
$res_data = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($res_data)){
    //here goes the data
}
//récupère les informations de la table topic
try {
    $query = 'SELECT `id`, `title`, DATE_FORMAT(`created_at`, \'le %d/%m/%Y\ à %HH%i\') `created_at_formatted`, `id_users` FROM `topics` ORDER BY `created_at` DESC';
    $topicQueryStat = $db->query($query);
    $topicList = $topicQueryStat->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $ex) {
    die('Connexion échoué');
}
foreach ($topicList AS $topic): ?>
    <tr class="shadow">
    <td class="text-light"><a title="<?= $topic['title'] ?>" href="topic.php?id=<?= $topic['id'] ?>"><?= $topic['title'] ?></a></td>
    <?php
/*    try {
        $query = 'SELECT * FROM `publication` WHERE id_topics =' .$topic['id']. 'ORDER BY `id` ASC';
        $publishQueryStat = $db->query($query);
        $userList = $publishQueryStat->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $ex) {
        die('Connexion échoué');
    }*/
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
    <td class="text-light"><?= $topic['id_users'] ?></td>
    <td class="text-light"><?= 'à définir' ?></td>
    <td class="text-light"><?= $topic['created_at_formatted'] ?></td>
<?php endforeach;
/*$page = 1;
if (!empty($_GET['page']) && filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT)) {
    $page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT);
}
$totaltopic = $topic->totalPatients();
$perPage = 3;
$numberOfPages = ceil($totaltopic / $perPage);
$begin = $perPage * ($page - 1);
$topicList = $topic->patientsPerPage($perPage, $begin);
if (isset($_POST['search-submit'])) {
    $search = filter_input(INPUT_POST, 'search', FILTER_SANITIZE_STRING);
    if (!empty($search)) {
        $hidePaginate = true;
        $topicList = $topic->findPatient($search);
    }
}*/
