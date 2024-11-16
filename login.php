<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
session_start();
require_once "database.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query to check if the user exists
    $stmt = $pdo->prepare("SELECT * FROM usertable WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    // If user exists and password is correct
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $user['username'];
        echo 'success';
    } else if ($user) {
        echo 'incorrect_password'; // Incorrect password
    } else {
        echo 'not_found'; // User not found
    }
    exit();
}