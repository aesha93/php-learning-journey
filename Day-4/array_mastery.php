<?php
// $skuList =['SKU-01','SKU-02', 'SKU-03'];
// $firstSku = $skuList['0'];
// $skuList['1'] = 'SKU-002-UPDATED';

// echo "<pre>"; print_r($skuList['0']);

// Associative Arrays

// $product = [
//     'sku' => 'M-TSHIRT-XL',
//     'name' => 'Magento Tee XL',
//     'price' => 999.00
// ];

// $sku = $product['sku'];
// $product['price'] = 1099.00;

// $gallery = ['main.jpg', 'side.jpg', 'back.jpg'];
// array_push($gallery, 'detail.jpg', 'zoom.jpg');
// $removed = array_pop($gallery);
// echo $gallery[0] . "<br>"; // first image
// echo $gallery[2] . "<br>"; // third image (still 'back.jpg')
// echo $removed . "<br>";    // the one we popped: 'zoom.jpg'


// echo "<pre>"; print_r($gallery);die();

// $order = [
//     'increment_id'   => '100000123',
//     'customer_email' => 'customer@example.com',
//     'items' => [
//         ['sku' => 'TEE-BLK-XS', 'name' => 'T-Shirt XS', 'qty' => 1, 'price' => 499.00],
//         ['sku' => 'MUG-RED',    'name' => 'Red Mug',    'qty' => 2, 'price' => 299.00],
//     ],
// ];

// echo $order['increment_id'] . "<br>";
// echo $order['items'][0]['name'] . "<br>";
// echo $order['items'][1]['price'] . "<br>";
// $firstItemKeys = array_keys($order['items'][0]);
// echo $firstItemKeys[0] . "<br>";
// echo $firstItemKeys[1] . "<br>";


// $domestic = ['freeshipping_freeshipping', 'flatrate_flatrate'];
// $cod      = ['cashondelivery'];

// $allowedMethods = array_merge($domestic, $cod);

// $methodTitles = [
//     'freeshipping_freeshipping' => 'Free Shipping',
//     'flatrate_flatrate'         => 'Flat Rate',
//     'cashondelivery'            => 'Cash On Delivery'
// ];

// $codes = array_keys($methodTitles);
// $titles = array_values($methodTitles);

// echo $codes[0] . "<br>";   // first code
// echo $titles[1] . "<br>";  // second title

// $pos = array_search('flatrate_flatrate', $allowedMethods);
// echo $pos . "\n";        // index position in the merged list (should be 1)

// Challenges (No Solutions)

// Catalog Merge & Check (Products)
// Input:

// $newArrivalsSkus = ['CAP-BLK', 'TEE-WHT-L', 'BAG-TRVL']

// $featuredSkus = ['MUG-RED', 'TEE-WHT-L']
// Goal:

// Merge both lists into $displaySkus.

// Find the index of 'TEE-WHT-L' in $displaySkus.

// Echo the first and last SKU from $displaySkus (access by index only).

// $newArrivalsSkus = ['CAP-BLK', 'TEE-WHT-L', 'BAG-TRVL'];
// $featuredSkus = ['MUG-RED', 'TEE-WHT-L'];
// $displaySkus = array_merge($newArrivalsSkus, $featuredSkus);

// $findIndex = array_search('TEE-WHT-L' , $displaySkus);
// $firstElement = $displaySkus[0];
// $lastElement = $displaySkus[count($displaySkus) - 1];

// echo $findIndex."<br>";
// echo $firstElement."<br>";
// echo $lastElement."<br>";

// Order Snapshot (2D Associative Items)
// Input:

// $order with increment_id, customer_email, and items (three items; each has sku, name, qty, price).
// Goal:

// Echo the increment_id.

// Echo the sku of the third item.

// Use array_keys on the second item to echo its first key and second key.

// $orders = [
//     'increment_id'   => '100000123',
//     'customer_email' => 'customer@example.com',
//     'items' => [
//         ['sku' => 'TEE-BLK-XS', 'name' => 'T-Shirt XS', 'qty' => 1, 'price' => 499.00],
//         ['sku' => 'MUG-RED',    'name' => 'Red Mug',    'qty' => 2, 'price' => 299.00],
//         ['sku' => 'BAG-GREEN',  'name' => 'Bag Green',  'qty' => 2, 'price' => 99.00],
//     ],
// ];

// echo $orders['increment_id']."<br>";
// echo $orders['items']['2']['sku']. "<br>";
// $keys = array_keys($orders['items']['1']);

// echo $keys[0] . "<br>"; // sku
// echo $keys[1] . "<br>"; // name

// // Shipping Setup (keys/values/search)
// // Input:

