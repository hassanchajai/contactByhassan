<?php
global $wpdb;
$table_name=$wpdb->prefix.'table_form';
$db_results=$wpdb->get_results("select * from $table_name");
global $wp;
$urlc= add_query_arg( $wp->query_vars, home_url() );;
if(isset($_GET['delid'])){
 $wpdb->delete( $table_name, array( 'id' => $_GET['delid'] ) );
   $urlp= admin_url('admin.php?page=custom_plugin');
   wp_redirect($urlp);
    // header('location:'.$urlp);
}
?>

<div>
<table>
<tr>
<th>first name</th>
<th>last name</th>
<th>email</th>
<th>subject</th>
<th>message</th>
<th>action</th>
</tr>
<?php foreach($db_results as $row){ ?>
<tr>
<td><?php echo $row->fstname ?></td>
<td><?php echo $row->lstname ?></td>
<td><?php echo $row->email ?></td>
<td><?php echo $row->subject ?></td>
<td><?php echo $row->message ?></td>
<td> <a href="<?php echo $urlc.'&delid='.$row->id  ?>" > delete</a>  <a href="<?php echo $urlc.'&repid='.$row->id  ?>">repondre</a></td>
</tr>
<?php } ?>
</table>


</div>