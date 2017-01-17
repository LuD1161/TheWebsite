<?php
session_start();
include_once '../inc/dbconfig.inc.php';

$stmt = $db_conn->prepare("SELECT * FROM tbl_users WHERE user_id=:uid");
$stmt->execute(array(":uid"=>$_SESSION['user_session']));
$row=$stmt->fetch(PDO::FETCH_ASSOC);

$db_conn = mysqli_connect('localhost', 'iProject', '12345', 'webregistration') or die('Error connecting to database - registration ');

$target_dir = "../images";
$target_file = $target_dir . "/" .$row['user_id'];
$uploadOk = 1;
$FileType = pathinfo($target_file,PATHINFO_EXTENSION);
$target_file .=$FileType;
$fileToUpload = $_FILES['fileToUpload']['name'];
// echo $target_file."\n";

$query = "UPDATE tbl_users set user_pic='". $target_file ."' where user_id='".$_SESSION['user_session']."'";


// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $affect = mysqli_query($db_conn, $query) or die('Error Conecting to Database - In fetching Data'. mysqli_error($db_conn));
        echo "affected rows were ".$affect;

        header("Location:".$_SERVER['REQUEST_URI']);
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
