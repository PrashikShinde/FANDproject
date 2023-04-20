<?php 
session_start();

//inp	ars	dc	uig	smt	oa	aid	dt	
$ars=$_POST['arsrating'];
$dc=$_POST['dcrating'];
$uig=$_POST['uigrating'];
$smt=$_POST['smtrating'];
$oa=$_POST['oarating'];
$aid = 1;

$con = new mysqli('localhost', 'root', '', 'fand');
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
} else {
  $sqlqry = $con->prepare("INSERT INTO `iar` (`ars`, `dc`, `uig`, `smt`, `oa`, `aid`) VALUES (?,?,?,?,?,?);");
  $sqlqry->bind_param("iiiiii", $ars, $dc, $uig, $smt, $oa, $aid);
  $sqlqry->execute();
  $sqlqry->close();
  $con->close();
  header('Location: ./IndividualAppReview.php');
}
?>

<?php
$comment = $_POST['comment'];
$uid = $_SESSION['uid'];
$aid=1;

$con = new mysqli('localhost', 'root', '', 'fand');
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
} else {
  $sqlqry = $con->prepare("INSERT INTO `acomments` (`aid`, `uid`, `comment`) VALUES (?,?,?);");
  $sqlqry->bind_param("iis", $aid, $uid, $comment);
  $sqlqry->execute();
  $sqlqry->close();
  $con->close();
  header('Location: ./IndividualAppReview.php');
}

?>