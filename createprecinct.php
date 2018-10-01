<?php
include('session.php');


if ( !empty($_POST)) {
    // keep track validation errors
    $precinctnameError = null;
    $cityError = null;
    $countyError = null;
    $stateError = null;
    $zipcodeError = null;

    // keep track post values
    $precinctname = $_POST['precinctname'];
    $city = $_POST['city'];
    $county = $_POST['county'];
    $state = $_POST['state'];
    $zipcode = $_POST['zipcode'];

    // validate input
    $valid = true;
    if (empty($precinctname)) {
        $precinctnameError = 'Please enter Precinct name';
        $valid = false;
    }

    if (empty($city)) {
        $cityError = 'Please enter a city';
        $valid = false;
    }

    if (empty($county)) {
        $countyError = 'Please enter a county';
        $valid = false;
    }

    if (empty($state)) {
        $stateError = 'Please enter a state';
        $valid = false;
    }

    if (empty($zipcode)) {
        $zipcodeError = 'Please enter a zip code';
        $valid = false;
    }

    // insert data
    if ($valid) {
        $sql = "INSERT INTO precincts (precinctname , city, county, state, zipcode)
          VALUES ('$precinctname', '$city', '$county', '$state', '$zipcode')";

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
            <h3>Create a Precinct</h3>
        </div>

        <form class="form-horizontal" action="createprecinct.php" method="post">
            <div class="control-group <?php echo !empty($precinctnameError)?'error':'';?>">
                <label class="control-label">Precinct Name</label>
                <div class="controls">
                    <input name="precinctname" type="text"  placeholder="Precinct Name" value="<?php echo !empty($precinctname)?$precinctname:'';?>">
                    <?php if (!empty($precinctnameError)): ?>
                        <span class="help-inline"><?php echo $precinctnameError;?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="control-group <?php echo !empty($cityError)?'error':'';?>">
                <label class="control-label">City</label>
                <div class="controls">
                    <input name="city" type="text" placeholder="City" value="<?php echo !empty($city)?$city:'';?>">
                    <?php if (!empty($cityError)): ?>
                        <span class="help-inline"><?php echo $cityError;?></span>
                    <?php endif;?>
                </div>
            </div>
            <div class="control-group <?php echo !empty($countyError)?'error':'';?>">
                <label class="control-label">County</label>
                <div class="controls">
                    <input name="county" type="text"  placeholder="County" value="<?php echo !empty($county)?$county:'';?>">
                    <?php if (!empty($countyError)): ?>
                        <span class="help-inline"><?php echo $countyError;?></span>
                    <?php endif;?>
                </div>
            </div>
            <div class="control-group <?php echo !empty($stateError)?'error':'';?>">
                <label class="control-label">State</label>
                <div class="controls">
                    <input name="state" type="text"  placeholder="State" value="<?php echo !empty($state)?$state:'';?>">
                    <?php if (!empty($stateError)): ?>
                        <span class="help-inline"><?php echo $stateError;?></span>
                    <?php endif;?>
                </div>
            </div>
            <div class="control-group <?php echo !empty($zipcodeError)?'error':'';?>">
                <label class="control-label">Zip Code</label>
                <div class="controls">
                    <input name="zipcode" type="text"  placeholder="Zip Code" value="<?php echo !empty($zipcode)?$zipcode:'';?>">
                    <?php if (!empty($zipcodeError)): ?>
                        <span class="help-inline"><?php echo $zipcodeError;?></span>
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