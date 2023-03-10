<?php
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
  $sqlqry = $con->prepare("INSERT INTO `news_upload` (`area`, `link`, `title`, `doi`, `ngenre`, `ninfo`, `ncomment`, `nrating`) VALUES (?, ?, ?, ?, ?, ?, ?, ?);");
  $sqlqry->bind_param('sssssssi', $area, $link, $title, $doi, $ngenre, $ninfo, $ncomment, $nrating);
  $sqlqry->execute();
  $sqlqry->close();
  $con->close();
  header('Location: http://localhost/cwh/fand/html/Review.html');
}
?>
