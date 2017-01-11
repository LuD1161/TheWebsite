<?php
//Search Bar
require_once '../inc/dbconfig.inc.php';
  if(isset($_POST['q'])){
    $username = urldecode($_POST['q']);
    //With help from http://stackoverflow.com/questions/2936862/ctype-alpha-but-allow-spacesphp

    if((ctype_alnum(str_replace(array(' ',"'",'-'), '', $username)))){
      $stmt = $db_conn->prepare("SELECT user_name,joining_date,user_email,user_pic,user_gender,user_about from tbl_users where user_name LIKE :uid");
      $stmt->execute(array(":uid"=>"%".$username."%"));

      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      //if(count($result) > 0){
        foreach ($result as $row) {
          $data = array('Username' => $row['user_name'], 'JoinedOn' => $row['joining_date'], 'UserMail' => $row['user_email'], 'UserPic' => $row['user_pic'],'UserGender' => $row['user_gender'],'About' => $row['user_about']  );
          @$rows[] = @$data;  // '@' just in case there is no data
        }
        //if(count($result) > 0){
          echo json_encode(@$rows);
        //}
      //}
      //else {
        //echo "<h1>No User as such</h1>";
      //}
    }
  }
 ?>
