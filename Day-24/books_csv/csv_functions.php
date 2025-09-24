<?php
$csv_file = 'books.csv';

//Read all students

function readCSV(){
    global $csv_file;
    $rows =[];

    if(($handle = fopen($csv_file, 'r')) !== false){
        $header = fgetcsv($handle);
        while(($data = fgetcsv($handle)) !== false){
            $rows[] = array_combine($header, $data);
        }
        fclose($handle);
    }
    return $rows;
}

function writeCSV($rows){
    global $csv_file;
    if(($handle = fopen($csv_file, 'w')) !== false){
        fputcsv($handle, array_keys($rows[0])); 
        foreach ($rows as $row) {
            fputcsv($handle, $row);
        }
        fclose($handle);
    }
}

?>