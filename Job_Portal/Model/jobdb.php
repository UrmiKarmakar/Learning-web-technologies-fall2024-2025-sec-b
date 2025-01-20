<?php
include_once 'database.php'; // Include the database connection file

// Create a new job
function createJob($title, $company, $location, $salary) {

    if (empty($title) || empty($company) || empty($location) || empty($salary)) {
        return false;
    }
    ECHO "INSERT INTO jobs VALUES (null,'$title', '$company', '$location', '$salary')";
    

    $query = "INSERT INTO jobs VALUES (null,'$company', '$title', '$location', '$salary')";
    return execute($query);
}

// Read all jobs
function readJobs() {
    $query = "SELECT * FROM jobs";
    return get($query);
}

// Read one job
function readJob($id) {
    $id = intval($id);
    $query = "SELECT * FROM jobs WHERE id = '$id'";
    return get($query);
}

// Update a job
function updateJob($id, $title, $company, $location, $salary) {
    $id = intval($id);

    if (empty($title) || empty($company) || empty($location) || empty($salary)) {
        return false;
    }

    $query = "UPDATE jobs SET title = '$title', company = '$company', location = '$location', salary = '$salary' WHERE id = '$id'";
    return execute($query);
}

// Delete a job
function deleteJob($id) {
    $id = intval($id);
    $query = "DELETE FROM jobs WHERE id = '$id'";
    return execute($query);
}

// Search jobs by title (AJAX)
function searchJob($title) {
    if (empty($title)) {
        return false;
    }
    
    $query = "SELECT * FROM jobs WHERE title LIKE '%$title%'";
    return get($query);
}
?>
