<?php
include 'db.php';

$data = json_decode(file_get_contents("php://input"), true);
$values = $data['values'];

$sql = "INSERT INTO pose (servo1, servo2, servo3, servo4, servo5, servo6)
        VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iiiiii", ...$values);

if ($stmt->execute()) {
  echo json_encode(["message" => "Pose saved successfully."]);
} else {
  echo json_encode(["message" => "Error saving pose."]);
}
?>
