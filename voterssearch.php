<?php
include('session.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link href="bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap.min.js"></script>
</head>

<body>
<div class="">

    <div class="row">
    	<script src="http://code.jquery.com/jquery-latest.js"></script>
    	<script>
    		var loaded = false;
				$(document).ready(function(){
		    	$.ajaxSetup ({
		        cache: false
		    	});

	    	  if(loaded == false)
	    	  {
		    		var ajax_load = "<img src='loader.gif'/>";
	    	  	var loadUrl = "votersearchtable.php";
	        	$("#responsecontainer").html(ajax_load).load(loadUrl);
	        	loaded = true;
	      	}
				});
    	</script>
    	<div id="responsecontainer">
			</div>
    </div>
</div> <!-- /container -->
</body>
</html>
