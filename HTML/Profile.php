<?php
session_start();
$email =  $_SESSION['emailid'];
$uid = $_SESSION['uid'];

?>
<?php
require  "access.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="CSS/Profile.css">
  <link rel="stylesheet" href="CSS/Common.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</head>

<body>
    <header class="header">
        <nav role="navigation">
            <div id="menuToggle">
                <input type="checkbox" />
                <span></span>
                <span></span>
                <span></span>
                <ul id="menu">
                    <a href="PostHome.php">
                        <li>Home</li>
                    </a>
                    <a href="Profile.php">
                        <li>Profile</li>
                    </a>
                    <a href="Upload.php">
                        <li>Upload</li>
                    </a>
                    <a href="Review.php">
                        <li>Review</li>
                    </a>
                    <a href="Feedback.php">
                        <li>Feedback</li>
                    </a>
                </ul>
            </div>
        </nav>
        <div class="logodiv">
            <img src="CSS/Images/FAND Logo.png" alt="Fraud Application & News Detection" class="logo" height="150px">
        </div>

        <a id="logout" href="./logout.php">Log Out</a>
    </header>


    <?php
$con = new mysqli('localhost', 'root', '', 'fand');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} else {
    error_reporting(E_ERROR | E_PARSE);
    $sql = "SELECT * FROM profile where uid = $uid";
    $result = $con->query($sql);
    $con->close();
    $rows = $result->fetch_assoc();
    $fname = $rows['fname'];
    $lname = $rows['lname'];
    $pimg = $rows['pimg'];
    $amail = $rows['amail'];
    $addr = $rows['addr'];
    $pincode = $rows['pincode'];
    $mobno = $rows['mobno'];
    $curind = $rows['curind'];
    $workas = $rows['workas'];
    $offcity = $rows['offcity'];
}

