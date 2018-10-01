<?php
   include("config.php");
   session_start();
   $error = "";
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);
      $mypassword = sha1($mypassword);
      
      $sql = "SELECT * FROM accounts WHERE BINARY username = '$myusername' and BINARY password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      
      if($count == 1) {
         $account = $row["accounttype"];
         $_SESSION[$myusername] =  $GLOBALS[$myusername];
         $_SESSION['login_user'] = $myusername;
         
         if($account == "admin")
         {
            header("location: admin.php");
         }
         else if($account == "manager")
         {
            header("location: manager.php");
         }
         else
         {
            header("location: welcome.php");
         }
      }
      else {
         $error = "Your Login Name Or Password Is Invalid";
      }
   }
?>

<html>
  <style type = "text/css">
    body {
      font-family:Arial, Helvetica, sans-serif;
      font-size:14px;
    }
    label {
      font-weight:bold;
      width:100px;
      font-size:14px;
    }
    .box {
      border:#666666 solid 1px;
    }
    div.padding {
    	padding-top: 50px;
	  }
    </style>
    <div class="padding">
    <head>
    	<meta charset="utf-8">
    	<link href="bootstrap.min.css" rel="stylesheet">
    	<script src="bootstrap.min.js"></script>
      <title>Login Page</title>
    </head>
   
    <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>Username  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input class="btn" type = "submit" value = "  Login  "/>
                  <input class="btn" type = "button" onclick = "register()" value = "  Register  "/>
                </br>
                  <a href = "forgotPassword.php" target = "_self">Forgot Password?</a>
                  <script>
                     function register() {
                        window.open("register.php");
                     }
                  </script>
                  <br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>

    </body>
    </div>
  </html>