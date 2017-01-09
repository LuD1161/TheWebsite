<?php
session_start();

if(!isset($_SESSION['user_session']))
{
 header("Location: ../login/login.php");
}

include_once '../inc/dbconfig.inc.php';

$stmt = $db_conn->prepare("SELECT * FROM tbl_users WHERE user_id=:uid");
$stmt->execute(array(":uid"=>$_SESSION['user_session']));
$row=$stmt->fetch(PDO::FETCH_ASSOC);

setcookie('user_id', $row['user_id'], time()+60, "/", "", 0);
?>
<!doctype html>
<html>
<head>
  <meta charset=utf-8>
  <link rel="stylesheet" href="master.css">
  <title>My Canvas</title>
</head>
<body style="margin: 0px">
<div>
  <div id="toolbar">
    <div id="rad">Radius <span id="radval">10</span>
      <div id="decrad" class="radcontrol">-</div>
      <div id="incrad" class="radcontrol">+</div>
    </div>
    <div id="colors">
      <div id="white" class="swatch" style="background-color: white"></div>
    </div>
    <div id="save">Save</div>
  </div>
  <canvas id="can" style="display:block;">
    Sorry ! Your Browser doesn't support Canvas !
    <script src="main.js"></script>
    <script src="radius.js"></script>
    <script src="colors.js"></script>
    <script src="save.js"></script>
  </canvas>
</div>
</body>
</html>

<?php
  $data = $_POST['img'];
  $data = str_replace('data:image/png;base64,','',$data);
  $data = str_replace(' ','+',$data);

  $img = base64_decode($data);

  $path = 'images/'.uniqid().'.png';
  if(file_put_contents($path,$img)){
    print $path;
  }else{
    header();
  }
 ?>
