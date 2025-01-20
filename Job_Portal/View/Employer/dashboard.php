<?php
session_start();
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'employer') {
    header("Location: ../login.php"); // Redirect to login if not an employer
    exit();
}
include_once '../../model/jobdb.php'; // Assuming you have a jobdb.php file to handle job data

$jobs = readJobs(); // Fetch all jobs
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employer Dashboard</title>
</head>
<body>
    <div class="container">
        <h1>Welcome, Employer</h1>
        <?php 
        if($_SESSION['massage'] != '') {
            echo  $_SESSION['massage'];
            $_SESSION['massage'] = '';
         } ?>

        <!-- Add Job Button -->
        <a href="job.php?action=add" >Add Job</a>
        <a href="../../controller/logout.php">Logout</a>


        <h2>Job List</h2>
        <table border="1">
            <tr>
                <th>Title</th>
                <th>Company</th>
                <th>Location</th>
                <th>salary</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($jobs as $job) { ?>
                <tr>
                    <td><?= $job['title'] ?></td>
                    <td><?= $job['company'] ?></td>
                    <td><?= $job['location'] ?></td>
                    <td><?= $job['salary'] ?></td>
                    <td>
                        <a href="job.php?action=edit&id=<?= $job['id'] ?>">Edit</a>
                        <a href="../../controller/jobController.php?action=delete&id=<?= $job['id'] ?>" onclick="return confirm('Are you sure you want to delete this job?')">Delete</a>
                    </td>
                    

                </tr>
            <?php } ?>
        </table>
    </div>


</body>
</html>
