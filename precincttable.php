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
        <h3>Precinct Manager</h3>
    </div>
    <div class="row">
        <p>
            <a class="btn btn-success" href="createprecinct.php" target="_blank">Create</a>
        </p>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Precinct Name</th>
                <th>City</th>
                <th>County</th>
                <th>State</th>
                <th>Zip Code</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

            <?php
            $sql = 'SELECT * FROM precincts ORDER BY precinctname DESC';
            foreach ($db->query($sql) as $row) {
                echo '<tr>';
                echo '<td>'. $row['precinctname'] . '</td>';
                echo '<td>'. $row['city'] . '</td>';
                echo '<td>'. $row['county'] . '</td>';
                echo '<td>'. $row['state'] . '</td>';
                echo '<td>'. $row['zipcode'] . '</td>';
                echo '<td width=250>';
                echo '<a class="btn" href="readprecinct.php?id='.$row['id'].'" target="_blank">Read</a>';
                echo ' ';
                echo '<a class="btn btn-success" href="updateprecinct.php?id='.$row['id'].'" target="_blank">Update</a>';
                echo ' ';
                echo '<a class="btn btn-danger" href="deleteprecinct.php?id='.$row['id'].'" target="_blank">Delete</a>';
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
