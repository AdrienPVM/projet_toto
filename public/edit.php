<pre>

    <?php
    require __DIR__.'/../inc/config.php';

    if (isset($_POST['delete'])) {
        # code...
    }
    $sqlDelete='DELETE *
    FROM student
    WHERE stu_id = :deleteID
    ';
    $pdoDelete=$pdo->prepare($sqlDelete);
    $pdoDelete->bindValue(':deleteID', $_POST['id'], PDO::PARAM_INT);
    $pdoDelete->execute();

    if ($pdoDelete===false) {
        print_r($pdoDelete->errorInfo(), true);
    }

    header('Location: http://projet-toto.dev/list.php');
    ?>
</pre>
