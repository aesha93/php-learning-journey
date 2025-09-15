<?php
// Array of shipping methods
$shippingMethods = [
    ['code'=>'flatrate',   'title'=>'Flat Rate',   'cost'=>100, 'days'=>5],
    ['code'=>'express',    'title'=>'Express',     'cost'=>250, 'days'=>2],
    ['code'=>'overnight',  'title'=>'Overnight',   'cost'=>500, 'days'=>1]
];
?>
<!doctype html>
<html>
<head><title>Select Shipping</title></head>
<body>
<h1>Select Your Shipping Method</h1>
<form action="summary.php" method="post">
  <label for="method">Choose a method:</label>
  <select id="method" name="code">
    <?php foreach ($shippingMethods as $method): ?>
      <option value="<?php echo $method['code']; ?>">
        <?php echo $method['title']; ?>
      </option>
    <?php endforeach; ?>
  </select>
  <br><br>
  <button type="submit">Submit</button>
</form>
</body>
</html>
