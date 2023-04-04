<?php
session_start();
// echo $_SESSION['emailid'];
?>
<?php
require  "access.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="CSS/Profile.css">
  <link rel="stylesheet" href="CSS/Common.css">
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

        <a id="logout" onclick="logout()">Log Out</a>
    </header>

    <div class="leftcont"><br><br>
        <div class="lefttopcont">
            <img src="CSS/Images/ProfileIcon.png" alt="Profile" style="width: 100px;">
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
        <div id="profiledetails">
            <h2>Profile Details</h2><br>
            <hr><br>
            <label for="fname">First Name: </label><br>
            <input type="text" name="fname" id="fname"><br>
            <label for="lname">Last Name: </label><br>
            <input type="text" name="lname" id="lname"><br>
            <label for="proimg">Profile Image: </label><br>
            <input type="file" name="profileimage" id="profileimage"><br>
            <hr><br>
        </div>
        <hr><br><br><br>
        <div id="contactdetails">
            <h2>Contact Details</h2><br>
            <hr><br>
            <label for="email">Your Email: </label><br>
            <input type="email" name="email" id="email"><br>
            <label for="alteremail">Alternative Email: </label><br>
            <input type="email" name="alteremail" id="alteremail"><br>
            <label for="addr">Address: </label><br>
            <textarea name="addr" id="addr" cols="30" rows="10"></textarea><br>
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
            <input type="text" name="current" id="current"><br>
            <label for="workingas">Working as: </label><br>
            <input type="text" name="workingas" id="workingas"><br>
            <label for="officecity">Office City: </label><br>
            <input type="text" name="officecity" id="officecity"><br>
            <hr><br>
        </div>
        <hr><br><br><br>
        <div id="yourdata">
            <h2>Your Data</h2><br>
            <hr><br>
        </div>
        <hr><br><br><br>
    </div>
</body>

</html>