<?php
session_start();
?>
<?php
require  "access.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="CSS/Common.css">
  <link rel="stylesheet" href="CSS/Feedback.css">
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
  <div class="feedbackform">
    <form action="feedbacks.php" name="Feedback" id="feedback"  enctype="multipart/form-data" method="post">
      <h2>Feedback Page/Contact Us</h2><br><br><br>
      <label for="name">Name: </label><br><br>
      <input type="text" name="name" id="name" required><br><br>
      <label for="email">Email: </label><br><br>
      <input type="email" name="email" id="email" required><br><br>
      <label for="roc">Reason For Contact: </label><br><br>
      <select name="roc" id="roc" required>
        <option style="display: none;" selected>Select: </option>
        <option value="suggestion">Suggestion</option>
        <option value="request">Request</option>
        <option value="feedback">Feedback</option>
        <option value="Complaint">Complaint</option>
        <option value="other">Other</option>
      </select><br><br>
      <label for="fi[]">Provide screenshot(if available): </label><br><br>
      <input type="file" name="fi[]" id="fi"><br><br>
      <label for="mou">Messsage For Us:</label><br><br>
      <textarea name="mou" id="mou" cols="30" rows="10" required></textarea><br><br>
      <input type="submit" value="Submit">
    </form>
  </div>
</body>

</html>

<?php
if(isset($_SESSION['fus'])){
  echo  '<script>
	swal("Feedback is uploaded successfully!", "Thank You For Your Feedback!", "success");
	</script>';
  unset($_SESSION['fus']);
}

?>