<?php
session_start();
$uid = $_SESSION['uid'];
$area = $_POST['locality'];
$link = $_POST['newslink'];
$title = $_POST['heading'];
$doi = $_POST['doi'];
$ngenre = $_POST['genrenews'];
$ninfo = $_POST['newsinfo'];
$ncomment = $_POST['newscomment'];
$nrating = $_POST['newsrating'];




$con = new mysqli('localhost', 'root', '', 'fand');
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
} else {
  $sqlqry = $con->prepare("INSERT INTO `news_upload` (`uid`, `area`, `link`, `title`, `doi`, `ngenre`, `ninfo`, `ncomment`, `nrating`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);");
  $sqlqry->bind_param('isssssssi', $uid, $area, $link, $title, $doi, $ngenre, $ninfo, $ncomment, $nrating);
  $sqlqry->execute(); 
  $sqlqry->close();
  $con->close();
  header('Location: ./Review.php');
  $nusuc=1;
}
$_SESSION['nus']=$nusuc;
?>
