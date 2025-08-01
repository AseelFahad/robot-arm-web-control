<?php
include 'db.php';

$result = $conn->query("SELECT * FROM pose");
$poses = [];

while ($row = $result->fetch_assoc()) {
  $poses[] = $row;
}

echo json_encode($poses);
?>
