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
// $sales = [
//     ['product' => 'Laptop',    'category' => 'Electronics', 'amount' => 75000, 'region' => 'North'],
//     ['product' => 'Phone',     'category' => 'Electronics', 'amount' => 40000, 'region' => 'South'],
//     ['product' => 'Tablet',    'category' => 'Electronics', 'amount' => 30000, 'region' => 'North'],
//     ['product' => 'Shirt',     'category' => 'Clothing',    'amount' => 2000,  'region' => 'East'],
//     ['product' => 'Jeans',     'category' => 'Clothing',    'amount' => 3500,  'region' => 'East'],
//     ['product' => 'Jacket',    'category' => 'Clothing',    'amount' => 5000,  'region' => 'South'],
//     ['product' => 'Mixer',     'category' => 'Appliances',  'amount' => 7000,  'region' => 'West'],
//     ['product' => 'Toaster',   'category' => 'Appliances',  'amount' => 2500,  'region' => 'West'],
//     ['product' => 'Fridge',    'category' => 'Appliances',  'amount' => 12000, 'region' => 'North'],
// ];

// $categorywise = [];
// foreach($sales as $sale){
//     $cat = $sale['category'];
//     $categorywise[$cat][] = $sale;
// }


// foreach($categorywise as $cate => $categorydata){
//     $total = 0;
//     $highsale = 0;
//     $highsalename = '';
//     foreach($categorydata as $data){
//         if($data['amount'] > $highsale){
//             $highsale = $data['amount'];
//             $highsalename = $data['product'];
//         }
//         $total += $data['amount'];
//     }
//     $count = count($categorydata);
//     $average = $total / $count;
//     // echo "<pre>"; print_r($average);die();
//     echo "Category: {$cate}"."<br>";
//     echo "Total Sales: {$total}"."<br>";
//     echo "Average Sales: {$average}"."<br>";
//     echo "Top Product: {$highsalename} ($highsale)"."<br><br>";
// }

// $students = [
//     ['name' => 'Avi',   'Maths' => 90, 'Science' => 45, 'English' => 78],
//     ['name' => 'Tiya',  'Maths' => 35, 'Science' => 91, 'English' => 67],
//     ['name' => 'Meera', 'Maths' => 65, 'Science' => 59, 'English' => 88],
//     ['name' => 'John',  'Maths' => 49, 'Science' => 38, 'English' => 55],
// ];

// foreach($students as $student){
//      $passed = true;
//          foreach($student as $key => $marks){
//             if($key != 'name'){
//                 if($marks < 40){
//                     $passed = false; 
//                     break; // no need to check further
//                 }
//             }
//         }
//         if($passed){
//         echo $student['name'] . " passed in all subjects.<br>";
//     }
// }

// $students = [
//     ['name' => 'Avi',   'Maths' => 90, 'Science' => 45, 'English' => 78],
//     ['name' => 'Tiya',  'Maths' => 35, 'Science' => 91, 'English' => 67],
//     ['name' => 'Meera', 'Maths' => 65, 'Science' => 59, 'English' => 88],
//     ['name' => 'John',  'Maths' => 49, 'Science' => 38, 'English' => 55],
// ];


// foreach($students as $student){
//     $fail = false;
//     foreach($student as $key => $marks){
//         if($key != 'name'){
//             if($marks < 40){
//                 $fail = true;
//                 break;
//             }
//         }
//     }
//     if($fail){
//         echo "{$student['name']} failed in at least one subject."."<br>";
//     }

// }

// $students = [
//     ['name' => 'Avi',   'Maths' => 90, 'Science' => 45, 'English' => 78],
//     ['name' => 'Tiya',  'Maths' => 35, 'Science' => 91, 'English' => 67],
//     ['name' => 'Meera', 'Maths' => 65, 'Science' => 59, 'English' => 88],
//     ['name' => 'John',  'Maths' => 49, 'Science' => 38, 'English' => 55],
// ];

// foreach($students as $student){
//     $passsubject = 0;
//     $failsubject = '';
//     foreach($student as $key => $marks){
//         if($key != 'name'){
//             if($marks >= 40){
//                 $passsubject++;
//             }else{
//                 $failsubject = $key;
//             }
//         }
//     }
//     if($passsubject == 2){
//     echo "{$student['name']} passed in {$passsubject} subjects, failed in: {$failsubject}"."<br>";
//     }
// }

// $students = [
//     ['name' => 'Avi',   'Maths' => 90, 'Science' => 45, 'English' => 78],
//     ['name' => 'Tiya',  'Maths' => 35, 'Science' => 91, 'English' => 67],
//     ['name' => 'Meera', 'Maths' => 65, 'Science' => 59, 'English' => 88],
//     ['name' => 'John',  'Maths' => 49, 'Science' => 38, 'English' => 55],
// ];

//  foreach($students as $student){
//     $total = 0;
//      foreach($student as $key => $marks){
//         if($key != 'name'){
//             $total += $marks; 
//          }
//     }
//     echo "{$student['name']} scored {$total} total marks."."<br>";
// }

// $students = [
//     ['name' => 'Avi',   'Maths' => 90, 'Science' => 45, 'English' => 78],
//     ['name' => 'Tiya',  'Maths' => 35, 'Science' => 91, 'English' => 67],
//     ['name' => 'Meera', 'Maths' => 65, 'Science' => 59, 'English' => 88],
//     ['name' => 'John',  'Maths' => 49, 'Science' => 38, 'English' => 55],
// ];

// foreach($students as $student){
//     $highsubjectmark = 0;
//     $highsubject = '';
//      foreach($student as $key => $marks){
//         if($key != 'name'){
//             if($marks > $highsubjectmark){
//                 $highsubjectmark = $marks;
//                 $highsubject = $key;
//             }
//         }
//     }
//     echo "{$student['name']}’s best subject is {$highsubject} ({$highsubjectmark})."."<br>";
// }
// Avi’s best subject is Maths (90).


