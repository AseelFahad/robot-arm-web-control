<?php
include 'db.php';

$data = json_decode(file_get_contents("php://input"), true);
$values = $data['values'] ?? [];

if (count($values) !== 6) {
  echo json_encode(["message" => "Invalid servo values."]);
  exit;
}

// حذف أي بيانات قديمة
$conn->query("DELETE FROM run");

// إعداد البيان
$sql = "INSERT INTO run (servo1, servo2, servo3, servo4, servo5, servo6, status)
        VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

// تمرير القيم يدويًا + status
$status = 1;
$stmt->bind_param("iiiiiii", 
  $values[0], $values[1], $values[2], 
  $values[3], $values[4], $values[5], 
  $status
);

if ($stmt->execute()) {
  echo json_encode(["message" => "Run command saved."]);
} else {
  echo json_encode(["message" => "Failed to run pose."]);
}
?>
