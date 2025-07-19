<?php
// increment.php

include 'config.php';

$dua_id = $_POST['dua_id'];
$date = date('Y-m-d');

// Check if there's already a record for this dua and date
$check = $conn->prepare("SELECT * FROM recitations WHERE dua_id = 1 AND date = ?");
$check->bind_param("is", $dua_id, $date);
$check->execute();
$result = $check->get_result();

if ($result->num_rows > 0) {
    $conn->query("UPDATE recitations SET count = count + 1 WHERE dua_id = $dua_id AND date = '$date'");
} else {
    $conn->query("INSERT INTO recitations (dua_id, date, count) VALUES ($dua_id, '$date', 1)");
}

echo "Success";
