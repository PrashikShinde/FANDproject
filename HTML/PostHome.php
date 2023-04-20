<?php
session_start();
$email = $_SESSION['emailid'];
$uid = $_SESSION['uid'];
require  "access.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="CSS/Common.css">
  <script src="Firebase.js"></script>
  <link rel="stylesheet" href="CSS/Home.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css" rel="stylesheet"
    type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
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
          <a href="PostHome.php" title="To Go To Home Page">
            <li>Home</li>
          </a>
          <a href="Profile.php" title="To View And Edit Profile Details">
            <li>Profile</li>
          </a>
          <a href="Upload.php" title="To Upload The App Or News">
            <li>Upload</li>
          </a>
          <a href="Review.php" title="Review The Previously Uploaded Data">
            <li>Review</li>
          </a>
          <a href="Feedback.php" title="Feedback To Website Admin">
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


    <div class="carocon1">
      <div class="blurbox1" style="margin-top: -44px;">
        <div class="carousel">
          <div class="carousel__control"> </div>
          <div class="carousel__stage">
            <div class="spinner spinner--left">
              <div class="spinner__face js-active" data-bg="#27323c">
                <div class="content" data-type="carousel-1">
                  <div class="content__left">
                  </div>
                  <div class="content__right">
                    <div class="content__main">
                      <p><main>Intelligence</main><br>This site is using the most advanced intelligence system nature has ever
                        created that is the human brain for getting aware of the threat in the cyber world.</p>
                    </div>
                    <h3 class="content__index">01</h3>
                  </div>
                </div>
              </div>
              <div class="spinner__face" data-bg="#19304a">
                <div class="content" data-type="carousel-2">
                  <div class="content__left">
                  </div>
                  <div class="content__right">
                    <div class="content__main">
                      <p><main>Security</main><br>Site will diplay you all secured applications and news which should be considered
                        to make you secure.</p>
                    </div>
                    <h3 class="content__index">02</h3>
                  </div>
                </div>
              </div>
              <div class="spinner__face" data-bg="#2b2533">
                <div class="content" data-type="carousel-3">
                  <div class="content__left">
                  </div>
                  <div class="content__right">
                    <div class="content__main">
                      <p><main>User Friendly</main><br>The interface of this site is very user Friendly and easy to access to anyone
                        and the Feedback section has set open for the reviews about UI and anything user want to tell us
                        about site.</p>
                    </div>
                    <h3 class="content__index">03</h3>
                  </div>
                </div>
              </div>
              <div class="spinner__face" data-bg="#312f2d">
                <div class="content" data-type="carousel-4">
                  <div class="content__left">
                  </div>
                  <div class="content__right">
                    <div class="content__main">
                      <p><main>Based on responses</main><br>user responses are the core of this site and the motto of this site is to
                        make aware the users by the users thruogh the responses.</p>
                    </div>
                    <h3 class="content__index">04</h3>
                  </div>
                </div>
              </div>
              <div class="spinner__face" data-bg="#312f2d">
                <div class="content" data-type="carousel-5">
                  <div class="content__left">
                  </div>
                  <div class="content__right">
                    <div class="content__main">
                      <p><main>Connecting the world</main><br>To connect the world to respond on any application or news so that the
                        user from the generation area of app or news can be grasped and actual reality can be known to
                        all from it.</p>
                    </div>
                    <h3 class="content__index">05</h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="JS/Home1.js"></script>
      </div>
    </div>


    <div class="carcon2">
      <div class="container11">
        <div class="carousel11">
          <div class="carousel__face"><span></span></div>
          <div class="carousel__face"><span></span></div>
          <div class="carousel__face"><span></span></div>
          <div class="carousel__face"><span></span></div>
          <div class="carousel__face"><span></span></div>
          <div class="carousel__face"><span></span></div>
          <div class="carousel__face"><span></span></div>
          <div class="carousel__face"><span></span></div>
          <div class="carousel__face"><span></span></div>
        </div>
      </div>
    </div>
  <div class="toptable">
    <?php require "./toptable.php" ?>
  </div>
</body>

</html>

<?php
if($_SESSION['lis']==1){
	echo  '<script>
	swal("Log In Successful!", "Provide Your Reviews!!", "success");
	</script>';
	$_SESSION['lis'] = 0;
}
?>