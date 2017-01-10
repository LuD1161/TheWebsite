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

if(isset($_GET["u"])){
  $username = trim($_GET['u']);
  if(ctype_alnum($username)){
    $result = $db_conn->prepare("SELECT user_name, user_dob, user_country, user_gender,joining_date,user_pic,user_email where user_id=:uid");
    $result->execute(array(":uid"=>$username));
    $row = $result->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $row) {
      $data = array('Username' => $row['user_name'], 'JoinedOn' => $row['joining_date'], 'UserMail' => $row['user_email'], 'UserPic' => $row['user_pic'],'UserGender' => $row['user_gender'],'UserDoB' => $row['user_dob'],'UserCountry' => $row['user_country'] );
      @$rows[] = @$data;
    }
      echo json_encode(@$rows);
  }
}

 ?>
