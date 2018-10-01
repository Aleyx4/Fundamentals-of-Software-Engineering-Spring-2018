<?php
	include('session.php');
	$street = $_GET['street'];
	$first = $_GET['first'];
	$last = $_GET['last'];
	$state = $_GET['state'];
	$street = str_replace("_", " ", $street);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link href="bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap.min.js"></script>
</head>

<body>
<div style="padding-right: 25px">
    <div class="row">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Street Address</th>
                <th>City</th>
                <th>State</th>
                <th>SSN</th>
                <th>License Number</th>
                <th>Non-Operator ID</th>
                <th>Voter Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

            <?php
            	$count = 0;
            	$sql = "SELECT * FROM accounts WHERE (";
            	if(!empty($first))
            	{
            		if($count > 0)
            		{
            			$sql.=" and ";
            		}
            		$sql.= "firstname = '$first'";
            		$count++;
            	}
            	if(!empty($last))
            	{
            		if($count > 0)
            		{
            			$sql.= " and ";
            		}
            		$sql.= "lastname = '$last'";
            		$count++;
            	}
            	if(!empty($street))
            	{
            		if($count > 0)
            		{
            			$sql.= " and ";
            		}
            		$sql.= "streetaddress = '$street'";
            		$count++;
            	}
            	if(!empty($state))
            	{
            		if($count > 0)
            		{
            			$sql.= " and ";
            		}
            		$sql.= "state = '$state'";
            		$count++;
            	}
            	$sql.= ") and accounttype = 'voter' ORDER BY lastname, firstname DESC";
            	if($count != 0)
            	{
	            	foreach ($db->query($sql) as $row) {
	                echo '<tr>';
	                echo '<td>'. $row['lastname'] . '</td>';
	                echo '<td>'. $row['firstname'] . '</td>';
	                echo '<td>'. $row['streetaddress'] . '</td>';
	                echo '<td>'. $row['city'] . '</td>';
	                echo '<td>'. $row['state'] . '</td>';
	                echo '<td>'. $row['ssn'] . '</td>';
	                echo '<td>'. $row['licensenum'] . '</td>';
	                echo '<td>'. $row['nonopidnum'] . '</td>';
	                echo '<td>'. $row['status'] . '</td>';
	                echo '<td width=250>';
	                echo '<a class="btn" href="readvoter.php?id='.$row['username'].'" target="_blank">Read</a>';
	                echo ' ';
	                echo '<a class="btn btn-success" href="updatevoter.php?id='.$row['username'].'" target="_blank">Update</a>';
	                echo ' ';
	                echo '<a class="btn btn-danger" href="deletevoter.php?id='.$row['username'].'" target="_blank">Delete</a>';
	                echo '</td>';
	                echo '</tr>';
	              }
            	}
            ?>
            </tbody>
        </table>
    </div>
</div> <!-- /container -->
</body>
</html>
