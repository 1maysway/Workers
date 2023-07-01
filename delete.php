<?php
require 'db.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $stmt = $pdo->prepare("DELETE FROM worker WHERE id=?");
    $stmt->execute([$id]);
}

header("Location: read.php");
exit;