// // $methodTitles associative array mapping method_code => title for at least three methods.

// // $enabledA and $enabledB (indexed arrays of method codes).
// // Goal:

// // Merge $enabledA and $enabledB into $enabled.

// // Use array_values($methodTitles) and echo the third title.

// // Search for 'freeshipping_freeshipping' in $enabled and echo the found index.

// $methodTitles = [
//     'freeshipping_freeshipping' => 'Free Shipping',
//     'flatrate_flatrate'         => 'Flat Rate',
//     'cashondelivery'            => 'Cash On Delivery'
// ];
// $enabledA = ['freeshipping_freeshipping'];
// $enabledB = ['flatrate_flatrate'];
// $enabled = array_merge($enabledA, $enabledB);
// $values = array_values($methodTitles);
// echo $values['2'].'<br>';
// $findindex = array_search('freeshipping_freeshipping', $enabled);
// echo $findindex;
// $enabledA = array_keys($methodTitles);

// Exercise 1 (Step by Step) – Merging & Searching in Indexed Arrays

// $productsA = ['SKU101', 'SKU102', 'SKU103'];
// $productsB = ['SKU103', 'SKU104', 'SKU105'];

// $merged = array_merge($productsA, $productsB);

// $unique = array_unique($merged);

// $search = array_search('SKU103', $unique);

// echo "Merged Unique Products: ";
// // print_r($unique);

// echo "<br> Index of SKU103: " . $search;

// Exercise 2 (Step by Step) – Associative Array + Keys & Values

// Task:
// From an associative array of employees (id → name), print all IDs, then print all names, and finally check if "Meera" exists.

// $employees = [
//     'E101' => 'Avi',
//     'E102' => 'Tiya',
//     'E103' => 'Meera'
// ];

// // Step 1: Extract keys (employee IDs)

// $ids = array_keys($employees);
// echo "Employee IDs: ";
// print_r($ids);

// // Step 2: Extract values (employee Names)
// $names = array_values($employees);
// echo "<br>Employee Names: ";
// print_r($names);

// // Step 3: Search for "Meera"
// $index = array_search('Meera', $employees);
// echo "<br> Meera found at key: " . $index;

// $students = [
//    ['id' => 1, 'name' => 'Avi', 'marks' => 85],
//    ['id' => 2, 'name' => 'Tiya', 'marks' => 92],
//    ['id' => 3, 'name' => 'Meera', 'marks' => 76]
// ];

// $marks = array_column($students, 'marks');
// $highestmark = max($marks);

// foreach($students as $student){
//     if($student['marks'] == $highestmark){
//         $name = $student['name'];
//         $mark = $student['marks'];
//     }
// }
// echo "{$name} : {$mark}";
// echo "<pre>"; print_r($mark);
// $name = array_search($highestmark, $students);

// $employees = [
//     ['name' => 'Alice', 'department' => 'HR', 'salary' => 50000],
//     ['name' => 'Bob', 'department' => 'IT', 'salary' => 60000],
//     ['name' => 'Charlie', 'department' => 'HR', 'salary' => 70000],
//     ['name' => 'David', 'department' => 'IT', 'salary' => 80000],
//     ['name' => 'Eva', 'department' => 'Finance', 'salary' => 65000],
// ];

// $departmentwise = [];
// foreach($employees as $employee){
//     $name = $employee['name'];
//     $dept = $employee['department'];
//     $salary = $employee['salary'];
//             $departmentwise[$dept][] = [
//                 'salary' => $salary,
//                 'name' => $name
//             ];
// }

// foreach($departmentwise as $department => $data){
//     $count = 0;
//     $total = 0;
//     foreach($data as $emp){
//         $count++;
//         $total += $emp['salary'];
//     }
//     $average = $total / $count;
//     echo "{$department} : $average"."<br>";
// }

// $students = [
//     ['name' => 'Avi',   'Maths' => 90, 'Science' => 85, 'English' => 78],
//     ['name' => 'Tiya',  'Maths' => 92, 'Science' => 91, 'English' => 89],
//     ['name' => 'Meera', 'Maths' => 85, 'Science' => 95, 'English' => 92],
// ];

// $subjectdata = [];
// foreach($students['0'] as $key => $subjects){
//     if($key != 'name'){
//         $subjectdata[] = $key;
//     }
// }
// $subjectwise = [];

// foreach($students as $student){
//     foreach($subjectdata as $subject){
//              $subjectwise[$subject][] = [
//                'name' => $student['name'],
//                 'mark' => $student[$subject]
//             ];
//     }
// }

