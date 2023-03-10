<?php
@include './config.php';

$fname = $_POST['signfname'];
$lname = $_POST['signlname'];
$email = $_POST['signemail'];
$pass = md5($_POST['signpass']);
$cpass = md5($_POST['signconpass']);


?>