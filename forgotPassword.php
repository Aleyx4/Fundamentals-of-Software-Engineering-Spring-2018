<?php
    include("config.php");
    include("mail.php");
    session_start();

    $error = null;
    $mysqli = new mysqli('den1.mysql6.gear.host', 'team7fse', 'Mq04o~Y5M4_0', 'team7fse');

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
    //If username/email found, send email with code, and go to code page sending through their username or email
        $email = $mysqli->real_escape_string($_POST['email']);
        $sql = "SELECT email FROM accounts WHERE email = '$email'";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);

        if($count > 0)
        {
            $_SESSION['email'] = $email;
            forgotPassword($email); //sends reset email
            header("login.php");

        }
        else
        {
            $error = "Email Is Invalid";
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
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Password Recovery</b></div>
                
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>Email  :</label><input type = "email" name = "email" class = "box"/><br /><br />
                  <input class="btn" type = "submit" value = "  Reset  "/>
                  <br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
                    
            </div>
                
         </div>
            
      </div>

    </body>
    </div>
  </html>