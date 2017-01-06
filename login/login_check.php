<?php
session_start();
$db_host = "localhost";
$db_name = "webregistration";
$db_user = "iProject";
$db_pass = "12345";

$db_conn = mysqli_connect('localhost', 'iProject', '12345', 'webregistration') or die('Error connecting database - 1 ');

if(isset($_POST['password'])){
  $user_email = trim($_POST['user_email']);
  $user_password = trim($_POST['password']);

  $password = md5($user_password);
  try {
    $sql = 'SELECT * FROM tbl_users where user_email="'.$user_email.'"';
    $retval = mysqli_query($db_conn, $sql);
    if(! $retval){
      die('Could not fetch data from database');
    }
    else {
      $row = mysqli_fetch_array($retval, MYSQLI_ASSOC);
        if($row['user_password'] == $password){
          echo "ok";
          $_SESSION['user_session'] = $row['user_id'];
        }
        else{
          echo "email or password incorrect.";
          echo $row['user_password']."\n";
          echo $password;
        }
      }

 } catch (Exception $e) {
    echo $e->getMessage();
  }

}
 ?>
