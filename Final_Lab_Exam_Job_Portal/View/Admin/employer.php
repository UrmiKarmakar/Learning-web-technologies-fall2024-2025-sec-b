<?php
session_start();
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') {
    header("Location: ../../login.php"); // Redirect to login if not an admin
    exit();
}
include_once '../../model/userdb.php'; // Include the user database model

$user_id = $_SESSION['user_id'] ?? null; // Default: null if user_id is not set
$action_type = $_GET['action'] ?? 'add'; // Default action is 'add'
$employer = null; // Default: null

// If editing or viewing, retrieve the employer data
if (($action_type === 'edit'|| $action_type === 'view') && isset($_GET['id'])) {
    $employer_id = intval($_GET['id']);
    $employer = readOneEMP($employer_id)[0]; // Fetch employer details
    if (!$employer) {
        echo "Employer not found!";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ucfirst($action_type); ?> Employer</title>
</head>

<body>
    <div class="container">
        <h1 class="page-title"><?php echo ucfirst($action_type); ?> Employer</h1>

        <?php if ($action_type === 'view' && $employer): ?>
            <!-- Display Employer Details -->
            <div class="view-employer">
                <h2 class="employer-name"><?php echo $employer['name']; ?></h2>
                <p><strong>Company:</strong> <?php echo $employer['company']; ?></p>
                <p><strong>Contact:</strong> <?php echo $employer['contact']; ?></p>
                <p><strong>Username:</strong> <?php echo $employer['username']; ?></p>
                <div class="actions">
                    <a href="employer.php?action=edit&id=<?php echo $employer['id']; ?>" class="btn btn-edit">Edit</a>
                    <a href="../../controller/employerController.php?action=delete&id=<?php echo $employer['id']; ?>" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this employer?');">Delete</a>
                </div>
            </div>

        <?php else: ?>
            <!-- Add/Edit Employer Form -->
            <form action="../../controller/employerController.php" method="post" class="employer-form">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="<?php echo $employer['name'] ?? ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="company">Company:</label>
                    <input type="text" id="company" name="company" value="<?php echo $employer['company'] ?? ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="contact">Contact:</label>
                    <input type="text" id="contact" name="contact" value="<?php echo $employer['contact'] ?? ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" value="<?php echo $employer['username'] ?? ''; ?>" required <?php if ($action_type === 'edit') echo 'readonly'; ?>>
                </div>
                <?php if ($action_type === 'add'): ?>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                <?php endif; ?>

                <input type="hidden" name="action" value="<?php echo $action_type; ?>">
                <?php if ($action_type === 'edit'): ?>
                    <input type="hidden" name="id" value="<?php echo $employer['id']; ?>">
                <?php endif; ?>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary"><?php echo ucfirst($action_type); ?></button>
                </div>
            </form>
        <?php endif; ?>
    </div>

</body>

</html>
