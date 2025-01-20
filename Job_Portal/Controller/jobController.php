<?php
session_start();
include_once '../model/jobdb.php'; // Include the job model

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $action = $_POST['action'] ?? ''; // Get the action (add or edit)
    
    if ($action === 'add') {
        // Retrieve form data
        $title = $_POST['title'] ?? '';
        $company = $_POST['company'] ?? '';
        $location = $_POST['location'] ?? '';
        $salary = $_POST['salary'] ?? '';

        // Validate input
        if (!empty($title) && !empty($company) && !empty($location) && !empty($salary)) {
            // Create the job
            $result = createJob($title, $company, $location, $salary);

            if ($result) {
                $_SESSION['massage'] = "Job added successfully!";
            } else {
                $_SESSION['massage'] = "Failed to add job!";
            }
        } else {
            $_SESSION['massage'] = "All fields are required!";
        }
    }
    
    if ($action === 'edit') {
        // Retrieve form data
        $id = $_POST['id'] ?? 0;
        $title = $_POST['title'] ?? '';
        $company = $_POST['company'] ?? '';
        $location = $_POST['location'] ?? '';
        $salary = $_POST['salary'] ?? '';

        // Validate input
        
        if (!empty($title) && !empty($company) && !empty($location) && !empty($salary)) {
            $result = updateJob($id, $title, $company, $location, $salary);
            if ($result) {
                $_SESSION['massage'] = "Job updated successfully!";
            } else {
                $_SESSION['massage'] = "Failed to update job!";
            }
        } else {
            $_SESSION['message'] = "All fields are required!";
            
        }
    }
}

// Handle delete operation
if ($_GET['action'] === 'delete' && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $result = deleteJob($id);

    if ($result) {
        $_SESSION['success'] = "Job deleted successfully!";
    } else {
        $_SESSION['error'] = "Failed to delete job!";
    }
}

// Redirect back to the job list page
header("Location: ../view/employer/dashboard.php");
exit();
?>