// $students = [
//     ['name' => 'Avi',   'Maths' => 90, 'Science' => 45, 'English' => 78],
//     ['name' => 'Tiya',  'Maths' => 35, 'Science' => 91, 'English' => 67],
//     ['name' => 'Meera', 'Maths' => 65, 'Science' => 59, 'English' => 88],
//     ['name' => 'John',  'Maths' => 49, 'Science' => 38, 'English' => 55],
// ];

// foreach($students as $student){
//     $failsubjects = []; // store multiple fail subjects
//     foreach($student as $key => $marks){
//          if($key != 'name'){
//             if($marks < 40){
//                $failsubjects[] = $key;
//             }
//         }
//     }
//      foreach($failsubjects as $subject){
//         echo "{$subject} : {$student['name']}<br>";
//      }
// }

// $students = [
//     ['name' => 'Avi',   'Maths' => 90, 'Science' => 45, 'English' => 78],
//     ['name' => 'Tiya',  'Maths' => 35, 'Science' => 91, 'English' => 67],
//     ['name' => 'Meera', 'Maths' => 65, 'Science' => 59, 'English' => 88],
//     ['name' => 'John',  'Maths' => 49, 'Science' => 38, 'English' => 55],
// ];

// foreach($students as $student){
//     $failcount = 0;
//     foreach($student as $key => $marks){
//          if($key != 'name'){
//              if($marks < 40){
//                 $failcount++;
//              }
//          }
//     }
//     if($failcount == 0){
//         echo "{$student['name']} : All Passed"."<br>";
//     }else{
//          echo "{$student['name']} : $failcount"."<br>";
//     }
// }


// $students = [
//     ['name' => 'Avi',   'Maths' => 90, 'Science' => 45, 'English' => 78],
//     ['name' => 'Tiya',  'Maths' => 35, 'Science' => 91, 'English' => 67],
//     ['name' => 'Meera', 'Maths' => 65, 'Science' => 59, 'English' => 88],
//     ['name' => 'John',  'Maths' => 49, 'Science' => 38, 'English' => 55],
// ];

// $subjects = ['Maths', 'Science', 'English'];
// $failsBySubject = [
//     'Maths' => [],
//     'Science' => [],
//     'English' => []
// ];

// foreach($students as $student){
//     foreach($subjects as $subject){
//         if($student[$subject] < 40){
//             $failsBySubject[$subject][] = $student['name'];
//         }
//     }
// }

// echo "Subject-wise Fail List:<br>";
// foreach($failsBySubject as $subject => $names){
//     if(!empty($names)){
//         echo "{$subject} : ".implode(", ", $names)."<br>";
//     } else {
//         echo "{$subject} : (none)<br>";
//     }
// }

// echo "<br>";

// $byFailCount = []; // key = fail count, value = array of student names

// foreach($students as $student){
//     $failCount = 0;
//     foreach($subjects as $subject){
//         if($student[$subject] < 40){
//             $failCount++;
//         }
//     }
//     if($failCount > 0){
//         $byFailCount[$failCount][] = $student['name'];
//     }
// }

// echo "Fail-Count Grouping:<br>";

// // Determine max fail count for labels
// $maxFail = max(array_keys($byFailCount) ?: [0]);

// for($i=1; $i<=$maxFail; $i++){
//     if(isset($byFailCount[$i]) && !empty($byFailCount[$i])){
//         echo "{$i}-fail : ".implode(", ", $byFailCount[$i])."<br>";
//     } else {
//         echo "{$i}-fail : (none)<br>";
//     }
// }
// Step 1: Define our dataset
// $students = [
//     ['name' => 'Avi',   'department' => 'Science', 'Maths' => 90, 'Physics' => 85, 'Chemistry' => 78],
//     ['name' => 'Tiya',  'department' => 'Science', 'Maths' => 88, 'Physics' => 91, 'Chemistry' => 69],
//     ['name' => 'Mehul', 'department' => 'Commerce','Accounts' => 95, 'Economics' => 89, 'Business' => 92],
//     ['name' => 'Riya',  'department' => 'Commerce','Accounts' => 75, 'Economics' => 82, 'Business' => 79],
//     ['name' => 'Karan', 'department' => 'Arts',    'History' => 89, 'Geography' => 76, 'Political' => 84],
//     ['name' => 'Pooja', 'department' => 'Arts',    'History' => 92, 'Geography' => 88, 'Political' => 91],
// ];

// // Step 2: Group data department-wise
// $departments = [];
// foreach ($students as $student) {
//     $dept = $student['department']; // pick the department
//     $departments[$dept][] = $student; // push student inside their department group
// }

// foreach($departments as $deptName => $deptStudents){
//     echo "$deptName Department:"."<br>";
//     // take keys from first student
//     $subjects = array_keys($deptStudents[0]);
//     $subjects = array_diff($subjects, ['name', 'department']); // remove name & department

//       // Step 3b: For each subject, calculate average & topper

//           foreach ($subjects as $subject) {
//             $total = 0;
//             $count = 0;
//             $topper = '';
//             $topMarks = -1;
//                     foreach ($deptStudents as $stu) {
//                         $marks = $stu[$subject];
//                         $total += $marks;
//                         $count++;
//                         if($marks > $topMarks){
//                             $topMarks = $marks;
//                             $topper = $stu['name'];
//                         }
//                     }
//             $avg = $total / $count; // average formula.
//             echo "  Subject: $subject → Average: " . round($avg,1) . ", Topper: $topper ($topMarks)"."<br>";
//           }
//           echo "<br>";
// }

// $employees = [
//     ['name' => 'Alice',   'department' => 'HR', 'salary' => 50000],
//     ['name' => 'Bob',     'department' => 'IT', 'salary' => 70000],
//     ['name' => 'Charlie', 'department' => 'Finance', 'salary' => 60000],
//     ['name' => 'Diana',   'department' => 'HR', 'salary' => 55000],
//     ['name' => 'Eve',     'department' => 'IT', 'salary' => 72000],
// ];

