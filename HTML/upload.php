<?php
$appname = $_POST['appname'];
$appsize = $_POST['downloadsize'];
$emc = $_POST['emc'];
$emsf = $_POST['sizeform'];
$applogo = $_FILES['appclick']['name'][0];
$applogosize = $_FILES['appclick']['size'][0];
$applogotmpname = $_FILES['appclick']['tmp_name'][0];
$applogofiletype = $_FILES['appclick']['type'][0];
move_uploaded_file($applogotmpname,"./ImagesFromUser/Application/". $applogo);
$applink = $_POST['applink'];
$genre = $_POST['genre'];
$appgenretype = $_POST['appdropdown'];
$gamegenretype = $_POST['gdd'];
$devcom = $_POST['devcom'];
$devcomp = "";
foreach ($devcom as $item) {
  $devcomp .= $item;
}
$summary = $_POST['info'];
$comment = $_POST['comment'];
$rating = $_POST['rating'];
$con = new mysqli('localhost', 'root', '', 'fand');
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
} else {
  $sqlqry = $con->prepare("INSERT INTO `app_upload` (`appname`, `appsize`, `emc`, `emsf`, `applogo` , `applink` , `genre`, `appgenretype`, `gamegenretype`, `devcomp`, `summary`, `comment`, `rating`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?);");
  $sqlqry->bind_param("siisssssssssi", $appname, $appsize, $emc, $emsf, $applogo, $applink, $genre, $appgenretype, $gamegenretype, $devcomp, $summary, $comment, $rating);
  $sqlqry->execute();
  $sqlqry->close();
  $con->close();
  header('Location: http://localhost/cwh/fand/html/Review.html');
}
?>