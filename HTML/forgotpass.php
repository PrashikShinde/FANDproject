<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "./mail/PHPMailer-master/src/Exception.php";
require "./mail/PHPMailer-master/src/PHPMailer.php";
require "./mail/PHPMailer-master/src/SMTP.php";

if (isset($_POST["reset"])) {
    $emailid = $_POST['emailid'];
    $con = new mysqli('localhost', 'root', '', 'fand');
    $qry = "SELECT * FROM `suli` where `email`='$emailid'";
    $result = mysqli_query($con, $qry);
    $ldata = mysqli_fetch_assoc($result);
    if (mysqli_num_rows(mysqli_query($con, $qry)) <= 0) {
        ?>
        <script>
            alert("<?php echo "Sorry, no emails exists!!!" ?>");
        </script>
        <?php
    } else {
        $_SESSION['email'] = $emailid;

        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'YourEmailId';
        $mail->Password = 'YourEmailPass';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('YourEmailId');
        $mail->addAddress($_POST["emailid"]);
        $mail->isHTML(true);
        $mail->Subject = "Password Reset OTP";
        $mail->Body = "<b>Dear User</b>
        <h3>We received a request to reset your password.</h3>
        <p>Kindly,</p><a href='./reset.php'>click here</a><p>to reset your password</p>
        <br><br>
        <p>With regrads,</p>
        <b>Team Fand</b>";
        $mail->send();
        if (!$mail->send()) {
                ?>
                    <script>
                        alert("<?php echo " Invalid Email " ?>");
                        </script>
                    <?php
                } else {
                    ?>
                    <script>
                        window.location.replace("./notification.html");
                        </script>
                    <?php
                }
        
    }
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./CSS/forgotpass.css">
</head>

<body>
    <h1>Reset Your Password!!!</h1>
    <hr>
    <br><br><br>
    <form method="post">
        <label for="emailid">Email Id: </label><br><br>
        <input type="email" name="emailid" id="emailid" required><br><br>
        <input type="submit" value="Reset" name="reset" class="reset">
    </form>
</body>

</html>
