<?php

require 'includes/config.php';
require 'includes/auth.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $query = "";
    if ($username === 'admin') {
        $query= "SELECT * FROM admins WHERE username = ?";
    } else {
        $query = "SELECT * FROM judges WHERE username = ?";
    }

    try {
        $stmt = $pdo->prepare($query);
        $stmt->execute([$username]);
        $user = $stmt->fetch();
    } catch (PDOException $e) {
        die("Connection Failed: ". $e->getMessage());
    }
    
    // if ($user && password_verify($password, $user['password'])) {
    if ($user && $password === $user['pass']) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        if ($username === 'admin') {
            $_SESSION['user_type'] = 'admin';
        } else {
            $_SESSION['user_type'] = 'user';
        }

        if ($_SESSION['user_type'] === 'admin') {
            header('location: admin/dashboard.php');
        } else {
            header('location: judges/dashboard.php');
        }

        exit();
    } else {
        header('location: login.php');
    }
}


?>