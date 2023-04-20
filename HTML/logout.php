<?php
session_start();
unset($_SESSION['emailid']);
$eid = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="./CSS/logout.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</head>
<body>
    <p style="position: relative;top: 300px;left:480px;font-size: xx-large;font-family: Georgia, 'Times New Roman', Times, serif;">To Log In Again, <a href="./SULI.php">Click Here</a>&#128072</p>
</body>
</html>

<?php
$smiley = "\u{1F60A}";
    echo  '<script>
	swal("Log Out Successfully!", "Visit Again To FAND '."$smiley".'", "success");
	</script>';
?>