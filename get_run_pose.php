<?php
include 'db.php';

$result = $conn->query("SELECT * FROM run ORDER BY id DESC LIMIT 1");

if ($row = $result->fetch_assoc()) {
  echo json_encode($row);
} else {
  echo json_encode(["message" => "No run pose found."]);
}
?>
