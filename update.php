<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $position = $_POST["position"];
    $salary = $_POST["salary"];

    $stmt = $pdo->prepare("UPDATE worker SET first_name=?, last_name=?, position=?, salary=? WHERE id=?");
    $stmt->execute([$first_name, $last_name, $position, $salary, $id]);

    header("Location: read.php");
    exit;
}

if (!isset($_GET["id"])) {
    header("Location: read.php");
    exit;
}

$id = $_GET["id"];

$stmt = $pdo->prepare("SELECT * FROM worker WHERE id=?");
$stmt->execute([$id]);
$worker = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$worker) {
    header("Location: read.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Worker</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Update Worker</h1>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $worker['id']; ?>">
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" class="form-control" name="first_name" value="<?php echo $worker['first_name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" class="form-control" name="last_name" value="<?php echo $worker['last_name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="position">Position:</label>
                <input type="text" class="form-control" name="position" value="<?php echo $worker['position']; ?>" required>
            </div>
            <div class="form-group">
                <label for="salary">Salary:</label>
                <input type="number" class="form-control" name="salary" value="<?php echo $worker['salary']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
