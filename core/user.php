<?php
session_start();
include_once '../inc/dbconfig.inc.php';

$stmt = $db_conn->prepare("SELECT * FROM tbl_users WHERE user_id=:uid");
$stmt->execute(array(":uid"=>$_SESSION['user_session']));
$row=$stmt->fetch(PDO::FETCH_ASSOC);


if(isset($_GET["profile_id"])){
  $user_id = trim($_GET["profile_id"]);
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
