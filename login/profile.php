<?php
include ('../inc/dbconfig.inc.php');

if(isset($_GET["u"])){
  $username = trim($_GET['u']);
  if(ctype_alnum($username)){
    $result = $db_conn->prepare("SELECT user_name, user_dob, user_country, user_gender,joining_date,user_pic,user_email,user_about from tbl_users where user_name LIKE :uname");
    $result->execute(array(":uname"=>"%".$username."%"));
    $row = $result->fetch(PDO::FETCH_ASSOC);

    foreach ($result as $row) {
      $data = array('Username' => $row['user_name'], 'JoinedOn' => $row['joining_date'], 'UserMail' => $row['user_email'], 'UserPic' => $row['user_pic'],'UserGender' => $row['user_gender'],'UserDoB' => $row['user_dob'],'UserCountry' => $row['user_country'],'About' => $row['user_about']);
      @$rows[] = @$data;
    }
      //echo json_encode(@$rows);
  }
}
?>

<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Member's Arena</title>
<?php include('../inc/scripts.inc.php'); ?>

</head>
<!-- The navbar is here -->
<?php include('../inc/navbar.inc.php'); ?>
<!--Till Here ;) -->
<body>
  <?php include('../inc/body.inc.php')?>
</body>
