<?php
// calendar.php

include 'db.php';

$duas = $conn->query("SELECT * FROM duas");

foreach ($duas as $dua) {
    echo "<h3>" . htmlspecialchars($dua['content']) . "</h3>";

    $rows = $conn->query("SELECT date, count FROM recitations WHERE dua_id = " . $dua['id']);
    
    $calendar = [];
    while ($row = $rows->fetch_assoc()) {
        $calendar[$row['date']] = $row['count'];
    }

    echo "<div style='display: grid; grid-template-columns: repeat(7, 1fr); gap: 5px;'>";
    for ($i = 0; $i < 30; $i++) {
        $date = date('Y-m-d', strtotime("-$i days"));
        $count = $calendar[$date] ?? 0;

        echo "<div style='padding: 10px; border: 1px solid #ccc; text-align:center;'>
                <div style='font-size: 12px;'>$date</div>
                <strong>$count</strong>
              </div>";
    }
    echo "</div><hr>";
}
