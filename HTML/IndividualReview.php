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
    $sql = "SELECT * FROM app_upload ORDER BY aid DESC";
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
    <link rel="stylesheet" href="CSS/ir.css">
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
      <div class="appshow">
        <div class="ln">
          <h3>
            <?php echo $rows['id']; ?>
            hi
          </h3>
          <div class="applogo">
            box
            <?php echo '<img src="./ImagesFromUser/Application/' . $rows['applogo'] . '" style="width:128px;height:128px">'; ?>
          </div>
        </div>
        <div class="summary">
          <h4>Information About App/Summary of App: - </h4><br><br><br>
          <?php echo $rows['summary']; ?> 
        </div>
        <div class="appdetails">
          <h4>App Details: </h4>
          <p>
            App Name: <?php echo $rows['id']; ?>
          </p>
          <p>
            Link of app: <?php echo $rows['applink']; ?>
          </p>
          <p>
            App Size: <?php echo $rows['appsize']; ?>
          </p>
          <p>
            Extra Memory Consumption: <?php echo $rows['emc']; ?><?php echo $rows['emsf']; ?>
          </p>
          <p>
            Genre: <?php echo $rows['genre']; ?>
            Sub-genre: <?php
            if ($rows['genre'] == 'Application') {
                echo $rows['appgenretype'];
            } else {
                echo $rows['gamegenretype'];
            } ?>
          </p>
          <p>
            Device Compatibility: <?php echo $rows['devcomp']; ?>
          </p>
        </div>
        <div class="rating">
          <h4>Rating: </h4>
          <?php echo $rows['rating']; ?>
        </div>
        <textarea name="comment" id="comment" placeholder="Comments..." cols="30" rows="10"></textarea>
        <div class="comments">
          <p>
            <?php echo $rows['comment']; ?>
          </p>
        </div>
      </div>

      <div class="newsshow">

      </div>
</body>
</html>