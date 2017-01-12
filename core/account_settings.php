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
<title>Account Settings</title>
<?php include('../inc/scripts.inc.php') ?>

</head>
<!-- The navbar is here -->
<?php include('../inc/navbar.inc.php') ?>
<!--Till Here ;) -->
<body>
    <div id="userBody">

    <div class="container-fluid text-center">
      <div class="row-content">
        <div class="col-sm-2 sideBar" >
            <div class="row row-centered">
                <div class="img-circle userPic" style="background-image:url('<?php echo $row['user_pic']?>');">
                 <div class="a_transbox bottom-align-text">
                   <a href="upload.html" id="a_upload"><span class="glyphicon glyphicon-camera"></span> Upload Photo</a>
               </div>
               </div>
                <h2>
                  <?php echo $row['user_name']; ?>
                </h2>
                <p>
                  <?php echo $row['user_about']; ?>
                </p>
                <hr style="border-color:black;"/>
                <div class="text-left">
                    <p>
                      <strong>Contact   :</strong> <i><?php echo $row['user_email']; ?></i>
                    </p>
                    <p>
                      <strong>Joined On :</strong> <?php echo date_format(date_create($row['joining_date']), "d/m/Y"); ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-sm-8 text-left">
          <div class="mainBody">
                <div class="row row-centered">
                    <div class="col-sm-12 text-center"><h1 id="headingInside">Account Settings</h1></div>
                </div>
            <div class="row row-centered">
                <div class="col-sm-6">
                    <div class="form-group"><label for="f_name">First Name :</label><input type="text" class="form-control" id="f_name" name="f_name" value='<?php echo $row['user_name'] ?>'></div>
                    <div class="form-group"><label for="l_name">Last Name :</label><input type="text" class="form-control" id="l_name" name="l_name" value='<?php echo $row["user_name"] ?>'></div>
                    <div class="form-group"><label for="a_me">About Me :</label><textarea class="form-control" rows="5" id="a_me" name="a_me"><?php echo $row['user_about'] ?></textarea></div>
                    <button type="submit" class="btn btn-primary" name="btn-update">Update Details</button>
                </div>
                <div class="col-sm-6">
                        <div class="form-group"><label for="c_password">Current Password :</label><input type="text" class="form-control" id="c_password" name="c_password"></div>
                        <div class="form-group"><label for="n_password">New Password :</label><input type="text" class="form-control" id="n_password" name="n_password"></div>
                        <div class="form-group"><label for="r_password">Retype Password :</label><input type="text" class="form-control" id="r_password" name="r_password"></div>
                        <button type="submit" class="btn btn-primary" name="btn-update-pass">Change Password</button>
            </div>
            </div>
          </div>
        </div>
        <div class="col-sm-2 sideBar">
          <div class="well">
            <p>Chat Box Here</p>
          </div>
          <div class="well">
            <p>Chat Box Here</p>
          </div>
        </div>
      </div>
    </div>
    </div>
    <?php include('../inc/footer.inc.php')?>
</body>

</html>