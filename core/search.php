<?php
//Search Bar
require_once '../inc/dbconfig.inc.php';
  if(isset($_POST['q'])){
    $username = $_POST['q'];
    if(ctype_alnum($username)){
      $result = $db_conn->query("SELECT user_name,joining_date,user_email from tbl_users where user_name='$username'");
      if(count($result) > 0){
        foreach ($result as $row) {
          $data = array('Username' => $row['user_name'], 'Joined On' => $row['joining_date'], 'User Mail' => $row['user_email'] );
          $rows[] = $data;
        }
        if(count($result) > 0){
          echo json_encode($rows);
        }
      }
      else {
        echo "<h1>No User as such</h1>";
      }
    }
  }
 ?>
