<?php 
include 'konek.php'; 
$lastEvent = "stop"; // default fallback

if ($conn->connect_error) {
    echo json_encode(["status" => "error", "message" => $conn->connect_error]);
    exit;
}

$result = $conn->query("SELECT event FROM remote_2 ORDER BY timestamp DESC LIMIT 1");

if ($result) {
    if ($row = $result->fetch_assoc()) {
        $lastEvent = trim($row['event']);
    }
} else {
    echo json_encode(["status" => "error", "query_error" => $conn->error]);
    exit;
}

$conn->close();
echo json_encode(["status" => "success", "event" => $lastEvent]);
?>
