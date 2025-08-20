
## Control Structures 

## 1. if, else, elseif, and the ternary operator

“Do this only if a condition is true; otherwise do something else.”

Mini examples:


```php
$qty = 5;

if($qty > 0){
    echo "In stock";
} elseif($qty === 0){
    echo "Out of Stock";
}else{
    echo "Invalid qunatity";
}

$label = ($qty > 0) ? "Available" : "Unavailable";
echo $label;
```

## Common mistakes

Using = instead of ==/=== in conditions: if ($qty = 0) assigns 0 (bug) instead of comparing.

Forgetting that elseif is one word (you can also write else if but be consistent).

Overusing ternary with complex logic—keep it short and readable.

##  Best practices

Keep conditions simple and readable.

Prefer elseif chains over deeply nested ifs when comparing the same variable.

Use ternary only for short, simple expressions (usually for assigning a value).

## 2. for and foreach loops

Plain meaning:
Repeat an action.

for → you control a counter (start → end).

foreach → you read each element from an array, one by one.

Mini examples

```php
// for: run exactly 3 times (useful when you know counts)
for ($i = 0; $i < 3; $i++) {
    echo "Box #$i\n";
}

// foreach: read each product from an array
$products = [
    ['sku' => 'A', 'price' => 100],
    ['sku' => 'B', 'price' => 200],
];

foreach ($products as $product) {
    echo $product['sku'] . " costs " . $product['price'] . "\n";
}
```

## Common mistakes

Off-by-one errors (e.g., <= instead of <).

Forgetting to increment in for ($i++), causing infinite loops.

Assuming foreach changes the original array values—by default it doesn’t.

## Best practices

Use foreach to read arrays cleanly.

Use for when you must run a fixed number of times or need the index.


## 3. break and continue

Plain meaning:

break : stops the loop immediately.

continue : skips the rest of the current iteration and goes to the next one.

Mini examples

```php
$products = [
    ['sku' => 'A', 'status' => 'active'],
    ['sku' => 'B', 'status' => 'discontinued'],
    ['sku' => 'C', 'status' => 'active'],
];

foreach ($products as $p) {
    if ($p['status'] === 'discontinued') {
        continue; // skip B
    }
    echo $p['sku'] . "\n";
    break; // stop after printing the first active product
}
```
## Common mistakes

Forgetting break in switch (explained next), causing unintended “fall-through”.

Using continue when you actually need to stop entirely (break).

## Best practices

Use continue to skip unneeded items cleanly.

Use break to exit once your goal in the loop is achieved.

## 4.Switch

## Plain meaning:
Compare one value to several options.

Mini examples

```php
$method = 'express';

switch ($method) {
    case 'standard':
        echo "Shipping: 80";
        break;
    case 'express':
        echo "Shipping: 150";
        break;
    case 'cod':
        echo "Shipping: 120";
        break;
    default:
        echo "Shipping: not available";
        break;
}
```

## Common mistakes

Missing break, which makes execution “fall through” to the next case.

Using switch when you really need different conditions (then use if/elseif).

## Best practices

Use switch for clean multi-option checks on a single variable.

Always include a default: case as a safety net.

## 5) while and do-while

Plain meaning:
Repeat while a condition is true.

while checks first, then runs.

do-while runs at least once, then checks.

Mini examples

```php
// while: pack items into boxes of 5
$remaining = 12;
$boxes = 0;
while ($remaining > 0) {
    $boxes++;
    $remaining -= 5;
}
echo "Boxes used: $boxes\n";

// do-while: apply a one-time handling fee (runs at least once)
$handling = 0;
do {
    $handling += 10;
} while ($handling < 10);
echo "Handling: $handling\n";
```

## Common mistakes

Creating an infinite loop by never changing the variable in the condition.

Using do-while when zero iterations should be allowed.

## Best practices

Make sure the loop variable changes so it eventually stops.

Choose do-while only when you want at least one run.

## 6) Nested loops

Plain meaning:
A loop inside another loop—for example, an order with many items, and each item needing multiple boxes.

Mini example

```php
$orderItems = [
    ['sku' => 'P1', 'qty' => 7],
    ['sku' => 'P2', 'qty' => 3],
];

foreach ($orderItems as $item) {           // outer loop: each item
    $boxes = 0;
    $left = $item['qty'];
    while ($left > 0) {                    // inner loop: pack boxes
        $boxes++;
        $left -= 5;
    }
    echo $item['sku'] . " needs $boxes boxes\n";
}
```

