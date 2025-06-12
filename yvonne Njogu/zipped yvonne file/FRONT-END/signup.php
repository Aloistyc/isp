<?php
$host = "localhost";
$dbname = "ISP";
$dbuser = "root";           // updated DB username
$dbpass = "";               // leave empty if root has no password


try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $idNumber = $_POST["id-number"];
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirm-password"];
        $wifiPackage = $_POST["wifiPackage"];
        $area = $_POST["area"];

        if ($password !== $confirmPassword) {
            die("Passwords do not match.");
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO clients (name, email, phone, id_number, password, wifi_package, area) 
                VALUES (:name, :email, :phone, :id_number, :password, :wifi_package, :area)";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':phone' => $phone,
            ':id_number' => $idNumber,
            ':password' => $hashedPassword,
            ':wifi_package' => $wifiPackage,
            ':area' => $area
        ]);

        echo "Signup successful!! ";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
