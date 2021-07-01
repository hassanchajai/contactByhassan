<?php
/*----------------------------------*/
/*create data base table for plugin*/ 
/*----------------------------------*/

function DBP_tb_create()
{
  global $wpdb;
  //step1:table name
  $DBP_tb_name=$wpdb->prefix ."table_form";

  // step2:query
  $DBP_query= "CREATE TABLE $DBP_tb_name (
      id int(10) NOT NULL AUTO_INCREMENT,
      fstname varchar(100)	,
      lstname varchar(100)	,
      subject varchar(100)	,
      message varchar(300)	,
      email varchar(100)	,
      PRIMARY KEY (id)

  ) ";

  //step3: include  wordpress file upgrade.php && call function dbDelta
   require_once(ABSPATH."wp-admin/includes/upgrade.php");
   dbDelta($DBP_query);
   //register table function use regidter_activation_hook to create table on plugin activation

}

?>