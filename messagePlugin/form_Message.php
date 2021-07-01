<form method="post" action="">
<div class="form-group">
<label for="fname">First Name</label><br>
<input type="text" class="form-control" id="fname" name="firstname" placeholder="Your name.."><br>
</div>
<div class="form-group">
<label for="lname">Last Name</label><br>
<input type="text" class="form-control"  id="lname" name="lastname" placeholder="Your last name.."><br>
</div>
<div class="form-group">
<label for="subject">subject</label><br>
<input type="text" class="form-control"  id="subject" name="subject" placeholder="Your last name.."><br>
</div>
<div class="form-group">
<label for="email">Email</label><br>';  
 <input type="email" class="form-control"  id="email" name="email" placeholder="Your last name.."><br>
</div> 
<div class="form-group">
 <label for="Message">Message</label><br>';  
<input type="text" class="form-control"  id="Message" name="Message" placeholder="Your last name.."><br>
</div>  
<input type="submit" name="MFsub" value="Submit"><br>
</form>

<?php

function insert_message_form_infos($atts){
    global $wpdb;
    $table_name=$wpdb->prefix ."table_form";
    if(isset($_POST['MFsub'])){
        $fstname=$_POST['firstname'];
        $lastname=$_POST['lastname'];
        $subject=$_POST['subject'];
        $mail=$_POST['email'];
        $message=$_POST['Message'];
        $wpdb->insert($table_name,
        array(
            "fstname"=>$fstname,
            "lstname"=>$lastname,
            "subject"=>$subject,
            "message"=>$message,
            "email"=>$mail
        ),
        array(
            '%s',
            '%s',
            '%s',
            '%s',
            '%s'
        )
    );

    }

}

?>