// // Step 1: Transform rows → columns (group by department)
// $report = [];
// foreach($employees as $emp){
//     $dept = $emp['department'];
//     $report[$dept][] = $emp['name']. "({$emp['salary']})";
// }

// // Step 2: Print column-style report
// foreach ($report as $dept => $list) {
//     echo $dept . " : " . implode(", ", $list) . "<br>";
// }

// $students = [
//     ['name' => 'Avi',  'Maths' => 95, 'Science' => 90, 'English' => 85],
//     ['name' => 'Tiya', 'Maths' => 95, 'Science' => 92, 'English' => 80],
//     ['name' => 'Mehul','Maths' => 95, 'Science' => 92, 'English' => 88],
// ];

// // Step 1: Define subject priority order

// $priority = ['Maths', 'Science', 'English'];

// // Step 2: Sort students with multi-level comparison

// usort($students, function($a, $b) use ($priority) {
//     foreach ($priority as $subject) {
//         if ($a[$subject] != $b[$subject]) {
//             return $b[$subject] - $a[$subject]; // higher marks first
//         }
//     }
//     return 0; // complete tie
// });

// $topper = $students[0];
// echo "Topper: {$topper['name']} (Maths: {$topper['Maths']}, Science: {$topper['Science']}, English: {$topper['English']})";

// $employees = [
//     ['name' => 'Alice',   'department' => 'HR',      'salary' => 50000],
//     ['name' => 'Bob',     'department' => 'IT',      'salary' => 70000],
//     ['name' => 'Charlie', 'department' => 'Finance', 'salary' => 60000],
//     ['name' => 'Diana',   'department' => 'HR',      'salary' => 55000],
//     ['name' => 'Eve',     'department' => 'IT',      'salary' => 72000],
//     ['name' => 'Frank',   'department' => 'Finance', 'salary' => 58000],
// ];


// // Step 1: Group by department
// $departments = [];

// foreach($employees as $emp){
//     $dept = $emp['department'];
//     $departments[$dept][] = $emp;
// }

// // Step 2: Find highest & lowest in each department
// foreach ($departments as $dept => $list) {
//         $highest = $list[0];
//         $lowest = $list[0];
//             foreach ($list as $emp) {
//                 if ($emp['salary'] > $highest['salary']) {
//                     $highest = $emp;
//                 }
//                 if ($emp['salary'] < $lowest['salary']) {
//                     $lowest = $emp;
//                 }
//             }
//                 echo "$dept Department:"."<br>";
//                     echo "  Highest: {$highest['name']} ({$highest['salary']})\n";
//     echo "  Lowest : {$lowest['name']} ({$lowest['salary']})\n\n";
// }

// $students = [
//     ['name' => 'Avi',   'Maths' => 95, 'Science' => 90],
//     ['name' => 'Tiya',  'Maths' => 92, 'Science' => 95],
//     ['name' => 'Mehul', 'Maths' => 95, 'Science' => 95],
//     ['name' => 'Riya',  'Maths' => 88, 'Science' => 85],
// ];
// // Step 1: Extract subjects dynamically
// $subjects = array_keys($students[0]);
// $subjects = array_diff($subjects, ['name']); // exclude 'name'

// // Step 2: For each subject, rank students
// foreach ($subjects as $subject) {
//         // Copy student list
//     $temp = $students;
// // Sort by subject marks descending
//     usort($temp, function($a, $b) use ($subject) {
//         return $b[$subject] - $a[$subject];
//     });
//     echo "$subject Ranking:"."<br>";
//     $rank = 1;
//     $prevMarks = null;
//         foreach ($temp as $index => $stu) {
//         if ($prevMarks !== null && $stu[$subject] < $prevMarks) {
//             $rank = $index + 1; // move to next rank
//         }
//         echo "  Rank $rank: {$stu['name']} ({$stu[$subject]})"."<br>";
//         $prevMarks = $stu[$subject];
//     }
//     echo "<br>";
// }

// $employees = [
//     ['name' => 'Alice',   'department' => 'HR', 'salary' => 50000],
//     ['name' => 'Bob',     'department' => 'IT', 'salary' => 70000],
//     ['name' => 'Charlie', 'department' => 'Finance', 'salary' => 60000],
//     ['name' => 'Diana',   'department' => 'HR', 'salary' => 55000],
//     ['name' => 'Eve',     'department' => 'IT', 'salary' => 72000],
// ];

// $report = [];
// foreach($employees as $emp){
//     $dept = $emp['department'];
//     $report[$dept][] = $emp['name'] . "({$emp['salary']})";
// }

// foreach ($report as $dept => $list) {
//     echo $dept . " : " . implode(", ", $list) . "<br>";
// }

// $employees = [
//     ['name' => 'Alice',   'department' => 'HR', 'salary' => 50000],
//     ['name' => 'Bob',     'department' => 'IT', 'salary' => 70000],
//     ['name' => 'Charlie', 'department' => 'Finance', 'salary' => 60000],
//     ['name' => 'Diana',   'department' => 'HR', 'salary' => 55000],
//     ['name' => 'Eve',     'department' => 'IT', 'salary' => 72000],
// ];

// $report = [];
// foreach($employees as $emp){
//     $dept = $emp['department'];
//     $report[$dept][] = $emp['name']. "({$emp['salary']})";
// }

// foreach($report as $dept => $list){
//     echo $dept . " : ".implode(", ", $list) . "<br>";
// }

// $students = [
//     ['name' => 'Avi',  'Maths' => 95, 'Science' => 90, 'English' => 85],
//     ['name' => 'Tiya', 'Maths' => 95, 'Science' => 92, 'English' => 80],
//     ['name' => 'Mehul','Maths' => 95, 'Science' => 92, 'English' => 88],
// ];

// $priority = ['Maths', 'Science', 'English'];

// usort($students, function($a, $b) use ($priority){
//     foreach($priority as $subject){
//         if($a[$subject] != $b[$subject]){
//             return $b[$subject] - $a[$subject];
//         }
        
