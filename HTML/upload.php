<?php
session_start();
?>
<?php
require  "access.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="CSS/Common.css">
  <link href="./CSS/Upload.css" rel="stylesheet">
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

  <div class="form-wrapper" id="newsuploaddiv" style="visibility: hidden;">
    <h2 style="padding-left: 3%;">Add News</h2>
    <form id="newsuploadform" name="newsuploadform" action="nupload.php" method="post"  enctype="multipart/form-data">
      <label for="locality">Area/Locality Of News (Mention city and country): </label><br><br>
      <input type="text" id="locality" name="locality" required><br><br>
      <label for="newslink">Provide the hyperlink of news: </label><br><br>
      <input type="url" name="newslink" id="newslink"><br><br>

      
      <label for="heading">Title/Headline of news</label><br><br>
      <input type="text" id="heading" name="heading" required><br><br>
      <label for="doi">Date Of Incident: </label><br><br>
      <input type="date" name="doi" id="doi" required><br><br>
      <label for="genrenews">Genre of news: </label><br><br>
      <select id="newsdropdown" name="genrenews" required>
        <option style="display: none;" selected>Select: </option>
        <option value="investigation">Investigation</option>
        <option value="political">Political</option>
        <option value="crime">Crime</option>
        <option value="business">Business</option>
        <option value="arts">Arts</option>
        <option value="celebrity">Celebrity</option>
        <option value="education">Education</option>
        <option value="sports">Sports</option>
        <option value="lifestyle">Lifestyle</option>
        <option value="other">Other</option>
      </select><br><br>
      <label for="newsinfo">Information about incident/<br>Summary: </label><br><br>
      <textarea name="newsinfo" id="newsinfo" cols="30" rows="10" required></textarea><br><br>
      <label for="newscomment">Comments: </label><br><br>
      <textarea name="newscomment" id="newscomment" cols="30" rows="10" required></textarea><br><br>
      <label for="newsrating">Rating: </label><br>
      <div class="newsrating">
        <input type="radio" name="newsrating" value="5" id="5" required><label for="5">☆</label>
        <input type="radio" name="newsrating" value="4" id="4" required><label for="4">☆</label>
        <input type="radio" name="newsrating" value="3" id="3" required><label for="3">☆</label>
        <input type="radio" name="newsrating" value="2" id="2" required><label for="2">☆</label>
        <input type="radio" name="newsrating" value="1" id="1" required><label for="1">☆</label>
      </div>
      <br><br>
      <button type="submit">Submit</button>
    </form>
  </div>

  <div class="uploaddecide" id="decidean">
    <h2>Choose what data you want to add: </h2>
    <label for="appdetails">Add Application</label>
    <input type="radio" name="decide" id="appdetails" required><br><br>
    <label for="newsdetails">Add News</label>
    <input type="radio" name="decide" id="newsdetails" required>
  </div>

  <div class="form-wrapper" id="appuploaddiv" style="visibility: hidden;">
    <h2>Add Application</h2>
    <form id="uploadform" name="appupload" action="aupload.php" method="post" enctype="multipart/form-data">
      <br><br>
      <div class="appnamediv">
        <label for="appname">Application Name: </label>&nbsp;&nbsp;&nbsp;
        <input type="text" id="appname" name="appname" required><br>
      </div>
      <br>
      <div class="ds">
      <h4>Download size: </h4>
      <input type="radio" name="downloadsize" id="l10mb" value="1" required style="height:35px; width:35px; cursor: pointer;"> 
      <label for="l10mb" style="position: relative;bottom: 10px;">< 10MB</label>
      <input type="radio" name="downloadsize" id="10t500mb" value="2" required style="height:35px; width:35px; cursor: pointer;"> 
      <label for="10t500mb"style="position: relative;bottom: 10px;">10MB - 500MB</label> 
      <input type="radio" name="downloadsize" id="500t1gb" value="3" required style="height:35px; width:35px; cursor: pointer;"> 
      <label for="500t1gb"style="position: relative;bottom: 10px;">500MB - 1GB</label> 
      <input type="radio" name="downloadsize" id="1t5gb" value="4" required style="height:35px; width:35px; cursor: pointer;"> 
      <label for="1t5gb"style="position: relative;bottom: 10px;">1GB - 5GB</label> 
      <input type="radio" name="downloadsize" id="g5gb" value="5" required style="height:35px; width:35px; cursor: pointer;"> 
      <label for="g5gb"style="position: relative;bottom: 10px;">5GB ></label> 
      </div>   

      <br><br><br><br>
      <label for="emc">Extra memory consumption: </label>&nbsp;&nbsp;&nbsp;
      <input type="number" id="emc" name="emc" style="width: min-content;">
      <select name="sizeform" class="sizeform" required>
        <option style="display: none;" selected>Select: </option>
        <option value="KB">KB</option>
        <option value="MB">MB</option>
        <option value="GB">GB</option>
      </select>
      <br><br>
      <label for="appclick[]">Provide logo(if available): </label><br><br>
      <input type="file" name="appclick[]" id="appclick[]"><br><br>
      <label for="applink">Provide website of app(if available): </label>
      <input type="url" name="applink" id="applink"><br><br>
      <label for="genre">Genre: </label><br><br>
      <label for="app">Application</label>
      <input type="radio" name="genre" id="app" value="app" required>
      <select id="appdropdown" name="appdropdown" style="visibility: hidden;" required>
        <option style="display: none;" selected>Select: </option>
        <option value="watchapps">Watch Apps</option>
        <option value="watchfaces">Watch Faces</option>
        <option value="art&design">Arts & Design</option>
        <option value="auto&vehicle">Auto & Vehicle</option>
        <option value="beauty">Beauty</option>
        <option value="books&references">Books and references</option>
        <option value="business">Business</option>
        <option value="comics">Comics</option>
        <option value="communication">Communication</option>
        <option value="dating">Dating</option>
        <option value="education">Education</option>
        <option value="events">Events</option>
        <option value="finance">Finance</option>
        <option value="food&drink">Food & Drink</option>
        <option value="health&fitness">Health & Fitness</option>
        <option value="house&home">House & Home</option>
        <option value="libraries&demo">Liraries & Demo</option>
        <option value="lifestyle">Lifestyle</option>
        <option value="maps&navigations">Maps & Navigations</option>
        <option value="medical">Medical</option>
        <option value="music&audio">Music & Audio</option>
        <option value="news&magazine">News & Magazine</option>
        <option value="parenting">Parenting</option>
        <option value="personalisation">Personalisation</option>
        <option value="photography">Photography</option>
        <option value="productivity">Productivity</option>
        <option value="shopping">Shopping</option>
        <option value="social">Social</option>
        <option value="sports">Sports</option>
        <option value="tools">Tools</option>
        <option value="travel&local">Travel & Local</option>
        <option value="videoplayers&editors">Video Players & Editors</option>
        <option value="weather">Weather</option>
        <option value="other">Other</option>
      </select><br><br>
      <label for="game" class="gamecss">Games</label>
      <input type="radio" name="genre" id="game" value="game" class="gamecss" required>
      <select id="gamedropdown" style="visibility: hidden;" name="gdd" class="gen-option" required>
        <option style="display: none;" selected>Select: </option>
        <option value="action">Action</option>
        <option value="adventure">Adventure</option>
        <option value="arcade">Arcade</option>
        <option value="board">Board</option>
        <option value="card">Card</option>
        <option value="casino">Casino</option>
        <option value="educational">Educational</option>
        <option value="music">Music</option>
        <option value="puzzle">Puzzle</option>
        <option value="racing">Racing</option>
        <option value="roleplaying">Role Playing</option>
        <option value="simulation">Simulation</option>
        <option value="sports">Sports</option>
        <option value="strategy">Strategy</option>
        <option value="trivia">Trivia</option>
        <option value="word">Word</option>
        <option value="other">Other</option>
      </select><br><br>
      <div class="dccheckbox" required>
        <label for="devcom">Device Compatibility: </label><br><br>
        <input type="checkbox" name="devcom[]" value="mac/">MAC PC/Laptop<br><br>
        <input type="checkbox" name="devcom[]" value="windows/">Windows PC/Laptop<br><br>
        <input type="checkbox" name="devcom[]" value="ios/">IOS phones<br><br>
        <input type="checkbox" name="devcom[]" value="android/">Android Devices<br><br>
        <input type="checkbox" name="devcom[]" value="other/">Other Devices
        <br><br>
      </div>
      <label for="info">Information about app/<br>Summary about functionalities: </label><br><br>
      <textarea name="info" id="info" cols="30" rows="10" required></textarea><br><br>
      <label for="comment">Comments: </label><br><br>
      <textarea name="comment" id="comment" cols="30" rows="10" required></textarea><br><br>
      <label for="rating">Rating: </label><br>
      <div class="rating">
        <input type="radio" name="rating" value="5" id="5" required><label for="5">☆</label>
        <input type="radio" name="rating" value="4" id="4" required><label for="4">☆</label>
        <input type="radio" name="rating" value="3" id="3" required><label for="3">☆</label>
        <input type="radio" name="rating" value="2" id="2" required><label for="2">☆</label>
        <input type="radio" name="rating" value="1" id="1" required><label for="1">☆</label>
      </div>
      <br><br>
      <button type="submit">Submit</button><br><br><br><br><br>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="JS/Upload.js"></script>
  </div>
  
</body>



</html>