<?php
session_start();

$signupsuc;

$fname = $_POST['signfname'];
$lname = $_POST['signlname'];
$email = $_POST['signemail'];
$pass = md5($_POST['signpass']);
$cpass = md5($_POST['signconpass']);



$con = new mysqli('localhost', 'root', '', 'fand');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "SELECT * FROM suli WHERE email = '$email'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        header('Location: ./SULI.php');
        $signupsuc = 3;
    } else {
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        } else {
            if ($pass == $cpass) {
                $sqlqry = $con->prepare("INSERT INTO `suli` (`fname`, `lname`, `email`, `pass`) VALUES ( ?,?,?,?)");
                $sqlqry->bind_param('ssss', $fname, $lname, $email, $pass);
                $sqlqry->execute();
                $sqlqry->close();
                $con->close();
                header('Location: ./SULI.php');
                $signupsuc = 1;
            } else {
                $signupsuc = 2;
                header('Location: ./SULI.php');
            }
        }
    }
}
$_SESSION['sus'] = $signupsuc;
echo $_SESSION['sus'];

?>