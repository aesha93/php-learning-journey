<?php
function readCSV($filename) {
    $rows = [];
    if (!file_exists($filename)) return $rows;
    if (($handle = fopen($filename, 'r')) !== false) {
        while (($data = fgetcsv($handle)) !== false) {
            $rows[] = $data;
        }
        fclose($handle);
    }
    return $rows;
}

function writeCSV($filename, $rows) {
    $fp = fopen($filename, 'w');
    foreach ($rows as $row) {
        fputcsv($fp, $row);
    }
    fclose($fp);
}
?>
