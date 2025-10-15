<?php
// import.php
// Upload a CSV that has rows: username,password  (plaintext passwords in uploaded file)
// We will hash passwords before saving to users.csv and skip duplicate usernames.

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $file = $_FILES['file'];

    // Basic validation
    if ($file['error'] !== UPLOAD_ERR_OK) {
        $message = "Upload error: " . $file['error'];
    } else {
        // Accept only CSV mime types (basic)
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $file['tmp_name']);
        finfo_close($finfo);

        // allow text/csv or application/vnd.ms-excel or plain text
        $allowed = ['text/plain', 'text/csv', 'application/vnd.ms-excel'];
        if (!in_array($mime, $allowed)) {
            $message = "Please upload a valid CSV file. Detected type: $mime";
        } else {
            // Read existing users to detect duplicates
            $existing = [];
            if (file_exists('users.csv')) {
                $fr = fopen('users.csv', 'r');
                while (($row = fgetcsv($fr)) !== false) {
                    if (isset($row[0])) $existing[$row[0]] = true;
                }
                fclose($fr);
            }
            // Open uploaded file and process rows
            $uploaded = fopen($file['tmp_name'], 'r');
            $newCount = 0;
            $skipped = 0;

            // Append mode for storage
            $fw = fopen('users.csv', 'a');

            while (($row = fgetcsv($uploaded)) !== false) {
                // Expect at least two columns: username,password
                if (count($row) < 2) continue;
                $username = trim($row[0]);
                $password = $row[1];

                if ($username === '' || $password === '') {
                    $skipped++;
                    continue;
                }

                // Skip duplicate username
                if (isset($existing[$username])) {
                    $skipped++;
                    continue;
                }

                // Hash password before saving
                $hash = password_hash($password, PASSWORD_DEFAULT);

                fputcsv($fw, [$username, $hash]);
                $existing[$username] = true;
                $newCount++;
            }

            fclose($uploaded);
            fclose($fw);

            $message = "Import done. New users: $newCount. Skipped: $skipped.";
        }
    }
}
?>

<h2>Bulk Import Users (CSV)</h2>
<p>CSV format: <code>username,password</code> per line. Plain passwords in the uploaded file will be hashed before saving.</p>

<form method="post" enctype="multipart/form-data">
  <input type="file" name="file" accept=".csv" required>
  <button type="submit">Upload & Import</button>
</form>

<p><?php echo htmlspecialchars($message); ?></p>

<p><a href="login.php">Back to login</a></p>