//     }
//     return 0;
// });

// $topper = $students[0];
// echo "Topper: {$topper['name']} (Maths: {$topper['Maths']}, Science: {$topper['Science']}, English: {$topper['English']})";
// 


// $employees = [
//     ['name' => 'Alice',   'department' => 'HR',      'salary' => 50000],
//     ['name' => 'Bob',     'department' => 'IT',      'salary' => 70000],
//     ['name' => 'Charlie', 'department' => 'Finance', 'salary' => 60000],
//     ['name' => 'Diana',   'department' => 'HR',      'salary' => 55000],
//     ['name' => 'Eve',     'department' => 'IT',      'salary' => 72000],
//     ['name' => 'Frank',   'department' => 'Finance', 'salary' => 58000],
// ];

// // Step 1: Group by department
// $departments = [];
// foreach($employees as $employee){
//     $dept = $employee['department'];
//     $departments[$dept][] = $employee;
// }

// foreach ($departments as $dept => $list) {
//     $highest = $list[0];
//     $lowest = $list[0];

//     foreach($list as $emp){
//         if($emp['salary'] > $highest['salary']){
//             $highest = $emp;
//         }
//          if($emp['salary'] < $highest['salary']){
//             $lowest = $emp;
//         }
//     }
//         echo "$dept Department:". "<br>";
//     echo "  Highest: {$highest['name']} ({$highest['salary']})". "<br>";
//     echo "  Lowest : {$lowest['name']} ({$lowest['salary']})". "<br><br>";

// }
// Step 2: Find highest & lowest in each department

// $students = [
//     ['name' => 'Avi',   'Maths' => 95, 'Science' => 90],
//     ['name' => 'Tiya',  'Maths' => 92, 'Science' => 95],
//     ['name' => 'Mehul', 'Maths' => 95, 'Science' => 95],
//     ['name' => 'Riya',  'Maths' => 88, 'Science' => 85],
// ];

// // Step 1: Extract subjects dynamically
// $subjects = array_keys($students[0]);
// $subjects = array_diff($subjects, ['name']); // exclude 'name'

// // Step 2: For each subject, rank students
// foreach ($subjects as $subject) {

//     // Copy student list
//     $temp = $students;

//     // Sort by subject marks descending
//     usort($temp, function($a, $b) use ($subject) {
//         return $b[$subject] - $a[$subject];
//     });

//     echo "$subject Ranking:"."<br>";
//     $rank = 1;
//     $prevMarks = null;
//     foreach ($temp as $index => $stu) {
//         if ($prevMarks !== null && $stu[$subject] < $prevMarks) {
//             $rank = $index + 1; // move to next rank
//         }
//         echo "  Rank $rank: {$stu['name']} ({$stu[$subject]})"."<br>";
//         $prevMarks = $stu[$subject];
//     }
//     echo "<br>";
// }


// $students = [
//     ['name' => 'Avi',   'Maths' => 90, 'Science' => 85, 'English' => 78],
//     ['name' => 'Tiya',  'Maths' => 95, 'Science' => 91, 'English' => 80],
//     ['name' => 'Kia',   'Maths' => 95, 'Science' => 88, 'English' => 84],
//     ['name' => 'Mahi',  'Maths' => 88, 'Science' => 91, 'English' => 82],
// ];

// $subjectwise = [];
// foreach($students as $student){
//     foreach($student as $key => $marks){
//        if($key != 'name'){
//             $subjectwise[$key][] = [
//                 'name' => $student['name'],
//                 'marks' => $marks
//             ];
//         }
//     }
// }


// foreach($subjectwise as $sub => $subjectdata){
//     $highestmark = 0;
//     $highestname = [];
//     foreach($subjectdata as $data){
//         if($data['marks'] > $highestmark){
//             $highestmark = $data['marks'];
//             $highestname = [$data['name']];
//         }elseif($data['marks'] == $highestmark){
//             $highestname[] = $data['name'];
//         }
//     }
//     $names = implode(", ", $highestname);
//     echo "{$sub} Topper(s): {$names} with {$highestmark} marks"."<br>";
// }

// Overall Rank List with Tie Handling

// $students = [
//     ['name' => 'Avi',   'Maths' => 90, 'Science' => 45, 'English' => 78],
//     ['name' => 'Tiya',  'Maths' => 88, 'Science' => 91, 'English' => 84],
//     ['name' => 'Mehul', 'Maths' => 90, 'Science' => 45, 'English' => 78],
//     ['name' => 'Sita',  'Maths' => 92, 'Science' => 87, 'English' => 92],
// ];

// $subjectwise = [];

// foreach($students as $student){
//     $total = 0;
//     foreach($student as $key => $data){
//         if($key != 'name'){
//             $total += $data;
//         }
//     }
//     $subjectwise[] = [
//         'name' => $student['name'],
//         'mark' => $total
//     ];
// }

//  usort($subjectwise, function($a, $b) {
//         if ($b['mark'] == $a['mark']) {
//             return strcmp($a['name'], $b['name']);
//         }
//         return $b['mark'] <=> $a['mark'];
//     });

// $i = 0;
// foreach($subjectwise as $list){
//     $i++;
//     echo "Rank {$i}: {$list['name']} ({$list['mark']})"."<br>";
// }

//Subject Topper + Overall Topper in One Report

// Task:

// For each subject, find highest scorer(s).

// Also calculate overall topper (highest total marks).

// Print final report like:
// $students = [
//     ['name' => 'Avi',   'Maths' => 90, 'Science' => 45, 'English' => 78],
//     ['name' => 'Tiya',  'Maths' => 88, 'Science' => 91, 'English' => 84],
//     ['name' => 'Mehul', 'Maths' => 90, 'Science' => 45, 'English' => 78],
//     ['name' => 'Sita',  'Maths' => 92, 'Science' => 87, 'English' => 92],
// ];

// $subjectwise = [];

