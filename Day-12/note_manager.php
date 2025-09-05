<!DOCTYPE html>
<html>
<head>
    <title>Daily Notes Manager</title>
</head>
<body>
    <h2>📝 Daily Notes Manager</h2>

    <!-- Add Note Form -->
    <form method="POST" action="save_note.php">
        <textarea name="note" rows="4" cols="40" placeholder="Write your note here..."></textarea><br><br>
        <button type="submit">Save Note</button>
    </form>

    <br>
    <a href="view_notes.php">📖 View All Notes</a>
</body>
</html>
