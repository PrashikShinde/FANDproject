<?php
$lemail = $_GET['logemail'];
$lpass = md5($_GET['logpass']);

$con = new mysqli('localhost', 'root', '', 'fand');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} else {
    // $sql = "SELECT pass FROM `suli` where=?";
    $sqlqry = "SELECT `pass`,`uid` FROM `suli` where `email`='$lemail'";
    // $sqlqry->bind_param("s",$lemail);
    $result = mysqli_query($con,$sqlqry);
    $pass =  mysqli_fetch_assoc($result);
    echo "<pre>";
    print_r($pass);
    echo "</pre>"; 
    if($pass['pass']==$lpass){
        echo "login successfull";
        session_start();
        $_SESSION['id']=session_id();
        $_SESSION['uid'] = $pass['uid']; 
        $_SESSION['emailid'] = $lemail;
        header('Location: http://localhost:8080/fand/html/PostHome.php');
        // header('Location: http://localhost:8080/fand/html/Home.php');
    }
    else{
        echo "login failed";
    }
    $con->close();
}

?>