// // Step 1: Collect marks subject-wise + total
// foreach($students as $student) {
//     $total = 0;
//     foreach($student as $key => $data) {
//         if($key != 'name'){
//             $total += $data;
//             $subjectwise[$key][$student['name']] = $data;
//         }
//     }
//     $subjectwise['total'][$student['name']] = $total;
// }

// // Step 2: Find toppers (allowing multiple toppers)
// foreach($subjectwise as $index => $subjects){
//     $highscore = max($subjects); // highest mark in this subject/total
//     $toppers = [];               // collect toppers
    
//     foreach($subjects as $name => $mark){
//         if($mark == $highscore){
//             $toppers[] = $name;
//         }
//     }

//     // Step 3: Print Report
//     $toppersList = implode(", ", $toppers);
//     if($index == 'total'){
//         echo "🏆 Overall Topper(s) → {$toppersList} ({$highscore})<br>";
//     } else {
//         echo "📘 Subject: {$index} → Topper(s): {$toppersList} ({$highscore})<br>";
//     }
// }

// $employees = [
//     ['name' => 'Avi',   'department' => 'HR',       'salary' => 40000, 'bonus' => 5000],
//     ['name' => 'Tiya',  'department' => 'HR',       'salary' => 42000, 'bonus' => 7000],
//     ['name' => 'Raj',   'department' => 'IT',       'salary' => 60000, 'bonus' => 8000],
//     ['name' => 'Maya',  'department' => 'IT',       'salary' => 65000, 'bonus' => 6000],
//     ['name' => 'Karan', 'department' => 'Finance',  'salary' => 55000, 'bonus' => 9000],
//     ['name' => 'Sara',  'department' => 'Finance',  'salary' => 53000, 'bonus' => 8500],
// ];

// $departmentwise = [];
// foreach($employees as $employee){
//     $dept = $employee['department'];
//     $departmentwise[$dept][] = $employee;
// }



// foreach($departmentwise as $dept => $departments){

//     $total = 0;
//     $count = 0;
//     $average = 0;
//     $highsalary = 0;
//     $topname = '';
//     foreach($departments as $data){
//         $count++;
//         $total += $data['salary'];
//         $average += $data['bonus'];
//         if($data['salary'] > $highsalary){
//             $highsalary = $data['salary'];
//             $topname = $data['name'];
//         }
//     }
//     $averagebonus = $average / $count;
//         echo "Department: {$dept}"."<br>";
//     echo "Total Salary: {$total}"."<br>";
//     echo "Average Bonus: {$averagebonus}"."<br>";
//     echo "Highest Salary: {$topname} ({$highsalary})"."<br><br>";
// }
// $students = [
//     ["name" => "Avi",   "Maths" => 85, "Science" => 92, "English" => 78],
//     ["name" => "Tiya",  "Maths" => 85, "Science" => 92, "English" => 78],
//     ["name" => "Reva",  "Maths" => 85, "Science" => 88, "English" => 95],
//     ["name" => "Mihir", "Maths" => 92, "Science" => 90, "English" => 80],
//     ["name" => "Arya",  "Maths" => 92, "Science" => 92, "English" => 70],
// ];

// $subjectwise = [];
// foreach($students as  $student){
//     $name = $student['name'];
//     $total = 0;
//     foreach($student as $key => $mark){
//         if($key != 'name'){
//             $subjectwise[$key][$name] = $mark;
//             $total += $mark;
//         }
//         $subjectwise['total'][$name] = $total;
//     }
// }


// foreach($subjectwise as $sub => $subjects){
//     $highmark = max($subjects); // highest marks in this subject
//     $toppers = [];
//     foreach($subjects as $name => $marks){
//         if($marks == $highmark){
//             $toppers[] = $name;
//         }
//     }
//     echo "Topper in {$sub}: " . implode(", ", $toppers) . " ({$highmark} marks)<br>";
// }


// $students = [
//     ['name' => 'Avi',   'department' => 'IT',      'Maths' => 80, 'Science' => 70, 'English' => 90],
//     ['name' => 'Tiya',  'department' => 'IT',      'Maths' => 35, 'Science' => 60, 'English' => 45],
//     ['name' => 'Mira',  'department' => 'HR',      'Maths' => 55, 'Science' => 40, 'English' => 30],
//     ['name' => 'Ravi',  'department' => 'HR',      'Maths' => 90, 'Science' => 85, 'English' => 95],
//     ['name' => 'Sara',  'department' => 'Finance', 'Maths' => 72, 'Science' => 65, 'English' => 88],
// ];

// $subjects = array_keys($students[0]);
// $subjects = array_values(array_diff($subjects, ['name','department']));

// // step 1 — group rows by department
// $byDept = [];
// foreach($students as $row){
//     $dept = $row['department'];
//     $byDept[$dept][] = $row;
// }

// // step 2 — prepare a report structure and accumulate
// $report = [];  // $report[$dept] = ['students'=>..., 'sum'=>[subj=>...], 'failCount'=>...]

// foreach ($byDept as $dept => $rows) {
//     $report[$dept] = [
//         'students' => 0,
//         'sum'      => array_fill_keys($subjects, 0),
//         'failCount'=> 0
//     ];

//     foreach ($rows as $r) {
//         $report[$dept]['students']++;

//         $failedThisStudent = false;
//         foreach ($subjects as $subj) {
//             $mark = $r[$subj];
//             $report[$dept]['sum'][$subj] += $mark;
//             if ($mark < 40) {
//                 $failedThisStudent = true;
//             }
//         }
//         if ($failedThisStudent) {
//             $report[$dept]['failCount']++;
//         }
//     }
// }
// //step 3 — compute averages per subject (sum / students)
// foreach ($report as $dept => &$rec) {
//     $rec['avg'] = [];
//     foreach ($subjects as $subj) {
//         $rec['avg'][$subj] = $rec['students'] > 0
//             ? $rec['sum'][$subj] / $rec['students']
//             : 0;
//     }
// }
// unset($rec); // break reference

