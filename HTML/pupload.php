<?php
session_start();
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$pimg = $_FILES['profileimage']['name'][0];
$pimgsize = $_FILES['profileimage']['size'][0];
$pimgtmpname = $_FILES['profileimage']['tmp_name'][0];
$pimgtype = $_FILES['profileimage']['type'][0];
move_uploaded_file($pimgtmpname,"./ImagesFromUser/Profile/". $pimg);
$lmail = $_SESSION['emailid'];
$amail = $_POST['alteremail'];
$addr = $_POST['addr'];
$pincode = $_POST['pincode'];
$mobno = $_POST['mobilenumber'];
$curind = $_POST['current'];
$workas = $_POST['workingas'];
$offcity = $_POST['officecity'];
$uid = $_SESSION['uid'];


$con = new mysqli('localhost', 'root', '', 'fand');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
  } else {
    $sqlqry = $con->prepare("INSERT INTO `profile` (`fname`, `lname`, `pimg`, `lmail`, `amail`, `addr` , `pincode` , `mobno`, `curind`, `workas`, `offcity`, `uid`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?);");
    $sqlqry->bind_param("sssssssiissi", $fname, $lname, $pimg, $lmail, $amail, $addr, $pincode, $mobno, $curind, $workas, $offcity, $uid);
    $sqlqry->execute();
    $sqlqry->close();
    $con->close();
    header('Location: ./Profile.php');
  }
?>