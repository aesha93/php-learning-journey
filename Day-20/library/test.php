<?php
require 'functions.php';
writeCSV('data.csv', [
    [1, 'Sample Book', 'John Doe', 2020, 'Available']
]);
print_r(readCSV('data.csv'));
