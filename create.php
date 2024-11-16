<?php
// Database credentials
$host = 'dpg-csqqfatumphs73d6opqg-a.singapore-postgres.render.com';
$port = '5432';
$dbname = 'userdata_0m9c';
$user = 'admin';
$password = 'zgn5icjdz4tfTIamfgL2hSrIZ0hRLvr7';

try {
    // Connect to the PostgreSQL database
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Hash the password for security
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Check if the email or username already exists
        $checkQuery = $pdo->prepare("SELECT * FROM usertable WHERE email = :email OR username = :username");
        $checkQuery->execute(['email' => $email, 'username' => $username]);

        if ($checkQuery->rowCount() > 0) {
            // User already exists
            echo "<p class='error'>Error: A user with this email or username already exists!</p>";
        } else {
            // Insert the new user into the database
            $stmt = $pdo->prepare("INSERT INTO usertable (username, phone, email, password) VALUES (?, ?, ?, ?)");
            $stmt->execute([$username, $phone, $email, $hashedPassword]);
            echo "<p class='success'>Registration successful! You can now log in.</p>";
        }
    }
} catch (PDOException $e) {
    echo "<p class='error'>Database error: " . htmlspecialchars($e->getMessage()) . "</p>";
}
?>
