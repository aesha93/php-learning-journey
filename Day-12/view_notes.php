<?php
echo "<h2>📖 My Notes</h2>";

$handle = fopen("note.txt", "r");
while(!feof($handle)) {
    $line = fgets($handle);
    if(trim($line) != "") { // ignore empty lines
        echo htmlspecialchars($line) . "<br>";
    }
}
fclose($handle);
?>
<br>
<a href="note_manager.php">⬅ Back to Notes</a>
