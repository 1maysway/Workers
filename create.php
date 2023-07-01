<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $position = $_POST["position"];
    $salary = $_POST["salary"];

    $stmt = $pdo->prepare("INSERT INTO worker (first_name, last_name, position, salary) VALUES (?, ?, ?, ?)");
    $stmt->execute([$first_name, $last_name, $position, $salary]);

    header("Location: read.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Worker</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Create Worker</h1>
        <form method="post">
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" class="form-control" name="first_name" required>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" class="form-control" name="last_name" required>
            </div>
            <div class="form-group">
                <label for="position">Position:</label>
                <input type="text" class="form-control" name="position" required>
            </div>
            <div class="form-group">
                <label for="salary">Salary:</label>
                <input type="number" class="form-control" name="salary" required>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</body>
</html>
