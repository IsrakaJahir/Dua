
<?php
include 'config.php';
$dua_id = $_GET['id'] ?? 0;
$result = $conn->query("SELECT * FROM duas WHERE id = $dua_id");
$dua = $result->fetch_assoc();
?>

<h2><?= htmlspecialchars($dua['title']) ?></h2>
<p><?= htmlspecialchars($dua['Dua']) ?></p>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Dua Voice Counter</title>
  <style>
    body {
      font-family: sans-serif;
      text-align: center;
      background: #f0fff4;
      margin-top: 80px;
    }
    #count {
      font-size: 5em;
      margin-bottom: 20px;
      color: #2f855a;
    }
    #start {
      background: #48bb78;
      color: white;
      border: none;
      padding: 15px 25px;
      font-size: 1.2em;
      border-radius: 8px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <h1>🕌 Dua Voice Counter</h1>
  <div id="count">0</div>
  <button id="start">🎤 Start Listening</button>

  <script>
  let count = 0;
  const targetWord = <?= json_encode($dua['Dua']) ?>; 
  const counterDisplay = document.getElementById("count");

  const recognition = new(window.SpeechRecognition || window.webkitSpeechRecognition)();
  recognition.lang = "en";
  recognition.continuous = true;

  document.getElementById("start").onclick = () => {
    recognition.start();
  };

  recognition.onresult = (event) => {
    const transcript = event.results[event.results.length - 1][0].transcript.trim().toLowerCase();
    console.log("You said:", transcript);
    if (transcript.includes(targetWord.toLowerCase())) {
      count++;
      counterDisplay.textContent = count;
      fetch('save-count.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
      body: `dua_id=<?= $dua_id ?>&count=${count}`
    })
   .then(res => res.text())
   .then(data => console.log(data));



    }
  };

  recognition.onerror = (e) => {
    console.error("Speech error:", e.error);
  };
</script>

</body>
</html>
