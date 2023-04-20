<?php
session_start();
?>
<?php
require "access.php";
?>
<?php
$rows;
$irid = 1;
$con = mysqli_connect('localhost', 'root', '', 'fand');
$sql1 = "SELECT * FROM `app_upload` WHERE aid=$irid;";
$result = mysqli_query($con, $sql1);
$con->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="CSS/Common.css">
  <link rel="stylesheet" href="CSS/ira.css">

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
  <div class="appshow">

    <?php
    while ($rows = $result->fetch_assoc()) {
      ?>
      <div class="ln" style="margin-left: 20%;">
        <h3>
          <?php echo $rows['appname']; ?>
        </h3>
      </div>
      <div class="applogo" style="margin-left: 17%;">
        <?php echo '<img src="./ImagesFromUser/Application/' . $rows['applogo'] . '" style="width:128px;height:128px">'; ?>
      </div>
      <div class="summary" style="margin-left: 50%;margin-top: -14%; text-align: center;">
        <h4>Information About App/Summary of App: - </h4>
        <?php echo $rows['summary']; ?>
      </div>
      <div class="appdetails" style="    margin-top: -355px;
      width: 600px;
    margin-left: 5%;
    margin-right: 500px;">
        <h4 style="margin-left: 10%;">App Details: </h4>
        <p>
          &#9655; App Name:
          <?php echo $rows['appname']; ?>
        </p>
        <p>
          &#9655; Link of app:
          <?php echo $rows['applink']; ?>
        </p>
        <p>
          &#9655; App Size:
          <?php $as = $rows['appsize']; 
            if($as==1){
              echo "< 10MB";
            }else if($as==2){
              echo "10MB to 500MB";
            }else if($as==3){
              echo "500MB to 1GB";
            }else if($as==4){
              echo "1GB to 5GB";
            }else{
              echo "5GB >";
            }
          ?>

          
        </p>
        <p>
          &#9655; Extra Memory Consumption:
          <?php echo $rows['emc']; ?>
          <?php echo $rows['emsf']; ?>
        </p>
        <p>
          &#9655; Genre:
          <?php echo $rows['genre']; ?>
          &#9657; Sub-genre:
          <?php
          if ($rows['genre'] == 'app') {
            echo $rows['appgenretype'];
          } else {
            echo $rows['gamegenretype'];
          } ?>
        </p>
        <p>
          &#9655; Device Compatibility:
          <?php echo $rows['devcomp']; ?>
        </p>
        <p>
          &#9655; Overall Rating From <br>The Application Provider:
          <?php
          $star = $rows['rating'];
          while ($star != 0) {

            ?>
            <span class="fa fa-star checked"></span>
            <?php
            $star = $star - 1;
          }
          $remstar = 5 - $rows['rating'];
          while ($remstar != 0) {
            ?>
            <span class="fa fa-star"></span>
            <?php
            $remstar = $remstar - 1;
          }

          ?>
          <?php echo $rows['rating'] . "/5"; ?>
        </p>
        <p>
          &#9655; Comment By Application Provider: <br>
          <?php echo $rows['comment'];
          ?>
        </p>
      </div>

      
      <h2 style="position: relative;text-align: center;left: 300px;top: 120px;">Ratings From Users</h2>
      <div class="rating" style="    margin-left: 770px;
    margin-top: 103px;">

          <form method="post" action="./iar.php">

          <?php
    }
          $con = mysqli_connect('localhost', 'root', '', 'fand');
          $sql2 = "SELECT * FROM `iar` WHERE aid=$irid;";
          $result2 = mysqli_query($con, $sql2);
          $con->close();
          $arsavg = 0;
          $dcavg = 0;
          $uigavg = 0;
          $smtavg = 0;
          $oaavg = 0;
          $inc = 1;
          while ($rows = $result2->fetch_assoc()) {
            $arsavg = $arsavg + $rows['ars'];
            $dcavg = $dcavg + $rows['dc'];
            $uigavg = $uigavg + $rows['uig'];
            $smtavg = $smtavg + $rows['smt'];
            $oaavg = $oaavg + $rows['oa'];
            $inc++;
          }
          $arsavg = $arsavg/$inc;
          $dcavg = $dcavg/$inc;
          $uigavg = $uigavg/$inc;
          $smtavg = $smtavg/$inc;
          $oaavg = $oaavg/$inc;
          ?>

          <h5 style="    position: relative;
    text-align: center;
    left: -84px;
    top: 40px;">Total Reviews Till Now: <?php echo $inc-1; ?></h5><br>

          <h4> &#9672; App Reliability/Security: </h4><br>
          <div class="arsratingdiv">
            <input type="radio" name="arsrating" id="ars5" value="5"><label for="ars5" required>☆</label>
            <input type="radio" name="arsrating" id="ars4" value="4"><label for="ars4" required>☆</label>
            <input type="radio" name="arsrating" id="ars3" value="3"><label for="ars3" required>☆</label>
            <input type="radio" name="arsrating" id="ars2" value="2"><label for="ars2" required>☆</label>
            <input type="radio" name="arsrating" id="ars1" value="1"><label for="ars1" required>☆</label>
          </div>
          <p><?php echo $arsavg . "/5 rating";?></p>

          <h4>&#9672; Device Compatibility: </h4>
          <div class="dcratingdiv">
            <input type="radio" name="dcrating" id="dc5" value="5"><label for="dc5" required>☆</label>
            <input type="radio" name="dcrating" id="dc4" value="4"><label for="dc4" required>☆</label>
            <input type="radio" name="dcrating" id="dc3" value="3"><label for="dc3" required>☆</label>
            <input type="radio" name="dcrating" id="dc2" value="2"><label for="dc2" required>☆</label>
            <input type="radio" name="dcrating" id="dc1" value="1"><label for="dc1" required>☆</label>
        </div>
        <p><?php echo $dcavg . "/5 rating";?></p>


          
          <h4>&#9672; User Interface/Graphics: </h4>
          <div class="uigratingdiv">
            <input type="radio" name="uigrating" id="uig5" value="5"><label for="uig5" required>☆</label>
            <input type="radio" name="uigrating" id="uig4" value="4"><label for="uig4" required>☆</label>
            <input type="radio" name="uigrating" id="uig3" value="3"><label for="uig3" required>☆</label>
            <input type="radio" name="uigrating" id="uig2" value="2"><label for="uig2" required>☆</label>
            <input type="radio" name="uigrating" id="uig1" value="1"><label for="uig1" required>☆</label>
        </div>
        <p><?php echo $uigavg . "/5 rating";?></p>



          <h4>&#9672; Smoothness: </h4>
          <div class="smtratingdiv">
            <input type="radio" name="smtrating" id="smt5" value="5"><label for="smt5" required>☆</label>
            <input type="radio" name="smtrating" id="smt4" value="4"><label for="smt4" required>☆</label>
            <input type="radio" name="smtrating" id="smt3" value="3"><label for="smt3" required>☆</label>
            <input type="radio" name="smtrating" id="smt2" value="2"><label for="smt2" required>☆</label>
            <input type="radio" name="smtrating" id="smt1" value="1"><label for="smt1" required>☆</label>
        </div>
        <p><?php echo $smtavg . "/5 rating";?></p>


          
          <h4>&#9672; Overall : </h4>
          <div class="oaratingdiv">
            <input type="radio" name="oarating" id="oa5" value="5"><label for="oa5" required>☆</label>
            <input type="radio" name="oarating" id="oa4" value="4"><label for="oa4" required>☆</label>
            <input type="radio" name="oarating" id="oa3" value="3"><label for="oa3" required>☆</label>
            <input type="radio" name="oarating" id="oa2" value="2"><label for="oa2" required>☆</label>
            <input type="radio" name="oarating" id="oa1" value="1"><label for="oa1" required>☆</label>
          </div>
          <p><?php echo $oaavg . "/5 rating";?></p>


          <button type="submit" style="width:230px;position:relative;left:55px;top:10px;">Submit Your Ratings</button>
      </form>    
        
        </div>
        <br><br>
      <form method="post" action="./iar.php">

        <textarea name="comment" id="comment" placeholder="Comments..." cols="170" rows="2"></textarea>
        <button type="submit">Send></button>
      </form>


      <div class="comments">
        <?php
          $con = mysqli_connect('localhost', 'root', '', 'fand');
          $sql3 = "SELECT * FROM `acomments` WHERE aid=$irid;";
          $result3 = mysqli_query($con, $sql3);
          $con->close();
          $commentcount = 1;
          while ($rows = $result3->fetch_assoc()) {
            ?>
            <p style="border: 2px solid rgb(3, 0, 26);position: relative;left: 30px;padding:10px;background-color:#ffffff29;">
            <?php
            echo "Comment ".$commentcount.":- <br>".$rows['comment'];
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
$avg=($arsavg+$dcavg+$uigavg+$smtavg+$oaavg)/25;
$i = $inc-1;
if($avg<2.5 and $i>10){
  echo  '<script>
	swal("THIS APP IS FRAUD!", "As per the review, this app has lesser than 2.5 ratings including all aspects showing it is fraud!!", "error");
	</script>';  
}elseif($avg>2.5 and $i>10){
  echo  '<script>
	swal("THIS APP IS Reliable!", "As per the review, this app has more than 2.5 ratings including all aspects showing it is reliable!!", "success");
	</script>';  
}else{
  echo  '<script>
	swal("NOT ENOUGH REVIEWS!", "Provide your review and rating so that this app can be stated if reliable or not!!", "warning");
	</script>';
}
?>