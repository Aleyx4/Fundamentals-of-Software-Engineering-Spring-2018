<?php
include('session.php');
 
$id = null;
if ( !empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}
 
if ( null==$id ) {
    header("Location: precincts.php");
}
 
if (!empty($_POST)) {
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
        $sql = "UPDATE precincts SET precinctname='$precinctname', city='$city', county='$county', state='$state', zipcode='$zipcode' WHERE id = '$id'";
 
        if ($db->query($sql) === TRUE) {
        } else {
            echo "Error: " . $sql . "<br>" . $db->error;
        }
        echo "<script>javascript:window.close()</script>";
    }
 
}
else{
 
    $sql = "SELECT id, precinctname, city, county, state, zipcode FROM precincts WHERE id = '$id'";
    $result = $db->query($sql);
 
    if ($result->num_rows > 0) {
 
        $row = $result->fetch_assoc();
        $precinctname = $row["precinctname"];
        $city = $row["city"];
        $county = $row["county"];
        $state = $row["state"];
        $zipcode = $row["zipcode"];
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
            <h3>Update a Precinct</h3>
        </div>
 
        <form class="form-horizontal" action="updateprecinct.php?id=<?php echo $id?>" method="post">
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
                    <select name = "state"><br/><br/>
                      <option value="<?php echo !empty($state)?$state:'';?>"><?php echo !empty($state)?$state:'';?></option>
                      <option value="AL">AL</option>
                      <option value="AK">AK</option>
                      <option value="AZ">AZ</option>
                      <option value="AR">AR</option>
                      <option value="CA">CA</option>
                      <option value="CO">CO</option>
                      <option value="CT">CT</option>
                      <option value="DE">DE</option>
                      <option value="FL">FL</option>
                      <option value="GA">GA</option>
                      <option value="HI">HI</option>
                      <option value="ID">ID</option>
                      <option value="IL">IL</option>
                      <option value="IA">IA</option>
                      <option value="KS">KS</option>
                      <option value="KY">KY</option>
                      <option value="LA">LA</option>
                      <option value="ME">ME</option>
                      <option value="MD">MD</option>
                      <option value="MA">MA</option>
                      <option value="MI">MI</option>
                      <option value="MN">MN</option>
                      <option value="MS">MS</option>
                      <option value="MO">MO</option>
                      <option value="MT">MT</option>
                      <option value="NE">NE</option>
                      <option value="NV">NV</option>
                      <option value="NH">NH</option>
                      <option value="NJ">NJ</option>
                      <option value="NM">NM</option>
                      <option value="NY">NY</option>
                      <option value="NC">NC</option>
                      <option value="ND">ND</option>
                      <option value="OH">OH</option>
                      <option value="OK">OK</option>
                      <option value="OR">OR</option>
                      <option value="PA">PA</option>
                      <option value="RI">RI</option>
                      <option value="SC">SC</option>
                      <option value="SD">SD</option>
                      <option value="TN">TN</option>
                      <option value="TX">TX</option>
                      <option value="UT">UT</option>
                      <option value="VT">VT</option>
                      <option value="VA">VA</option>
                      <option value="WA">WA</option>
                      <option value="WV">WV</option>
                      <option value="WI">WI</option>
                      <option value="WY">WY</option>
                    </select>
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
                <button type="submit" class="btn btn-success">Update</button>
                <a class="btn" href="javascript:window.close()">Cancel</a>
            </div>
        </form>
    </div>
 
</div> <!-- /container -->
</body>
</html>