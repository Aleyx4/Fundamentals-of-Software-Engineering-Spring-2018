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
        <h3>Candidate Manager</h3>
    </div>
    <div class="row">
        <p>
            <script>
                function create() {
                            window.open("createcandidate.php", "_blank", "height=400, width=600");
                            }
            </script>
            <button class="btn btn-success" onclick="create()">Create</button>
        </p>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Candidate Name</th>
                <th>Party Affiliation</th>
                <th>Position</th>
                <th>State</th>
                <th>City</th>
                <th>Votes</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

            <?php
            $sql = 'SELECT * FROM candidates ORDER BY id DESC';
            foreach ($db->query($sql) as $row) {
                echo '<tr>';
                echo '<td>'. $row['name'] . '</td>';
                echo '<td>'. $row['party'] . '</td>';
                echo '<td>'. $row['position'] . '</td>';
                echo '<td>'. $row['state'] . '</td>';
                echo '<td>'. $row['city'] . '</td>';
                echo '<td>'. $row['results'] . '</td>';
                echo '<td width=250>';
                echo '<a class="btn" href="readcandidate.php?id='.$row['id'].'" target="_blank">Read</a>';
                echo ' ';
                echo '<a class="btn btn-success" href="updatecandidate.php?id='.$row['id'].'" target="_blank">Update</a>';
                echo ' ';
                echo '<a class="btn btn-danger" href="deletecandidate.php?id='.$row['id'].'" target="_blank">Delete</a>';
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
