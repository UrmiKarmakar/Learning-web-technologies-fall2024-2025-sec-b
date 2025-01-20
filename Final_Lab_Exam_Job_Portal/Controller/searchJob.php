<?php
include_once '../model/jobdb.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = isset($_POST['title']) ? trim($_POST['title']) : '';

    if (empty($title)) {
        echo "<p>Please enter a job title to search.</p>";
        exit();
    }

    $jobs = searchJob($title);

    if ($jobs && count($jobs) > 0) {
        echo "<table border='1'>
                <tr>
                    <th>Title</th>
                    <th>Company</th>
                    <th>Location</th>
                    <th>Actions</th>
                </tr>";
        foreach ($jobs as $job) {
            echo "<tr>
                    <td>" . htmlspecialchars($job['title']) . "</td>
                    <td>" . htmlspecialchars($job['company']) . "</td>
                    <td>" . htmlspecialchars($job['location']) . "</td>
                    <td>
                        <a href='edit_job.php?id=" . $job['id'] . "'>Edit</a>
                        <a href='delete_job.php?id=" . $job['id'] . "' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                    </td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No jobs found.</p>";
    }
}
?>