// foreach($subjectwise as $sub => $subjectdata){
//         echo "{$sub}"."<br>";
//         $highestmark = 0;
//         foreach($subjectdata as $subject){
//             if($subject['mark'] > $highestmark){
//                     $highestmark = $subject['mark'];
//                     $name_high = $subject['name'];
//             }
//         }
//     echo "{$name_high} : {$highestmark}"."<br>";
// }


// $employees = [
//     ['name' => 'Alice', 'department' => 'HR', 'salary' => 50000],
//     ['name' => 'Bob', 'department' => 'IT', 'salary' => 60000],
//     ['name' => 'Charlie', 'department' => 'HR', 'salary' => 70000],
//     ['name' => 'David', 'department' => 'IT', 'salary' => 80000],
//     ['name' => 'Eva', 'department' => 'Finance', 'salary' => 65000],
// ];

// $departmentwise = [];

// foreach($employees as $employee){
//     $dept = $employee['department'];
    
//     // if department not seen before OR this employee has higher salary than current saved one
//     if(!isset($departmentwise[$dept]) || $employee['salary'] > $departmentwise[$dept]['salary']){
//         $departmentwise[$dept] = [
//             'name' => $employee['name'],
//             'salary' => $employee['salary']
//         ];
//     }
// }

// foreach($departmentwise as $department => $data){
//     echo "{$department}: {$data['name']} ({$data['salary']})<br>";
// }

// $students = [
//     ['name' => 'Avi',   'Maths' => 90, 'Science' => 85, 'English' => 78],
//     ['name' => 'Tiya',  'Maths' => 92, 'Science' => 91, 'English' => 89],
//     ['name' => 'Meera', 'Maths' => 88, 'Science' => 92, 'English' => 81],
//     ['name' => 'Raj',   'Maths' => 92, 'Science' => 85, 'English' => 89],
// ];
// $subjectdata = [];
// foreach($students['0'] as $key => $subjects){
//     if($key != 'name'){
//         $subjectdata[] = $key;
//     }
// }
// $subjectwise = [];
// foreach($students as $student){
//     foreach($subjectdata as $subject){
//         $name = $student['name'];
//         $subjectwise[$subject][] = [
//                 'name' => $student['name'],
//                 'mark' => $student[$subject]
//             ];
//     }
// }
// foreach($subjectwise as $sub => $subjcetdata){
// $highscore = 0;
// $highname = [];
//     foreach($subjcetdata as $subjects){
//         if($subjects['mark'] > $highscore ){
//            $highscore = $subjects['mark'];
//              $highname = [$subjects['name']];
//         } elseif($subjects['mark'] == $highscore){
//             // Same as current top → add
//             $highname[] = $subjects['name'];
//         }
//     }
//     $names = implode(",", $highname);
//     echo "Subject: {$sub}"."<br>";
//     echo "Top Score: {$highscore}"."<br>";
//     echo "Students: {$names}"."<br><br>";
// }

// $employees = [
//     ['name' => 'Alice', 'department' => 'HR', 'salary' => 50000],
//     ['name' => 'Bob', 'department' => 'IT', 'salary' => 60000],
//     ['name' => 'Charlie', 'department' => 'HR', 'salary' => 50000],
//     ['name' => 'David', 'department' => 'Finance', 'salary' => 70000],
//     ['name' => 'Eve', 'department' => 'Finance', 'salary' => 70000],
//     ['name' => 'Frank', 'department' => 'IT', 'salary' => 55000],
// ];
// $departmentwise = [];
// $highsalary = 0;
// $topstudentname = [];
// foreach($employees as $employee){
//     $dept = $employee['department'];
//     $name  = $employee['name'];
//     $salary  = $employee['salary'];
//     if(!isset($departmentwise[$dept])){
//         $departmentwise[$dept][] = [
//             'name' => $name,
//             'salary' => $salary
//         ];
//     }else{
//         if($salary > $highsalary){
//             $highsalary = $salary;
//             $departmentwise[$dept][] = [
//                 'name' => $name,
//                 'salary' => $highsalary
//             ];
//         }elseif($salary == $highsalary){
//             $departmentwise[$dept]['salary'] = $highsalary;
//             $departmentwise[$dept]['name'][] = $name;
//         }
//     }
// }
// foreach($departmentwise as $dep => $data){
//     $names = [];
//     foreach($data as $detail){
//             $names[] = $detail['name'];
//             $sal = $detail['salary'];
//         }
//         $namedata = implode("," , $names);
//         echo "Department: {$dep}"."<br>";
//         echo "Salary: {$sal}"."<br>";
//         echo "Top Earners: {$namedata}"."<br><br>";
// }