// // step 4 — print a clean report

// foreach ($report as $dept => $rec) {
//     echo "Department: $dept\n";
//     echo "  Students: {$rec['students']}"."<br>";
//     foreach ($subjects as $subj) {
//         // 1 decimal place for nicer look
//         $avg = number_format($rec['avg'][$subj], 1);
//         echo "  Avg $subj: $avg"."<br>";
//     }
//     echo "  Fail Count: {$rec['failCount']}"."<br><br>";
// }

// print_r($report);

// $students = [
//     ["name" => "Avi",   "Maths" => 85, "Science" => 92, "English" => 78],
//     ["name" => "Tiya",  "Maths" => 90, "Science" => 88, "English" => 91],
//     ["name" => "Ravi",  "Maths" => 92, "Science" => 70, "English" => 85],
//     ["name" => "Mona",  "Maths" => 75, "Science" => 95, "English" => 89],
// ];

// // Step 1: Collect subject-wise data

// $subjects = ["Maths", "Science", "English"];
// $subjectWise = [];

// foreach($subjects as $subject){
//     foreach($students as $student){
//         $subjectWise[$subject][] = [
//             "name" => $student["name"],
//             "mark" => $student[$subject]
//         ];
//     }
// }

// // Step 2: Sort each subject by marks descending
// foreach($subjectWise as $subject => &$list){
//     usort($list, function($a, $b){
//         return $b["mark"] <=> $a["mark"];
//     });
// }

// // Step 3: Print Rankings
// foreach ($subjectWise as $subject => $list) {
//     echo "$subject Ranking:"."<br>";
//     $rank = 1;
//     foreach($list as $entry){
//         echo $rank . ". " .$entry["name"]. " (". $entry["mark"] . ")"."<br>";
//         $rank++;
//     }
//     echo "<br>";
// }

// $students = [
//     ["name" => "Avi",   "Maths" => 85, "Science" => 92, "English" => 78],
//     ["name" => "Tiya",  "Maths" => 90, "Science" => 88, "English" => 91],
//     ["name" => "Ravi",  "Maths" => 84, "Science" => 93, "English" => 78],
//     ["name" => "Mona",  "Maths" => 75, "Science" => 95, "English" => 89],
// ];

// $totalmarks =[];
// foreach($students as $student){
//     $name = $student['name'];
//     $total = 0;
//     $science = 0;
//     foreach($student as $key => $data){
//         if($key != 'name'){
//             $total += $data;
//             if($key == 'Science'){
//                 $science = $data;
//             }
            
//         }
//     }
//     $totalmarks[] = [
//         'total' => $total,
//         'science' => $science,
//         'name' => $name
//     ];    

// }

// usort($totalmarks, function($a, $b){
//                 if ($a['total'] === $b['total']) {
//                      return $b["science"] <=> $a["science"];
//                 }
//             return $b["total"] <=> $a["total"];
//         });

// $rank = 0;
// foreach($totalmarks as $name => $list){
//     $rank++;
//     echo "{$rank}. {$list['name']} ({$list['total']}) "."<br>";
//  }

// $students = [
//     ["name" => "Avi",   "Maths" => 85, "Science" => 92, "English" => 78],
//     ["name" => "Tiya",  "Maths" => 90, "Science" => 88, "English" => 91],
//     ["name" => "Ravi",  "Maths" => 84, "Science" => 93, "English" => 78],
//     ["name" => "Mona",  "Maths" => 75, "Science" => 95, "English" => 89],
// ];

// $subjectdata = [];
// foreach($students['0'] as $key => $value){
//     if($key != 'name'){
//         $subjectdata[] = $key;
//     }
// }

// $subjectwise = [];
// foreach($students as $student){
//     $name = $student['name'];
//     foreach($subjectdata as $subjects){
//         $subjectwise[$subjects][$name] = $student[$subjects];
//     }
// }

// foreach($subjectwise as $subname => $subject){
//     $maxmark = max($subject);
//     $minmark = min($subject);
//     $maxname = array_search($maxmark, $subject);
//     $minname = array_search($minmark, $subject);
//     $sum = array_sum($subject);
//     $count = 0;
//     $average = 0;
//     foreach($subject as $sub){
//         $count++;
//     }
//     $average = $sum / $count;
//     $round = round($average, 1);
//     echo "Subject: {$subname}"."<br>";
//     echo "Total: {$sum}"."<br>";
//     echo "Average: {$round}"."<br>";
//     echo "Highest: {$maxname} ({$maxmark})"."<br>";
//     echo "Lowest: {$minname} ({$minmark})"."<br><br>";
// }


// $students = [
//     ["name" => "Avi",   "Maths" => 85, "Science" => 92, "English" => 78],
//     ["name" => "Tiya",  "Maths" => 90, "Science" => 88, "English" => 91],
//     ["name" => "Ravi",  "Maths" => 84, "Science" => 93, "English" => 78],
//     ["name" => "Mona",  "Maths" => 75, "Science" => 95, "English" => 89],
// ];

// // Step 1: Get subject names dynamically

// $subjectdata = [];
// foreach($students[0] as $key => $value){
//     if($key != 'name'){
//         $subjectdata[] = $key;
//     }
// }

// // Step 2: Build subject-wise marks
// $subjectwise = [];
// foreach($students as $student){
//     $name = $student['name'];
//     foreach($subjectdata as $subjectName){
//         $subjectwise[$subjectName][$name] = $student[$subjectName]; // ???
//     }
// }


// // Step 3: Process each subject
// foreach($subjectwise as $subname => $marks){
//     arsort($marks);
//      echo "Subject: {$subname}<br>";
//     $rank = 1;
//     foreach($marks as $studentName => $score){
//         if($rank <= 2){
//             echo "  {$rank}. {$studentName} ({$score})<br>";
//             $rank++;
//         }
//     }
//     echo "<br>";
// }


