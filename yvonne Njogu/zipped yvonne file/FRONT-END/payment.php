<?php
$host = "localhost";
$dbname = "ISP";
$dbuser = "root";
$dbpass = ""; // Use your password if root has one

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $idNumber = $_POST["idNumber"];
        $clientName = $_POST["clientName"];
        $phoneNumber = $_POST["phoneNumber"];
        $wifiPackage = $_POST["wifiPackage"];
        $paymentMethod = $_POST["paymentMethod"];

        $stmt = $pdo->prepare("
            INSERT INTO payments (id_number, client_name, phone_number, wifi_package, payment_method) 
            VALUES (:idNumber, :clientName, :phoneNumber, :wifiPackage, :paymentMethod)
        ");

        $stmt->execute([
            ":idNumber" => $idNumber,
            ":clientName" => $clientName,
            ":phoneNumber" => $phoneNumber,
            ":wifiPackage" => $wifiPackage,
            ":paymentMethod" => $paymentMethod
        ]);

        echo "<script>
                alert('Payment details submitted successfully.');
                window.location.href = 'index.html';
              </script>";
    }
} catch (PDOException $e) {
    echo "Database Error: " . $e->getMessage();
}
?>
