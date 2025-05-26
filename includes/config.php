<?php
$host = 'b4uj3tr63uw1lggdbkz6-mysql.services.clever-cloud.com';
$dbname = 'b4uj3tr63uw1lggdbkz6';
$username = 'ubuij8358nmuc2y3';
$password = getenv('DB_PASS');

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection Failed: ". $e->getMessage());
}
?>
