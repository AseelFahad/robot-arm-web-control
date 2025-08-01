<?php
include 'db.php';

// نُحدث status = 0 لأحدث pose في جدول run
$conn->query("UPDATE run SET status = 0 ORDER BY id DESC LIMIT 1");

echo json_encode(["message" => "Status updated to 0."]);
?>