// $students = [
//     ["name" => "Avi",   "Maths" => 85, "Science" => 92, "English" => 78],
//     ["name" => "Tiya",  "Maths" => 90, "Science" => 88, "English" => 91],
//     ["name" => "Ravi",  "Maths" => 84, "Science" => 93, "English" => 78],
//     ["name" => "Mona",  "Maths" => 75, "Science" => 95, "English" => 89],
// ];

// // Step 1: Extract subjects dynamically (skip 'name')

// $subjects = [];
// foreach($students['0'] as $key => $value){
//     if($key != 'name'){
//         $subjects[] = $key;
//     }
// }  

// // Step 2: Initialize result array
// $gradeBands = [];

// // Step 3: Loop students → subjects → assign grade
// foreach ($students as $student) {
//     $name = $student['name'];

//     foreach ($subjects as $subject) {
//         $score = $student[$subject];

//         // Grade logic
//         if ($score >= 90) {
//             $grade = 'A';
//         } elseif ($score >= 80) {
//             $grade = 'B';
//         } elseif ($score >= 70) {
//             $grade = 'C';
//         } else {
//             $grade = 'D';
//         }

//         // Store in grade band structure
//         $gradeBands[$subject][$grade][] = [
//             'name' => $name,
//             'mark' => $score
//         ];
//     }
// }
// // Step 4: Display result
// foreach ($gradeBands as $subject => $bands) {
//     echo "Subject: $subject";
//     foreach ($bands as $grade => $studentsList) {
//         echo "  Grade $grade:"."<br>";
//         foreach ($studentsList as $info) {
//             echo "    {$info['name']} ({$info['mark']})"."<br>";;
//         }
//     }
//     echo "<br>";
// }


// $students = [
//     ["name" => "Avi",   "Maths" => 85, "Science" => 92, "English" => 78],
//     ["name" => "Tiya",  "Maths" => 90, "Science" => 88, "English" => 91],
//     ["name" => "Mona",  "Maths" => 75, "Science" => 95, "English" => 89],
//     ["name" => "Ravi",  "Maths" => 84, "Science" => 93, "English" => 78],
// ];

// $subjects = ["Maths", "Science", "English"];

// // Grade ranges
// function getGrade($marks) {
//     if ($marks >= 90) return "A";
//     if ($marks >= 80) return "B";
//     if ($marks >= 70) return "C";
//     return "D";
// }

// foreach ($subjects as $subject) {
//     // initialize grade counters
//     $gradeCounts = ["A" => 0, "B" => 0, "C" => 0, "D" => 0];

//     foreach ($students as $student) {
//         $marks = $student[$subject];
//         $grade = getGrade($marks);
//         $gradeCounts[$grade]++; // increment counter
//     }

//     // Print results
//     echo "Subject: $subject"."<br>";
//     foreach ($gradeCounts as $grade => $count) {
//         echo "  $grade: $count"."<br>";
//     }
//     echo "<br>";
// }


// $students = [
//     ["name" => "Avi",   "Maths" => 85, "Science" => 92, "English" => 78],
//     ["name" => "Tiya",  "Maths" => 90, "Science" => 88, "English" => 91],
//     ["name" => "Mona",  "Maths" => 75, "Science" => 95, "English" => 89],
//     ["name" => "Ravi",  "Maths" => 84, "Science" => 93, "English" => 78],
// ];
// $count = count($students);
// $subjects = [];
// foreach($students['0'] as $key => $student){
//     if($key != 'name'){
//         $subjects[] = $key;
//     }
// }

// $subjectwise = [];
// foreach($students as $student){
//     $name = $student['name'];
//     foreach($subjects as $subject){
//         $subjectwise[$subject][$name] = $student[$subject];
//     }
// }

// foreach($subjectwise as $sub => $subjecdata){
//     $maxvalue = max($subjecdata);
//     $maxname  = array_search($maxvalue, $subjecdata);
//     $minvalue = min($subjecdata);
//     $minname  = array_search($minvalue, $subjecdata);
//     $total = array_sum($subjecdata);
//     $average = round($total / $count, 1);

//     $maxStudents = [];
//     foreach ($subjecdata as $studentName => $mark) {
//         if ($mark == $maxvalue) {
//             $maxStudents[] = $studentName;
//         }
//     }
//     $maxNames = implode(", ", $maxStudents);

//     // Find all students with min value
//     $minStudents = [];
//     foreach ($subjecdata as $studentName => $mark) {
//         if ($mark == $minvalue) {
//             $minStudents[] = $studentName;
//         }
//     }
//     $minNames = implode(", ", $minStudents);

//     echo "Subject: {$sub}"."<br>";
//     echo "Average: {$average}"."<br>";
//     echo "Highest: {$maxvalue}  ({$maxNames})"."<br>";
//     echo "Lowest: {$minvalue}  ({$minNames})"."<br><br>";
// }


// ===== Step 1: Inputs =====
// $students = [
//     ["name" => "Avi",   "Maths" => 85, "Science" => 92, "English" => 78],
//     ["name" => "Tiya",  "Maths" => 90, "Science" => 88, "English" => 91],
//     ["name" => "Mona",  "Maths" => 75, "Science" => 95, "English" => 89],
//     ["name" => "Ravi",  "Maths" => 84, "Science" => 93, "English" => 78],
// ];

// // Optional bonus marks (student & subject specific)
// $bonusMarks = [
//     "Avi"  => ["Science" => 3],   // Avi gets +3 in Science -> 95
//     "Mona" => ["Maths"   => 5],   // Mona gets +5 in Maths  -> 80
//     // You can add more if you like...
// ];


// // Grade function
// function getGrade(int $marks): string {
//     if ($marks >= 90) return 'A';
//     if ($marks >= 80) return 'B';
//     if ($marks >= 70) return 'C';
//     return 'D';
// }

// // ===== Step 2: Extract subjects dynamically =====
// $subjects = [];
// foreach ($students[0] as $key => $val) {
//     if ($key !== 'name') $subjects[] = $key;
// }

