<?php 
if(isset($_SESSION['emailid'])){
    $logstat= "logged in";
} else{
    header('Location: ./Home.php');
}
?>