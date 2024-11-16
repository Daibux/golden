<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PostgreSQL Connection Test</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            text-align: center;
            background: #ffffff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .success {
            color: green;
            font-size: 1.2rem;
        }
        .error {
            color: red;
            font-size: 1.2rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>PostgreSQL Connection Test</h1>
        <div id="message">
            <?php
            $host = 'dpg-csqqfatumphs73d6opqg-a.singapore-postgres.render.com';
            $port = '5432';
            $dbname = 'userdata_0m9c';
            $user = 'admin';
            $password = 'zgn5icjdz4tfTIamfgL2hSrIZ0hRLvr7';

            try {
                // Create a new PDO instance with the PostgreSQL connection details
                $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "<p class='success'>Connected to the PostgreSQL database successfully!</p>";
            } catch (PDOException $e) {
                // If there's an error, display it
                echo "<p class='error'>Could not connect to the PostgreSQL database: " . htmlspecialchars($e->getMessage()) . "</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>
