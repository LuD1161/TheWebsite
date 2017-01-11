<?php
session_start();

if(!isset($_SESSION['user_session']))
{
 header("Location: login.php");
}

include_once '../inc/dbconfig.inc.php';

$stmt = $db_conn->prepare("SELECT * FROM tbl_users WHERE user_id=:uid");
$stmt->execute(array(":uid"=>$_SESSION['user_session']));
$row=$stmt->fetch(PDO::FETCH_ASSOC);

setcookie('user_id', $row['user_id'], time()+60, "/", "", 0);
?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Member's Arena</title>
<?php include('../inc/scripts.inc.php') ?>

</head>
<!-- The navbar is here -->
<?php include('../inc/navbar.inc.php') ?>
<!--Till Here ;) -->
<body>
<div id="user-alert" class='alert alert-success' style="margin-left:100px;margin-right:100px;text-align:center;">
  <button class='close' data-dismiss='alert'>&times;</button>
   <strong>Hello  <?php echo $row['user_name']; ?></strong>
    <p><br />
      Welcome to the members page.
    </p>
</div>
<?php include('../inc/body.inc.php')?>
</body>

</html>