## Common mistakes

Reusing the same loop counter name in inner and outer loops.

Forgetting to reset inner-loop variables for each outer iteration.

## Best practices

Use clear, different variable names ($i, $j, $left, $boxes).

Keep nested loops simple and focused.

=====================
20-8-2025(Wednesday)
====================

## 1.Ternary Operator:

Short form of if else

```php
$age = 20;
$status = ($age >= 18) ? "Adult" :"Minior";
echo $status;
```

## 2. Nested Loops

Loop inside another loop.

```php
for($i=1; $i<=3; $i++){
    for($j=1; $j<=3; $j++){
        echo "$i x $j = " .($i * $j). "<br>";
    }
}
```

## 3. Break / Continue

break → exit loop immediately.

continue → skip current iteration and move to next.

```php
for($i=1; $i<=10; $i++){
    if($i == 5) break; // stops loop completely
    echo $i . " ";
}
```
```php
for($i=1; $i<=10; $i++){
    if($i == 5) continue; // skips 5 but continues rest
    echo $i . " ";
}
```
======================
Loops Flow :
======================

## while loop

A while loop keeps running as long as the condition is true.

If the condition becomes false → loop stops immediately.

Syntax
====
```php
while(condition){
    // code to execute repeatedly
}
```

### Flow (Step by Step)

1. Check the condition.
2. If true, execute the block.
3. After block, go back to step 1.
4. If false, exit the loop

Example 1: Counting numbers

```php
$number = 1;  

while($number <= 5){  
    echo "Number: $number <br>";  
    $number++;  
}
```

## do while loop

A do...while loop is similar to a while loop,

But the main difference is:
👉 do...while loop executes at least once, even if the condition is false.

Syntax
====

```php
do {
    // Code to execute
} while (condition);
```

### Flow (Step by Step)

1. Execute the block of code inside do { ... }.
2. Then check the condition in while (condition).
3. If condition is true, go back and execute again.
4. If condition is false, stop the loop.
5. This guarantees the code runs at least once.

Example 1: Print numbers from 1 to 5

```php
$number = 1;
do {
    echo $number . " ";
    $number++;
} while ($number <= 5);
```
## foreach loop

## What is foreach loop?

The foreach loop is used to iterate over arrays (indexed, associative, or multidimensional).


It automatically goes through each element of the array without needing a counter ($i).

## Syntax

```php
foreach ($array as $value) {
    // code to execute
}
```

Or for associative arrays:

```php
foreach ($array as $key => $value) {
    // code to execute
}
```

Example with Multidimensional Array:

```php
$students = [
    ["name" => "Avi", "marks" => 80],
    ["name" => "Tiya", "marks" => 90],
    ["name" => "Meera", "marks" => 70],
];

foreach ($students as $student) {
    echo $student["name"] . " scored " . $student["marks"] . "<br>";
}
```

## Switch

## What is switch?

The switch statement is a control structure used when you want to compare a single value against multiple possible conditions.

It is like a cleaner alternative to multiple if...elseif...else.

## Syntax

```php
switch (expression) {
    case value1:
        // Code to execute if expression == value1
        break;

    case value2:
        // Code to execute if expression == value2
        break;

    case value3:
        // Code to execute if expression == value3
        break;

    default:
        // Code to execute if no match is found
}
```

## Key points:

expression is checked against each case.

If a match is found → that case runs.

break is important, otherwise execution continues to the next case.

default runs if no case matches (like else).

🔹 Example 1: Days of the Week


```php
$day = "Wed";

switch ($day) {
    case "Mon":
        echo "Today is Monday";
        break;
    case "Tue":
        echo "Today is Tuesday";
        break;
    case "Wed":
        echo "Today is Wednesday";
        break;
    case "Thu":
        echo "Today is Thursday";
        break;
    case "Fri":
        echo "Today is Friday";
        break;
    default:
        echo "It's Weekend!";
}
```

## for loop

## What is a for loop?

A for loop is used when you know exactly how many times you want to run a block of code.

## syntax 

```php
for(initialization; condition; increment/decrement){
    // code to execute
}
```

## Explanation of each part:

1. Initialization → Set a starting point (e.g., $i = 1;).

2. Condition → Loop will run until this is true (e.g., $i <= 5).

3. Increment/Decrement → Update the counter after each loop (e.g., $i++).

## Example 1: Print numbers 1 to 5

```php
for($i = 1; $i <= 5; $i++){
    echo $i . "<br>";
}
```