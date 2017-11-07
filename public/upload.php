<?php

require __DIR__.'/../inc/config.php';

/*if (!empty($_POST)) {
    print_r($_POST);
    print_r($_FILES);
}*/
//Get session names/id/dates from database
$sqlSessionName='SELECT ses_id, ses_start_date, ses_end_date, tra_name
FROM session
INNER JOIN training ON training_tra_id=tra_id
ORDER BY ses_id DESC
';
$pdoStatement=$pdo->query($sqlSessionName);
$resultSession=$pdoStatement->fetchAll(PDO::FETCH_ASSOC);


if (!empty($_FILES)) {
    $fileForm=isset($_FILES['fileForm']) ? $_FILES['fileForm']:array();

    $formOk=true;
    $allowedExtensions=['csv'];

    if ($fileForm['type'] != 'application/octet-stream') {
        echo "<br>Fichier incorrect";
        $formOk=false;
    }
    if ($fileForm['size']>100000) {
        echo "<br>Fichier trop lourd";
        $formOk=false;
    }
    
    $dotPos=strrpos($fileForm['name'], '.');
    $extension=substr($fileForm['name'], $dotPos+1);

    if (!in_array($extension, $allowedExtensions)) {
        echo "<br>Extension not OK";
        $formOk=false;
    }

    if ($formOk) {
        $newFileName= md5(uniqid()."projet-toto".$fileForm['name'].$fileForm['size']).'.'.$extension;

?><pre><?php
        if (move_uploaded_file($fileForm['tmp_name'], __DIR__.'/../csv/'.$newFileName)) {
            echo "uploaded!<br>";
            $openFile=fopen(__DIR__.'/../csv/'.$newFileName,"r");


            while (! feof($openFile)) {
                $getLine=fgets($openFile);
                $table[]=explode(";", $getLine);
                //$explodedLine=explode(";", $openFile);
                //list($table['lastName'], $table['firstName'],$table['email'], $table['friendliness'], $table['birthdate']) = explode(";", $explodedLine);

                //explode(", ", $openFile);
            }

            $sql='INSERT INTO student (stu_lastname, stu_firstname, stu_email, stu_friendliness, stu_birthdate, session_ses_id, city_cit_id)
            VALUES (:lastname, :firstname, :email, :friendliness, :birthdate, :sess, :city)
            ';
            foreach ($table as $newUserLine) {
                $pdoStatement=$pdo->prepare($sql);
                if ($pdoStatement===false) {
                    print_r ($pdo->errorInfo());
                    exit;
                }
                $pdoStatement->bindValue(':lastname', $newUserLine[0], PDO::PARAM_STR);
                $pdoStatement->bindValue(':firstname', $newUserLine[1], PDO::PARAM_STR);
                $pdoStatement->bindValue(':email', $newUserLine[2], PDO::PARAM_STR);
                $pdoStatement->bindValue(':friendliness', $newUserLine[3], PDO::PARAM_INT);
                $pdoStatement->bindValue(':birthdate', $newUserLine[4], PDO::PARAM_STR);
                $pdoStatement->bindValue(':sess', 1, PDO::PARAM_INT);
                $pdoStatement->bindValue(':city', 4, PDO::PARAM_INT);
                $pdoStatement->execute();

                echo "$newUserLine[1] $newUserLine[0] envoyé <br>";
            }

            fclose($openFile);
        }

        else {
            echo "<br>upload ERROR";
        }
    }
?></pre><?php

}









//A la fin, j'affiche
require_once __DIR__.'/../view/header.php';

require_once __DIR__.'/../view/upload.php';


require_once __DIR__.'/../view/footer.php';
