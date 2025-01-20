<?php
session_start();
include_once '../model/userdb.php'; // Include the employer model

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST['action'] ?? '';
    $action = 'add';

    if ($action === 'add') {
        // Retrieve form data
        $name = $_POST['name'] ?? '';
        $company = $_POST['company'] ?? '';
        $contact = $_POST['contact'] ?? '';
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        // Validate input
        if (!empty($name) && !empty($company) && !empty($contact) && !empty($username) && !empty($password)) {
            // Create the employer
            $result = createEMP($name, $company, $contact, $username, $password);

            if ($result) {
                $_SESSION['success'] = "Employer added successfully!";
            } else {
                $_SESSION['error'] = "Failed to add employer!";
            }
        } else {
            $_SESSION['error'] = "All fields are required!";
        }
    }

    if ($action === 'edit') {
        // Retrieve form data
        $id = $_POST['id'] ?? 0;
        $name = $_POST['name'] ?? '';
        $company = $_POST['company'] ?? '';
        $contact = $_POST['contact'] ?? '';

        // Validate input
        if (!empty($id) && !empty($name) && !empty($company) && !empty($contact)) {
            $result = updateEMP($id, $name, $company, $contact);
            if ($result) {
                $_SESSION['success'] = "Employer updated successfully!";
            } else {
                $_SESSION['error'] = "Failed to update employer!";
            }
        } else {
            $_SESSION['error'] = "All fields are required!";
        }
    }
}

// Handle delete operation
if ($_GET['action'] === 'delete' && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $result = deleteEMP($id);

    if ($result) {
        $_SESSION['success'] = "Employer deleted successfully!";
    } else {
        $_SESSION['error'] = "Failed to delete employer!";
    }
}

// Redirect back to the employer list page
header("Location: ../view/admin/dashboard.php");
exit();
?>
