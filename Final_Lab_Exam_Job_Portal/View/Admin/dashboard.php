<?php
session_start();
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') {
    header("Location: login.php"); // Redirect to login if not an admin
    exit();
}
include_once '../../model/userdb.php';

$employees = readEMP(); // Fetch all employees
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Welcome, Admin</h1>
    <!-- Add Employee Button -->
    <a href="employer.php?action=add">Add Employee</a>
    <a href="../../controller/logout.php">Logout</a>

    <h2>Search Employees</h2>
    <input type="text" id="search" placeholder="Enter employee name">
    <button onclick="searchEmployees()">Search</button>
    <div id="searchResults"></div>

    <h2>Employee List</h2>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Company</th>
            <th>Contact</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($employees as $employee) { ?>
            <tr>
                <td><?= htmlspecialchars($employee['name']) ?></td>
                <td><?= htmlspecialchars($employee['company']) ?></td>
                <td><?= htmlspecialchars($employee['contact']) ?></td>
                <td>
                    <a href="employer.php?action=view&id=<?= $employee['id'] ?>">View</a>
                    <a href="employer.php?action=edit&id=<?= $employee['id'] ?>">Edit</a>
                    <a href="../../controller/employerController.php?action=delete&id=<?= $employee['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>

    <script>
        function searchEmployees() {
            let name = document.getElementById('search').value;
            let xhttp = new XMLHttpRequest();
            xhttp.open('POST', '../../controller/searchEmployee.php', true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("name=" + name);

            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById('searchResults').innerHTML = this.responseText;
                }
            };
        }
    </script>

</body>
</html>
