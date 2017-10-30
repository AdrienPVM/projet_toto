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

    ?><section class="hero"><?php
        ?><div class="hero-body"><?php
            ?><table class="table container"><?php
                ?><thead><?php
                    ?><tr><?php
                        ?><th>ID</th><?php
                        ?><th>Last Name</th><?php
                        ?><th>First Name</th><?php
                        ?><th>Birthdate</th><?php
                        ?><th>Age</th><?php
                        ?><th>Email</th><?php
                        ?><th>Friendliness</th><?php
                        ?><th>Date of Insertion</th><?php
                        ?><th>Session</th><?php
                        ?><th>City</th><?php
                        ?><th>Date of Update</th><?php
                    ?></tr><?php
                ?></thead><?php

                ?><tr><?php
                    ?><td><?php echo $studentValue['stu_id']; ?></td><?php
                    ?><td><strong><?php echo $studentValue['stu_lastname']; ?></strong></td><?php
                    ?><td><strong><?php echo $studentValue['stu_firstname']; ?></strong></td><?php
                    ?><td><?php echo $studentValue['stu_birthdate'] ?></td><?php
                    ?><td><?php echo $age; ?></td><?php
                    ?><td><?php echo $studentValue['stu_email']; ?></td><?php
                    ?><td><?php echo $studentValue['stu_friendliness']; ?></td><?php
                    ?><td><?php echo $studentValue['stu_inserted']; ?></td><?php
                    ?><td><?php echo $studentValue['loc_name']; ?></td><?php
                    ?><td><?php echo $studentValue['cit_name']; ?></td><?php
                    ?><td><?php echo $studentValue['stu_updated']; ?></td><?php
                ?></tr><?php
            ?></table><?php
        ?></div><?php
    ?></section><?php

}
 ?>
