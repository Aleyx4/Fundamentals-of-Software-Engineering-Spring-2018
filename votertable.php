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
<div style="padding-right: 25px">
    <div class="row">
        <h3>Voter Manager</h3>
    </div>
    <div class="row">
        <p>
          <a class="btn btn-success" href="createvoter.php" target="_blank">Create</a>
        </p>
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
            $sql = 'SELECT * FROM accounts WHERE accounttype = "voter" ORDER BY lastname, firstname DESC';
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
            ?>
            </tbody>
        </table>
    </div>
</div> <!-- /container -->
</body>
</html>
