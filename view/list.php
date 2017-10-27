
<table class="container">
    <tr>
        <th>ID</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Birthdate</th>
        <th>Email</th>
        <th>Details</th>
    </tr>

    <?php foreach ($result as $key => $value) : ?>
        <tr>
        <?php foreach ($value as $trueKey => $trueValue) : ?>
            <?php if ($trueKey=="stu_id") :?>
            <td><?php echo $trueValue; ?></td>
            <?php endif; ?>
            <?php if ($trueKey=="stu_lastname") :?>
            <td><?php echo $trueValue; ?></td>
            <?php endif; ?>

            <?php if ($trueKey=="stu_firstname") :?>
            <td><?php echo $trueValue; ?></td>
            <?php endif; ?>

            <?php if ($trueKey=="stu_email") :?>
            <td><?php echo $trueValue; ?></td>
            <?php endif; ?>

            <?php if ($trueKey=="stu_birthdate") :?>
            <td><?php echo $trueValue; ?>
            <?php endif; ?>

        <?php endforeach; ?>
            <td><a href="student.php?id=<?php echo $value['stu_id']; ?>">Details</a></td>
        </tr>
    <?php endforeach; ?>

</table>
