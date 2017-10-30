<?php
    require __DIR__.'/../inc/config.php';

    if (isset($_POST['delete'])) {
        # code...
    }
    $sqlDelete='DELETE FROM student
    WHERE stu_id = :deleteID
    ';
    $pdoDelete=$pdo->prepare($sqlDelete);
    $pdoDelete->bindValue(':deleteID', $_POST['id'], PDO::PARAM_INT);

    if ($pdoDelete->execute()===false) {
        print_r($pdoDelete->errorInfo(), true);
    }
    echo $pdoDelete->rowCount();


    header('Location: http://projet-toto.dev/list.php');
    exit; //pour éviter tout problème
?>
