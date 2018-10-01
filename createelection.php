<?php
include('session.php');


if ( !empty($_POST)) {
    // keep track validation errors
    $positionError = null;
    $stateError = null;
    $cityError = null;
    $startdateError = null;
    $enddateError = null;

    // keep track post values
    $position = $_POST['position'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];

    // validate input
    $valid = true;
    if (empty($position)) {
        $positionError = 'Please enter Election Position name';
        $valid = false;
    }

    if (empty($state)) {
        $stateError = 'Please enter a state';
        $valid = false;
    }

    if (empty($city)) {
        $cityError = 'Please enter a city';
        $valid = false;
    }

    if (empty($startdate)) {
        $startdateError = 'Please enter a Start Date';
        $valid = false;
    }

    if (empty($enddate)) {
        $enddateError = 'Please enter a End Date';
        $valid = false;
    }

    // insert data
    if ($valid) {
        $sql = "INSERT INTO elections (position , state, city, startdate, enddate)
          VALUES ('$position', '$state', '$city', '$startdate', '$enddate')";

        if ($db->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $db->error;
        }
        echo "<script>javascript:window.close()</script>";
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
            <h3>Create a Election</h3>
        </div>

        <form class="form-horizontal" action="createelection.php" method="post">
            <div class="control-group <?php echo !empty($positionError)?'error':'';?>">
                <label class="control-label">Election Position</label>
                <div class="controls">
                    <input name="position" type="text"  placeholder="Election Position" value="<?php echo !empty($position)?$position:'';?>">
                    <?php if (!empty($positionError)): ?>
                        <span class="help-inline"><?php echo $positionError;?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="control-group <?php echo !empty($stateError)?'error':'';?>">
                <label class="control-label">State</label>
                <div class="controls">
                    <input name="state" type="text" placeholder="State" value="<?php echo !empty($state)?$state:'';?>">
                    <?php if (!empty($stateError)): ?>
                        <span class="help-inline"><?php echo $stateError;?></span>
                    <?php endif;?>
                </div>
            </div>
            <div class="control-group <?php echo !empty($cityError)?'error':'';?>">
                <label class="control-label">City</label>
                <div class="controls">
                    <input name="city" type="text"  placeholder="City" value="<?php echo !empty($city)?$city:'';?>">
                    <?php if (!empty($cityError)): ?>
                        <span class="help-inline"><?php echo $cityError;?></span>
                    <?php endif;?>
                </div>
            </div>
            <div class="control-group <?php echo !empty($startdateError)?'error':'';?>">
                <label class="control-label">Start Date</label>
                <div class="controls">
                    <input name="startdate" type="text"  placeholder="yyyy-mm-dd hh:mm:ss" value="<?php echo !empty($startdate)?$startdate:'';?>">
                    <?php if (!empty($startdateError)): ?>
                        <span class="help-inline"><?php echo $startdateError;?></span>
                    <?php endif;?>
                </div>
            </div>
            <div class="control-group <?php echo !empty($enddateError)?'error':'';?>">
                <label class="control-label">End Date</label>
                <div class="controls">
                    <input name="enddate" type="text"  placeholder="yyyy-mm-dd hh:mm:ss" value="<?php echo !empty($enddate)?$enddate:'';?>">
                    <?php if (!empty($enddateError)): ?>
                        <span class="help-inline"><?php echo $enddateError;?></span>
                    <?php endif;?>
                </div>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-success">Create</button>
                <button class="btn" onclick="javascript: window.close()">Cancel</button>
            </div>
        </form>
    </div>

</div> <!-- /container -->
</body>
</html>