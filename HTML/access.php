<?php 
if(isset($_SESSION['emailid'])){
    echo "logged in";
} else{
    header('Location: http://localhost:8080/fand/html/Home.php');
}
?>