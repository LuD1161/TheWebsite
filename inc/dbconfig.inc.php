<?php
$db_host = 'localhost';
$db_name = 'webregistration';
$db_user = 'iProject';
$db_pass = '12345';

try{

  $db_conn = new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_pass);
  $db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 }
 catch(PDOException $e){
  echo $e->getMessage();
 }


 ?>
