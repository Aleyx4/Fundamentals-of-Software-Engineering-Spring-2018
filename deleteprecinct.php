<?php
include ('session.php');
$id = 0;
 
if ( !empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}
 
if ( !empty($_POST)) {
    // keep track post values
    $id = $_POST['id'];
 
    // delete data
 
    $sql = "DELETE FROM precincts  WHERE id = '$id'";
    if ($db->query($sql) === TRUE) {
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
    echo "<script>javascript:window.close()</script>";
 
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap.min.js"></script>
</head>
 
<body>
<div class="container">
 
    <div class="span10 offset1">
        <div class="row">
            <h3>Delete a Precinct</h3>
        </div>
 
        <form class="form-horizontal" action="deleteprecinct.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id;?>"/>
            <p class="alert alert-error">Are you sure you want to delete this precinct?</p>
            <div class="form-actions">
                <button type="submit" class="btn btn-danger">Yes</button>
                <button class="btn" onclick="javascript:window.close()">Cancel</button>
            </div>
        </form>
    </div>
 
</div> <!-- /container -->
</body>
</html>