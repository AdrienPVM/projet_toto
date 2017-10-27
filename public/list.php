<pre>
<?php

require __DIR__.'/../inc/config.php';


$sql='SELECT *
FROM student
';

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
</pre>
