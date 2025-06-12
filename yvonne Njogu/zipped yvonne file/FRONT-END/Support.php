<?php
$host = "localhost";
$dbname = "ISP";
$dbuser = "root";
$dbpass = ""; // Add password if root has one

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $idNumber = $_POST["idNumber"];
        $clientName = $_POST["clientName"];
        $phoneNumber = $_POST["phoneNumber"];
        $networkProblem = $_POST["network_problem"];

        $stmt = $pdo->prepare("
            INSERT INTO support_requests (id_number, client_name, phone_number, network_problem)
            VALUES (:idNumber, :clientName, :phoneNumber, :networkProblem)
        ");

        $stmt->execute([
            ":idNumber" => $idNumber,
            ":clientName" => $clientName,
            ":phoneNumber" => $phoneNumber,
            ":networkProblem" => $networkProblem
        ]);

        echo "<script>
                alert('Support request submitted successfully.');
                window.location.href = 'index.html';
              </script>";
    }
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>