if(!$result->fetch_assoc()==null){
    ?>


    <div class="leftcont"><br><br>
        <div class="lefttopcont">
            <img src="CSS/Images/ProfileIcon.png" alt="Profile" style="width: 100px; margin-top: 100px;">
            <h2>Your Name</h2>
        </div>
        <div class="leftdowncont">
            <a href="#profiledetails">
                <p>Personal Details</p>
            </a>
            <a href="#contactdetails">
                <p>Contact Details</p>
            </a>
            <a href="#workdetails">
                <p>Work Details</p>
            </a>
            <a href="#yourdata">
                <p>Your Data</p>
            </a>
        </div>
    </div>
    <div class="rightcont">
        <form action="./pupload.php" method="post"  enctype="multipart/form-data">
            <div id="profiledetails">
            <h2 id="pdh">Profile Details</h2><br>
            <hr><br>
            <label for="fname">First Name: </label><br>
            <input type="text" name="fname" id="fname" required><br>
            <label for="lname">Last Name: </label><br>
            <input type="text" name="lname" id="lname" required><br>
            <label for="proimg">Profile Image: </label><br>
            <input type="file" name="profileimage[]" id="profileimage[]" required><br>
            <hr><br>
        </div>
        <hr><br><br><br>
        <div id="contactdetails">
            <h2>Contact Details</h2><br>
            <hr><br>
            <label for="email">Your Email: </label><br>
            <input type="email" name="email" id="email"  placeholder="<?php echo $_SESSION['emailid'];?>" disabled><br>
            <label for="alteremail">Alternative Email: </label><br>
            <input type="email" name="alteremail" id="alteremail" required><br>
            <label for="addr">Address: </label><br>
            <textarea name="addr" id="addr" cols="30" rows="10" required></textarea><br>
            <label for="pincode">Pincode: </label><br>
            <input type="number" name="pincode" id="pincode" maxlength="6" minlength="6"><br>
            <label for="mobilenumber">Mobile Number (Without Country Code): </label><br>
            <input type="number" name="mobilenumber" id="mobilenumber"><br>
            <hr><br>
        </div>
        <hr><br><br><br>
        <div id="workdetails">
            <h2>Work Details</h2><br>
            <hr><br>
            <label for="current">Current Industry: </label><br>
            <input type="text" name="current" id="current" required><br>
            <label for="workingas">Working as: </label><br>
            <input type="text" name="workingas" id="workingas"><br>
            <label for="officecity">Office City: </label><br>
            <input type="text" name="officecity" id="officecity" required><br>
            <hr><br>
        </div>
        <hr><br><br><br>
        <button type="submit" style="background-color: aqua; height: 40px; font-size: larger;">Save Changes</button>
    </div>
    </form>
<?php
} else {
?>
<div class="leftcont"><br><br>
        <div class="lefttopcont">
            <!-- <img src="CSS/Images/ProfileIcon.png" alt="Profile" style="width: 100px; margin-top: 100px;"> -->
            <?php echo '<img src="./ImagesFromUser/Profile/' . $pimg. '" style="width:128px;height:128px; margin-top:50px;">'; ?>
            <h2><?php echo $fname." ". $lname ; ?></h2>
        </div>
        <div class="leftdowncont">
            <a href="#profiledetails">
                <p>Personal Details</p>
            </a>
            <a href="#contactdetails">
                <p>Contact Details</p>
            </a>
            <a href="#workdetails">
                <p>Work Details</p>
            </a>
            <!-- <a href="#yourdata">
                <p>Your Data</p>
            </a> -->
        </div>
    </div>
    <div class="rightcont">
        <form action="./pupload.php" method="post"  enctype="multipart/form-data">
        <div id="profiledetails">
            <h2>Profile Details</h2><br>
            <hr><br>
            <label for="fname">First Name: </label><br>
            <input type="text" name="fname" id="fname" disabled placeholder="<?php echo $fname; ?>"><br>
            <label for="lname">Last Name: </label><br>
            <input type="text" name="lname" id="lname" disabled placeholder="<?php echo $lname; ?>"><br>
            <!-- <label for="proimg">Profile Image: </label><br>
            <input type="file" name="profileimage[]" id="profileimage[]"  disabled><br> -->
            <hr><br>
        </div>
        <hr><br><br><br>
        <div id="contactdetails">
            <h2>Contact Details</h2><br>
            <hr><br>
            <label for="email">Your Email: </label><br>
            <input type="email" name="email" id="email"  placeholder="<?php echo $_SESSION['emailid'];?>" disabled><br>
            <label for="alteremail">Alternative Email: </label><br>
            <input type="email" name="alteremail" id="alteremail"  disabled placeholder="<?php echo $amail; ?>"><br>
            <label for="addr">Address: </label><br>
            <textarea name="addr" id="addr" cols="30" rows="10"  disabled placeholder="<?php echo $addr; ?>"></textarea><br>
            <label for="pincode">Pincode: </label><br>
            <input type="number" name="pincode" id="pincode" maxlength="6" minlength="6" disabled placeholder="<?php echo $pincode; ?>"><br>
            <label for="mobilenumber">Mobile Number (Without Country Code): </label><br>
            <input type="number" name="mobilenumber" id="mobilenumber" disabled placeholder="<?php echo $mobno; ?>"><br>
            <hr><br>
        </div>
        <hr><br><br><br>
        <div id="workdetails">
            <h2>Work Details</h2><br>
            <hr><br>
            <label for="current">Current Industry: </label><br>
            <input type="text" name="current" id="current" disabled placeholder="<?php echo $curind; ?>"><br>
            <label for="workingas">Working as: </label><br>
            <input type="text" name="workingas" id="workingas" disabled placeholder="<?php echo $workas; ?>"><br>
            <label for="officecity">Office City: </label><br>
            <input type="text" name="officecity" id="officecity" disabled placeholder="<?php echo $offcity; ?>"><br>
            <hr><br>
        </div>
        <hr><br><br><br>
        <!-- <div id="yourdata">
            <h2>Your Data</h2><br>
            <hr><br>
        </div> -->
        <!-- <hr><br><br><br> -->
        <!-- <button type="submit" style="background-color: aqua; height: 40px; font-size: larger;">Save Changes</button> -->
        <!--pop up of are you sure cause changes made once will be not allowed to chagnge again?-->
    </div>
    </form>

    <?php
}
?>



</body>


</html>

<?php
$con = new mysqli('localhost', 'root', '', 'fand');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} else {
    $email = $_SESSION['emailid'];
    $sql = "SELECT * FROM `profile` WHERE lmail='$email'";
    $result = $con->query($sql);
    $con->close();

}

if($result->fetch_assoc()!=null){
    echo  '<script>
	swal("Profile Update Successful!", "Profile Can\'t be updated again!!", "success");
	</script>';
}
?>