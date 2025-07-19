<?php
include 'config.php';

$reason = $_POST['reason'];
$existingDuas = $_POST['existing_duas'] ?? [];
$newDuas = $_POST['new_duas'] ?? [];

// 1. Insert into dua_sets
$stmt = $conn->prepare("INSERT INTO dua_sets (reason) VALUES (?)");
$stmt->bind_param("s", $reason);
$stmt->execute();
$set_id = $stmt->insert_id;
$stmt->close();

// 2. Link existing DUAs
foreach ($existingDuas as $dua_id) {
  $dua_id = intval($dua_id);
  $conn->query("INSERT INTO dua_set_items (set_id, dua_id) VALUES ($set_id, $dua_id)");
}

// 3. Add new DUAs & link them
foreach ($newDuas as $dua) {
  $title = $conn->real_escape_string($dua['title']);
  $repeat = intval($dua['repeat']);

  $conn->query("INSERT INTO duas (title, repeat_count) VALUES ('$title', $repeat)");
  $newDuaId = $conn->insert_id;
  $conn->query("INSERT INTO dua_set_items (set_id, dua_id) VALUES ($set_id, $newDuaId)");
}

header("Location: index.php");
exit;
?>
