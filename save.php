<?php
include 'config.php';

$title = $_POST['Reason'];
$repeat = intval($_POST['Amount']);

$stmt = $conn->prepare("INSERT INTO duas (title, repeat_count) VALUES (?, ?)");
$stmt->bind_param("si", $title, $repeat);
$stmt->execute();
$stmt->close();

// header("Location: index.php");
exit;
?>
