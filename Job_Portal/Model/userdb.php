<?php
include_once 'database.php'; // Include the database connection file

// Create a new user
function createEMP($name, $company, $contact, $username, $password) {

    if (empty($name) || empty($company) || empty($contact) || empty($username) || empty($password)) {
        return false;
    }
    

    $query = "INSERT INTO users VALUES(NULL, '$name', '$company', '$contact', '$username', '$password', 'employer')";
    return execute($query);
}

// Read all employes
function readEMP() {
    $query = "SELECT * FROM users WHERE role = 'employer'";
    return get($query);
}

// Read one employer
function readOneEMP($id) {
    $id = intval($id);
    $query = "SELECT * FROM users WHERE id = '$id'";
    return get($query);
}

// Update an employer
function updateEMP($id, $name, $company, $contact) {
    $id = intval($id);

    if (empty($name) || empty($company) || empty($contact)) {
        return false;
    }

    $query = "UPDATE users SET name = '$name', company = '$company', contact = '$contact' WHERE id = '$id'";
    return execute($query);
}

// Delete an employer
function deleteEMP($id) {
    $id = intval($id);
    $query = "DELETE FROM users WHERE id = '$id'";
    return execute($query);
}

// Search employers by name (AJAX)
function searchEMP($name) {
    if (empty($name)) {
        return false;
    }
    
    $query = "SELECT * FROM users WHERE name LIKE '%$name%' AND role = 'employer'";
    return get($query);
}
?>
