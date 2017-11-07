<section class='hero is-primary' style='margin:7rem 30rem'>
    <div class="hero-body">
        <form action="" method='post'enctype="multipart/form-data">
            <div class="field">
                <label class="label" style='text-align:center'>Uploader</label>
                <div class="control">
                    <div class="file is-centered">
                        <label class="file-label">
                            <input type="hidden" name="submitFile" value="1" />
                            <input id ='fileForm' class="file-input" type="file" name="fileForm">
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
                    <p class="help-block" style='text-align:center;font-size:0.8rem'>
                        CSV Only
                    </p>
                </div>
                <div class="field" style="text-align:center">
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
                <div class="control" style='text-align:center;margin-top:1rem'>
                    <input type="submit" class='button is-info' value='Envoyer'>
                </div>      
            </div>
        </form>

        <div class="field">
            <div class="control" style="text-align:right;margin-top:2rem">
                <a type="button" class="button" href="download.php">Download CSV of all Students</a>
            </div>
            
        </div>   
    </div>
</section>