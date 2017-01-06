<?php
//Search Bar
require_once '../inc/dbconfig.inc.php';
  if(isset($_POST['q'])){
    $username = $_POST['q'];
    echo "Working";
    if(ctype_alnum($username)){
      $result = $db_conn->query("SELECT user_name,joining_date,user_email from tbl_users    where user_name='$username'");
      if(mysql_num_rows($result) > 0){
        echo json_encode($result);
        }
        else{
          echo "<h1>No User as such</h1>";
        }
      }
    }
 ?>
