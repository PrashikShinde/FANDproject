<style>
    th,td{
    border: 2px solid #ccc;
    background: #040013;
    color: rgb(189, 255, 233);
    align-content: center;
    text-align: center; 
    font-size: larger;
    word-wrap: break-word;
    width: 200px;
    }
</style>

<h1 title="Last 3 application added to this site" style="left: 37%;position: relative;margin-top: 15%;color: aquamarine;">Latest 3 Application</h1>
<?php 
//
$con = new mysqli('localhost', 'root', '', 'fand');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} else {
    $sql = "SELECT * FROM `app_upload` ORDER BY `dt` DESC LIMIT 3";
    $result = $con->query($sql);
    $con->close();

}
?>

<div style="color: aqua;left: 20%; position: relative;">
    <table>
        <tr>
            <th>App Name</th>
            <th>App Genre</th>
            <th>Rating</th>
            <th>View/Edit</th>
        </tr>
        <?php while ($rows = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $rows['appname']; ?></td>
            <?php if ($rows['genre'] == 'app') : ?>
            <td><?php echo $rows['genre'] . " : ". $rows['appgenretype']; ?></td>
            <?php elseif ($rows['genre']=='game') : ?>
            <td><?php echo $rows['genre'] . " : ". $rows['gamegenretype']; ?></td>
            <?php endif; ?>
            <td><?php echo $rows['rating']; ?></td>
            <td><button onclick="window.location.href='./IndividualAppReview.php?id=<?= $rows['aid'] ?>'">View/Edit
        </button></td>
        </tr>
        <?php } ?>  
    </table>
</div>



<h1 title="Last 3 news added to this site" style="left: 40%;position: relative;margin-top: 15%;color: aquamarine;">Latest 3 News</h1>
<?php 
//
$con = new mysqli('localhost', 'root', '', 'fand');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} else {
    $sql = "SELECT * FROM `news_upload` ORDER BY `dt` DESC LIMIT 3";
    $result = $con->query($sql);
    $con->close();

}
?>

<div style="color: aqua;left: 15%; position: relative;">
    <table>
        <tr>
            <th>News HeadLine</th>
            <th>News Genre</th>
            <th>Date Of Incident</th>
            <th>Rating</th>
            <th>View/Edit</th>
        </tr>
        <?php while ($rows = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $rows['title']; ?></td>
            <td><?php echo $rows['ngenre']; ?></td>
            <td><?php echo $rows['doi']; ?></td>
            <td><?php echo $rows['nrating']; ?></td>
            <td><button onclick="window.location.href='./IndividualNewsReview.php?id=<?= $rows['nid'] ?>'">View/Edit
        </button></td>
        </tr>
        <?php } ?>  
    </table>
</div>