// // ===== Step 3: Build effective marks (apply bonus if present) =====
// $effective = []; // $effective[$name][$subject] = markAfterBonus
// foreach ($students as $row) {
//     $name = $row['name'];
//     foreach ($subjects as $subj) {
//         $mark = $row[$subj];
//         if (isset($bonusMarks[$name][$subj])) {
//             $mark += $bonusMarks[$name][$subj];
//         }
//         // (Optional) cap at 100 if your rules demand: $mark = min(100, $mark);
//         $effective[$name][$subj] = $mark;
//     }
// }

// // ===== Step 4: Build subject-wise arrays =====
// $subjectMarks = []; // $subjectMarks['Maths'] = ['Avi'=>..., 'Tiya'=>...]
// foreach ($subjects as $subj) {
//     foreach ($effective as $name => $marksBySubj) {
//         // Guard for irregular data: skip if missing
//         if (!isset($marksBySubj[$subj])) continue;
//         $subjectMarks[$subj][$name] = $marksBySubj[$subj];
//     }
// }
// // ===== Step 5: Subject-wise metrics =====
// $subjectAverages = [];   // for global highlight
// $subjectAGradeCounts = []; // for global highlight

// echo "<h3>Subject-wise Report</h3>";
// foreach ($subjectMarks as $subj => $marksMap) {

//     // Average
//     $sum   = array_sum($marksMap);
//     $count = count($marksMap);
//     $avg   = $count ? round($sum / $count, 1) : 0.0;
//     $subjectAverages[$subj] = $avg;

//     // Top 2 scorers with tie-break (mark desc, name asc)
//     $list = [];
//     foreach ($marksMap as $studentName => $mark) {
//         $list[] = ['name' => $studentName, 'mark' => $mark];
//     }
//     usort($list, function($a, $b) {
//         if ($a['mark'] === $b['mark']) {
//             return strcmp($a['name'], $b['name']); // tie → name A→Z
//         }
//         return $b['mark'] <=> $a['mark']; // mark desc
//     });
//     $top2 = array_slice($list, 0, 2);

//     // Grade counts + pass/fail
//     $gradeCounts = ['A'=>0,'B'=>0,'C'=>0,'D'=>0];
//     $passCount = 0; $failed = [];
//     foreach ($marksMap as $studentName => $mark) {
//         $grade = getGrade($mark);
//         $gradeCounts[$grade]++;
//         if ($mark >= 40) $passCount++; else $failed[] = $studentName;
//     }
//     $subjectAGradeCounts[$subj] = $gradeCounts['A'];

//     // ----- Print Subject Section -----
//     echo "<strong>Subject: {$subj}</strong><br>";
//     echo "Average: {$avg}<br>";
//     echo "Top 2:<br>";
//     $rank = 1;
//     foreach ($top2 as $row) {
//         echo "&nbsp;&nbsp;{$rank}. {$row['name']} ({$row['mark']})<br>";
//         $rank++;
//     }
//     echo "Grades: A={$gradeCounts['A']}, B={$gradeCounts['B']}, C={$gradeCounts['C']}, D={$gradeCounts['D']}<br>";
//     echo "Pass Count: {$passCount}<br>";
//     echo "Failed: " . (count($failed) ? implode(', ', $failed) : 'None') . "<br><br>";
// }

// // ===== Step 6: Overall student metrics =====
// $overall = []; // ['name'=>..., 'total'=>..., 'science'=>..., 'aCount'=>...]
// foreach ($effective as $name => $bySubj) {
//     $total = 0; $aCount = 0; $science = $bySubj['Science'] ?? 0;
//     foreach ($subjects as $subj) {
//         if (!isset($bySubj[$subj])) continue;
//         $m = $bySubj[$subj];
//         $total += $m;
//         if (getGrade($m) === 'A') $aCount++;
//     }
//     $overall[] = ['name'=>$name, 'total'=>$total, 'science'=>$science, 'aCount'=>$aCount];
// }

// // Ranking: total desc → science desc → name asc
// usort($overall, function($a, $b){
//     if ($a['total'] === $b['total']) {
//         if ($a['science'] === $b['science']) {
//             return strcmp($a['name'], $b['name']);
//         }
//         return $b['science'] <=> $a['science'];
//     }
//     return $b['total'] <=> $a['total'];
// });

// // Student(s) with most A grades
// $maxA = 0;
// foreach ($overall as $row) $maxA = max($maxA, $row['aCount']);
// $mostA = array_values(array_filter($overall, fn($r) => $r['aCount'] === $maxA));
// // tie-break among mostA → higher total → name asc
// usort($mostA, function($a,$b){
//     if ($a['total'] === $b['total']) return strcmp($a['name'], $b['name']);
//     return $b['total'] <=> $a['total'];
// });

// // Print overall ranking
// echo "<h3>Overall Student Ranking (Effective Marks)</h3>";
// $rank = 1;
// foreach ($overall as $row) {
//     echo "{$rank}. {$row['name']} — Total: {$row['total']}, Science: {$row['science']}, A-grades: {$row['aCount']}<br>";
//     $rank++;
// }
// echo "<br>";

// // Print student(s) with most A's
// echo "<strong>Most A grades:</strong> ";
// echo implode(', ', array_map(fn($r) => "{$r['name']} ({$r['aCount']} A's, Total {$r['total']})", $mostA));
// echo "<br><br>";

// // ===== Step 7: Global highlights =====
// arsort($subjectAverages); // highest average first
// $subjectWithHighestAvg = array_key_first($subjectAverages);

// arsort($subjectAGradeCounts); // most A's first
// $subjectWithMostAs = array_key_first($subjectAGradeCounts);

// echo "<h3>Global Highlights</h3>";
// echo "Subject with Highest Average: {$subjectWithHighestAvg} ({$subjectAverages[$subjectWithHighestAvg]})<br>";
// echo "Subject with Most A's: {$subjectWithMostAs} ({$subjectAGradeCounts[$subjectWithMostAs]} A's)<br>";

