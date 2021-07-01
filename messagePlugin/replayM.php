<?php
global $wpdb;
$table_name=$wpdb->prefix.'table_form';
$urlp= admin_url('admin.php?page=custom_plugin');
if(isset($_GET['repid'])){
    $id=$_GET['repid'];
    $db_results=$wpdb->get_results("select email from $table_name where id=$id");
//    $urlp= admin_url('admin.php?page=custom_plugin');
//    wp_redirect($urlp);
}
if(isset($_POST['sub'])){
    $urlp= admin_url('admin.php?page=custom_plugin');
   wp_redirect($urlp);
}
function sub()
{
    $urlp= admin_url('admin.php?page=custom_plugin');
    wp_redirect($urlp);
}

?>
<form action="mailto:<?php echo $db_results[0]->email ?>" method="post" encytype="text/plain" >
<div class="form-group">
<label for="mail"> email</label>
<input type="text" class="form-control" id="mail"  value="<?php echo $db_results[0]->email ?>" >
</div>
<div class="form-group">
<label for="res"> response</label>
<textarea class="form-control" name="response" id="res" cols="30" rows="10"></textarea>
</div>
<input type="submit" class="btn btn-primary" value="send" >
<a href="<?php echo $urlp ?>"  class="btn btn-primary ">go back</a>
</form>

