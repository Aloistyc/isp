<?php
session_start();

$host = "localhost";
$dbname = "ISP";
$dbuser = "root";
$dbpass = ""; // leave empty if root has no password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Check by email or name
        $stmt = $pdo->prepare("SELECT * FROM clients WHERE email = :username OR name = :username");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION["username"] = $user['name'];

            // Show success message and redirect
            echo "<script>
                    alert('Login successful. Welcome, " . htmlspecialchars($user['name']) . "!');
                    window.location.href = 'index.html';
                  </script>";
            exit;
        } else {
            echo "<script>alert('Invalid username or password.'); window.history.back();</script>";
        }
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
