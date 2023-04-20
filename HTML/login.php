<?php
session_start();
$lemail = $_GET['logemail'];
$lpass = md5($_GET['logpass']);

$loginsuc;

$con = new mysqli('localhost', 'root', '', 'fand');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} else {
    $sqlqry = "SELECT `pass`,`uid` FROM `suli` where `email`='$lemail'";
    $result = mysqli_query($con,$sqlqry);
    $pass =  mysqli_fetch_assoc($result);
    echo "<pre>";
    print_r($pass);
    echo "</pre>"; 
    if($pass['pass']==$lpass){
        echo "login successfull";
        $_SESSION['id']=session_id();
        $_SESSION['uid'] = $pass['uid']; 
        $_SESSION['emailid'] = $lemail;
        header('Location: ./PostHome.php');
        $loginsuc = 1;
    }
    else{
        $loginsuc = 2;
        echo "login failed";
        header('Location: ./SULI.php');

    }
    $con->close();
}
$_SESSION['lis'] = $loginsuc;

?>