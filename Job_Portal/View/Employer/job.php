<?php
session_start();
include_once '../../model/jobdb.php';

$action_type = $_GET['action'] ?? 'add';  // Default action is 'add'
$job = null;

if ($action_type === 'edit' && isset($_GET['id'])) {
    $job_id = $_GET['id'];
    $job = readJob($job_id)[0];  // Fetch job details from the database
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= ucfirst($action_type); ?> Job</title>
</head>
<body>
    <div class="container">
        <h1><?= ucfirst($action_type); ?> Job</h1>

        <form action="../../controller/jobController.php" method="post">
            <div class="form-group">
                <label for="title">Job Title:</label>
                <input type="text" id="title" name="title" value="<?= $job['title'] ?? ''; ?>" required>
            </div>

            <div class="form-group">
                <label for="company">Company:</label>
                <input type="text" id="company" name="company" value="<?= $job['company'] ?? ''; ?>" required>
            </div>

            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" id="location" name="location" value="<?= $job['location'] ?? ''; ?>" required>
            </div>

            <div class="form-group">
                <label for="salary">salary:</label>
                <input type="text" id="salary" name="salary" value="<?= $job['salary'] ?? ''; ?>" required>

            </div>

            <input type="hidden" name="action" id="action" value="<?php echo $action_type; ?>">
            <input type="hidden" name="id" id="id" value="<?php echo $job_id ?? ''; ?>">
            

            <div class="form-actions">
                <button type="submit" name="<?= $action_type; ?>" value="<?= $action_type; ?>" class="btn btn-primary">
                    <?= ucfirst($action_type); ?> Job
                </button>
            </div>
        </form>
    </div>
</body>
</html>
