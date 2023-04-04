<?php

$stype = $_POST['signtype'];
$fname = $_POST['signfname'];
$lname = $_POST['signlname'];
$email = $_POST['signemail'];
$pass = md5($_POST['signpass']);
$cpass = md5($_POST['signconpass']);



$con = new mysqli('localhost', 'root', '', 'fand');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} else {
    if($pass==$cpass){
        $sqlqry = $con->prepare("INSERT INTO `suli` ( `stype`, `fname`, `lname`, `email`, `pass`) VALUES ( ?,?,?,?,?)");
        $sqlqry->bind_param('issss',$stype,$fname,$lname,$email,$pass);
        $sqlqry->execute();
        $sqlqry->close();
        $con->close();
        header('Location: http://localhost:8080/fand/html/SULI.html');
    }
    else{
        echo "Password Incorrect";
    }
  }

?>