<pre>


<?php


$sqlStudent='SELECT *
FROM student
INNER JOIN city ON city_cit_id=cit_id
INNER JOIN session ON session_ses_id=ses_id
INNER JOIN location ON location_loc_id=loc_id
WHERE stu_id = :studentLink
';
$pdoStatement=$pdo->prepare($sqlStudent);
$pdoStatement->bindValue(':studentLink', $_GET['id'], PDO::PARAM_INT);
$resultStudent=$pdoStatement->execute();
$resultStudent=$pdoStatement->fetchAll(PDO::FETCH_ASSOC);

//print_r($resultStudent);
/////////////////////////////////////////////////////////////////////////
foreach ($resultStudent as $index => $studentValue) {
    $age= date("Y") - date("Y", strtotime($studentValue['stu_birthdate']));

    echo "ID => $studentValue[stu_id]<br />";
    echo "Lastname => $studentValue[stu_lastname]<br />";
    echo "Firstname => $studentValue[stu_firstname]<br />";
    echo "Birthdate => $studentValue[stu_birthdate]<br />";
    echo "Age => $age ans<br />"; //25
    echo "Email => $studentValue[stu_email]<br />";
    echo "Friendliness => $studentValue[stu_friendliness]<br />";
    echo "Date of Insertion => $studentValue[stu_inserted]<br />";
    echo "Session => $studentValue[loc_name]<br />";
    echo "City => $studentValue[cit_name]<br />";
    echo "Date of Update => $studentValue[stu_updated]<br />";
}
 ?>
</pre>
