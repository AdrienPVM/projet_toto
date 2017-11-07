<?php
require __DIR__.'/../inc/config.php';


header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="export-20171106.csv"');

$sql='SELECT stu_lastname, stu_firstname, stu_email, stu_friendliness, stu_birthdate
FROM student
';

$pdoStatement=$pdo->query($sql);
$result=$pdoStatement->fetchAll(PDO::FETCH_ASSOC);

$fp = fopen('export-20171106.csv', 'w');

foreach ($result as $student) {
    fputcsv($fp, $student, ',');
}
fclose($fp);
$downloadPage = file_get_contents(__DIR__.'/../public/export-20171106.csv');
echo $downloadPage;


//header('Location: '.__DIR__.'/../public/export-20171106.csv'.'');

?>