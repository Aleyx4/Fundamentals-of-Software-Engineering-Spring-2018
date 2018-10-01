<?php
   include('session.php');
?>



<html">
   <style type = "text/css">
     div.paddingleft {
       padding-left: 50px;
     }
  </style> 
<div class="paddingleft">
  <head>
    <meta charset="utf-8">
    <link href="bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap.min.js"></script>
    <title>Admin Dashboard</title>
  </head>
  
  <body>
    <h1>Welcome <?php echo $login_session; ?></h1> 
    <input type = "button" class="btn" onclick = "location.href='logout.php'" value = "  Log Out  "/>
    <button class="btn" id="precincts">Precincts</button>
    <button class="btn" id="candidates">Candidates</button>
    <button class="btn" id="elections">Elections</button>
    <button class="btn" id="voters">All Voters</button>
    <button class="btn" id="searchvoter">Voter Search</button>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script>
		$(document).ready(function(){
    	$.ajaxSetup ({
        cache: false
    	});
    	var ajax_load = "<img src='loader.gif'/>";
    	$("#precincts").click(function(){
    	  var loadUrl = "precincts.php";
        $("#responsecontainer").html(ajax_load).load(loadUrl);
    	});
    	$("#candidates").click(function(){
    	  var loadUrl = "candidates.php";
        $("#responsecontainer").html(ajax_load).load(loadUrl);
    	});
      $("#elections").click(function(){
        var loadUrl = "elections.php";
        $("#responsecontainer").html(ajax_load).load(loadUrl);
      });
      $("#voters").click(function(){
        var loadUrl = "voters.php";
        $("#responsecontainer").html(ajax_load).load(loadUrl);
      });
      $("#searchvoter").click(function(){
        var loadUrl = "voterssearch.php";
        $("#responsecontainer").html(ajax_load).load(loadUrl);
      });

		});
		</script>
		<div id="responsecontainer">
		</div>
  </body>
   
</html>