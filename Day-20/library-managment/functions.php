<?php
function readCSV($filename){
    $rows = [];
    try{
        if (!file_exists($filename)) {
            throw new Exception("File not found.");
        }
        if (($handle = fopen($filename, 'r')) !== false) {
            while (($data = fgetcsv($handle)) !== false) {
                $rows[] = $data;
            }
            fclose($handle);
        }
    }catch(Exception $e){
        echo "Error: " . $e->getMessage();
    }
    return $rows;
}

function writeCSV($filename, $rows){
    try {
    $fp = fopen($filename, 'w');
    if (!$fp) {
        throw new Exception("Unable to open file.");
    }
    foreach ($rows as $row) {
        fputcsv($fp, $row);
    }
    fclose($fp);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }

}

?>