<?php
include 'config.php';

$dua_id = $_POST['dua_id'] ?? 0;
$count = $_POST['count'] ?? 0;
$date = date('Y-m-d');

// Check if today's record already exists
$check = $conn->query("SELECT * FROM counts WHERE dua_id = $dua_id AND date = '$date'");

if ($check->num_rows > 0) {
    // Update existing count
    $conn->query("UPDATE counts SET count = $count WHERE dua_id = $dua_id AND date = '$date'");
    echo "Count updated";
} else {
    // Insert new count
    $conn->query("INSERT INTO counts (dua_id, count, date) VALUES ($dua_id, $count, '$date')");
    echo "Count saved";
}
?>
