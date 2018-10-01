<?php
include('session.php');


if ( !empty($_POST)) {
    // keep track validation errors
    $candidatenameError = null;
    $partyError = null;
    $positionError = null;
    $stateError = null;
    $cityError = null;

    // keep track post values
    $name = $_POST['name'];
    $party = $_POST['party'];
    $position = $_POST['position'];
    $state = $_POST['state'];
    $city = $_POST['city'];

    // validate input
    $valid = true;
    if (empty($name)) {
        $candidatenameError = 'Please enter Candidate name';
        $valid = false;
    }

    if (empty($party)) {
        $partyError = 'Please enter a party';
        $valid = false;
    }

    if (empty($position)) {
        $positionError = 'Please enter a position';
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

    // insert data
    if ($valid) {
        $sql = "INSERT INTO candidates (name , party, position, state, city)
          VALUES ('$name', '$party', '$position', '$state', '$city')";

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
            <h3>Create a Candidate</h3>
        </div>

        <form class="form-horizontal" action="createcandidate.php" method="post">
            <div class="control-group <?php echo !empty($candidatenameError)?'error':'';?>">
                <label class="control-label">Candidate Name</label>
                <div class="controls">
                    <input name="name" type="text"  placeholder="Candidate Name" value="<?php echo !empty($name)?$name:'';?>">
                    <?php if (!empty($candidatenameError)): ?>
                        <span class="help-inline"><?php echo $candidatenameError;?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="control-group <?php echo !empty($partyError)?'error':'';?>">
                <label class="control-label">Party Affliation</label>
                <div class="controls">
                    <input name="party" type="text" placeholder="Party" value="<?php echo !empty($party)?$party:'';?>">
                    <?php if (!empty($partyError)): ?>
                        <span class="help-inline"><?php echo $partyError;?></span>
                    <?php endif;?>
                </div>
            </div>
            <div class="control-group <?php echo !empty($positionError)?'error':'';?>">
                <label class="control-label">Position</label>
                <div class="controls">
                    <input name="position" type="text"  placeholder="Position" value="<?php echo !empty($position)?$position:'';?>">
                    <?php if (!empty($positionError)): ?>
                        <span class="help-inline"><?php echo $positionError;?></span>
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
            <div class="control-group <?php echo !empty($cityError)?'error':'';?>">
                <label class="control-label">City</label>
                <div class="controls">
                    <input name="city" type="text"  placeholder="City" value="<?php echo !empty($city)?$city:'';?>">
                    <?php if (!empty($cityError)): ?>
                        <span class="help-inline"><?php echo $cityError;?></span>
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