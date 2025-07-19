<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>My DUAs</title>
</head>
<body>
  <h2>My DUA List</h2>
  <a href="add.php">+ Add New DUA</a>
  <a href="add-set.php">+ Add New DUA SET</a>
  <a href="display-dua-set.php"> View Dua set </a>
  <hr>

  <?php
  $result = $conn->query("SELECT * FROM duas");
  while ($row = $result->fetch_assoc()) {
    echo "<div>";
    echo "<h3>" . htmlspecialchars($row['title']) . "</h3>";
    echo "<h3>" . htmlspecialchars($row['Dua']) . "</h3>";
    echo "<h3>" . htmlspecialchars($row['meaning']) . "</h3>";
    echo "<p>Repeat: " . $row['repeat_count'] . " times</p>";
    echo "<a href='counter.php?id=" . $row['id'] . "'>Open Counter</a>";
    ?>
    <form method="post" action="increment.php">
  <input type="hidden" name="dua_id" value="<?= $dua['id'] ?>">
  <button type="submit">+1 Recite</button>
</form>

    <?php
    echo "</div><hr>";
  }
  ?>
</body>
</html>
