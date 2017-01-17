<?php
session_start();
if(!isset($_SESSION['user_session']))
{
 header("Location: ../login/login.php");
}

include_once '../inc/dbconfig.inc.php';

$stmt = $db_conn->prepare("INSERT INTO requests (to_f,from_f,uid,date_sent) VALUES (:to_f,:from_f,:uid,:date_sent)");

if(isset($_POST['friend_1'])){
  $to_f = $_POST['friend_1'];
  $from_f = $_SESSION['user_session'];
  $date = new DateTime("now");
  $date_sent = $date->format('Y-m-d H:i:s');
  $uid = $from_f;

  try {
    if($stmt->execute(array(':to_f'=> $to_f, ':from_f'=> $from_f, ':uid'=> $from_f, ':date_sent' => $date_sent)))
    echo 'ok';
    else {
      echo 'Some Difficulty in making Changes';
    }
  }
  catch(PDOException $e) {
     // handle error
     echo $e->getmessage();
     exit();
  }
}
 ?>
