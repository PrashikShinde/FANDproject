<?php 
session_start();
$con = mysqli_connect('localhost', 'root', '', 'fand');

if(isset($_POST['relrating'])) {
    $rrn = $_POST['relrating'];
    $nid=$_SESSION['irid'];
  $sqlqry = "INSERT INTO `inr` (`rrn`, `nid`) VALUES (?,?);";
  $result = mysqli_query($con, $sqlqry);
  $con->close();
  header('Location: ./IndividualNewsReview.php');


}
  else {
    echo "error";
  }
  
?>

<?php
$comment = $_POST['comment'];
$uid = $_SESSION['uid'];
$nid=$_SESSION['irid'];

$con = new mysqli('localhost', 'root', '', 'fand');
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
} else {
  $sqlqry = $con->prepare("INSERT INTO `ncomments` (`nid`, `uid`, `comment`) VALUES (?,?,?);");
  $sqlqry->bind_param("iis", $nid, $uid, $comment);
  $sqlqry->execute();
  $sqlqry->close();
  $con->close();
  header('Location: ./IndividualNewsReview.php');
}

?>