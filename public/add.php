<?php

require __DIR__.'/../inc/config.php';

$lname='';
$fname='';
$email='';
$birthdate='';
$friendliness='';
$session='';
$city='';

if (!empty($_POST)) {
    $lname=isset($_POST['lname'])? $_POST['lname']:'';
    $fname=isset($_POST['fname'])? $_POST['fname']:'';
    $email=isset($_POST['email'])? $_POST['email']:'';
    $birthdate=isset($_POST['birthdate'])? $_POST['birthdate']:'';
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

// Si aucune erreur
	if ($formOk) {
		echo '$lname='.$lname.'<br>';
		echo '$fname='.$fname.'<br>';
		echo '$email='.$email.'<br>';
// Je n'affiche pas le formulaire
		$displayForm = false;
	}

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

    //A TERMINER //TODO
    $exec=$pdoStatement->execute();

    if ($exec===false) {
        print_r($pdoStatement->errorInfo(), true);
    }
}


//A la fin, j'affiche
require_once __DIR__.'/../view/header.php';
require_once __DIR__.'/../view/add.php';
require_once __DIR__.'/../view/footer.php';
