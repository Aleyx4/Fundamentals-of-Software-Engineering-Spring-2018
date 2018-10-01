<?php
include ('session.php');

$id = null;
if ( !empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if ( null==$id ) {
    header("Location: precincts.php");
} else {

    $sql = "SELECT id, precinctname, city, county, state, zipcode FROM precincts WHERE id = '$id'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();
    } else {
        echo "0 results";
    }
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
            <h3>Read a Precinct</h3>
        </div>

        <div class="form-horizontal" >
            <div class="control-group">
                <label class="control-label">Precinct Name:</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $row["precinctname"];?>
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">City:</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $row["city"];?>
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">County:</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $row["county"];?>
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">State:</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $row["state"];?>
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Zip Code:</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $row["zipcode"];?>
                    </label>
                </div>
            </div>
            <div class="form-actions">
                <button class="btn" onclick="javascript:window.close()">Close</button>
            </div>
        </div>
    </div>

</div> <!-- /container -->
</body>
</html>