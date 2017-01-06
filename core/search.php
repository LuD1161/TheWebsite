//Search Bar
include_once '../inc/dbconfig.inc.php';
<?php
  if(isset($_GET['u'])){
    $username = mysql_real_escape_string($_GET['u']);
    if(ctype_alnum($username)){
      $result = $db_conn->query("SELECT user_name,joining_date,user_email from tbl_users    where user_name='$username'");
      if(mysql_num_rows($result) > 0){
        echo json_encode($result);
        }

      }
    }
  }
 ?>