// $employees = [
//     ['name' => 'Alice', 'department' => 'HR', 'salary' => 50000],
//     ['name' => 'Bob', 'department' => 'IT', 'salary' => 60000],
//     ['name' => 'Charlie', 'department' => 'HR', 'salary' => 50000],
//     ['name' => 'David', 'department' => 'Finance', 'salary' => 70000],
//     ['name' => 'Eve', 'department' => 'Finance', 'salary' => 70000],
//     ['name' => 'Frank', 'department' => 'IT', 'salary' => 55000],
// ];

// $departmentwise = [];

// // Step 1: Group employees by department
// foreach ($employees as $employee) {
//     $dept = $employee['department'];
//     $departmentwise[$dept][] = $employee;
// }

// // Step 2: For each department, find top salary & earners
// foreach ($departmentwise as $dept => $empList) {
//     $maxSalary = 0;
//     $topNames = [];

//     foreach ($empList as $emp) {

//         if ($emp['salary'] > $maxSalary) {
//             $maxSalary = $emp['salary'];
//             $topNames = [$emp['name']]; // reset with new top name
//         } elseif ($emp['salary'] == $maxSalary) {
//             $topNames[] = $emp['name']; // add tie
//         }
//     }


//     // Step 3: Print results
//     $nameList = implode(", ", $topNames);
//     echo "Department: {$dept}<br>";
//     echo "Top Earners: {$nameList}<br>";
//     echo "Salary: {$maxSalary}<br><br>";
// }

// $employees = [
//     ['name' => 'Alice',   'department' => 'HR',      'salary' => 50000],
//     ['name' => 'Bob',     'department' => 'IT',      'salary' => 70000],
//     ['name' => 'Charlie', 'department' => 'Finance', 'salary' => 60000],
//     ['name' => 'David',   'department' => 'IT',      'salary' => 80000],
//     ['name' => 'Eve',     'department' => 'Finance', 'salary' => 75000],
//     ['name' => 'Frank',   'department' => 'HR',      'salary' => 55000],
//     ['name' => 'Grace',   'department' => 'Finance', 'salary' => 65000],
//     ['name' => 'Heidi',   'department' => 'IT',      'salary' => 72000],
// ];

// $departmentwise = [];
// foreach($employees as $employee){
//     $dept = $employee['department'];
//     $departmentwise[$dept][] = $employee;
// }

// foreach($departmentwise as $depts => $departments){
//     echo "Department: {$depts}"."<br>";
//         $i = 0;
//         usort($departments, function($a, $b) {
//             return $b['salary'] <=> $a['salary']; 
//         });
//         foreach($departments as $deptdata){
//             $i++;
//             if($i <= 2){
//                 echo "{$i}. {$deptdata['name']} - {$deptdata['salary']}"."<br>";
//             }else{
//                 break;
//             }
//         }
//     echo "<br>";
//  }
$sales = [
    ['product' => 'Laptop',    'category' => 'Electronics', 'amount' => 75000, 'region' => 'North'],
    ['product' => 'Phone',     'category' => 'Electronics', 'amount' => 40000, 'region' => 'South'],
    ['product' => 'Tablet',    'category' => 'Electronics', 'amount' => 30000, 'region' => 'North'],
    ['product' => 'Shirt',     'category' => 'Clothing',    'amount' => 2000,  'region' => 'East'],
    ['product' => 'Jeans',     'category' => 'Clothing',    'amount' => 3500,  'region' => 'East'],
    ['product' => 'Jacket',    'category' => 'Clothing',    'amount' => 5000,  'region' => 'South'],
    ['product' => 'Mixer',     'category' => 'Appliances',  'amount' => 7000,  'region' => 'West'],
    ['product' => 'Toaster',   'category' => 'Appliances',  'amount' => 2500,  'region' => 'West'],
    ['product' => 'Fridge',    'category' => 'Appliances',  'amount' => 12000, 'region' => 'North'],
];

$categorywise = [];
foreach($sales as $sale){
    $cat = $sale['category'];
    $categorywise[$cat][] = $sale;
}


foreach($categorywise as $cate => $categorydata){
    $total = 0;
    $highsale = 0;
    $highsalename = '';
    foreach($categorydata as $data){
        if($data['amount'] > $highsale){
            $highsale = $data['amount'];
            $highsalename = $data['product'];
        }
        $total += $data['amount'];
    }
    $count = count($categorydata);
    $average = $total / $count;
    // echo "<pre>"; print_r($average);die();
    echo "Category: {$cate}"."<br>";
    echo "Total Sales: {$total}"."<br>";
    echo "Average Sales: {$average}"."<br>";
    echo "Top Product: {$highsalename} ($highsale)"."<br><br>";
}
