<?php
//Search Bar
session_start();
if(!isset($_SESSION['user_session']))
{
 header("Location: ../login/login.php");
}

require_once '../inc/dbconfig.inc.php';
  if(isset($_POST['q'])){
    $username = urldecode($_POST['q']);
    //With help from http://stackoverflow.com/questions/2936862/ctype-alpha-but-allow-spacesphp

    if((ctype_alnum(str_replace(array(' ',"'",'-'), '', $username)))){
      $stmt = $db_conn->prepare("SELECT user_id,user_name,joining_date,user_email,user_pic,user_gender,user_about from tbl_users where user_name LIKE :uid");
      $stmt->execute(array(":uid"=>"%".$username."%"));

      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      //if(count($result) > 0){
        foreach ($result as $row) {
          $data = array('Username' => $row['user_name'], 'JoinedOn' => $row['joining_date'], 'UserMail' => $row['user_email'], 'UserPic' => $row['user_pic'],'id' => $row['user_id'],'UserGender' => $row['user_gender'],'About' => $row['user_about']);
          @$rows[] = @$data;  // '@' just in case there is no data
        }
        $stmt = $db_conn->prepare("SELECT to_f,status from requests where uid=?");

        if($stmt->execute(array($_SESSION['user_session']))){
          $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
          $length = $stmt->rowCount();
          $i = 1;
          foreach ($result as $row) {
            $data = array("f_id" => $row['to_f'],"status"=>$row['status']);
            $i++;
            $friends[] = @$data;
          }
          // for ($i = 0; $i < $length; $i++) {
          //   @$rows[] = @$result[$i];
          // }
        }
        //if(count($result) > 0){

          echo json_encode(array(@$rows,@$friends));
          //echo json_encode(@$friends);
        //}
      //}
      //else {
        //echo "<h1>No User as such</h1>";
      //}
    }
  }
 ?>
