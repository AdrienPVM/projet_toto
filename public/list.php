<?php

require __DIR__.'/../inc/config.php';


$page=isset($_GET['page'])?intval($_GET['page']):1;

$offset=($page-1)*5;

$sql='SELECT *
FROM student
LIMIT 5 OFFSET '.$offset;

$pdoStatement=$pdo->query($sql);
if ($pdoStatement===false) {
    print_r($pdo->errorInfo());
    exit;
}

$result=$pdoStatement->fetchAll(PDO::FETCH_ASSOC);

//A la fin, j'affiche
require_once __DIR__.'/../view/header.php';
require_once __DIR__.'/../view/list.php';
require_once __DIR__.'/../view/footer.php';
?>
