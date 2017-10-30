<?php

require __DIR__.'/../inc/config.php';

///Get latest ID
$sqlGetMaxPage='SELECT stu_id
FROM student';
$pdoStatement=$pdo->query($sqlGetMaxPage);
$resultMaxPage=$pdoStatement->fetchAll(PDO::FETCH_ASSOC);
$TotalOfId=count($resultMaxPage);


//$pageMax=/5;
$page=isset($_GET['page'])?intval($_GET['page']):1;
if ($page<1) {
    $page=1;
}

if ($page>round($TotalOfId/5)) {
    $page=round($TotalOfId/5);
}
$offset=($page-1)*5;

$search=isset($_GET['searchInput'])?trim($_GET['searchInput']):'';
if (!empty($search)) {
    $sql='SELECT *
    FROM student
    WHERE stu_lastname LIKE :search
    OR stu_firstname LIKE :search
    OR stu_email LIKE :search
    ';
    $pdoStatement=$pdo->prepare($sql);
    $pdoStatement->bindValue(':search', '%'.$search.'%', PDO::PARAM_STR);
    $pdoStatement->execute();
}
else {
    $sql='SELECT *
    FROM student
    LIMIT 5 OFFSET '.$offset;
    $pdoStatement=$pdo->query($sql);
}


if ($pdoStatement===false) {
    print_r($pdo->errorInfo());
    exit;
};
$result=$pdoStatement->fetchAll(PDO::FETCH_ASSOC);

//A la fin, j'affiche
require_once __DIR__.'/../view/header.php';
require_once __DIR__.'/../view/list.php';
require_once __DIR__.'/../view/footer.php';
?>
