<?php
try {
    $pdo = new PDO("postgres://rsxngvxx:4sDVQDvrHmxpcKeJO2Rc4bi2pSnC6wS3@snuffleupagus.db.elephantsql.com/rsxngvxx");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
