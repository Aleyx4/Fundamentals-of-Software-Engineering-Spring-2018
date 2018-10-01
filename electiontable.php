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
<div class="container">
    <div class="row">
        <h3>Election Manager</h3>
    </div>
    <div class="row">
        <p>
            <a class="btn btn-success" href="createelection.php" target="_blank">Create</a>
        </p>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Election Position</th>
                <th>State</th>
                <th>City</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

            <?php
            $sql = 'SELECT * FROM elections ORDER BY position DESC';
            foreach ($db->query($sql) as $row) {
                echo '<tr>';
                echo '<td>'. $row['position'] . '</td>';
                echo '<td>'. $row['state'] . '</td>';
                echo '<td>'. $row['city'] . '</td>';
                echo '<td>'. $row['startdate'] . '</td>';
                echo '<td>'. $row['enddate'] . '</td>';
                echo '<td width=250>';
                echo '<a class="btn" href="readelection.php?id='.$row['id'].'" target="_blank">Read</a>';
                echo ' ';
                echo '<a class="btn btn-success" href="updateelection.php?id='.$row['id'].'" target="_blank">Update</a>';
                echo ' ';
                echo '<a class="btn btn-danger" href="deleteelection.php?id='.$row['id'].'" target="_blank">Delete</a>';
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
