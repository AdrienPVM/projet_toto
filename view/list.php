
<table style="width:100%">
    <tr>
        <th>ID</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Birthdate</th>
        <th>Email</th>
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
        </tr>
    <?php endforeach; ?>

</table>
