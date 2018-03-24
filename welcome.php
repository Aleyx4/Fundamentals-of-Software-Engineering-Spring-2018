<?php
   include('session.php');
?>
<html">
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
      <h1>Welcome <?php echo $login_session; ?></h1> 
      <input type = "button" onclick = "location.href='logout.php'" value = "  Log Out  "/>
   </body>
   
</html>