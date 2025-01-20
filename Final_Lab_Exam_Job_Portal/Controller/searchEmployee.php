<?php
include_once '../model/userdb.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';

    if (empty($name)) {
        echo "<p>Please enter a name to search.</p>";
        exit();
    }

    $employees = searchEMP($name);

    if ($employees && count($employees) > 0) {
        echo "<table border='1'>
                <tr>
                    <th>Name</th>
                    <th>Company</th>
                    <th>Contact</th>
                    <th>Actions</th>
                </tr>";
        foreach ($employees as $employee) {
            echo "<tr>
                    <td>" . htmlspecialchars($employee['name']) . "</td>
                    <td>" . htmlspecialchars($employee['company']) . "</td>
                    <td>" . htmlspecialchars($employee['contact']) . "</td>
                    <td>
                        <a href='edit_employee.php?id=" . $employee['id'] . "'>Edit</a>
                        <a href='delete_employee.php?id=" . $employee['id'] . "' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                    </td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No employees found.</p>";
    }
}
?>
