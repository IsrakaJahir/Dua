<!-- <form action="save-set.php" method="POST">
  <label>Set Name (Reason):</label><br>
  <input type="text" name="name" required><br><br>
  <input type="submit" value="Create Set">
</form> -->
<?php
include 'config.php';
$duas = $conn->query("SELECT * FROM duas");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add DUA Set</title>
  <script>
    function addNewDuaField() {
      const container = document.getElementById('new-duas');
      const index = container.children.length;
      const html = `
        <div style="margin-bottom:10px;">
          <input name="new_duas[${index}][title]" placeholder="New DUA title" required>
          <input name="new_duas[${index}][repeat]" type="number" placeholder="Repeat" required>
        </div>
      `;
      container.insertAdjacentHTML('beforeend', html);
    }
  </script>
</head>
<body>

<h2>Create New DUA Set</h2>
<form action="save-set.php" method="POST">
  <label>Reason for DUA Set:</label><br>
  <input type="text" name="reason" required><br><br>

  <h3>Select Existing DUAs:</h3>
  <?php while ($row = $duas->fetch_assoc()): ?>
    <label>
      <input type="checkbox" name="existing_duas[]" value="<?= $row['id'] ?>">
      <?= htmlspecialchars($row['title']) ?> (Repeat: <?= $row['repeat_count'] ?>)
    </label><br>
  <?php endwhile; ?>

  <hr>
  <h3>Add New DUAs:</h3>
  <div id="new-duas"></div>
  <button type="button" onclick="addNewDuaField()">+ Add More</button>

  <br><br>
  <input type="submit" value="Create DUA Set">
</form>
<br>
<a href="index.php">← Back</a>

</body>
</html>
