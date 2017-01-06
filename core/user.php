<?php
session_start();
include_once '../inc/dbconfig.inc.php';

$stmt = $db_con->prepare("SELECT * FROM tbl_users WHERE user_id=:uid");
$stmt->execute(array(":uid"=>$_SESSION['user_session']));
$row=$stmt->fetch(PDO::FETCH_ASSOC);

// $db_conn = mysqli_connect('localhost', 'iProject', '12345', 'webregistration') or die('Error connecting to database - registration ');


if(isset($_GET["profile_id"])){
  $user_id = trim($_GET["profile_id"]);
  // $query = "SELECT * FROM tbl_users where user_id=". $user_id;
  // $result = mysqli_query($db_conn, $query) or die('Error Conecting to Database - In fetching Data'. mysqli_error($db_conn));
//  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

  if($row['user_id'] == $user_id){
    echo $row['user_pic'];
  }else {
    echo "Not ".$user_id;
  }
}
else {
  echo "not".$_COOKIE["user_id"];
}
 ?>
