<?php
$db_host = "localhost";
$db_name = "webregistration";
$db_user = "iProject";
$db_pass = "12345";

$db = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die("Error Connect");
?>
<!doctype html>
<html>
<head>
  <meta charset=utf-8>
  <title>TestPage For Database</title>
</head>
<body>
  <h1>PHP Connecting to MySQL</h1>
<?php

  $user_email = "ashrey@gmail.com";
  $user_name = "Apurva";
  $user_dob = date_create("1991-08-01");
  $date = date_format($user_dob, "Y-m-d");
  //echo $date;
  $user_password = md5('Ashrey931');

  $check_email = "SELECT user_id from tbl_users where user_email=asd";

  $sql = "INSERT into tbl_users (user_name, user_email, user_password, user_dob, joining_date) VALUES ('".$user_name ."','". $user_email ."','" . $user_password ."','" . $date ."', now())";

  //echo $sql;

  $result = mysqli_query($db, $check_email);// or die('Error Conecting to Database in Inserting data'. mysqli_error($db));
  echo "Result = ".$result;
  if($result == NULL){
    echo "User already registered";
  }
/*
  $query = "SELECT * FROM tbl_users";
  $result = mysqli_query($db, $query) or die('Error Conecting to Database - In fetching Data'. mysqli_error($db));
      while($row = mysqli_fetch_array($result)) {
    echo "User Id : ". $row['user_id']."\nUser Name : ".$row['user_name']."\n email : ".$row['user_email']."\nJoining Date : ".$row['joining_date'];
  }
  echo ($row);
*/
  mysqli_close($db);
  //phpinfo();
?>
</body>
</html>
