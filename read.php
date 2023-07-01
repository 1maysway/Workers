<?php
require 'db.php';

$stmt = $pdo->query("SELECT * FROM worker");
$workers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Read Workers</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Read Workers</h1>
        <a href="create.php" class="btn btn-primary">Create Worker</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Position</th>
                    <th>Salary</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($workers as $worker): ?>
                    <tr>
                        <td><?php echo $worker['id']; ?></td>
                        <td><?php echo $worker['first_name']; ?></td>
                        <td><?php echo $worker['last_name']; ?></td>
                        <td><?php echo $worker['position']; ?></td>
                        <td><?php echo $worker['salary']; ?></td>
                        <td>
                            <a href="update.php?id=<?php echo $worker['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                            <a href="delete.php?id=<?php echo $worker['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
