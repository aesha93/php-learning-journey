<?php
// export.php
// Exports a CSV with only usernames (no password hashes)

if (!file_exists('users.csv')) {
    echo "No users to export.";
    exit;
}

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="usernames_export.csv"');

$out = fopen('php://output', 'w');
// optional header row
fputcsv($out, ['username']);

$fr = fopen('users.csv', 'r');
while (($row = fgetcsv($fr)) !== false) {
    if (isset($row[0])) fputcsv($out, [$row[0]]);
}
fclose($fr);
fclose($out);
exit;
