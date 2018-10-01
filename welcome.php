<?php
   include('session.php');
?>
<html">
   
   <head>
      <meta charset="utf-8">
      <link href="bootstrap.min.css" rel="stylesheet">
      <script src="bootstrap.min.js"></script>
      <title>Welcome </title>
   </head>
   
   <body style="padding: 2%">
      <h1>Welcome <?php echo $login_session; ?>!</h1>
      <input class = "btn" type = "button" onclick = "location.href='logout.php'" value = "  Log Out  "/>
      <div style=" padding: 1%;">
      	<?php
            if($status == 'Ready')
            {






               echo '<form action = "submitelection.php" method = "post">';
               $sql = "SELECT * FROM accounts WHERE accounttype = 'voter' and BINARY username = '$login_session'";
               $result = mysqli_query($db,$sql);
               $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
               $zipcode = $row["zipcode"];

               $sql = "SELECT * FROM precincts WHERE zipcode = '$zipcode'";
               $result = mysqli_query($db,$sql);
               $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
               $city = $row["city"];
               $county = $row["county"];
               $state = $row["state"];

               $sql = "SELECT * FROM elections WHERE ((city = '$city' and state = '$state') or city = 'N/A') and startdate < CURRENT_TIMESTAMP() and enddate > CURRENT_TIMESTAMP()";






               foreach($db->query($sql) as $row) {

                        $position = $row['position'];
                       $city = $row['city'];
                       $state = $row['state'];
                       $electionid = $row['id'];
                       if (($state == "N/A") && ($city == "N/A")) {
                           $sql2 = "SELECT * FROM candidates WHERE position = '$position'";
                       } else {
                           $sql2 = "SELECT * FROM candidates WHERE position = '$position' and city = '$city' and state = '$state'";
                       }


                        $sqlparticipant = "SELECT * FROM electionparticipants WHERE username = '$login_session'";

                        $isparticipant = FALSE;

                        $participant = $db->query($sqlparticipant);


                        if(mysqli_num_rows($participant) != 0) {

                            foreach ($db->query($sqlparticipant) as $rows){
                                if($rows['electionid']==$electionid){
                                    $isparticipant = TRUE;
                                }
                            }
                        } else {
                            $isparticipant = FALSE;
                        }

                       if ($isparticipant){

                           echo "<p> You already participated in the election of $position";
                       }
                       else {

                           echo '</br>';
                           echo "<input type=\"text\" name=\"username\" value=\"$login_session\" readonly>";
                           echo "<input type=\"text\" name=\"electionid\" value=\"$electionid\" readonly>";
                           $fieldsetid =  $row['position'];
                           $fieldsetid .= $row['id'];
                           echo "<input type=\"text\" name=\"candidate\" value=\"$fieldsetid\" readonly>";
                           echo "<fieldset id='$fieldsetid'";
                           echo "<label>";
                           echo $row['position'];
                           echo "</label>";
                           echo '</br>';
                           echo "</br>";
                           foreach ($db->query($sql2) as $row2) {
                               echo '<label>';
                               $name = $row2['name'];
                               echo "<input style=\"margin-right: 1%; margin-bottom: 0.25%;\" type=\"radio\" value=\"$name\" name=\"radio\">";
                               echo $row2['name'] . " (" . $row2['party'] . ")";
                               echo '</label>';
                           }
                           echo '</fieldset>';

                           echo '</br>';
                           echo '<input class="btn" type = "submit" value = "  Submit  "/>';
                           echo '</br>';
                           echo '</form>';



                       }



               }








            }
            elseif ($status == 'Denied')
            {
               echo '</br>';
               echo '<h1 align="center" style="color: red">Permission Denied</h1>';
            }
            elseif ($status == 'Validate')
            {
               echo '</br>';
               echo '<h1 align="center">Please See A Manager For Assistance</h1>';
            }
            else
            {
               echo '</br>';
               echo '<h1 align="center">Error Code 01: Please See A Manager For Assistance</h1>';
            }
      	?>
      </div>
   </body>
   
</html>