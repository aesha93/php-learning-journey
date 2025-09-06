<?php
if(isset($_POST['note']) && !empty(trim($_POST['note']))) {
    $note = trim($_POST['note']);
    $handle = fopen("note.txt", "a");   // append mode
    fwrite($handle, date("Y-m-d H:i:s") . " - " . $note . "\n");
    fclose($handle);
    echo "✅ Note saved successfully!<br><br>";
} else {
    echo "⚠️ Please write something before saving.<br><br>";
}
?>
<a href="note_manager.php">⬅ Back to Notes</a>
