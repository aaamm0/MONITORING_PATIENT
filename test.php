<?php
$conn = new mysqli("localhost", "root", "", "perawat_db");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM remote_1 ORDER BY timestamp DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Log Riwayat Event</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="container mt-4">
    <h2>Log Riwayat Event</h2>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Event</th>
                <th>Duration (ms)</th>
                <th>Timestamp</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['event']) ?></td>
                <td><?= $row['duration'] ?></td>
                <td><?= $row['timestamp'] ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>

<?php $conn->close(); ?>
