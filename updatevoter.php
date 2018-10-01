<?php
include('session.php');
 
$id = null;
if ( !empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}
 
if ( null==$id ) {
    header("Location: voters.php");
}
 
if (!empty($_POST)) {
    // keep track validation errors
    $usernameError = null;
    $passwordError = null;
    $firstnameError = null;
    $lastnameError = null;
    $middlenameError = null;
    $zipcodeError = null;
    $stateError = null;
    $statusError = null;
 
    // keep track post values
    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $middlename = $row["middlename"];
    $zipcode = $_POST['zipcode'];
    $state = $_POST['state'];
    $status = $_POST['status'];
 
    // validate input
    $valid = true;

    if (empty($password)) {
        $passwordError = 'Please enter a password';
        $valid = false;
    }

    if (empty($firstname)) {
        $firstnameError = 'Please enter a first name';
        $valid = false;
    }
 
    if (empty($lastname)) {
        $lastnameError = 'Please enter a last name';
        $valid = false;
    }
 
    if (empty($middlename)) {
        $middlenameError = 'Please enter a middle name';
        $valid = false;
    }

    if (empty($zipcode)) {
        $zipcodeError = 'Please enter a zip code';
        $valid = false;
    }

    if (empty($state)) {
        $stateError = 'Please enter a state';
        $valid = false;
    }

    if (empty($status)) {
        $statusError = 'Please enter a status';
        $valid = false;
    }
 
    // insert data
    if ($valid) {
        $sql = "UPDATE accounts SET password='$password', firstname='$firstname', lastname='$lastname', middlename='$middlename', zipcode='$zipcode', status='$status' WHERE username = '$id'";
 
        if ($db->query($sql) === TRUE) {
        } else {
            echo "Error: " . $sql . "<br>" . $db->error;
        }
        echo "<script>javascript:window.close()</script>";
    }
 
}
else{
 
    $sql = "SELECT * FROM accounts WHERE username = '$id'";
    $result = $db->query($sql);
 
    if ($result->num_rows > 0) {
 
        $row = $result->fetch_assoc();
        $username = $row["username"];
        $password = $row["password"];
        $firstname = $row["firstname"];
        $lastname = $row["lastname"];
        $middlename = $row["middlename"];
        $zipcode = $row["zipcode"];
        $state = $row["state"];
        $status = $row['status'];
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
            <h3>Update a Voter</h3>
        </div>
 
        <form class="form-horizontal" action="updatevoter.php?id=<?php echo $id?>" method="post">
            <div class="control-group <?php echo !empty($usernameError)?'error':'';?>">
                <label class="control-label">Username</label>
                <div class="controls">
                    <input name="username" type="text"  placeholder="Username" value="<?php echo !empty($username)?$username:'';?>" disabled>
                </div>
            </div>
            <div class="control-group <?php echo !empty($passwordError)?'error':'';?>">
                <label class="control-label">Password</label>
                <div class="controls">
                    <input name="password" type="password" placeholder="Password" value="<?php echo !empty($password)?$password:'';?>">
                    <?php if (!empty($passwordError)): ?>
                        <span class="help-inline"><?php echo $passwordError;?></span>
                    <?php endif;?>
                </div>
            </div>
            <div class="control-group <?php echo !empty($firstnameError)?'error':'';?>">
                <label class="control-label">First Name</label>
                <div class="controls">
                    <input name="firstname" type="text" placeholder="First Name" value="<?php echo !empty($firstname)?$firstname:'';?>">
                    <?php if (!empty($firstnameError)): ?>
                        <span class="help-inline"><?php echo $firstnameError;?></span>
                    <?php endif;?>
                </div>
            </div>
            <div class="control-group <?php echo !empty($middlenameError)?'error':'';?>">
                <label class="control-label">Middle Name</label>
                <div class="controls">
                    <input name="middlename" type="text" placeholder="Middle Name" value="<?php echo !empty($middlename)?$middlename:'';?>">
                    <?php if (!empty($middlenameError)): ?>
                        <span class="help-inline"><?php echo $middlenameError;?></span>
                    <?php endif;?>
                </div>
            </div>
            <div class="control-group <?php echo !empty($lastnameError)?'error':'';?>">
                <label class="control-label">Last Name</label>
                <div class="controls">
                    <input name="lastname" type="text"  placeholder="Last Name" value="<?php echo !empty($lastname)?$lastname:'';?>">
                    <?php if (!empty($lastnameError)): ?>
                        <span class="help-inline"><?php echo $lastnameError;?></span>
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
            <div class="control-group <?php echo !empty($statusError)?'error':'';?>">
                    <label class="control-label">Status</label>
                    <div class="controls">
                    <select name = "status"><br/><br/>
                      <option value="<?php echo !empty($status)?$status:'';?>"><?php echo !empty($status)?$status:'';?></option>
                      <option value="Validate">Validate</option>
                      <option value="Denied">Denied</option>
                      <option value="Ready">Ready</option>
                    </select>
                    <?php if (!empty($statusError)): ?>
                        <span class="help-inline"><?php echo $statusError;?></span>
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