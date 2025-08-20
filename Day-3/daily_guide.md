
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