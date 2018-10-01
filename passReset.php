<?php
    include("config.php");
    session_start();
    $email = $_SESSION['email'];
    $error = null;

    $sql = "SELECT * FROM accounts WHERE email = '$email'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $q1 = $row['q1'];
    $q2 = $row['q2'];
    $q3 = $row['q3'];
    $username = $row['username'];

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $a1 = sha1($_POST['a1']);
        $a2 = sha1($_POST['a2']);
        $a3 = sha1($_POST['a3']);
        $p1 = sha1($_POST['p1']);
        $p2 = sha1($_POST['p2']);
        if(($a1 == $row['a1'])&&($a2 == $row['a2'])&&($a3 == $row['a3'])&&($p1 == $p2)&&(strlen($_POST['p1'])> 5))
        {
            $sql = "UPDATE accounts SET password = '$p1' WHERE username = '$username'";
            mysqli_query($db,$sql);
            header("location: login.php");
        }
        else
        {
          $error = "Something Is Incorrect Or Your Password Is Not At Least 6 Characters Long";
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
         <div style = "width:500px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Password Reset</b></div>
                
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>Email :</label><input type = "email" name = "email" class = "box" value = "<?php echo $email;?>" disabled/><br /><br />
                  <label>Security Question 1 :</label><input type = "text" name = "q1" class = "box" value = "<?php echo $q1;?>" disabled/><br /><br />
                  <label>Answer 1 :</label><input type = "text" name = "a1" class = "box" /><br /><br />
                  <label>Security Question 2 :</label><input type = "text" name = "q2" class = "box" value = "<?php echo $q2;?>" disabled/><br /><br />
                  <label>Answer 2 :</label><input type = "text" name = "a2" class = "box" /><br /><br />
                  <label>Security Question 3 :</label><input type = "text" name = "q3" class = "box" value = "<?php echo $q3;?>" disabled/><br /><br />
                  <label>Answer 3 :</label><input type = "text" name = "a3" class = "box" /><br /><br />
                  </br>
                  <label>New Password: </label><input type = "password" name = "p1" class = "box" /><br /><br />
                  <label>Confirm New Password: </label><input type = "password" name = "p2" class = "box" /><br /><br />
                  <input class="btn" type = "submit" value = "  Submit  "/>
                  <br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
                    
            </div>
                
         </div>
            
      </div>

    </body>
    </div>
  </html>