<?php
/**
 * Created by PhpStorm.
 * User: teagenkiel
 * Date: 4/29/18
 * Time: 10:55 AM
 */
include('session.php');

$username = $_POST['username'];
$electionid = $_POST['electionid'];

$sql = "INSERT INTO electionparticipants (username , electionID)
          VALUES ('$username', '$electionid')";

if ($db->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}

$candidatename = $_POST['radio'];
echo $candidatename;
$sql1 = "SELECT * FROM candidates WHERE name = '$candidatename'";

$sql5 = mysqli_query($db,$sql1);
$candidate = array();

while ($row_user = mysqli_fetch_assoc($sql5)) {
    $candidate[] = $row_user;
}
$pastresults = $candidate[0]['results'];
echo $pastresults;
$newresults = $pastresults + 1;
echo $newresults;
$sql2 = "UPDATE candidates SET results = '$newresults' WHERE name='$candidatename'";

if ($db->query($sql2) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql2 . "<br>" . $db->error;
}

header("Location: welcome.php");
exit;