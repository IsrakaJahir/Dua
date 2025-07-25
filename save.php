<?php
include 'config.php';

$title = $_POST['Reason'];
$repeat = intval($_POST['Amount']);
$Dua=$_POST['Dua'];
$Meaning=$_POST['Dua_meaning'];

$stmt = $conn->prepare("INSERT INTO duas (title, repeat_count,meaning,Dua) VALUES (?, ?,?,?)");
$stmt->bind_param("siss", $title, $repeat,$Meaning,$Dua);
$stmt->execute();
$stmt->close();
header("Location: index.php");
exit;
?>
