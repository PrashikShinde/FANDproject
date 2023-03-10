<?php

$feedname = $_POST['name'];
$feedemail = $_POST['email'];
$roc = $_POST['roc'];
$feedss = $_FILES['fi']['name'][0];
$feedss_size = $_FILES['fi']['size'][0];
$feedss_temp = $_FILES['fi']['tmp_name'][0];
$feedss_type = $_FILES['fi']['type'][0];
move_uploaded_file($feedss_temp, "FAND/HTML/ImagesFromUser/Feedback".$feedss);
$mou = $_POST['mou'];
$con = new mysqli('localhost', 'root', '', 'fand');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
  } else {
    $query = $con->prepare("INSERT INTO `feedback` (`feedname`, `feedemail`, `roc`, `feedss`, `mou`) VALUES (?,?,?,?,?);");
    $query->bind_param('sssss',$feedname,$feedemail,$roc,$feedss,$mou);
    $query->execute();
    $query->close();
    $con->close();
  header('Location: http://localhost/cwh/fand/html/Feedback.html');
  }


?>