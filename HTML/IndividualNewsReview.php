<?php
session_start();
?>
<?php
require "access.php";
?>
<?php
$rows;
$con = mysqli_connect('localhost', 'root', '', 'fand');
$irid = $_GET['id'];
$sql1 = "SELECT * FROM `news_upload` WHERE nid=$irid;";
$result = mysqli_query($con, $sql1);
$con->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="CSS/Common.css">
  <link rel="stylesheet" href="./CSS/irn.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

    <a id="logout" href="./logout.php">Log Out</a>

  </header>
  <div class="newsshow">

    <?php
    while ($rows = $result->fetch_assoc()) {
      ?>
      <div class="ln" style="position:relative;">
        <h3 style="text-align:center;position:relative;">
          <?php echo $rows['title']; ?>
        </h3>
        <h4 style="position:relative;left:40%">
          <?php echo $rows['doi']; ?>,&nbsp;
          <?php echo $rows['area']; ?>
        </h4>
        <h5 style="position:relative;left:40%">News Genre:
          <?php echo $rows['ngenre']; ?>
        </h5>
      </div>
      <div class="summary" style="position:relative;left:20px; width:1400px;">
        <h4>Information About Incident: - </h4>
        <?php echo $rows['ninfo']; ?>
      </div>

      <h4 style="position:relative;left:20px">Link of news: <a>
          <?php echo $rows['link']; ?>
        </a></h4>



      <div class="rating" style="position:relative;left:20px; width:1400px;">
        <h4>News Reliability As Per Author: </h4>
        <p>
          <?php
          $star = $rows['nrating'];
          while ($star != 0) {

            ?>
            <span class="fa fa-star checked"></span>
            <?php
            $star = $star - 1;
          }
          $remstar = 5 - $rows['nrating'];
          while ($remstar != 0) {
            ?>
            <span class="fa fa-star"></span>
            <?php
            $remstar = $remstar - 1;
          }

          ?>
          <?php echo $rows['nrating'] . "/5"; ?>
        </p>

        <p>
          Comments of Author or news provider: <br>
          <?php echo $rows['ncomment']; ?>
        </p>
      </div>
      <?php
    }
    $con = mysqli_connect('localhost', 'root', '', 'fand');
    $sql2 = "SELECT * FROM `inr` WHERE nid=$irid;";
    $result2 = mysqli_query($con, $sql2);
    $con->close();
    $rrtavg = 0;
    $inc = 1;
    while ($rows = $result2->fetch_assoc()) {

      $rrtavg = $rrtavg + $rows['rrn'];
      $inc++;
    }
    ?>
    <div class="ratingd" style="    position: relative;
    top: 10px;
    left: 547px;">
      <h3>Reliability Rating Of This <br>News As Per Readers: </h3>
      <h4>Total Reviews :
        <?php echo $inc-1; ?>
      </h4><br><br>

      <form action="./inr.php" method="post">
        <div class="relratingdiv">
          <input type="radio" name="relrating" id="rel5" value="5"><label for="rel5">☆</label>
          <input type="radio" name="relrating" id="rel4" value="4"><label for="rel4">☆</label>
          <input type="radio" name="relrating" id="rel3" value="3"><label for="rel3">☆</label>
          <input type="radio" name="relrating" id="rel2" value="2"><label for="rel2">☆</label>
          <input type="radio" name="relrating" id="rel1" value="1"><label for="rel1">☆</label>
          <p>

        </div>
        <?php echo $rrtavg / $inc . "/5 rating"; ?>
        </p>
        <br>
        <button type="submit" style="width:max-content;position:relative;left:50px;">Submit Rating</button>
      </form>
    </div>
<div style="position:relative;top:175px;">
    <form method="post" action="./inr.php">

      <textarea name="comment" id="comment" placeholder="Comments..." cols="170" rows="2"></textarea>
      <button type="submit" style="position: relative;top:-133px;">Send></button>


    </form>
  </div>

    <div class="comments" style="position:relative;top:-120px;">
      <?php
      $con = mysqli_connect('localhost', 'root', '', 'fand');
      $sql3 = "SELECT * FROM `ncomments` WHERE nid=$irid;";
      $result3 = mysqli_query($con, $sql3);
      $con->close();
      $commentcount = 1;
      while ($rows = $result3->fetch_assoc()) {
        ?>
        <p style="border: 2px solid rgb(3, 0, 26);position: relative;left: 30px;padding:10px;background-color:#ffffff29;">
          <?php
          echo "Comment " . $commentcount . ":- <br>" . $rows['comment'];
          $commentcount++;
          ?>
        </p>
        <?php
      }
      ?>
    </div>
  </div>
</body>

</html>

<?php
$avg=($rrtavg/$inc)/5;
$i = $inc-1;
if($avg<2.5 and $i>10){
  echo  '<script>
	swal("THIS NEWS IS FRAUD!", "As per the review, this news has lesser than 2.5 ratings including all aspects showing it is fraud!!", "error");
	</script>';  
}elseif($avg<2.5 and $i>10){
  echo  '<script>
	swal("THIS NEWS IS Reliable!", "As per the review, this news has more than 2.5 ratings including all aspects showing it is reliabe!!", "success");
	</script>';  
}else{
  echo  '<script>
	swal("NOT ENOUGH REVIEWS!", "Provide your review and rating so that this app can be stated if reliable or not!!", "warning");
	</script>';
}
?>