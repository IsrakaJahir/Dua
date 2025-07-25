<?php
// db connection
$conn = new mysqli("localhost", "root", "", "dua_app");

// Fetch all dua sets
$set_query = "SELECT * FROM dua_sets";
$set_result = $conn->query($set_query);

while ($set = $set_result->fetch_assoc()) {
    echo "<h2>📝 Reason: " . htmlspecialchars($set['reason']) . "</h2>";

    // Get all duas for this set
 
$dua_query = "SELECT d.id, d.title, d.Dua 
              FROM duas d
              JOIN dua_set_items dsi ON d.id = dsi.dua_id
              WHERE dsi.set_id = " . $set['id'];

$dua_result = $conn->query($dua_query);

echo "<ul>";
while ($dua = $dua_result->fetch_assoc()) {
    echo "<li><strong>" . htmlspecialchars($dua['title']) . ":</strong> " . nl2br(htmlspecialchars($dua['Dua'])) . "</li>";
}
echo "</ul><hr>";
}
?>
<Button>  <a href="add-set.php">+ ADD Set</a> </Button>
