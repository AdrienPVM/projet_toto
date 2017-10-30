

<section class="hero">
    <div class="hero-body">

        <table class="container table is-hoverable is-fullwidth is-striped" style="width:80%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Birthdate</th>
                    <th>Email</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

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
                        <td><a class="tag is-primary" href="student.php?id=<?php echo $value['stu_id']; ?>">Details</a></td>
                        <td>
                            <form action="edit.php" method="post">
                            <input type="submit" name="delete" value="DELETE">
                            <input type="hidden" name="id" value="<?php echo $value['stu_id']; ?>">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </table>
            <div class="container" style="width:10%">
                <nav class="pagination is-small is-centered" role="navigation" aria-label="pagination">
                    <a class="pagination-previous" href="list.php?page=<?php echo $page-1; ?>">Previous</a>
                    <a class="pagination-next" href="list.php?page=<?php echo $page+1; ?>">Next page</a>
                </nav>

            </div>

    </div>

</section>
