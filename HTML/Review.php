<?php
session_start();
// echo $_SESSION['emailid'];
?>
<?php
require  "access.php";
?>

<?php
$con = new mysqli('localhost', 'root', '', 'fand');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} else {
    $sql = "SELECT * FROM app_upload ORDER BY id DESC";
    $sql2 = "SELECT * FROM news_upload ORDER BY nid DESC";
    $result = $con->query($sql);
    $result2 = $con->query($sql2);
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="CSS/Common.css">
    <link rel="stylesheet" href="CSS/Review.css">
</head>

<body class="gradient">
    <header class="header">
        <nav role="navigation">
            <div id="menuToggle">
                <input type="checkbox" />
                <span></span>
                <span></span>
                <span></span>
                <ul id="menu">
                    <a href="Home.php">
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
        <!-- <a id="logout" onclick="logout()">Log Out</a> -->
    </header>
    <h2>Review</h2>
    <div id="sfr" style="visibility: visible;"><br>
        <label for="appornews">Select data type to review: </label><br><br>
        <input type="radio" name="appornews" id="Application">Application<br>
        <input type="radio" name="appornews"
            id="News">News&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><br>
    </div>
    <div id="appreviewtable" style="visibility: visible;">
        <h2>Application Review Table</h2>
        <table>
            <tr>
                <th>Sr. No.</th>
                <th>App Logo</th>
                <th>App Name</th>
                <th>App Size</th>
                <th>Extra Memory Consumption</th>
                <th>App Link</th>
                <th>Genre</th>
                <th>Sub-genre</th>
                <th>Device Compatibility</th>
                <th>Summary/Info</th>
                <th>Comment</th>
                <th>Rating</th>
                <!-- <th>View/Edit</th> -->
            </tr>
            <?php
            while ($rows = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td>
                        <?php echo $rows['id']; ?>
                    </td>
                    <td>
                        <?php echo '<img src="./ImagesFromUser/Application/' . $rows['applogo'] . '" style="width:128px;height:128px">'; ?>
                    </td>
                    <td>
                        <?php echo $rows['appname']; ?>
                    </td>
                    <td>
                        <?php echo $rows['appsize']; ?>
                    </td>
                    <td>
                        <?php echo $rows['emc']; ?>
                        <?php echo $rows['emsf']; ?>
                    </td>
                    <td>
                        <?php echo $rows['applink']; ?>
                    </td>
                    <td>
                        <?php echo $rows['genre']; ?>
                    </td>
                    <td>
                        <?php
                        if ($rows['genre'] == 'Application') {
                            echo $rows['appgenretype'];
                        } else {
                            echo $rows['gamegenretype'];
                        } ?><br>
                    </td>
                    <td>
                        <?php echo $rows['devcomp']; ?>
                    </td>
                    <td>
                        <?php echo $rows['summary']; ?>
                    </td>
                    <td>
                        <?php echo $rows['comment']; ?>
                    </td>
                    <td>
                        <?php echo $rows['rating']; ?>
                    </td>
                    <!-- <td><button id="appviewbtn">View</button></td> -->
                </tr>
                <?php
            }
            ?>
        </table>
    </div>

    <div id="newsreviewtable" style="visibility: hidden;">
        <h2>News Review Table</h2>
        <table>
            <tr>
                <th>Sr. No</th>
                <th>Area</th>
                <th>Link</th>
                <th>Title</th>
                <th>Date Of Incident</th>
                <th>Genre</th>
                <th>Summary</th>
                <th>Comment</th>
                <th>Rating</th>
                <!-- <th>View</th> -->
            </tr>
            <?php
            while ($rows = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td>
                        <?php echo $rows['nid']; ?>
                    </td>
                    <td>
                        <?php echo $rows['area']; ?>
                    </td>
                    <td>
                        <?php echo $rows['link']; ?>
                    </td>
                    <td>
                        <?php echo $rows['title']; ?>
                    </td>
                    <td>
                        <?php echo $rows['doi']; ?>
                    </td>
                    <td>
                        <?php echo $rows['ngenre']; ?>
                    </td>
                    <td>
                        <?php echo $rows['ninfo']; ?>
                    </td>
                    <td>
                        <?php echo $rows['ncomment']; ?>
                    </td>
                    <td>
                        <?php echo $rows['nrating']; ?>
                    </td>
                    <!-- <td><button id="newsviewbtn">View</button></td> -->
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
    <script src='./JS/Review.js' type='text/javascript'></script>
</body>

</html>