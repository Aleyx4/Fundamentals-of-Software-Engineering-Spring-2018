<?php
   include("config.php");
   $error = "";
   $success = "";
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      $first = mysqli_real_escape_string($db,$_POST['firstname']);
      $middle = mysqli_real_escape_string($db,$_POST['middlename']);
      $last = mysqli_real_escape_string($db,$_POST['lastname']);
      $mysuffix = mysqli_real_escape_string($db,$_POST['suffix']);
      $newdob = date('Y-m-d', strtotime($_POST['dob']));
      $dob = mysqli_real_escape_string($db, $newdob);
      $sex = mysqli_real_escape_string($db,$_POST['sex']);
      $phone = mysqli_real_escape_string($db,$_POST['phonenum']);
      $email = mysqli_real_escape_string($db,$_POST['email']);
      $address = mysqli_real_escape_string($db,$_POST['streetaddress']);
      $city = mysqli_real_escape_string($db,$_POST['city']);
      $state = mysqli_real_escape_string($db,$_POST['state']);
      $zipcode = mysqli_real_escape_string($db,$_POST['zipcode']);
      $county = mysqli_real_escape_string($db,$_POST['county']);
      $licensenum = mysqli_real_escape_string($db,$_POST['licensenum']);
      $nonopidnum = mysqli_real_escape_string($db,$_POST['nonopidnum']);
      $ssn = mysqli_real_escape_string($db,$_POST['ssn']);
      
      $sql = "SELECT username FROM accounts WHERE BINARY username = '$myusername'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
      
      if($count == 0) {
         if(strlen($mypassword) > 5) {
         	if((strlen($first) > 0)&&(strlen($middle) > 0)&&(strlen($last) > 0)&&(strlen($dob) > 0)&&(strlen($sex) > 0)&&(strlen($address) > 0)&&(strlen($city) > 0)&&(strlen($state) > 0)&&(strlen($county) > 0)&&((strlen($licensenum) == 9)||(strlen($nonopidnum) == 9)||(strlen($ssn) > 0)))
         	{
            	$sql = "INSERT into accounts(username, password, accounttype, firstname, lastname, middlename, suffix, dob, sex, phonenum, email, streetaddress, city, state, zipcode, county, licensenum, nonopidnum, ssn) values ('$myusername', '$mypassword', 'voter', '$first', '$last', '$middle', '$mysuffix', '$newdob', '$sex', '$phone', '$email', '$address', '$city', '$state', '$zipcode', '$county', '$licensenum', '$nonopidnum', '$ssn')";
            	mysqli_query($db,$sql);
            	$success = "Registration Completed";
            }
            else {
            	$error = "Information Is Missing";
            }
         }
         else {
            $error = "Password Must Be At Least Five Characters Long";
         }
      }
      else {
         $error = "Login Name Already Exists";
      }
   }
?>

<html>

	<head>
		<link rel="stylesheet" type="text/css" href="registration.css">
		<title>Registration Page</title>
	</head>
   
	<body bgcolor = "#FFFFFF">

		<div align = "center">
			<div style = "width:1000px; border: solid 1px #333333; " align = "left">

				<div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Registration Form</b></div>	
				<div style = "margin:30px">               

					<form action = "" method = "post">

	               		<div class = "rform">
							<label>Username  </label><input type = "text" name = "username" class = "box"/><br/><br/>
							<label>Password  </label><input type = "password" name = "password" class = "box" /><br/><br/>
							<label>First Name  </label><input type = "text" name = "firstname" class = "box" /><label>  Middle Name  </label><input type = "text" name = "middlename" class = "box" /><label>  Last Name  </label><input type = "text" name = "lastname" class = "box" /><br/><br/>
							<label>Suffix  </label><select name = "suffix">
								<option value=""> </option>
								<option value="Sr.">Sr.</option>
								<option value="Jr.">Jr.</option>
							</select><br/><br/>
							<label>Date of Birth  </label><input type="date" name="dob"><br/><br/>
							<label>Sex  </label><select name = "sex">
								<option value=""> </option>
								<option value="m">Male</option>
								<option value="f">Female</option>
							</select><br/><br/>
							<label>Phone Number  </label><input type="number" min = "1000000000" max = "9999999999" name="phonenum"><br/><br/>
							<label>Email  </label><input type="email" name="email"><br/><br/>
							<label>Street Address  </label><input type = "text" name = "streetaddress" class = "box"/><label>City  </label><input type = "text" name = "city" class = "box"/>
							<label>State  </label><select name = "state"><br/><br/>
								<option value=""> </option>
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
							</select><br/><br/>
							<label>Zip Code  </label><input type = "number" name = "zipcode" min = "10000" max = "99999" class = "box"/><br/><br/>
							<label>County  </label><input type = "text" name = "county" class = "box"/><br/><br/>
							
							<label>Driver's License #  </label><input type = "text" name = "licensenum" class = "box"/><br/><br/>
							<br><br/>
							<label>Non-Operator ID #  </label><input type = "text" name = "nonopidnum" class = "box"/><br/><br/>
							<br><br/>
							<label>Last 4 Digits of Social Security Number  </label><input type = "number" name = "ssn" min = "1000"  max = "9999" class = "box"/><br/><br/>
							<br><br/>
		                </div>

						<br>
							<div style="text-align: center">
								<input  type = "submit" value = "  Regsiter  " align="center"/>
							</div>
						<br/>

					</form>
	               
					<div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					<div style = "font-size:11px; color:#32cd32; margin-top:10px"><?php echo $success; ?></div>
				</div>			
			</div>
		</div>

	</body>

</html>