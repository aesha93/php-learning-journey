<?php
// Recreate the same array to validate the code again
$shippingMethods = [
    ['code'=>'flatrate',   'title'=>'Flat Rate',   'cost'=>100, 'days'=>5],
    ['code'=>'express',    'title'=>'Express',     'cost'=>250, 'days'=>2],
    ['code'=>'overnight',  'title'=>'Overnight',   'cost'=>500, 'days'=>1]
];

$selectedCode = $_POST['code'] ?? '';
$selectedMethod = null;

// Search for the method
foreach ($shippingMethods as $method) {
    if ($method['code'] === $selectedCode) {
        $selectedMethod = $method;
        break;
    }
}
?>
<!doctype html>
<html>
<head><title>Shipping Summary</title></head>
<body>
<?php if ($selectedMethod): ?>
  <h1>Shipping Method: <?php echo $selectedMethod['title']; ?></h1>
  <p>Cost: <?php echo $selectedMethod['cost']; ?></p>
  <p>Estimated Delivery: <?php echo $selectedMethod['days']; ?> days</p>
<?php else: ?>
  <p style="color:red;">Invalid shipping method selected.</p>
<?php endif; ?>

<p><a href="shipping.php">Choose Again</a></p>
</body>
</html>
