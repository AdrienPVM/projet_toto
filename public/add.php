<?php

require __DIR__.'/../inc/config.php';

$lname='';
$fname='';
$email='';
$birthdate='';
$friendliness='';
$session='';
$city='';

//Get city names from database
$sqlCityName='SELECT cit_name, cit_id
FROM city
ORDER BY cit_name ASC
';
$pdoStatement=$pdo->query($sqlCityName);
$resultCity=$pdoStatement->fetchAll(PDO::FETCH_ASSOC);

//Get session names/id/dates from database
$sqlSessionName='SELECT ses_id, ses_start_date, ses_end_date, tra_name
FROM session
INNER JOIN training ON training_tra_id=tra_id
ORDER BY ses_id DESC
';
$pdoStatement=$pdo->query($sqlSessionName);
$resultSession=$pdoStatement->fetchAll(PDO::FETCH_ASSOC);


if (!empty($_POST)) {
    $lname=isset($_POST['lname'])? $_POST['lname']:'';
    $fname=isset($_POST['fname'])? $_POST['fname']:'';
    $email=isset($_POST['email'])? $_POST['email']:'';
    $birthdate=isset($_POST['birthdate'])? $_POST['birthdate']:'';
    $city=isset($_POST['city'])? $_POST['city']:'';
    $friendliness=isset($_POST['friendliness'])? $_POST['friendliness']:'';
    $session=isset($_POST['session'])? $_POST['session']:'';
// Traiter les données
    $lname = strtoupper(trim(strip_tags($lname))); // retire les espaces au debut et à la fin
    $fname = ucfirst(trim(strip_tags($fname)));
    $email = trim(strip_tags($email));

// Validation des données
	$formOk = true;
	if (empty($lname)) {
		echo 'Nom vide<br>';
		$formOk = false;
	}
	else if (strlen($lname) < 2) {
		echo 'Nom incorrect<br>';
		$formOk = false;
	}

	if (empty($fname)) {
		echo 'Prénom vide<br>';
		$formOk = false;
	}
	else if (strlen($fname) < 2) {
		echo 'Prénom incorrect<br>';
		$formOk = false;
	}

	if (empty($email)) {
		echo 'Email vide<br>';
		$formOk = false;
	}
// Je valide l'email
	else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
		echo 'Email incorrect<br>';
		$formOk = false;
	}

    function validateDate($date){
    $d = DateTime::createFromFormat('Y-m-d', $date);
    return $d && $d->format('Y-m-d') === $date;
    }
    if (empty($birthdate)) {
        echo 'Date de Naissance vide<br>';
        $formOk = false;
    }
    else if (!validateDate($birthdate)) {
		echo 'Date de Naissance incorrecte<br>';
		$formOk = false;
	}
    if (empty($city)||$city<1) {
        echo 'City vide<br>';
        $formOk = false;
    }
    if (empty($session)||$session<1) {
        echo 'Session vide<br>';
        $formOk = false;
    }
    if (empty($friendliness)||$friendliness<1) {
        echo 'Friendliness vide<br>';
    }


// Si aucune erreur
	if ($formOk) {
		echo '$lname='.$lname.'<br>';
		echo '$fname='.$fname.'<br>';
		echo '$email='.$email.'<br>';
        echo '$birthdate='.$birthdate.'<br>';
        echo '$friendliness='.$friendliness.'<br>';
        echo '$city='.$city.'<br>';
        echo '$session='.$session.'<br>';


        $newLname=$_POST['lname'];
        $newFname=$_POST['fname'];
        $newEmail=$_POST['email'];
        $newBirthdate=$_POST['birthdate'];
        $newFriendliness=$_POST['friendliness'];
        $newSession=$_POST['session'];
        $newCity=$_POST['city'];

        $sql='INSERT INTO student (stu_lastname, stu_firstname, stu_email, stu_birthdate, stu_friendliness, session_ses_id, city_cit_id)
        VALUES (:lastname, :firstname, :email, :birthdate, :friendliness, :session, :city)
        ';

        $pdoStatement=$pdo->prepare($sql);
        $pdoStatement->bindValue(':lastname', $newLname, PDO::PARAM_STR);
        $pdoStatement->bindValue(':firstname', $newFname, PDO::PARAM_STR);
        $pdoStatement->bindValue(':email', $newEmail, PDO::PARAM_STR);
        $pdoStatement->bindValue(':birthdate', $newBirthdate, PDO::PARAM_STR);
        $pdoStatement->bindValue(':friendliness', $newFriendliness, PDO::PARAM_INT);
        $pdoStatement->bindValue(':session', $newSession, PDO::PARAM_INT);
        $pdoStatement->bindValue(':city', $newCity, PDO::PARAM_INT);

        $exec=$pdoStatement->execute();
        echo "envoyé";

        $lastID=$pdo->lastInsertId();
        echo $lastID;

        header('Location: http://projet-toto.dev/student.php?id='.$lastID.'');

        if ($exec===false) {
            print_r($pdoStatement->errorInfo(), true);
        }
// Je n'affiche pas le formulaire
		$displayForm = false;
	}
}


//A la fin, j'affiche
require_once __DIR__.'/../view/header.php';
require_once __DIR__.'/../view/add.php';
require_once __DIR__.'/../view/footer.php';

?>
