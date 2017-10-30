<section class="hero">
    <div class="hero-body">
        <form method="post">
            <section class="container " style="width:500px">
                <div class="field">
                    <label class="label">Last Name</label>
                    <div class="control has-icons-left has-icons-right">
                        <input name="lname" class="input" type="text" placeholder="Smith">
                        <span class="icon is-small is-left">
                            <i class="fa fa-user"></i>
                        </span>
                    </div>

                    <div class="field">
                        <label class="label">First Name</label>
                        <div class="control has-icons-left has-icons-right">
                            <input name="fname" class="input" type="text" placeholder="John">
                            <span class="icon is-small is-left">
                                <i class="fa fa-user"></i>
                            </span>
                        </div>

                        <div class="field">
                            <label class="label">Email</label>
                            <div class="control has-icons-left has-icons-right">
                                <input name="email" class="input" type="email" placeholder="john.smith@gmail.com">
                                <span class="icon is-small is-left">
                                    <i class="fa fa-envelope"></i>
                                </span>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Birth Date</label>
                            <div class="control has-icons-left has-icons-right">
                                <input name="birthdate" class="input" type="text" placeholder="1993-12-01">
                                <span class="icon is-small is-left">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </div>
                        </div>

                        <div class="field">
                            <div class="level">
                                <div class="select level-tem">
                                    <select name="friendliness">
                                        <option>Friendliness</option>
                                        <option value='1'>1</option>
                                        <option value='2'>2</option>
                                        <option value='3'>3</option>
                                        <option value='4'>4</option>
                                        <option value='5'>5</option>
                                    </select>
                                </div>

                                <div class="select level-tem">
                                    <select name="city">
                                        <option>City</option>
                                        <?php
                                        foreach ($resultCity as $index => $citName) {
                                            echo "<option value='".$citName['cit_id']."'>".$citName['cit_name']."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <div class="select level-tem">
                                <select name="session">
                                    <option>Session</option>
                                    <?php
                                    foreach ($resultSession as $key => $value) {
                                        echo"<option value='".$value['ses_id']."'>".$value['tra_name']." from ".$value['ses_start_date']." to ".$value['ses_end_date']."</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                        </div>

                        <div class="field">
                            <div class="file">
                                <label class="file-label">
                                    <input class="file-input" type="file" name="resume">
                                    <span class="file-cta">
                                        <span class="file-icon">
                                            <i class="fa fa-upload"></i>
                                        </span>
                                        <span class="file-label">
                                            Choose a file…
                                        </span>
                                    </span>
                                </label>
                            </div>
                        </div>

                        <div class="field">
                            <div class="control">
                                <button class="button is-link" type="submit" name="submit">Create</button>
                            </div>
                        </div>
                    </section>
                </form>

    </div>

</section>
