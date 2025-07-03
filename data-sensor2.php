<?php

header('Content-Type: application/json');
include 'konek.php'; // Include your database connection file   
$event = isset($_POST['event']) ? $_POST['event'] : null;
$duration = isset($_POST['duration']) ? $_POST['duration'] : 0;

if ($event !== null) { 


    if ($conn->connect_error) {
        echo json_encode([
            "status" => "error",
            "message" => "Connection failed: " . $conn->connect_error
        ]);
        exit;
    }

    $sql = "INSERT INTO remote_2 (event, duration, timestamp) 
            VALUES ('$event', '$duration', NOW())";

   if ($conn->query($sql) === TRUE) { 
        $durationSeconds = round($duration / 1000);

        echo json_encode([
            "status" => "success",
            "message" => "Data berhasil disimpan",
            "data" => [
                "event" => $event,
                "duration_millis" => $duration,
                "duration_seconds" => $durationSeconds,
                "timestamp" => date("Y-m-d H:i:s")
            ]
        ]);
    } else {
        echo json_encode([
            "status" => "error",
            "message" => $conn->error
        ]);
    }

    $conn->close();
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Invalid request: 'event' key not found."
    ]);
}
?>
