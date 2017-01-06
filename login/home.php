<?php
session_start();

if(!isset($_SESSION['user_session']))
{
 header("Location: login.php");
}

include_once '../inc/dbconfig.inc.php';

$stmt = $db_con->prepare("SELECT * FROM tbl_users WHERE user_id=:uid");
$stmt->execute(array(":uid"=>$_SESSION['user_session']));
$row=$stmt->fetch(PDO::FETCH_ASSOC);

setcookie('user_id', $row['user_id'], time()+60, "/", "", 0);
?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Member's Arena</title>
<script src="../js/jquery.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<link href="home.css" rel="stylesheet" media="screen" />
<script src="../js/memberArena.js"></script>
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen" />
<link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen" />

</head>
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div id="nav" class="container" style="margin-left:0px;">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span onclick="openNav()" class="sr-only">Toggle navigation</span>
                    <span onclick="openNav()" class="icon-bar"></span>
                    <span onclick="openNav()" class="icon-bar"></span>
                    <span onclick="openNav()" class="icon-bar"></span>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul id="nav" class="nav navbar-nav">
                  <li>
                      <a href="#"><span onclick="openNav()">&#9776; <?php echo $row['user_name']; ?></span></a>
                  </li>
                  <li>
                      <a href="../canvas/index.php" target="_blank">Canvas</a>
                  </li>
                    <li>
                        <a href="#" target="_blank">Developers</a>
                    </li>
                    <li>
                        <a href="#" target="_blank">Navigation</a>
                    </li>
                </ul>
                <div class="col-sm-3 col-md-3">
                  <form action="search.php" class="navbar-form" role="search" method="POST">
                    <div class="input-group search">
                        <input type="text" class="form-control" placeholder="Find Contacts" name="q" id="search_box">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                        </div>
                    </div>
                  </form>
              </div>
            </div>
            <!-- /.navbar-collapse -->
        </div>
<body>
        <div id="wrapper">
            <!-- Sidebar -->
            <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onmouseover="closeNav()"> &times;</a>
                <div class="img-circle" id="userPic" >
                  <div class="transbox">
                    <a href="upload.html" id="upload"><span class="glyphicon glyphicon-camera"></span> Upload Photo</a>
                  </div>
                </div>
                <a href="#"><span class="glyphicon glyphicon-user" style="color:blue"></span> Profile</a>
                <a href="#"><span class="glyphicon glyphicon-heart" style="color:red"></span> Favourites</a>
                <a href="logout.php"><span class="glyphicon glyphicon-off" style="color:orange"></span> Logout</a>
            </div>

        </div>
        <!-- /.container -->
    </nav>

<div id="user-alert" class='alert alert-success' style="margin-left:100px;margin-right:100px;text-align:center;">
  <button class='close' data-dismiss='alert'>&times;</button>
   <strong>Hello  <?php echo $row['user_name']; ?></strong>
    <p><br />
      Welcome to the members page.
    </p>
</div>
<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("nav").style.marginLeft = "250px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("nav").style.marginLeft = "0";
    document.body.style.backgroundColor = "white";
}
$("#user-alert").fadeTo(2000, 500).slideUp(500, function(){
    $("#user-alert").slideUp(500);
});
</script>
</body>
</html>
